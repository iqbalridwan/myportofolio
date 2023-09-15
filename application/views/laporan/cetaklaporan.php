<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Input Tanggal Laporan</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<!-- /.panel-->
				<div class="panel panel-default">
					<div class="panel-heading">Forms</div>
					<div class="panel-body">
						<div class="col-md-6 col-md-offset-3">
							<form role="form" action="<?=site_url('laporan/cetak')?>" method="post" target="_blank">
								<div class="form-group">
									<label>Dari Tanggal</label>
		                    <div class='input-group date' id='datetimepicker2'>			<input class="form-control" type="text" value="<?=set_value('tgl_mulai')?>" name="tgl_mulai">
									<?= form_error('tgl_mulai') ?>
			                        <span class="input-group-addon">
			                            <span class="glyphicon glyphicon-calendar"></span>
			                        </span>
			                    </div>									
								</div>
								<div class="form-group">
								<label>Sampai Tanggal</label>
		                    <div class='input-group date' id='datetimepicker3'>			<input class="form-control" type="text" value="<?=set_value('tgl_akhir')?>" name="tgl_akhir">
									<?= form_error('tgl_akhir') ?>
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