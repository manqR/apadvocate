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
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
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
            'rules' => [
                'login'=>'site/login',
                'user'=>'user/index',

                // INDEX
                'client'=>'client/index',
                'category'=>'category/index',
                'upload'=>'dokument/index',
                'payment'=>'payment/index',
                'user'=>'user/index',



                // CREATE
                'client-create'=>'client/create',
                'category-create'=>'category/create',
                'upload-create'=>'dokument/create',
                'payment-create'=>'payment/create',
                'user-create'=>'user/create',


                'payment-download-<id>-<client>'=>'payment/download',


                // UPDATE
                'client-update-<id>'=>'client/update',
                'category-update-<id>'=>'category/update',
                'upload-update-<id>'=>'dokument/update',
                'payment-update-<id>'=>'payment/update',
                'user-update-<id>'=>'user/update',




                // VIEW
                'client-view-<id>'=>'client/view',
                'category-view-<id>'=>'category/view',
                'upload-view-<id>'=>'dokument/view',
                'payment-view-<id>'=>'payment/view',
                'user-view-<id>'=>'user/view',




                // DELETE
                'client-delete-<id>'=>'client/delete',
                'category-delete-<id>'=>'category/delete',
                'upload-delete-<id>'=>'dokument/delete',
                'payment-delete-<id>'=>'payment/delete',
                'user-delete-<id>'=>'user/delete',
            ],
        ],
        
    ],
    'params' => $params,
];
