<?php

namespace backend\controllers;

use Yii;
use yii\web\Response;
use backend\models\Dokument;

class InvoiceController extends \yii\web\Controller
{
    public static function allowedDomains(){
		return [
			 '*',		
			 //'http://apadvocates.com',
		];
	}
    
    public function behaviors()
    {
    
			return array_merge(parent::behaviors(), [
			'corsFilter'  => [
				'class' => \yii\filters\Cors::className(),
				'cors'  => [					
					'Origin'                           => static::allowedDomains(),					
					'Access-Control-Allow-Credentials' => true,
					'Access-Control-Max-Age'           => 3600,    
				],
			],

		]);
    }


    public function actionApidata(){
        $model = Dokument::find()
                ->where(['kategori'=>'Invoice'])
                ->AndWhere(['idclient'=>Yii::$app->user->identity->idclient])
                ->All();                    
        $output = array();
		

        foreach($model as $key => $models):
            $output[$key] = array($models->iddokumen
                                 , $models->kategori
                                 ,$models->filename								
                                 ,'<a href="invoice-download-'.$models->iddokumen.'" class="material-icons" aria-hidden="true">file_download</a>');
        endforeach;
        
        $data = json_encode($output);
        $data = [
            'data'=>$output
        ];
        
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $data;
		
    }

    public function actionDownload($id){
        $download = Dokument::find()
                ->where(['kategori'=>'Invoice'])
                ->AndWhere(['idclient'=>Yii::$app->user->identity->idclient])
                ->AndWhere(['iddokumen'=>$id])
                ->One();
        
        $path = Yii::getAlias('@webroot').'/admin/document/'.$download->idclient.'/'.$download->filename;          
        if (file_exists($path)) {
            return Yii::$app->response->sendFile($path);
        }
    }
    public function actionIndex()
    {
        return $this->render('index');
    }

}
