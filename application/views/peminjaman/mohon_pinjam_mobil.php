	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Permohonan</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-container">
					<div class="panel-heading">Data Permohonan Mobil</div>
					<?php if($this->fungsi->user_login()->level==2 ) {?>
					<div class="col-md-12"><a href="<?=site_url('mobil/add') ?>" class="btn btn-md btn-success">Input Permohonan</a></div>			
					<br><br>
					<?php } ?>
					<div class="panel-body">
						<div class="table-responsive">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
			  <thead>
			    <tr>
			      <th class="th-sm">No

			      </th>
			      <th class="th-sm">Pegawai

			      </th>
			      <th class="th-sm">Tanggal Pinjam

			      </th>
			      <th class="th-sm">Tanggal Kembali

			      </th>
			      <th class="th-sm">Nama Barang

			      </th>
			      <th class="th-sm">Driver

			      </th>
			      <th class="th-sm">Tujuan

			      </th>
			      <th class="th-sm">Keterangan

			      </th>
			      <th class="th-sm">Status

			      </th>
			      <?php if($this->fungsi->user_login()->level==1 ) {?>		      
					<th class="th-sm">Action

			      </th>
			      <?php } ?>
			      <?php if($this->fungsi->user_login()->level==2 ) {?>		      
					<th class="th-sm">Action

			      </th>
			      <?php } ?>
			    </tr>
			  </thead>
			  <tbody>
			   <?php $no=1; foreach ($row->result() as $key => $value) {?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $value->nip_user?></td>
			<td><?= $value->tgl_pinjam ?></td>
			<td><?= $value->tgl_kembali ?></td>
			<td><?= $value->barcode_m ?></td>
			<td><?= $value->nik ?></td>
			<td><?= $value->tujuan ?></td>
			<td><?= $value->keterangan ?></td>
			<td><?php if($value->status == 0){echo "Memohon";}else{echo "Disetuji";} ?></td>
			<?php if($this->fungsi->user_login()->level==1 ) {?>
			<td>
				<form action="#" method="post">
					<?php if($value->status == 0) { ?><a href="#" class="btn btn-sm btn-warning">Setuju</a>
					<input type="hidden" name="idpeminjaman" value="<?= $value->idpeminjaman?>"><?php }if($value->status == 1){?><a href="#" class="btn btn-sm btn-warning">Edit</a>
					<input type="hidden" name="idpeminjaman" value="<?= $value->idpeminjaman?>"><?php } ?>
					<?php if($value->status == 0) { ?><button onclick="return confirm('Apakah anda yakin ingin Menolak permohonan?')" class="btn btn-sm btn-danger">Tolak</button><?php }if($value->status == 1){?><button onclick="return confirm('Apakah anda yakin ingin mmenghapus data pinjam?')" class="btn btn-sm btn-danger">Hapus</button><?php } ?>
				</form><?php }?>
			</td>
			<?php if($this->fungsi->user_login()->level==2 ) {?>
			<td>
				<form action="<?=site_url('peminjaman/del');?>" method="post">
					<?php if($value->status == 0) { ?><a href="<?=site_url('mobil/edit/'.$value->idpeminjaman);?>" class="btn btn-sm btn-warning">Edit permohonan</a>
					<input type="hidden" name="idpeminjaman" value="<?= $value->idpeminjaman?>"><?php }if($value->status == 1){?><a href="<?=site_url('peminjaman/edit/'.$value->idpeminjaman);?>" class="btn btn-sm btn-warning">Tambah Waktu</a>
					<input type="hidden" name="idpeminjaman" value="<?= $value->idpeminjaman?>"><?php } ?>
					<?php if($value->status == 0) { ?><button onclick="return confirm('Apakah anda yakin ingin Membatalkan permohonan?')" class="btn btn-sm btn-danger">Batalkan</button><?php }if($value->status == 1){?><button onclick="return confirm('Apakah anda yakin ingin mengembalikan barang?')" class="btn btn-sm btn-danger">Kembalikan</button><?php } ?>
				</form><?php }?>
			</td>
		</tr>
		<?php } ?>
			  </tbody>
			  <tfoot>
			    <tr>
			      <th>No
			      </th>
			      <th>pegawai
			      </th>
			      <th>Nama Barang
			      </th>
			      <th>Tanggal Kembali
			      </th>
			      <th>Nama Barang
			      </th>
			      <th>Driver
			      </th>
			      <th>Tujuan
			      </th>
			      <th>Keterangan
			      </th>
			      <th>Status
			      </th>
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