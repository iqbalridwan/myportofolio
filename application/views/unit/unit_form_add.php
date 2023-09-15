<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tambah Unit</h1>
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
									<label>Nama Unit* </label>
									<input class="form-control" type="text" value="<?=set_value('nama_unit')?>" name="nama_unit">
									<?= form_error('namaunit') ?>
								</div>
								<div class="form-group">
									<label>Jumlah Nasabah</label>
									<input type="text" class="form-control" value="<?=set_value('jml_nasabah')?>" name="jml_nasabah">
									<?= form_error('jmlnasabah') ?>
								</div>
								<div class="form-group">
									<label>Jumlah KK</label>
									<input type="text" class="form-control" value="<?=set_value('jml_kk')?>" name="jml_kk">
									<?= form_error('jmlkk') ?>
								</div>
								<div class="form-group">
									<label>Tahun Berdiri</label>
									<input type="date" class="form-control" value="<?=set_value('th_berdiri')?>" name="th_berdiri">
									<?= form_error('thberdiri') ?>
								</div>
								<div class="form-group">
									<label>Desa</label>
									<select class="form-control" name="desa">
										<?php $desa = $this->input->post('desa') ? $this->input->post('desa') : $cbg->id_desa  ?>
										<?php foreach ($cbg->result() as $key => $value) {?>
										<option value="<?= $value->id_desa ?>" <?=$desa == $value->id_desa ? "Selected": null?> ><?= $value->nama_desa ?></option>
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