	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Setor</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-container">
					<div class="panel-heading">Data Setor</div>
					<?php if($this->fungsi->user_login()->level==0 ) {?>
					<div class="col-md-12"><a href="<?=site_url('setor/add') ?>" class="btn btn-md btn-success">Tambah Data</a></div>
					<br><br>
					<?php } ?>
					<div class="panel-body">
						<div class="table-responsive">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
			  <thead>
			    <tr>
			      <th class="th-sm">No

			      </th>
			      <th class="th-sm">Tanggal Setor

			      </th>
			      <th class="th-sm">Jumlah Setor(Kg)

			      </th>
			      <th class="th-sm">Nama Sampah

			      </th>
			      <th class="th-sm">Kategori

			      </th>
				  <th class="th-sm">Admin

					</th>
			      <?php if($this->fungsi->user_login()->level==1 ) {?>
			      <th>Unit
			      </th>
			      <?php } ?>
			      <?php if($this->fungsi->user_login()->level==0 ) {?>
			      <th class="th-sm">Action

			      </th>
			      <?php } ?>
			    </tr>
			  </thead>
			  <tbody>
			   <?php $no=1; foreach ($row->result() as $key => $value) {?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $value->tgl_setor ?></td>
			<td><?= $value->jml_setor ?></td>
			<td><?= $value->nama_sampah ?></td>
			<td><?= $value->kategori_sampah ?></td>
			<td><?= $value->username ?></td>
			<?php if($this->fungsi->user_login()->level==1 ) {?>
			<td><?= $value->nama_unit ?></td>
			<?php } ?>
			<?php if($this->fungsi->user_login()->level==0 ) {?>
			<td>
				<form action="<?=site_url('setor/del');?>" method="post">
					<a href="<?=site_url('setor/edit/'.$value->id_setor);?>" class="btn btn-sm btn-warning">Edit</a>
					<input type="hidden" name="id_setor" value="<?= $value->id_setor?>">
					<button onclick="return confirm('Apakah anda yakin ingin menghapus?')" class="btn btn-sm btn-danger">Delete</button>
				</form>
			</td>
			<?php } ?>
		</tr>
		<?php } ?>
			  </tbody>
			</table>
		</div>
                     </div>
				</div>
			</div>
		</div>
	</div>