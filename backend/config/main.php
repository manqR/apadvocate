<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
	'name' =>'AP Client',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
		'urlManager' => [
            'class' => 'yii\web\UrlManager',
			
            'showScriptName' => false,
            'enablePrettyUrl' => true,
			'rules'=>[
				
				//---------------------------------- STUDENT -----------------------------//
				'quotation'=>'quotation/index',								
				'cases'=>'cases/index',								
				'invoice'=>'invoice/index',
				'payment'=>'payment/index',
				
				//---------------------------------- </STUDENT -----------------------------//
				
				// //---------------------------------- SETUP -----------------------------//
				// 'tagihan'=>'tagihan/index',				
				// 'kelas'=>'kelas/index',
				// 'jurusan'=>'jurusan/index',				
				// 'registration'=>'siswa/index',
				
				// //---------------------------------- CREATE -----------------------------//
				// 'jurusan-create'=>'jurusan/create',
				// 'kelas-create'=>'kelas/create',
				// 'tagihan-create'=>'tagihan/create',
				// 'registration-add'=>'siswa/create',
				// 'tagihan-siswa-create'=>'tagihan_siswa/create',
				// 'class-create'=>'kelas-group/create',
				
				// //---------------------------------- VIEW -----------------------------//				
				// 'kelas-view-<id>' => 'kelas/view',
				// 'jurusan-view-<id>' => 'jurusan/view',
				// 'tagihan-view-<idtagihan>-<idjurusan>-<idkelas>' => 'tagihan/view',
				// 'class-view-<id>' => 'kelas-group/view',
				
				// //---------------------------------- UPDATE -----------------------------//				
				// 'kelas-update-<id>' => 'kelas/update',
				// 'jurusan-update-<id>' => 'jurusan/update',
				// 'tagihan-update-<idtagihan>-<idjurusan>-<idkelas>' => 'tagihan/update',
				// 'class-update-<id>' => 'kelas-group/update',
				
				// //---------------------------------- DELETE -----------------------------//				
				// 'kelas-delete-<id>' => 'kelas/delete',
				// 'jurusan-delete-<id>' => 'jurusan/delete',
				// 'tagihan-delete-<id>' => 'tagihan/delete',
				// 'class-delete-<id>' => 'kelas-group/delete',
				
				//---------------------------------- API -----------------------------//
				// 'class-apigroup-<id>' => 'kelas-group/apigroup',
				// 'class-data-<id>' => 'kelas-group/arraydata',
				
				//---------------------------------- Login -----------------------------//
				'login'=>'site/login',
		

			],
		],
        'request' => [
            'csrfParam' => '_csrf-backend',
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
              
    ],
    'params' => $params,
];
