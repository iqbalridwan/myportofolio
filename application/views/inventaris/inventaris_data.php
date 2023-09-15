	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Inventaris</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-container">
					<div class="panel-heading">Data Inventaris</div>
					<?php if($this->fungsi->user_login()->level==1 ) {?>
					<div class="col-md-12"><a href="<?=site_url('inventaris/add') ?>" class="btn btn-md btn-success">Tambah data</a></div>
					<br><br>
					<?php } ?>
					<div class="panel-body">
						<div class="table-responsive">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
			  <thead>
			    <tr>
			      <th class="th-sm">No

			      </th>
			      <th class="th-sm">Barecode

			      </th>
			      <th class="th-sm">Nama Barang

			      </th>
				  <th class="th-sm">Foto

				  </th>
			      <th class="th-sm">Kondisi
			      </th>
			      <?php if($this->fungsi->user_login()->level==3 ) {?>
			      <th>Cabang
			      </th>
			      <?php } ?>
			      <?php if($this->fungsi->user_login()->level==1 ) {?>
			      <th class="th-sm">Action

			      </th>
			      <?php } ?>
			    </tr>
			  </thead>
			  <tbody>
			   <?php $no=1; foreach ($row->result() as $key => $value) {?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $value->barcode ?></td>
			<td><?= $value->nama ?></td>
			<td>
			<?php if($value->image!=null) { ?>
			<a data-toggle="modal" data-target="#modal-inven" id="inven"
			data-nama = "<?=$value->nama?>"
			data-barcode = "<?=$value->barcode?>"
			data-image = "<?=base_url('uploads/inven/'.$value->image)?>"
			data-kondisi = "<?php if($value->kondisi == 1){echo "Baik";}else{echo "Services";}  ?>" >
			<img src="<?=base_url('uploads/inven/'.$value->image)?>" style="width:100px; cursor: pointer;" >
			</a>
			<?php } ?>
			</td>
			<td><?php if($value->kondisi == 1){echo "Baik";}else{echo "Services";}  ?></td>
			<?php if($this->fungsi->user_login()->level==3 ) {?>
			<td><?= $value->nama_cabang ?></td>
			<?php } ?>
			<?php if($this->fungsi->user_login()->level==1 ) {?>
			<td>
				<form action="<?=site_url('inventaris/del');?>" method="post">
					<a href="<?=site_url('inventaris/edit/'.$value->barcode);?>" class="btn btn-sm btn-warning">Edit</a>
					<input type="hidden" name="barcode" value="<?= $value->barcode ?>">
					<button onclick="return confirm('Apakah anda yakin ingin menghapus?')" class="btn btn-sm btn-danger">delete</button>
				</form>
			</td>
			<?php } ?>
		</tr>
		<?php } ?>
			  </tbody>
			  <tfoot>
			    <tr>
			      <th>No
			      </th>
			      <th>Barecode
			      </th>
			      <th>Nama
			      </th>
				  <th>Foto
			      </th>
			      <th>Kondisi
			      </th>
			      <?php if($this->fungsi->user_login()->level==3 ) {?>
			      <th>Cabang
			      </th>
			      <?php } ?>
			      <?php if($this->fungsi->user_login()->level==1 ) {?>
			      <th>Action
			      </th>
			      <?php } ?>
			    </tr>
			  </tfoot>
			</table>
		</div>
                     </div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-inven" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
			<h4 class="modal-title">Inventaris</h4>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
			<div class="row">
				<div class="col-md-7"><img src="" id="gmbri" style="width:100%"></div>
				<div class="col-md-5 ml-auto">
				<h2><span id="barcodei"></span></h2>
				<h2><span id="ninven"></span></h2>
				<h2>Kondisi: <span id="koni"></span></h2>
				</div>
				</div>
			</div>
		</div>
		</div>
	</div>
	</div>