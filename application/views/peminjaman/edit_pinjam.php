<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Permohonan</h1>
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
							<?php $row = $row->row(); ?>
							<div class="form-group">
								<label>Pegawai* </label>
								<input type="hidden" value="<?=$row->idpeminjaman ?>" name="idpeminjaman">
								<input class="form-control" type="text"  value="<?=$this->input->post('pegawai') ?? $row->nip_user ?>"  name="pegawai">
								<?= form_error('pegawai') ?>
							</div>
							<div class="form-group">
								<label>Tanggal Pinjam</label>
								<div class='input-group date' id='datetimepicker_epinjam'>
								<input class="form-control" type="text" name="tgl_pinjam" value="<?=$this->input->post('tgl_pinjam') ?? $row->tgl_pinjam?>">
								<?= form_error('tgl_pinjam') ?>
								<span class="input-group-addon">
			                            <span class="glyphicon glyphicon-calendar"></span>
			                        </span>
			                    </div>	
							</div>
							<div class="form-group">
								<label>Tanggal Kembali</label>
								<div class='input-group date' id='datetimepicker_ekembali'>
								<input class="form-control" type="text" name="tgl_pinjam" value="<?=$this->input->post('tgl_pinjam') ?? $row->tgl_pinjam?>">
								<?= form_error('tgl_pinjam') ?>
								<span class="input-group-addon">
			                            <span class="glyphicon glyphicon-calendar"></span>
			                        </span>
			                    </div>	
							</div>
							<?php if($row->barcode_i == null) { ?>
							<div class="form-group">
								<label>Nama Mobil* </label>
								<input class="form-control" type="text" value="<?=$this->input->post('barcode_m') ?? $row->barcode_m ?>" name="barcode_m">
								<?= form_error('barcode_m') ?>
							</div><?php }?>
							<?php if($row->barcode_m == null) { ?>
							<div class="form-group">
								<label>Nama Inventaris* </label>
								<input class="form-control" type="text" value="<?=$this->input->post('barcode_i') ?? $row->barcode_i ?>" name="barcode_i">
								<?= form_error('barcode_i') ?>
							</div><?php }?>
							<?php if($row->nip_admin == null) { ?>
							<div class="form-group">
								<label>Driver* </label>
								<input class="form-control" type="text" value="<?=$this->input->post('nik') ?? $row->nik ?>" name="nik">
								<?= form_error('nik') ?>
							</div><?php }?>
							<?php if($row->nik == null) { ?>
							<div class="form-group">
								<label>penanggung Jawab* </label>
								<input class="form-control" type="text" value="<?=$this->input->post('nik') ?? $row->nik ?>" name="nik">
								<?= form_error('nik') ?>
							</div><?php }?>								
							<div class="form-group">
								<label>Tujuan* </label>
								<input class="form-control" type="text" value="<?=$this->input->post('tujuan') ?? $row->tujuan ?>" name="tujuan">
								<?= form_error('tujuan') ?>
							</div>
							<div class="form-group">
								<label>Keterangan* </label>
								<input class="form-control" type="text" value="<?=$this->input->post('keterangan') ?? $row->keterangan ?>" name="keterangan">
								<?= form_error('keterangan') ?>
							</div>
								</div>
									<button type="submit" class="btn btn-primary">Submit Button</button>
								<button type="reset" class="btn btn-default">Reset Button</button>
							</div>
							
						</div>
					</div>
				</div>
			</div>
	</div>
</div>