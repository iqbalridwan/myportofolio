<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Pajak</h1>
			</div>
		</div>
	<div class="row">
		<div class="col-lg-12">
			<!-- /.panel-->
			<div class="panel panel-default">
				<div class="panel-heading">Forms</div>
				<div class="panel-body">
					<div class="col-md-6 col-md-offset-3">
						<form role="form" action="" method="post">
							<?php $row = $row->row(); ?>
							<div class="form-group">
								<label>Nama Barang* </label>
								<input type="hidden" value="<?=$row->barcode ?>" name="barcode">
								<input class="form-control" type="text"  value="<?=$this->input->post('nama_barang') ?? $row->nama_barang ?>"  name="nama_barang" disabled>
								<?= form_error('nama_barang') ?>
							</div>
							<div class="form-group">
								<label>Masa pajak* </label>
			                    <div class='input-group date' id='datetimepicker2'>
			                        <input type='text' class="form-control" value="<?=$this->input->post('masa_pajak') ?? $row->masa_pajak ?>" name="masa_pajak">
									<?= form_error('masa_pajak') ?>
			                        <span class="input-group-addon">
			                            <span class="glyphicon glyphicon-calendar"></span>
			                        </span>
			                    </div>
		                    </div>								
									<button type="submit" class="btn btn-primary">Submit Button</button>
								<button type="reset" class="btn btn-default">Reset Button</button>
							</div>
							
						</div>
					</div>
				</div>
			</div>
	</div>
</div>