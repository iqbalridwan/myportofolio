	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Desa</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-container">
					<div class="panel-heading">Data Desa</div>
					<div class="col-md-12">
						<?php if($this->fungsi->user_login()->level==1 ) {?>
						<a href="<?=site_url('desa/add') ?>" class="btn btn-md btn-success">Tambah Data</a>
					<?php } ?></div>
					<br><br>

					<div class="panel-body">
						<div class="table-responsive">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
			  <thead>
			    <tr>
			      <th class="th-sm">No

			      </th>
			       <th class="th-sm">Lokasi</th>
			      <th class="th-sm">Dusun</th>
			      <th class="th-sm">Nama Desa

			      </th><?php if($this->fungsi->user_login()->level==1 ) {?>
			      <th class="th-sm">Action

			      </th>
			      <?php } ?>
			    </tr>
			  </thead>
			  <tbody>
			   <?php $no=1; foreach ($row->result() as $key => $value) {?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $value->lokasi ?></td>
			<td><?= $value->dusun ?></td>
			<td><?= $value->nama_desa ?></td>
			<?php if($this->fungsi->user_login()->level==1 ) {?>
			<td>

				<form action="<?=site_url('desa/del');?>" method="post">
					<a href="<?=site_url('desa/edit/'.$value->id_desa);?>" class="btn btn-sm btn-warning">Edit</a>
					<input type="hidden" name="id_desa" value="<?= $value->id_desa?>">
					<button onclick="return confirm('Apakah anda yakin ingin menghapus?')" class="btn btn-sm btn-danger">delete</button>
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