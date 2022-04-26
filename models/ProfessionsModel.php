<?php

namespace app\models;

use Yii;
use Text;
use app\models\Professions;

class ProfessionsModel extends \yii\base\Model
{

    public $action;
    public $id;
    public $allProfessions;
    public $kovchegProfessions;
    public $smoryeProfessions;
    public $utesProfessions;
    public $commonProfessions;
    public $system_name;
    public $view_name;
    public $active;
    public $city;
    public $category;


    public function rules()
    {
        return [
            [['category', 'action', 'city', 'view_name', 'system_name', 'active', 'allProfessions', 'kovchegProfessions', 'utesProfessions', 'commonProfessions', 'id'], 'emptyValidate']
        ];
    }

    public function checkAction()
    {
        if (Users::findGroupById(Yii::$app->user->getId()) != 99) {
            $this->redirect(array('site/index'));
        }
        if ($this->action == "add") {
            if (strlen($this->city) > 0 && strlen($this->system_name) > 0 && strlen($this->view_name) > 0) {
                $prof = new Professions();
                $prof->city = $this->city;
                $prof->system_name = $this->system_name;
                $prof->view_name = $this->view_name;
                $prof->active = false;
                $prof->category = $this->category;
                $prof->save();
                $this->city = "";
                $this->system_name = "";
                $this->view_name = "";
            }
        }
        if ($this->action == "delete") {
            if (strlen($this->id) > 0) {
                $prof = Professions::getById($this->id);
                $prof->delete();
                $this->city = "";
                $this->system_name = "";
                $this->view_name = "";
            }
        }
        if ($this->action == "hide") {
            if (strlen($this->id) > 0) {
                $prof = Professions::getById($this->id);
                $prof->active = false;
                $prof->save();
                $this->city = "";
                $this->system_name = "";
                $this->view_name = "";
            }
        }
        if ($this->action == "show") {
            if (strlen($this->id) > 0) {
                $prof = Professions::getById($this->id);
                $prof->active = true;
                $prof->save();
                $this->city = "";
                $this->system_name = "";
                $this->view_name = "";
            }
        }

    }

    public function loadProfessions()
    {
        $this->allProfessions = Professions::getAllProfessions();
        $this->loadCitiesProfessions();

    }

    public function loadCitiesProfessions()
    {
        $this->kovchegProfessions = Professions::getAllByCity("kovcheg");
        $this->smoryeProfessions = Professions::getAllByCity("smorye");
        $this->utesProfessions = Professions::getAllByCity("utes");
        $this->commonProfessions = Professions::getAllByCity("common");
    }

    public function emptyValidate()
    {

    }


}

?>