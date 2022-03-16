<?php

$params = require(__DIR__ . '/params.php');

$config = [
     'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset'
    ],
    'timeZone' => 'Europe/Moscow',
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'site/index',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '1xxAl797Tm3s3oajOQkTu982JL098jaP',
            'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\Users',
            'enableAutoLogin' => true,
            'enableSession' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            //'suffix' => '.html',
            'rules' => [
                ['class' => 'app\components\SefRule'],
                [
                    'pattern' => '<action>',
                    'route' => 'site/<action>',
                    'suffix' => '/'
                ],
                [
                    'pattern' => 'captcha/<v:\w+>',
                    'route' => 'site/captcha',
                    'suffix' => '/'
                ],
                [
                    'pattern' => 'sud/<action:\w+>/<id:\w+>',
                    'route' => 'site/sud',
                    'suffix' => '/'
                ],
                [
                    'pattern' => 'sad/<action:\w+>/<id:\w+>',
                    'route' => 'site/sad',
                    'suffix' => '/'
                ],
                [
                    'pattern' => 'official/<action:\w+>/<id:\w+>',
                    'route' => 'site/official',
                    'suffix' => '/'
                ],
                [
                    'pattern' => 'library/<action:\w+>/<id:\w+>',
                    'route' => 'site/library',
                    'suffix' => '/'
                ],
                [
                    'pattern' => 'superadmin/<action:\w+>/<page:\d+>',
                    'route' => 'site/superadmin',
                    'suffix' => '/'
                ],
                [
                    'pattern' => 'superadmin/<action:\w+>/<username:\w+>/<page:\w+>',
                    'route' => 'site/superadmin',
                    'suffix' => '/'
                ],
                [
                    'pattern' => 'superadmin/<action:\w+>//<page:\w+>',
                    'route' => 'site/superadmin',
                    'suffix' => '/'
                ],
                [
                    'pattern' => 'superadmin/<action:\w+>/<username:\w+>',
                    'route' => 'site/superadmin',
                    'suffix' => '/'
                ],
                [
                    'pattern' => 'professions/<action:\w+>',
                    'route' => 'site/professions',
                    'suffix' => '/'
                ],
                [
                    'pattern' => 'cleaning/<id:\w+>',
                    'route' => 'site/cleaning',
                    'suffix' => '/'
                ],
                [
                    'pattern' => 'zlist/<action:\w+>/<zayavka:\d+>',
                    'route' => 'site/zlist',
                    'suffix' => '/'
                ],
                [
                    'pattern' => 'zlist/<page:\w+>',
                    'route' => 'site/zlist',
                    'suffix' => '/'
                ],
                [
                    'pattern' => 'zlist/<city:\w+>/<type:\w+>/<page:\w+>',
                    'route' => 'site/zlist',
                    'suffix' => '/'
                ],
                [
                    'pattern' => 'zlist/<city:\w+>/<type:\w+>',
                    'route' => 'site/zlist',
                    'suffix' => '/'
                ],
                [
                    'pattern' => 'sitem/<id:\w+>',
                    'route' => 'site/sitem',
                    'suffix' => '/'
                ],
                [
                    'pattern' => '<controller>/<action>',
                    'route' => '<controller>/<action>',
                    'suffix' => '/'
                ],
            ],
        ],
        /* 'urlManager' => [
          'enablePrettyUrl' => true,
          'showScriptName' => false,
          'enableStrictParsing' => false,
          //'suffix' => '.html',
          'rules' => [
          ['class' => 'app\components\SefRule'],
          [
          'pattern' => 'login',
          'route' => 'site/login',
          'suffix' => '/',
          'normalizer' => false, // disable normalizer for this rule
          ],
          [
          'pattern' => 'zayavka',
          'route' => 'site/zayavka',
          'suffix' => '/',
          'normalizer' => false, // disable normalizer for this rule
          ],
          [
          'pattern' => 'superadmin',
          'route' => 'site/superadmin',
          'suffix' => '/',
          'normalizer' => false, // disable normalizer for this rule
          ],
          [
          'pattern' => 'settings',
          'route' => 'site/settings',
          'suffix' => '/',
          'normalizer' => false, // disable normalizer for this rule
          ],
          [
          'pattern' => 'cleaning',
          'route' => 'site/cleaning',
          'suffix' => '/',
          'normalizer' => false, // disable normalizer for this rule
          ],
          [
          'pattern' => 'zlist',
          'route' => 'site/zlist',
          'suffix' => '/',
          'normalizer' => false, // disable normalizer for this rule
          ],

          ],
          ], */
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['82.209.214.222', '127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;