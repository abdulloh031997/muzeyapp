<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'uz',
    'TimeZone' => 'Asia/Tashkent',
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'MyApplication' => [
            'class' => 'frontend\components\MyApplication'
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => ''
        ],
        'i18n' => [
            'translations' => [
                'main' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
                'label' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap4\BootstrapAsset' => [
                    'css' => [],
                ],
                'yii\bootstrap4\BootstrapPluginAsset' => [
                    'js' => [],
                    'css' => [],
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js' => [],
                ],
                'yii\web\JqueryAsset' => [
                    'js' => YII_ENV_DEV ? ['jquery.js'] : ['jquery.min.js'],
                ],
                'kartik\bs4dropdown\DropdownAsset' => [
                    'js' => [],
                    'css' => [],
                ],
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => '/site/index/',
                '/kurslar' => '/site/kurslar/',
                'registered/<id:\d+>' => 'registered/view',
                'kurslar/<id:\d+>' => 'site/inner',
                '/reg/<type:\d+>' => 'registered/create',
                'registered/captcha/<refresh:\d+>' => '/registered/captcha',
                'registered/captcha/<v:\w+>' => '/registered/captcha',
            ],
        ],
    ],
    'params' => $params,
];
