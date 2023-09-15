	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Unit</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-container">
					<div class="panel-heading">Data Unit</div>
					<div class="col-md-12"><a href="<?=site_url('unit/add') ?>" class="btn btn-md btn-success">Tambah Data</a></div>
					<br><br>
					<div class="panel-body">
						<div class="table-responsive">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
			  <thead>
			    <tr>
			      <th class="th-sm">No

			      </th>
			      <th class="th-sm">BS Unit

			      </th>
			      <th class="th-sm">Jumlah Nasabah

			      </th>
			      <th class="th-sm">Jumlah KK

			      </th>
			      <th class="th-sm">Th Berdiri

			      </th>
			      <th class="th-sm">Desa

			      </th>
			      <th class="th-sm">Action

			      </th>
			    </tr>
			  </thead>
			  <tbody>
			   <?php $no=1; foreach ($row->result() as $key => $value) {?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $value->nama_unit ?></td>
			<td><?= $value->jml_nasabah ?></td>
			<td><?= $value->jml_kk ?></td>
			<td><?= $value->th_berdiri ?></td>
			<td><?= $value->nama_desa ?></td>
			<td>
				<form action="<?=site_url('unit/del');?>" method="post">
					<a href="<?=site_url('unit/edit/'.$value->id_unit);?>" class="btn btn-sm btn-warning">Edit</a>
					<input type="hidden" name="id_unit" value="<?= $value->id_unit?>">
					<button onclick="return confirm('Apakah anda yakin ingin menghapus?')" class="btn btn-sm btn-danger">delete</button>
				</form>
			</td>
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