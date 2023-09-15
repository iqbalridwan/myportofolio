<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tambah Ketua</h1>
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
									
								<div class="form-group">
									<label>Nama Ketua* </label>
									<input class="form-control" type="text" value="<?=set_value('nama_ketua')?>" name="nama_ketua">
									<?= form_error('nama_ketua') ?>
								</div>
								<div class="form-group">
									<label>No HP</label>
									<input class="form-control" type="text" value="<?=set_value('no_telp')?>" name="no_telp">
									<?= form_error('no_telp') ?>
								</div>
								<div class="form-group">
									<label>Dusun</label>
									<input class="form-control" type="text" value="<?=set_value('dusun')?>" name="dusun">
									<?= form_error('dusun') ?>
								</div>
								<!-- <div class="form-group">
									<label>Unit</label>
									<select class="form-control" name="unit">
										<?php $unit = $this->input->post('unit') ? $this->input->post('unit') : $cbg->id_unit  ?>
										<?php foreach ($cbg->result() as $key => $value) {?>
										<option value="<?= $value->id_unit ?>" <?=$unit == $value->id_unit ? "Selected": null?> ><?= $value->nama_unit ?></option>
										<?php } ?>
									</select>
								</div>	 -->	
								<div class="form-group">
									<label>Unit</label>
									<select class="form-control" name="unit">
										<?php $unit = $this->input->post('unit') ? $this->input->post('unit') : $cbg->id_unit  ?>
										<?php foreach ($cbg->result() as $key => $value) {?>
										<option value="<?= $value->id_unit ?>" <?=$unit == $value->id_unit ? "Selected": null?> ><?= $value->nama_unit ?></option>
										<?php } ?>
									</select>
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