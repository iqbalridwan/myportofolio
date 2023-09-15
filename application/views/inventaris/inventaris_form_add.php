<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tambah Inventaris</h1>
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
									<label>Barecode* </label>
									<input class="form-control" type="text" value="<?=set_value('barcode')?>" name="barcode">
									<?= form_error('barcode') ?>
								</div>
								<div class="form-group">
									<label>Nama Barang* </label>
									<input class="form-control" type="text" value="<?=set_value('nama')?>"  name="nama">
									<?= form_error('nama') ?>
								</div>
									<div class="form-group">
										<label>Status</label>
										<select class="form-control" name="status">
											<option value="1" <?=set_value('status') == 1 ? "Selected": null?> >Baik</option>
											<option value="2" <?=set_value('status') == 2 ? "Selected": null?>>Services</option>
										</select>
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