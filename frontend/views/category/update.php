<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */

$this->title = 'Update Category: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcategory, 'url' => ['view', 'id' => $model->idcategory]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="card">


<?= $this->render('_form', [
    'model' => $model,
    ]) 
?>

</div>
