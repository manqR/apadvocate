<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Client */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card-block">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idclient')->textInput(['maxlength' => true])->label('Kode Client') ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true])->label('Nama Lengkap') ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label('Email') ?>

    <?= $form->field($model, 'tagihan')->textInput() ?>

    <?= $model->isNewRecord ? $form->field($model, 'password')->passwordInput(['maxlength' => true]) : ''?>

    <?= $form->field($model, 'status')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '-- Pilih --','style'=>'font-size:12px']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
