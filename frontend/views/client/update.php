<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Client */

$this->title = 'Update Client: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idclient, 'url' => ['view', 'id' => $model->idclient]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="card">


<?= $this->render('_form', [
    'model' => $model,
    ]) 
?>

</div>

