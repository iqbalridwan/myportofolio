<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Input Permohonan Mobil</h1>
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
									<Input type="hidden" value="<?=set_value('tgl_pinjam')?>" name="tgl_pinjam">
									<label>Tanggal Pinjam</label>
		                   			<input class="form-control" type="text" value="<?=set_value('tgl_pinjam')?>" name="tgl_pinjam" disabled>
									<?= form_error('tgl_pinjam') ?>				
								</div>
								<div class="form-group">
								<Input type="hidden" value="<?=set_value('tgl_kembali')?>" name="tgl_kembali">	
								<label>Tanggal Kembali</label>
		                    <input class="form-control" type="text" value="<?=set_value('tgl_kembali')?>" name="tgl_kembali" disabled>
									<?= form_error('tgl_kembali') ?>								
								</div>
									<div class="form-group">
									<label>Mobil</label>
									<select class="form-control" name="mobil">
										<?php $barcode = $this->input->post('barcode') ? $this->input->post('barcode') : $mbl->barcode  ?>
										<?php foreach ($mbl->result() as $key => $value) {?>
										<option value="<?= $value->barcode ?>" <?=$barcode == $value->barcode ? "Selected": null?> ><?= $value->nama_barang ?></option>
										<?php } ?>
									</select>
								</div>
									<div class="form-group">
									<label>Driver</label>
									<select class="form-control" name="driver">
										<?php $nik = $this->input->post('nik') ? $this->input->post('nik') : $drv->nik ?>
										<option value="0" <?=$nik == 0 ? "Selected": null?> >Nyetir Sendiri</option>
										<?php foreach ($drv->result() as $key => $value) {?>
										<option value="<?= $value->nik ?>" <?=$nik == $value->nik ? "Selected": null?> ><?= $value->nama ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label>Tujuan </label>
									<input class="form-control" type="text" value="<?=set_value('tujuan')?>" name="tujuan">
									<?= form_error('tujuan') ?>
								</div>
								<div class="form-group">
									<label>Keterangan</label>
									<input type="text" class="form-control" value="<?=set_value('keterangan')?>" name="keterangan">
									<?= form_error('keterangan') ?>
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