<?php

namespace app\controllers;

use app\models\Professions;
use OAuth\Common\Exception\Exception;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Notepad;
use app\models\ContactForm;
use app\models\ZayavkaModel;
use app\models\Registration;
use app\models\Lostpassword;
use app\models\Users;
use yii\helpers\Html;
use \app\models\Superadmin;
use \app\models\Userprofile;
use \app\models\Sitem;
use \app\models\Zlist;
use app\models\Params;
use app\models\Dragonsrights;
use app\models\Zayavka;
use \yii\data\Pagination;
use app\models\OfficialModel;
use app\models\LibraryModel;
use app\models\SudModel;
use app\models\CleaningModel;
use app\models\Approval;
use app\models\LoginBusy;
use app\models\ZayavkaUserView;
use app\models\Nevid;
use app\models\Ready;
use app\models\Changepass;
use app\models\Logs;
use app\models\ProfessionsModel;

class SiteController extends Controller
{

    public function beforeAction($action)
    {
        if (Yii::$app->user->id) {
            if (Yii::$app->session->getId() != Yii::$app->user->identity->last_session_id) {
                Yii::$app->session->destroy();
                $this->redirect(array('site/login'));
                return null;
            }
        }
        return parent::beforeAction($action);;
    }

    public function afterAction($action, $result)
    {
        if ($action->actionMethod != null && $action->actionMethod == "actionLogin" && Yii::$app->user->id) {
            //update the user table with last_session_id
            $user = Users::find()->where(['id' => Yii::$app->user->id])->one();
            $user->last_session_id = Yii::$app->session->id;
            $user->save(false);
        }

        return parent::afterAction($action, $result);
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionApproval()
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect(array('site/login'));
        } else {
            $user = Users::findById(Yii::$app->user->getId());
            if ($user->active == 1 && ($user->groupId == 99 || ($user->groupId > 9 && Dragonsrights::isApprover($user->id)))) {
                //User is able to see this
                $model = new Approval();
                if ($model->load(Yii::$app->request->post())) {
                    $model->proccessActions();
                }
                $model->prepareIndex();
                return $this->render('approval', [
                    'model' => $model,
                ]);
            } else {
                $this->redirect(array('site/index'));
            }
        }
    }

    public function actionNotepad()
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect(array('site/login'));
        } else {
            $user = Users::findById(Yii::$app->user->getId());
            if ($user->groupId < 10) {
                $this->redirect(array('site/index'));
            } else {
                $model = new Notepad();
                if ($model->load(Yii::$app->request->post())) {
                    $model->processPostAction();
                } else {
                    $model->loadIndex();
                }
                if (!$model->allow) {
                    $this->redirect(array('site/login'));
                } else {
                    return $this->render('notepad', [
                        'model' => $model,
                    ]);
                }
            }
        }
    }

    public function actionOfficial()
    {
        return self::libraryOfficialSud('official');
    }

    public function actionSud()
    {
        return self::libraryOfficialSud('sud');
    }

    function libraryOfficialSud($page)
    {
        $model = null;
        if ($page == "official") {
            $model = new OfficialModel();
        }
        if ($page == "library") {
            $model = new LibraryModel();
        }
        if ($page == "sud") {
            $model = new SudModel();
        }
        $loadAlone = false;
        if (Yii::$app->request->get('action')) {
            $model->action = Yii::$app->request->get('action');
            if ($model->action == "view") {
                $model->id = Yii::$app->request->get('id');
                $loadAlone = $model->loadAloneItem();
                if (!$loadAlone) {
                    $this->redirect(array('site/' . $page));
                }
            } else {
                $model->loadAllItems();
            }
        } else {
            if ($model->load(Yii::$app->request->post())) {
                $model->processPostAction();
            }
        }
        if (!$loadAlone) {
            $model->loadAllItems();
        }
        return $this->render($page, [
            'model' => $model,
        ]);
    }

    public function actionLibrary()
    {
        $model = new LibraryModel();
        if (Yii::$app->request->get('action')) {
            if ($model->load(Yii::$app->request->post())) {
                $model->processPostAction();
            }
            $model->action = Yii::$app->request->get('action');
            if ($model->action == "view" || $model->action == "s") {
                $model->id = Yii::$app->request->get('id');
                $loadAlone = $model->loadAloneItem();
                if (!$loadAlone) {
                    $this->redirect(array('site/library'));
                }
            } else {
                $model->loadSections();
            }
        } else {
            if ($model->load(Yii::$app->request->post())) {
                $model->processPostAction();
            } else {
                $model->loadSections();
            }
        }
        return $this->render('library', [
            'model' => $model,
        ]);
    }

    public function actionCleaning()
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect(array('site/login'));
        } else {
            if (Users::findGroupById(Yii::$app->user->getId()) > 9) {
                $model = new CleaningModel();
                $model->action = "index";
                if ($model->load(Yii::$app->request->post())) {

                } else {
                    if (Yii::$app->request->get('id')) {
                        $model->action = "view";
                        $model->id = Yii::$app->request->get('id');
                    }
                }
                $model->proccessRequest();
                return $this->render('cleaning', [
                    'model' => $model,
                ]);
            } else {
                $this->redirect(array('site/index'));
            }
        }
    }

    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect(array('site/login'));
        } else {
            $model = new ZayavkaModel();
            $approveKey = "";
            if (Users::isUserActive(Yii::$app->user->getId())) {
                $model->userActive = true;
                $request = Yii::$app->request;
                if ($model->load($request->post())) {
                    if ($model->isCancel()) {
                        $model->cancelZayavka();
                    }
                }
                $model->getUserZayavki();
            } else {
                $model->userActive = false;
                $approveKey = Users::getConfirmationCode(Yii::$app->user->getId());
            }
            return $this->render('index', [
                'model' => $model,
                'approveKey' => $approveKey,
            ]);
        }
    }

    public function actionSitem()
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect(array('site/login'));
        } else {

            if (Users::findGroupById(Yii::$app->user->getId()) > 1) {
                $model = new Sitem();
                if ($model->load(Yii::$app->request->post())) {
                    $model->performActions();
                } else {
                    if (Yii::$app->request->get('id')) {
                        $model->id = Yii::$app->request->get('id');
                    }
                    $model->load(Yii::$app->request->get());
                }
                return $this->render('sitem', [
                    'model' => $model,
                    'professions' => Professions::getAllProfessions()
                ]);
            } else {
                $this->redirect(array('site/index'));
            }
        }
    }

    public function actionSettings()
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect(array('site/login'));
        } else {
            if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                $model = new Params();
                if ($model->load(Yii::$app->request->post())) {
                    $model->checkAction();
                    $model->loadSettings(true);
                } else {
                    $model->action = "view";
                    $model->loadSettings(true);
                }
                return $this->render('settings', [
                    'model' => $model,
                ]);
            } else {
                $this->redirect(array('site/index'));
            }
        }
    }


    public function actionProfessions()
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect(array('site/login'));
        } else {
            if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                $model = new ProfessionsModel();
                if ($model->load(Yii::$app->request->post())) {
                    $model->checkAction();
                } else {
                    $model->action = "view";
                }
                $model->loadProfessions();
                return $this->render('professions', [
                    'model' => $model,
                ]);
            } else {
                $this->redirect(array('site/index'));
            }
        }
    }

    public function actionLogs()
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect(array('site/login'));
        } else {
            if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                $model = new Logs();
                if ($model->load(Yii::$app->request->post())) {
                    $model->proccessActions();
                }
                $model->loadLogs();
                return $this->render('logs', [
                    'model' => $model,
                ]);
            } else {
                $this->redirect(array('site/index'));
            }
        }
    }

    public function actionSad()
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect(array('site/login'));
        } else {
            return $this->render('sad', []);
        }
    }

    public function actionNevid()
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect(array('site/login'));
        } else {
            if (Users::findGroupById(Yii::$app->user->getId()) > 9) {
                $model = new Nevid();
                $request = Yii::$app->request;
                $user = Users::findById(Yii::$app->user->getId());
                $dragonRights = Dragonsrights::findOneById($user->id);
                if ($dragonRights->nevid != 1) {
                    $this->redirect(array('site/index'));
                } else {
                    if ($model->load($request->post())) {
                        //We got all from POST.
                        $loadedFromPost = true;
                        $model->dragonRights = $dragonRights;
                        $model->processAction();
                    }
                    $model->getNevidZayavki($dragonRights);
                    return $this->render('nevid', [
                        'model' => $model,
                        'dragonRights' => $dragonRights,
                        'professions' => Professions::getAllProfessions()
                    ]);
                }
            } else {
                $this->redirect(array('site/index'));
            }
        }
    }

    public function actionReady()
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect(array('site/login'));
        } else {
            if (Users::findGroupById(Yii::$app->user->getId()) > 9) {
                $user = Users::findById(Yii::$app->user->getId());
                $dragonRights = Dragonsrights::findOneById($user->id);
                $model = new Ready();
                $request = Yii::$app->request;
                if ($dragonRights->chistota != 1) {
                    $this->redirect(array('site/index'));
                } else {
                    if ($model->load($request->post())) {
                        $loadedFromPost = true;
                        $model->dragonRights = $dragonRights;
                        $model->processAction();
                    }
                    $model->getReadyZayavki($dragonRights);
                    return $this->render('ready', [
                        'model' => $model,
                        'dragonRights' => $dragonRights,
                        'professions' => Professions::getAllProfessions()
                    ]);
                }
            }
        }
    }

    public function actionZlist()
    {
        $forceShowZayavka = false;
        $showZayavkaId = -1;
        $debug = "";
        $model = new Zlist();
        $active_page = 1;
        $defaultType = "klan";
        $defaultCity = "kovcheg";
        $loadedFromPost = false;
        $itemsPerPage = 10;
        $request = Yii::$app->request;
        $model->user_group = 0;
        if (!Yii::$app->user->isGuest) {
            $model->user_group = Users::findGroupById(Yii::$app->user->getId());
            if ($model->user_group > 9) {
                $dragonRights = Dragonsrights::findOneById(Yii::$app->user->getId());
            } else {
                $dragonRights = null;
            }
        } else {
            $dragonRights = null;
        }
        if ($model->load($request->post())) {
            //We got all from POST.
            $loadedFromPost = true;
            $defaultCity = $model->city;
            $defaultType = $model->type;
            $model->dragonsRight = $dragonRights;
            $model->verifyAndSaveAction();
        }

        //GET ZAYAVKA ID TO SHOW IN TOPIC
        if (Yii::$app->request->get("zayavka") && Yii::$app->request->get("action")) {
            if (Yii::$app->request->get("action") == 'show') {
                $showZayavkaId = Yii::$app->request->get('zayavka');
                $forceShowZayavka = true;
            }
        }

        //Detect city and type
        if (!$loadedFromPost && !$forceShowZayavka) {
            if ($request->get('type')) {
                $defaultType = $request->get('type');
            }
            if ($request->get('city')) {
                $defaultCity = $request->get('city');
            } else {
                if (!Yii::$app->user->isGuest) {
                    if ($model->user_group > 1) {
                        if ($dragonRights) {
                            if ($dragonRights->smorye == 1) {
                                $defaultCity = "smorye";
                            }
                            if ($dragonRights->utes == 1) {
                                $defaultCity = "utes";
                            }
                        }
                    }
                }
            }
        }
        if ($forceShowZayavka) {
            //DETECT ZAYAVKA_TO_SHOW CITY AND TYPE
            $zayavkaToShow = Zayavka::findZayavkaById($showZayavkaId);
            if ($zayavkaToShow) {
                $defaultCity = $zayavkaToShow->proverka_city;
                $defaultType = $zayavkaToShow->category;
            } else {
                $forceShowZayavka = false;
            }
        }

//END Detect city and type 
//DETECT DEFAULT PAGE TO SHOW         
        $zayavki_temp = Zayavka::findAllZayavkiForCityAndCategory($defaultCity, $defaultType);
        //$zayavki_temp = ZayavkaUserView::findAllZayavkiForCityAndCategory($defaultCity, $defaultType);
        $searchCount = sizeof($zayavki_temp);
        if ($loadedFromPost) {
            //GET PAGE FROM -POST- AND THATS IT
            $active_page = $model->active_page;
            $pagination = new Pagination([
                'defaultPageSize' => $itemsPerPage,
                'totalCount' => $searchCount,
                'page' => $active_page - 1,
                'params' => [
                    'city' => $defaultCity,
                    'type' => $defaultType,
                ]
            ]);
            $debug .= " GOT PAGE FROM -=POST=-: " . $active_page;
        } else {
            if ($request->get('page') > 0) {
                //GET PAGE FROM -GET- AND THATS IT
                $active_page = $request->get('page');
                $debug .= " GOT PAGE FROM -=GET=-: " . $active_page;
                $pagination = new Pagination([
                    'defaultPageSize' => $itemsPerPage,
                    'totalCount' => $searchCount,
                ]);
            } else {
                if ($forceShowZayavka) {
                    //GET PAGE BY ZAYAVKA ID
                    $active_z_counter = 0;
                    for ($z = 0; $z < sizeof($zayavki_temp); $z++) {
                        if ($zayavki_temp[$z]->id == $showZayavkaId) {
                            $active_z_counter = $z;
                            break;
                        } else {
                            $active_z_counter = $z;
                        }
                    }
                    $active_page = intval($active_z_counter / $itemsPerPage);
                    $debug .= " GOT PAGE BY -=SHOW ZAYAVKA ID=-: " . $active_page;
                    $pagination = new Pagination([
                        'defaultPageSize' => $itemsPerPage,
                        'totalCount' => $searchCount,
                        'page' => $active_page
                    ]);
                    if ($active_page > 0) {
                        $active_page = $active_page + 1;
                    }
                } else {
                    //GET PAGE BY ACTIVE ZAYAVKA
                    $active_z_counter = 0;
                    for ($z = 0; $z < sizeof($zayavki_temp); $z++) {
                        if ($zayavki_temp[$z]->active == 1) {
                            $active_z_counter = $z;
                            break;
                        } else {
                            $active_z_counter = $z;
                        }
                    }
                    $active_page = intval($active_z_counter / $itemsPerPage);
                    $debug .= " GOT PAGE BY -=ACTIVE ZAYAVKA=-: " . $active_page;
                    $pagination = new Pagination([
                        'defaultPageSize' => $itemsPerPage,
                        'totalCount' => $searchCount,
                        'page' => $active_page,
                    ]);
                    if ($active_page > 0) {
                        $active_page = $active_page + 1;
                    }
                }
            }
        }
//END PAGE GEMORROI            
        //$zayavki = Zayavka::findAllZayavkiForCityAndCategoryWithoutAll($defaultCity, $defaultType)
        $zayavki = ZayavkaUserView::findAllZayavkiForCityAndCategoryWithoutAll($defaultCity, $defaultType)
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('zlist', [
            'debug' => $debug,
            'active_page' => $active_page,
            'type' => $defaultType,
            'zayavki' => $zayavki,
            'city' => $defaultCity,
            'dragonRights' => $dragonRights,
            'pagination' => $pagination,
            'model' => $model,
            'professions' => Professions::getAllProfessions()
        ]);
    }

    public function actionUserprofile()
    {
        if (!Yii::$app->user->isGuest) {
            if (Users::findGroupById(Yii::$app->user->getId()) > 9) {
                $model = new Userprofile();
                if ($model->load(Yii::$app->request->post())) {
                    if ($model->action == "updateDragonRights") {
                        $model->updateDragonRights();
                        //$model->getAdminRights();
                    }
                    if ($model->action == "updateAlias") {
                        $model->updateAlias();
                    }
                    $model->loadUserDetails();
                    $model->getAdminRights();
                    return $this->render('userprofile', [
                        'model' => $model,
                    ]);
                } else {
                    $this->redirect(array('site/superadmin'));
                }
            } else {
                $this->redirect(array('site/index'));
            }
        } else {
            $this->redirect(array('site/login'));
        }
    }

    public function actionSuperadmin()
    {
        if (!Yii::$app->user->isGuest) {
            if (Users::findGroupById(Yii::$app->user->getId()) > 9) {
                $model = new Superadmin();
                if ($model->load(Yii::$app->request->post())) {
                    if ($model->action == 'userSearch') {
                        $model->searchUserByName();
                    }
                    if ($model->action == 'makeDragon') {
                        $model->makeUserDragon();
                        if ($model->userName) {
                            $model->setSearchAction();
                            $model->searchUserByName();
                        } else {
                            $model->setIndexAction();
                        }
                    }
                    if ($model->action == 'fireDragon') {
                        $model->fireDragon();
                        if ($model->userName) {
                            $model->setSearchAction();
                            $model->searchUserByName();
                        } else {
                            $model->setIndexAction();
                        }
                    }
                } else {
                    if (Yii::$app->request->get('action')) {
                        $model->action = Yii::$app->request->get('action');
                    }
                    if (Yii::$app->request->get('username')) {
                        $model->userName = trim(Yii::$app->request->get('username'));
                    }
                    if ($model->action == 'userSearch') {
                        $model->searchUserByName();
                    } else {
                        $model->setIndexAction();
                    }
                }
                //$model->getUsers();
                //$model->getDragons();
                return $this->render('superadmin', [
                    'model' => $model,
                ]);
            } else {
                $this->redirect(array('site/index'));
            }
        } else {
            $this->redirect(array('site/login'));
        }
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $settings = new Params();
        $settings->loadSettings();
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        $model->verifyFailedTries();
        if ($model->failedTries < $settings->login_attempts) {
            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                $u = Users::find()->where(['id' => Yii::$app->user->id])->one();
                //$u->authKey = Yii::$app->security->generateRandomString();
                $u->save(false);

                return $this->goBack();
            }
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionRegistration()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $settings = new Params();
        $settings->loadSettings();
        $model = new Registration();
        $model->registrationAttempts();
        if ($model->registration_tries < $settings->register_attempts) {
            if ($model->load(Yii::$app->request->post()) && $model->register()) {

            } else {
                $model->generateSecretKey();
            }
        }
        return $this->render('registration', [
            'model' => $model
        ]);
    }

    public function actionLostpassword()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $settings = new Params();
        $settings->loadSettings();
        $model = new Lostpassword();
        $model->passwordResetAttempts();
        if ($model->passwordreset_tries < $settings->restore_attempts) {
            if ($model->load(Yii::$app->request->post()) && $model->restorePassword()) {

            } else {
                $model->generateSecretKey();
            }
        }
        return $this->render('lostpassword', [
            'model' => $model
        ]);
    }

    public function actionChangepass()
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect(array('site/login'));
        } else {
            $settings = new Params();
            $settings->loadSettings();
            $model = new Changepass();
            if ($model->load(Yii::$app->request->post())) {
                $model->proccessRequest();
            } else {
                $model->showInitialPage();
            }
            return $this->render('changepass', [
                'model' => $model
            ]);
        }
    }

    public function actionLoginbusy()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $settings = new Params();
        $settings->loadSettings();
        if ($settings->busylogin_enabled == 0) {
            $this->redirect(array('site/login'));
        } else {
            $model = new LoginBusy();
            $model->passwordResetAttempts();
            $model->success = false;
            $model->errorMsg = "";
            if ($model->passwordreset_tries < $settings->restore_attempts) {
                if ($model->load(Yii::$app->request->post())) {
                    $model->sayLoginBusy();
                }
            }
            return $this->render('loginbusy', [
                'model' => $model
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        //
        $session = Yii::$app->session;
        if ($session->isActive) {
            $session->remove('settingsLoaded');
            $session->remove('settingsSetAt');
            $session->remove('show_ready_items');
            $session->remove('sign_color');
            $session->remove('comment_color');
            $session->remove('otkaz_color');
            $session->remove('show_new_items_count');
            $session->remove('enable_nevid_count');
            $session->remove('busylogin_enabled');
            $session->remove('login_attempts');
            $session->remove('register_attempts');
            $session->remove('restore_attempts');
            $session->remove('color_background');
            $session->remove('max_z_per_day');
            $session->remove('loadKovcheg');
            $session->remove('loadSmorye');
            $session->remove('loadUtes');
            $session->remove('color_chist');
            $session->remove('color_cancelled');
            $session->remove('color_otkaz');
            $session->remove('color_otkaz_kosyak');
            $session->remove('color_inprogress');
            $session->remove('color_killed');
            $session->destroy();
            $session->close();
        }
        //
        Yii::$app->user->logout();
        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionPodacha()
    {
        return $this->render('podacha');
    }

    public function actionZayavka()
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect(array('site/login'));
        } else {
            $model = new ZayavkaModel();
            if (Users::isUserActive(Yii::$app->user->getId())) {
                $model->userActive = true;
                $request = Yii::$app->request;
                if ($request->post()) {
                    $model->load($request->post());
                    if ($model->isCancel()) {
                        $model->cancelZayavka();
                    } else {
                        if ($model->validate()) {
                            $model->saveZayavka();
                        }
                    }
                }
                $model->verifyIsActiveZayavkaExists();
            } else {
                $model->userActive = false;
            }
            $model->readCitiesProfessions();
            return $this->render('zayavka', [
                'model' => $model,
            ]);
        }
    }

}
