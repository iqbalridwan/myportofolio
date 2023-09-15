	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Pinjam Saya</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-container">
					<div class="panel-heading">Data Masih Pinjam</div>
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
					<th class="th-sm">Action

			      </th>
			    </tr>
			  </thead>
			  <tbody>
			   <?php $no=1; foreach ($row->result() as $key => $value) {?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $value->user?><br><?= $value->nip_user?></td>
			<td><?= $value->tgl_pinjam ?></td>
			<td><?= $value->tgl_kembali ?></td>
			<td><?php if($value->barang==null){echo $value->mobil;}else{echo $value->barang;} ?></td>
			<td><?php if($value->admin){echo "-";}else if($value->supir){echo $value->supir;}else{echo "nyetir sendiri";} ?><br><?php if($value->admin){}else{echo $value->idsup;} ?></td>
			<td><?= $value->tujuan ?></td>
			<td><?= $value->keterangan ?></td>
			<td><?php if($value->status == 0){echo "Memohon";}else{echo "Disetuji";} ?></td>
			<td>
				<a onclick="return confirm('Apakah anda yakin ingin menyetujuinya?')" href="<?=site_url('pinjam/back/'.$value->idpeminjaman);?>" class="btn btn-sm btn-success">Kembalikan</a>
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
					<th>Action

			      </th>			      
			    </tr>
			  </tfoot>
			</table>
		</div>
                     </div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-container">
					<div class="panel-heading">Data Permohonan Belum Disetujui</div>
					<div class="panel-body">
						<div class="table-responsive">
			<table id="xx" class="table table-striped table-bordered" style="width:100%">
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
			    </tr>
			  </thead>
			  <tbody>
			   <?php $no=1; foreach ($wait->result() as $key => $value) {?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $value->user?><br><?= $value->nip_user?></td>
			<td><?= $value->tgl_pinjam ?></td>
			<td><?= $value->tgl_kembali ?></td>
			<td><?php if($value->barang==null){echo $value->mobil;}else{echo $value->barang;} ?></td>
			<td><?php if($value->admin){echo "-";}else if($value->supir){echo $value->supir;}else{echo "nyetir sendiri";} ?><br><?php if($value->admin){}else{echo $value->idsup;} ?></td>
			<td><?= $value->tujuan ?></td>
			<td><?= $value->keterangan ?></td>
			<td><?php if($value->status == 0){echo "Memohon";}else{echo "Disetuji";} ?></td>	
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
			    </tr>
			  </tfoot>
			</table>
		</div>
                     </div>
				</div>
			</div>
		</div>
	</div>	