<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DokumentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dokument-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'iddokumen') ?>

    <?= $form->field($model, 'kategori') ?>

    <?= $form->field($model, 'idclient') ?>

    <?= $form->field($model, 'filename') ?>

    <?= $form->field($model, 'tanggal') ?>

    <?php // echo $form->field($model, 'user_upload') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
