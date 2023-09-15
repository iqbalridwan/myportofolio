<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Cabang</h1>
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
								<?php $row=$row->row(); ?>
							<div class="form-group">
								<label>Nama Cabang* </label>
								<input type="hidden" value="<?=$row->kode_cabang ?>" name="kode">
								<input class="form-control" type="text"  value="<?=$this->input->post('nama') ?? $row->nama_cabang ?>"  name="nama">
								<?= form_error('nama') ?>
							</div>
							<div class="form-group">
								<label>alamat </label>
								<input class="form-control" type="text"  value="<?=$this->input->post('alamat') ?? $row->alamat_cabang ?>"  name="alamat">
								<?= form_error('alamat') ?>
							</div>
										<button type="submit" class="btn btn-primary">Submit Button</button>
									<button type="reset" class="btn btn-default">Reset Button</button>
								</div>
							
						</div>
					</div>
				</div><!-- /.panel-->
			</div>
	</div>
</div>