<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\web\View;
?>

<div class="card card-block">

    <?php
        $form = ActiveForm::begin([
            'options'=>[
                    'enctype'=>'multipart/form-data',
                    ]			
                ]); 
    
    ?>
  	<?= $form->field($model, 'keterangan')->textInput() ?>							
    <?= $form->field($model, 'nominal')->textInput() ?>
    <?= $form->field($model, 'bukti_transfer')->fileInput(['class'=>'form-control'])->label('Bukti Transfer') ?>

  
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>