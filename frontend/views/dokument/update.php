<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Dokument */

$this->title = 'Update Dokument: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Dokuments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iddokumen, 'url' => ['view', 'id' => $model->iddokumen]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="card">


<?= $this->render('_form', [
    'model' => $model,
    ]) 
?>

</div>