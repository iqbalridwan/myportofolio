<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Ganti Password</h1>
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
									<label>Password Lama</label>
									<input type="password" class="form-control" value="<?=set_value('passwordlama')?>" name="passwordlama">
									<?= form_error('passwordlama') ?>
								</div>
								<div class="form-group">
									<label>Password Baru</label>
									<input type="password" class="form-control" value="<?=set_value('passwordbaru')?>" name="passwordbaru">
									<?= form_error('passwordbaru') ?>
								</div>								
								<div class="form-group">
									<label>Password Konfirmasi</label>
									<input type="password" class="form-control" value="<?=set_value('passconf')?>" name="passconf">
									<?= form_error('passconf') ?>
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