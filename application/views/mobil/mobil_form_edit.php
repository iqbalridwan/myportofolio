<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit User</h1>
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
								<input class="form-control" type="text"  value="<?=$this->input->post('nama_barang') ?? $row->nama_barang ?>"  name="nama_barang">
								<?= form_error('nama_barang') ?>
							</div>
							<div class="form-group">
								<label>Tanggal Perolehan</label>
								<div class='input-group date' id='datetimepicker2'>
								<input class="form-control" type="text" name="tgl_perolehan" value="<?=$this->input->post('tgl_perolehan') ?? $row->tgl_perolehan?>">
								<?= form_error('tgl_perolehan') ?>
								<span class="input-group-addon">
			                            <span class="glyphicon glyphicon-calendar"></span>
			                        </span>
			                    </div>
							</div>
							<div class="form-group">
								<label>No Polisi* </label>
								<input class="form-control" type="text" value="<?=$this->input->post('nomor_polisi') ?? $row->nomor_polisi ?>" name="nomor_polisi">
								<?= form_error('nomor_polisi') ?>
							</div>
							<div class="form-group">
								<label>No asuransi* </label>
								<input class="form-control" type="text" value="<?=$this->input->post('nomor_asuransi') ?? $row->nomor_asuransi ?>" name="nomor_asuransi">
								<?= form_error('nomor_asuransi') ?>
							</div>
							<div class="form-group">
								<label>Asuransi* </label>
								<input class="form-control" type="text" value="<?=$this->input->post('asuransi') ?? $row->asuransi ?>" name="asuransi">
								<?= form_error('asuransi') ?>
							</div>
							<div class="form-group">
								<label>Masa asuransi* </label>
								<div class='input-group date' id='datetimepicker3'>
								<input class="form-control" type="text" value="<?=$this->input->post('masa_asuransi') ?? $row->masa_asuransi ?>" name="masa_asuransi">
								<?= form_error('masa_asuransi') ?>
								<span class="input-group-addon">
			                            <span class="glyphicon glyphicon-calendar"></span>
			                        </span>
			                    </div>
							</div>
							<div class="form-group">
								<label>Masa Pajak* </label>
								<div class='input-group date' id='datetimepicker4'>
								<input class="form-control" type="text" value="<?=$this->input->post('masa_pajak') ?? $row->masa_pajak ?>" name="masa_pajak">
								<?= form_error('masa_pajak') ?>
								<span class="input-group-addon">
			                            <span class="glyphicon glyphicon-calendar"></span>
			                        </span>
			                    </div>
							</div>
							<div class="form-group">
								<label>Masa service* </label>
								<div class='input-group date' id='datetimepicker6'>
								<input class="form-control" type="text" value="<?=$this->input->post('masa_service') ?? $row->tgl_service ?>" name="masa_service">
								<?= form_error('masa_service') ?>
								<span class="input-group-addon">
			                            <span class="glyphicon glyphicon-calendar"></span>
			                        </span>
			                    </div>
							</div>
							<div class="form-group">
								<label>KM * </label>
								<input class="form-control" type="text" value="<?=$this->input->post('km') ?? $row->KM ?>" name="km">
								<?= form_error('km') ?>
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
										<img src="<?=base_url('uploads/mobil/'.$row->image)?>" style="width:80%" >
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