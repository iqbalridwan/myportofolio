	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Mobil</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-container">
					<div class="panel-heading">Pajak Mobil Sebulan Terakhir</div>
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
			      <th class="th-sm">Tanggal Perolehan

			      </th>
			      <th class="th-sm">No Polisi

			      </th>
			      <th class="th-sm">No Asuransi

			      </th>
			      <th class="th-sm">Asuransi

			      </th>

			      </th>

			      <th class="th-sm">Masa Asuransi

			      </th>
			      <th class="th-sm">Masa Pajak

			      </th>
			      <th class="th-sm">Status

			      </th>	
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
			<td><?= $value->nama_barang ?></td>
			<td><?= $value->tgl_perolehan ?></td>
			<td><?= $value->nomor_polisi ?></td>
			<td><?= $value->nomor_asuransi ?></td>
			<td><?= $value->asuransi ?></td>
			<td><?= $value->masa_asuransi ?></td>
			<td><?= $value->masa_pajak ?></td>
			<td><?php if($value->kondisi == 1){echo "Baik";}else{echo "Services";}  ?></td>
			<?php if($this->fungsi->user_login()->level==1 ) {?>
			<td>
					<a href="<?=site_url('mobil/editpajak/'.$value->barcode);?>" class="btn btn-sm btn-success">Perpanjang</a>
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
			      <th>Nama Barang
			      </th>
			      <th>Tanggal Perolehan
			      </th>
			      <th>No Polisi
			      </th>
			      <th>No Asuransi
			      </th>
			      <th>asuransi
			      </th>
			      <th>Masa asuransi
			      </th>
			      <th>Masa Pajak
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
