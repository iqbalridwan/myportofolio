<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Desa</h1>
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
								<label>Nama Desa* </label>
								<input type="hidden" value="<?=$row->id_desa ?>" name="id_desa">
								<input class="form-control" type="text"  value="<?=$this->input->post('nama_desa') ?? $row->nama_desa ?>"  name="nama_desa">
								<?= form_error('nama_desa') ?>
							</div>
							<div class="form-group">
								<label>Lokasi* </label>
								<input class="form-control" type="text"  value="<?=$this->input->post('lokasi') ?? $row->lokasi ?>"  name="lokasi">
								<?= form_error('lokasi') ?>
							</div>
							<div class="form-group">
								<label>Dusun* </label>
								<input class="form-control" type="text"  value="<?=$this->input->post('dusun') ?? $row->dusun ?>"  name="dusun">
								<?= form_error('dusun') ?>
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