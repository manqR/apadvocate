<?php
use yii\web\View;

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
						'ajax': 'quotation/apidata'
					});
");
$this->title = "Quotation";
?>

<div class="card card-block">
	<div class="table-responsive">
		<table class="table table-bordered datatable" style="width:100%">
			<thead>
				<tr>
					<th>
						ID Dokumen
					</th>
					<th>
						Kategori
					</th>
					<th>
						Nama File
					</th>
					<th>
						Aksi
					</th>		
					
				</tr>
			</thead>
		</table>
	</div>
</div>