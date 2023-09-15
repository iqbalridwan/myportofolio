<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tambah Desa</h1>
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
								<div class="form-group">
									<label>Lokasi* </label>
									<input class="form-control" type="text" value="<?=set_value('lokasi')?>" name="lokasi">
									<?= form_error('lokasi') ?>
								</div>
								<div class="form-group">
									<label>Dusun* </label>
									<input class="form-control" type="text" value="<?=set_value('dusun')?>" name="dusun">
									<?= form_error('dusun') ?>
								</div>
								<div class="form-group">
									<label>Nama Desa* </label>
									<input class="form-control" type="text" value="<?=set_value('nama_desa')?>" name="nama_desa">
									<?= form_error('namadesa') ?>
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