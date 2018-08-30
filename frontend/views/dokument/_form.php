<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\helpers\ArrayHelper;
use frontend\models\Category;
use frontend\models\Client;
/* @var $model backend\models\Dokument */
/* @var $form yii\widgets\ActiveForm */



$root = '@web';
/* @JS */
$this->registerJsFile($root."/../vendors/select2/select2.js",
['depends' => [\yii\web\JqueryAsset::className()],
'position' => View::POS_END]);
$this->registerJsFile($root."/../vendors/bootstrap-maxlength/src/bootstrap-maxlength.js",
['depends' => [\yii\web\JqueryAsset::className()],
'position' => View::POS_END]);

$this->registerJsFile($root."/../scripts/forms/plugins.js",
['depends' => [\yii\web\JqueryAsset::className()],
'position' => View::POS_END]);


/* @CSS */
$this->registerCssFile('../vendors/select2/select2.css');

?>

<div class="card-block">

    <?php
        $form = ActiveForm::begin([
            'options'=>[
                    'enctype'=>'multipart/form-data',
                    ]			
                ]); 
    
    ?>

    <?= $form->field($model, 'idcategory' ,['options' => ['tag' => 'false']])-> dropDownList(
				ArrayHelper::map(Category::find()->all(),'idcategory','category'),
				['prompt'=>'Choose Category...','class'=>'select2 m-b-1','style' => 'width: 100%'])->label('Category');  ?>
			
	<?= $form->field($model, 'idclient', ['options' => ['tag' => 'false']])-> dropDownList(
				ArrayHelper::map(Client::find()->all(),'idclient','nama'),
				['prompt'=>'Choose Client...','class'=>'select2 m-b-1','style' => 'width: 100%'])->label('Client');  ?>

    <?= $form->field($model, 'filename')->fileInput(['class'=>'form-control'])->label('Upload File') ?>

  
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
