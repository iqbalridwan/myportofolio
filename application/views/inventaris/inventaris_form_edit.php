<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Inventaris</h1>
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
							<?php $row = $row->row(); ?>
							<div class="form-group">
								<label>Nama Barang* </label>
								<input type="hidden" value="<?=$row->barcode ?>" name="barcode">
								<input class="form-control" type="text"  value="<?=$this->input->post('nama') ?? $row->nama ?>"  name="nama">
								<?= form_error('nama') ?>
							</div>
								<div class="form-group">
									<label>Kondisi</label>
									<select class="form-control" name="status">
										<?php $status = $this->input->post('status') ? $this->input->post('status') : $row->kondisi ?>
										<option value="1">Baik</option>
										<option value="2" <?=$status == 2 ? "Selected": null?> >Services</option>
									</select>
								</div>
								<div class="form-group">
									<label>Cabang</label>
									<select class="form-control" name="cabang">
										<?php $cabang = $this->input->post('cabang') ? $this->input->post('cabang') : $row->cabang ?>
										<?php foreach ($cbg->result() as $key => $value) {?>
										<option value="<?= $value->kode_cabang ?>" <?=$cabang == $value->kode_cabang ? "Selected": null?> ><?= $value->nama_cabang ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label>Gambar</label>
									<?php if($row->image != null){ ?>
									<div style="margin-bottom:4px">
										<img src="<?=base_url('uploads/inven/'.$row->image)?>" style="width:80%" >
									</div>
									<?php } ?>
									<input type="file" class="form-control" name="image">
									<?= form_error('image') ?>
									<small>(biarkan kosong jika tidak diganti)</small>
								</div>
									<button type="submit" class="btn btn-primary">Submit Button</button>
								<button type="reset" class="btn btn-default">Reset Button</button>
							</div>
							<?php echo form_close() ?>
						</div>
					</div>
				</div>
			</div>
	</div>
</div>