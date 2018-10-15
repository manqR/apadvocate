<?php

namespace backend\controllers;


use Yii;
use yii\web\Response;
use backend\models\Payment;
use yii\web\UploadedFile;

class PaymentController extends \yii\web\Controller
{
	public static function allowedDomains(){
		return [
			'*',		
			// 'http://apadvocates.com',
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
				->where(['idclient'=>Yii::$app->user->identity->idclient])
				->All();
		

		$output = array();
	

		foreach($model as $key => $models):
			$status = '';
			if($models->status == 0){
				$status = '<span class="tag tag-warning">Pending</span>';
			}else{
				$status = '<span class="tag tag-success">Verified</span>';
			}
			$output[$key] = array($models->idpayment
								 , $models->keterangan
								 ,number_format($models->nominal,0,",",".")								
								 ,'<a href="payment-download-'.$models->idpayment.'" class="material-icons" aria-hidden="true">file_download</a>'
								 ,$status
								 ,$models->tanggal);
		endforeach;
		
		$data = json_encode($output);
		$data = [
			'data'=>$output
		];
		
		Yii::$app->response->format = Response::FORMAT_JSON;
		return $data;	
		
	}

	public function actionDownload($id){
		$download = Payment::find()
				->where(['idclient'=>Yii::$app->user->identity->idclient])
				->AndWhere(['idpayment'=>$id])
				->One();
			
        $path = Yii::getAlias('@webroot').'/payments/'.$download->idclient.'/'.$download->bukti_transfer;          
        if (file_exists($path)) {
            return Yii::$app->response->sendFile($path);
		}
	}
	
    public function actionIndex()
    {
        return $this->render('index');
		
    }
    public function actionCreate()
    {
		function getRandom() {
			$rand=mt_rand(100000,999999);			
			return $rand;
		}

		$cek = Payment::findOne(getRandom());

		if(!$cek){

			$model = new Payment();
			if ($model->load(Yii::$app->request->post())){
				
				$BillNo = 'BILL'. getRandom();
				$model->idpayment = $BillNo;
				$model->idclient = Yii::$app->user->identity->idclient;
				$model->status = 0;
				$model->tanggal = date('Y-m-d H:i:s');

				$uploadDir = Yii::getAlias('@webroot/payments/'.$model->idclient);
				if(!is_dir("payments/". $model->idclient ."/")) {
					mkdir("payments/". $model->idclient ."/");
				}            
				$model->bukti_transfer = UploadedFile::getInstance($model,'bukti_transfer');
				$model->bukti_transfer->saveAs($uploadDir.'/'.$model->bukti_transfer);	

				$model->save(false);
				
				include './inc/functionEmail.php';
				SendProof(Yii::$app->user->identity->email, Yii::$app->user->identity->nama);
				
				return $this->redirect(['index']);
				
			}
			return $this->render('_form',[
				'model'=>$model
			]);
		}
		return $this->render('_form',[
			'model'=>$model
		]);
        
		
    }

}
