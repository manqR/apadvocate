<?php

namespace backend\controllers;


use Yii;
use yii\web\Response;
use backend\models\Payment;

class PaymentController extends \yii\web\Controller
{
	public static function allowedDomains(){
		return [
			// '*',		
			 'http://apadvocates.com',
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
		$model = Payment::find()
				->All();
		
		$output = array();
		foreach($model as $models):
			$output[] = $models->idpayment;
			$output[] = $models->keterangan;
			$output[] = $models->nominal;
			$output[] = $models->bukti_transfer;
			$output[] = $models->tanggal;
		endforeach;
		
		$data = json_encode($output);
		
		Yii::$app->response->format = Response::FORMAT_JSON;
		$datas = [
			'data'=>[$output]
		];

		return $datas;
		
	}
    public function actionIndex()
    {
        return $this->render('index');
		
    }

}
