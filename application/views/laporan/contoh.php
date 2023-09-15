<!-- <style type="text/css">
.tftable {font-size:12px;color:#333333;width:100%;border-width: 1px;border-color: #729ea5;border-collapse: collapse;}
.tftable th {font-size:12px;background-color:#ff7;border-width: 1px;padding: 8px;border-style: solid;border-color: #729ea5;text-align:left;}
.tftable tr {background-color:#fff;}
.tftable td {font-size:12px;border-width: 1px;padding: 8px;border-style: solid;border-color: #729ea5;}
.tftable tr:hover {background-color:#ffffff;}
</style>
<center><h1>Laporan Peminjaman</h1></center>
<br>
<br>
<h3>Dari tanggal : <?php echo $tgldr; ?></h3>
<h3>Sampai tanggal : <?php echo $tglsm; ?></h3>
<br>
<table class="tftable" border="1">
<tr><th>No</th><th>Pegawaii</th><th>tgl_pinjam</th><th>Tgl_kembali</th><th>Barang</th><th>Penanggung jawab</th><th>Tujuan</th><th>Keterangan</th><th>Status</th></tr>
  <?php $no=1; foreach ($row->result() as $key => $value) {?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $value->nama_unit?>
			<td><?= $value->nama_desa ?></td>
			<td><?= $value->dusun ?></td>
			<td><?= $value->nama_ketua ?></td>
			<td><?= $value->no_telp ?></td>
		</tr>
		<?php } ?>
</table>

 -->
 	