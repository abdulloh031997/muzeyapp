<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'dynagrid'=>[
            'class'=>'\kartik\dynagrid\Module',
            // other settings (refer documentation)
        ],
        'gridview'=>[
            'class'=>'\kartik\grid\Module',
            // other module settings
        ],

    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'baseUrl'=>'',
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
        'view' => [
            'class' => 'backend\components\View',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
            'class' => 'codemix\localeurls\UrlManager',
            'languages' => ['ru','uz'], // List all supported languages here
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
      
        'i18n' => [
            'translations' => [
                'template*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@backend/messages',
                    'fileMap' => [
                        'template' => 'template.php',
                    ],
                ],
            ],
        ],
    ],
    'params' => $params,
];
