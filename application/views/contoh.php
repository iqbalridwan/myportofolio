
<style type="text/css">
.tftable {font-size:12px;color:#333333;width:100%;border-width: 1px;border-color: #729ea5;border-collapse: collapse;}
.tftable th {font-size:12px;background-color:#ff7;border-width: 1px;padding: 8px;border-style: solid;border-color: #729ea5;text-align:left;}
.tftable tr {background-color:#fff;}
.tftable td {font-size:12px;border-width: 1px;padding: 8px;border-style: solid;border-color: #729ea5;}
.tftable tr:hover {background-color:#ffffff;}
</style>
<center><h2>Dinas Lingkungan Hidup Kabupaten Magelang</h2>
<h1>Rekapitulasi BSI Sekar Gendis</h1>
<h3>Sekretariat : Lapangan Pemda Muntilan KP 56411</h3></center>
<br>

<br>
<h3>Dari tanggal : <?php echo $tgl_mulai; ?></h3>
<h3>Sampai tanggal : <?php echo $tgl_akhir; ?></h3>
<br>
<table>
	<tr>
		<td>
			<table class="tftable" border="1">
				<tr>
					<th>No</th>
					<th>Nama Unit</th>
					<th>Desa</th>
					<th>Dusun</th>
					<th>Nama Ketua</th>
					<th>No HP</th>
					<th>Tahun Berdiri</th>
					<th>Jumlah Anggota</th>
					<th>Plastik</th>
					<th>Organik</th>
					<th>Residu</th>
					<th>Kertas</th>
					<th>Kaca</th>
					<th>Logam</th>
					<th>Jumlah Total(Kg)</th>

				</tr>
				<?php $no=1;
				foreach ($row->result() as $key => $value)  	
				{?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $value->nama_unit?></td>
					<td><?= $value->nama_desa ?></td>
					<td><?= $value->dusun ?></td>
					<td><?= $value->nama_ketua ?></td>
					<td><?= $value->no_telp ?></td>
					<td><?= $value->th_berdiri ?></td>
					<td><?= $value->jml_nasabah ?></td>
					<td><?= $value->plastik??0 ?></td>
					<td><?= $value->organik??0 ?></td>
					<td><?= $value->residu??0 ?></td>
					<td><?= $value->kertas??0 ?></td>
					<td><?= $value->kaca??0 ?></td>
					<td><?= $value->kaleng??0 ?></td>
					<td><?= $value->total??0 ?></td>
				</tr>
				<?php } ?>
			</table>
		</td>
	<tr>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td align="right">Magelang, <?php echo date('d-M-Y')?>
        <br>  Direktur BSI Sekar Gendis</td>
    </tr>
    <tr>
        <td align="right"></td>
    </tr>
   
    <tr>
    <td><br/><br/><br/><br/></td>
    </tr>    
    <tr>
        <td align="right">( Drs. Sugianto, MPd. )</td>
    </tr>
    <tr>
        <td align="center"></td>
    </tr>
</table>
		

