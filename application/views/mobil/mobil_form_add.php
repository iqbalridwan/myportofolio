<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tambah Mobil</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<!-- /.panel-->
				<div class="panel panel-default">
					<div class="panel-heading">Forms</div>
					<div class="panel-body">
						<div class="col-md-6 col-md-offset-3">
						<?php echo form_open_multipart() ?>
								<div class="form-group">
									<label>Barecode</label>
									<input class="form-control" type="text" value="<?=set_value('barecode')?>" name="barecode">
									<?= form_error('barecode') ?>
								</div>
								<div class="form-group">
									<label>Nama Barang </label>
									<input class="form-control" type="text" value="<?=set_value('nama_barang')?>"  name="nama_barang">
									<?= form_error('nama_barang') ?>
								</div>
								<div class="form-group">
									<label>Tanggal Perolehan</label>
		                    <div class='input-group date' id='datetimepicker2'>			<input class="form-control" type="text" value="<?=set_value('tgl_perolehan')?>" name="tgl_perolehan">
									<?= form_error('tgl_perolehan') ?>
			                        <span class="input-group-addon">
			                            <span class="glyphicon glyphicon-calendar"></span>
			                        </span>
			                    </div>
								</div>
								<div class="form-group">
									<label>No Polisi </label>
									<input class="form-control" type="text" value="<?=set_value('nomor_polisi')?>" name="nomor_polisi">
									<?= form_error('nomor_polisi') ?>
								</div>
								<div class="form-group">
									<label>No Asuransi </label>
									<input class="form-control" type="text" value="<?=set_value('nomor_asuransi')?>" name="nomor_asuransi">
									<?= form_error('nomor_asuransi') ?>
								</div>
								<div class="form-group">
									<label>Asuransi</label>
									<input type="text" class="form-control" value="<?=set_value('asuransi')?>" name="asuransi">
									<?= form_error('asuransi') ?>
								</div>
									<div class="form-group">
										<label>Status</label>
										<select class="form-control" name="status">
											<option value="1" <?=set_value('status') == 1 ? "Selected": null?> >Baik</option>
											<option value="2" <?=set_value('status') == 2 ? "Selected": null?>>Services</option>
										</select>
									</div>
									<div class="form-group">
									<label>Masa Asuransi</label>
								<div class='input-group date' id='datetimepicker3'>
									<input type="text" class="form-control" value="<?=set_value('masa_asuransi')?>" name="masa_asuransi">
									<?= form_error('masa_asuransi') ?>
									<span class="input-group-addon">
			                            <span class="glyphicon glyphicon-calendar"></span>
			                        </span>
			                    </div>
								</div>
								<div class="form-group">
									<label>Masa Pajak</label>
									<div class='input-group date' id='datetimepicker4'>
									<input type="text" class="form-control" value="<?=set_value('masa_pajak')?>" name="masa_pajak">
									<?= form_error('masa_pajak') ?>
									<span class="input-group-addon">
			                            <span class="glyphicon glyphicon-calendar"></span>
			                        </span>
			                    </div>
								</div>
								<div class="form-group">
									<label>Masa Service</label>
									<div class='input-group date' id='datetimepicker6'>
									<input type="text" class="form-control" value="<?=set_value('masa_service')?>" name="masa_service">
									<?= form_error('masa_service') ?>
									<span class="input-group-addon">
			                            <span class="glyphicon glyphicon-calendar"></span>
			                        </span>
			                    </div>
								</div>
								<div class="form-group">
									<label>KM</label>
									<input type="text" class="form-control" value="<?=set_value('km')?>" name="km">
									<?= form_error('km') ?>
								</div>
								<div class="form-group">
									<label>Gambar</label>
									<input type="file" class="form-control" name="image">
									<?= form_error('image') ?>
									<small>(biarkan kosong jika tidak ada)</small>
								</div>
										<button type="submit" class="btn btn-primary">Submit Button</button>
									<button type="reset" class="btn btn-default">Reset Button</button>
								</div>
							<?php echo form_close() ?>
						</div>
					</div>
				</div><!-- /.panel-->
			</div>
	</div>
</div>