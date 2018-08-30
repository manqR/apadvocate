<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PaymentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idpayment') ?>

    <?= $form->field($model, 'idclient') ?>

    <?= $form->field($model, 'keterangan') ?>

    <?= $form->field($model, 'nominal') ?>

    <?= $form->field($model, 'bukti_transfer') ?>

    <?php // echo $form->field($model, 'user_input') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'tanggal') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
