<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idpayment',
            [
				'header' => 'klien',
				'attribute' => 'idclient'
			],                
            'keterangan',
            'nominal',
            [
				'header' => 'Bukti Transfer',
                'attribute' => 'bukti_transfer',
                'format' => 'raw',
                'value' => function ($model) {
                    return '<a href="payment-download-'.$model->idpayment.'-'.$model->idclient.'" class="material-icons" aria-hidden="true">file_download</a>';                
                    
                },
			],     
            [
				'header' => 'Status',
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->status == 1 ? '<span class="tag tag-success">Verified</span>' : '<span class="tag tag-warning">Pending</span>';
                    
                },
			],        
               
            [
                'header' => 'User Approve',   
                'attribute' => 'user_approve',            
			],        
               
            //'user_input',
            //'status',
            //'tanggal',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
