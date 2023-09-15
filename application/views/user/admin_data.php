	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">User</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-container">
					<div class="panel-heading">Data User</div>				
					<div class="col-md-12"><a href="<?=site_url('user/add') ?>" class="btn btn-md btn-success">Tambah data</a></div>
					<br><br>
					<div class="panel-body">
						<div class="table-responsive">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
			  <thead>
			    <tr>
			      <th class="th-sm">No

			      </th>
			      <th class="th-sm">Username

			      </th>
			      <th class="th-sm">Password

			      </th>
			      <th class="th-sm">Unit

			      <th class="th-sm">Action

			      </th>
			    </tr>
			  </thead>
			  <tbody>
			   <?php $no=1; foreach ($row->result() as $key => $value) {?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $value->username ?></td>
			<td><?= $value->password ?></td>
			<td><?= $value->nama_unit ?></td>
		
			<td>
				<form action="<?=site_url('user/del');?>" method="post">
					<a href="<?=site_url('user/edit/'.$value->id_admin);?>" class="btn btn-sm btn-warning">Edit</a>
					<input type="hidden" name="id" value="<?= $value->id_admin?>">
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