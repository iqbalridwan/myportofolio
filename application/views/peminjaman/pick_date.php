<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Input Tanggal Pinjam Inventaris</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<!-- /.panel-->
				<div class="panel panel-default">
					<div class="panel-heading">Forms</div>
					<div class="panel-body">
						<div class="col-md-6 col-md-offset-3">
							<form role="form" action="<?=site_url('pinjam/addinven')?>" method="post">
								<div class="form-group">
									<Input type="hidden" value="<?=set_value($this->fungsi->user_login()->nama)?>" name="nip_user">
									<label>Tanggal Pinjam</label>
		                    <div class='input-group date' id='datetimepicker1'>			<input class="form-control" type="text" value="<?=set_value('tgl_pinjam')?>" name="tgl_pinjam">
									<?= form_error('tgl_pinjam') ?>
			                        <span class="input-group-addon">
			                            <span class="glyphicon glyphicon-calendar"></span>
			                        </span>
			                    </div>									
								</div>
								<div class="form-group">
								<label>Tanggal Kembali</label>
		                    <div class='input-group date' id='datetimepicker5'>			<input class="form-control" type="text" value="<?=set_value('tgl_kembali')?>" name="tgl_kembali">
									<?= form_error('tgl_kembali') ?>
			                        <span class="input-group-addon">
			                            <span class="glyphicon glyphicon-calendar"></span>
			                        </span>
			                    </div>									
								</div>

								<button type="submit" name="pickdate" class="btn btn-primary">Submit Button</button>
									<button type="reset" class="btn btn-default">Reset Button</button>
								</div>

						</div>
					</div>
				</div><!-- /.panel-->
			</div>
	</div>
</div>