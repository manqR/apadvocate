<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Dokument;
use frontend\models\Client;
use frontend\models\DokumentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * DokumentController implements the CRUD actions for Dokument model.
 */
class DokumentController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Dokument models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DokumentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dokument model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Dokument model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Dokument();

        if ($model->load(Yii::$app->request->post())){
                                
            $model->idclient = $model->idclient;                       
            $model->tanggal = date('Y-m-d H:i:s');
            $model->user_upload = Yii::$app->user->identity->username;

            $uploadDir = Yii::getAlias('@webroot/document/'.$model->idclient);
            if(!is_dir("document/". $model->idclient ."/")) {
                mkdir("document/". $model->idclient ."/");
            }            
            $model->filename = UploadedFile::getInstance($model,'filename');
            $model->filename->saveAs($uploadDir.'/'.$model->filename);	

            $model->save(false);
            
			$modelMail = Client::find()
						->where(['idclient'=>$model->idclient])
						->One();
			include '../inc/functionEmail.php';
            SendDokumen($modelMail->email, $model->idclient, $model->kategori);
            
            return $this->redirect(['view', 'id' => $model->iddokumen]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Dokument model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())){

            $model->filename = UploadedFile::getInstance($model,'filename');
            if(!empty($model->filename)){                
                $model->idclient = $model->idclient;                
                $uploadDir = Yii::getAlias('@webroot/document/'.$model->idclient);
                if(!is_dir("document/". $model->idclient ."/")) {
                    mkdir("document/". $model->idclient ."/");
                }            
                
                $model->filename->saveAs($uploadDir.'/'.$model->filename);	
                $model->save(false);
                // var_dump($model->filename);
                // echo "tidak kosong";
                return $this->redirect(['view', 'id' => $model->iddokumen]);
            }else{
                $doc = Dokument::find()
                ->where(['idcategory'=>$model->idcategory])
                ->Andwhere(['idclient'=>$model->idclient])
                ->One();
                $model->idcategory = $model->idcategory;
                $model->idclient = $model->idclient;
                $model->idcategory = $model->idcategory;
                $model->filename = $doc->filename;
                $model->save(false);
                // var_dump($model->filename);
                // echo "kosong";
                return $this->redirect(['view', 'id' => $model->iddokumen]);
            }
            
            
             
             
           
            
            
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Dokument model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Dokument model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dokument the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dokument::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
