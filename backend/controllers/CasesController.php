<?php

namespace backend\controllers;

class CasesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
