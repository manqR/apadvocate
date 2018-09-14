<?php
use yii\web\View;
use yii\helpers\Html;

$root = '@web';

/* @JS */
$this->registerJsFile($root."/vendors/datatables/media/js/jquery.dataTables.js",
['depends' => [\yii\web\JqueryAsset::className()],
'position' => View::POS_END]);
$this->registerJsFile($root."/vendors/datatables/media/js/dataTables.bootstrap4.js",
['depends' => [\yii\web\JqueryAsset::className()],
'position' => View::POS_END]);

/* @CSS */
$this->registerCssFile($root."/vendors/datatables/media/css/dataTables.bootstrap4.css");

$this->registerJs("  $('.datatable').DataTable({
						 'ajax': 'payment/apidata'
					 });
				 ");
				 

$this->title = "Payment";				 

?>
<p>
	<?= Html::a(' Konfirmasi Pembayaran', ['create'], ['class' => 'btn btn-success fa fa-plus']) ?>
</p>

<div class="card card-block">
	

	<div class="table-responsive">
		<table class="table table-bordered datatable" style="width:100%">
			<thead>
				<tr>
					<th>
						ID Payment
					</th>
					<th>
						Keterangan
					</th>
					<th>
						Nominal
					</th>
					<th>
						 Bukti Transfer
					</th>
					<th>
					 	Status
					</th>
					<th>
						Tanggal
					</th>
				</tr>
			</thead>
		</table>
	</div>
</div>