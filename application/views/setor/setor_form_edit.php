<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Setor</h1>
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
								<?php $row=$row->row(); ?>
							<div class="form-group">
								<label>Tgl Setor* </label>
								<input type="hidden" value="<?=$row->id_setor ?>" name="id_setor">
								<div class='input-group date' id='datetimepicker2'>
							<input class="form-control" type="text" value="<?=$this->input->post('tgl_setor') ?? $row->tgl_setor ?>" name="tgl_setor">
									<?= form_error('tgl_setor') ?>
			                        <span class="input-group-addon">
			                            <span class="glyphicon glyphicon-calendar"></span>
			                        </span>
			                    </div>
							</div>
							<div class="form-group">
								<label>Jumlah Setor(Kg)* </label>
								<input class="form-control" type="text"  value="<?=$this->input->post('jml_setor') ?? $row->jml_setor ?>"  name="jml_setor">
								<?= form_error('jml_setor') ?>
							</div>
							<div class="form-group">
									<label>Kategori</label>
									<select class="form-control" name="id_kategori">
										<?php $Kategori = $this->input->post('id_kategori') ? $this->input->post('id_kategori') : $row->id_kategori ?>
										<?php foreach ($ktg->result() as $key => $value) {?>
										<option value="<?= $value->id_kategori ?>" <?=$Kategori == $value->id_kategori ? "Selected": null?> ><?= $value->kategori_sampah ?></option>
										<?php } ?>
									</select>
								</div>
							<div class="form-group">
								<label>Nama Sampah* </label>
								<input class="form-control" type="text"  value="<?=$this->input->post('nama_sampah') ?? $row->nama_sampah ?>"  name="nama_sampah">
								<?= form_error('namasampah') ?>
							</div>
							<div class="form-group">
								<!-- <label>Admin* </label> -->
								<input class="form-control" type="hidden"  value="<?=$this->input->post('username') ?? $row->username ?>"  name="username">
								<?= form_error('username') ?>
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