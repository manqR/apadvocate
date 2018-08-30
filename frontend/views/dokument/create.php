<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Dokument */

$this->title = 'Create Dokument';
$this->params['breadcrumbs'][] = ['label' => 'Dokuments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">


    <?= $this->render('_form', [
        'model' => $model,
        ]) 
    ?>

</div>