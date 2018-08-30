<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Payment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card-block">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idpayment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idclient')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nominal')->textInput() ?>

    <?= $form->field($model, 'bukti_transfer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_input')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'tanggal')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
