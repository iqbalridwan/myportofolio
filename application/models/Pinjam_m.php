<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjam_m extends CI_Model{
	public function validinven(){
		$cbg = $this->fungsi->user_login()->cabang;
		$nip = $this->fungsi->user_login()->nip;
		if($this->fungsi->user_login()->level==1 ) {
			$query = $this->db->query("select *,c.nama as user,d.nama as admin, b.nama as barang, f.nama_barang as mobil, e.nama as supir,e.nik as idsup from peminjaman a left join inventaris b on a.barcode_i = b.barcode join pegawai c on a.nip_user = c.nip left join pegawai d on a.nip_admin = d.nip left join driver e on a.nik = e.nik left join mobil f on a.barcode_m = f.barcode join cabang g on c.cabang = g.kode_cabang where (c.cabang=$cbg and status=0 and (a.nip_admin = $nip or a.nip_admin is null)) and (barcode_m is null or a.nik is null or barcode_i is null) ");
		}
		return $query;
	}
	public function validinvenback(){
		$cbg = $this->fungsi->user_login()->cabang;
		$nip = $this->fungsi->user_login()->nip;
		if($this->fungsi->user_login()->level==1 ) {
			$query = $this->db->query("select *,c.nama as user,d.nama as admin, b.nama as barang, f.nama_barang as mobil, e.nama as supir,e.nik as idsup from peminjaman a left join inventaris b on a.barcode_i = b.barcode join pegawai c on a.nip_user = c.nip left join pegawai d on a.nip_admin = d.nip left join driver e on a.nik = e.nik left join mobil f on a.barcode_m = f.barcode join cabang g on c.cabang = g.kode_cabang where (c.cabang=$cbg and status=2 and (a.nip_admin = $nip or a.nip_admin is null)) and (barcode_m is null or a.nik is null or barcode_i is null) ");
		}
		return $query;
	}
	public function logpinjam($post=null){
		$cbg = $this->fungsi->user_login()->cabang;
		if($post!=null){
			$query = $this->db->query("select *,c.nama as user,d.nama as admin, b.nama as barang, f.nama_barang as mobil, e.nama as supir,e.nik as idsup from peminjaman a left join inventaris b on a.barcode_i = b.barcode join pegawai c on a.nip_user = c.nip left join pegawai d on a.nip_admin = d.nip left join driver e on a.nik = e.nik left join mobil f on a.barcode_m = f.barcode join cabang g on c.cabang = g.kode_cabang where (c.cabang=$cbg and status != 0) and (barcode_m is null or a.nik is null or barcode_i is null) and a.tgl_pinjam between '$post[tgl_pinjam]' and '$post[tgl_kembali]' order by tgl_pinjam desc ");
		}else{
		if($this->fungsi->user_login()->level!=3 ) {
			$query = $this->db->query("select *,c.nama as user,d.nama as admin, b.nama as barang, f.nama_barang as mobil, e.nama as supir,e.nik as idsup from peminjaman a left join inventaris b on a.barcode_i = b.barcode join pegawai c on a.nip_user = c.nip left join pegawai d on a.nip_admin = d.nip left join driver e on a.nik = e.nik left join mobil f on a.barcode_m = f.barcode join cabang g on c.cabang = g.kode_cabang where (c.cabang=$cbg and status != 0) and (barcode_m is null or a.nik is null or barcode_i is null) order by tgl_pinjam desc ");
		}
		if($this->fungsi->user_login()->level==3 ) {
			$query = $this->db->query("select *,c.nama as user,d.nama as admin, b.nama as barang, f.nama_barang as mobil, e.nama as supir,e.nik as idsup from peminjaman a left join inventaris b on a.barcode_i = b.barcode join pegawai c on a.nip_user = c.nip left join pegawai d on a.nip_admin = d.nip left join driver e on a.nik = e.nik left join mobil f on a.barcode_m = f.barcode join cabang g on c.cabang = g.kode_cabang where status != 0 and (barcode_m is null or a.nik is null or barcode_i is null) order by tgl_pinjam desc ");
		}
		}
		return $query;
	}
	public function validasi($id){
		$params['status'] = 1;
		$this->db->where('idpeminjaman',$id);
		$this->db->update('peminjaman',$params);
	}
	public function validasiback($id){
		date_default_timezone_set("Asia/Jakarta");
		  $currentDateTime = date('Y-m-d H:i:s');
		$params['status'] = 3;
		$params['tgl_kembali'] = $currentDateTime;
		$this->db->where('idpeminjaman',$id);
		$this->db->update('peminjaman',$params);
	}
	public function addinven($post){
		$params['tgl_pinjam'] = $post['tgl_pinjam'];
		$params['tgl_kembali'] = $post['tgl_kembali'];
		$params['tujuan'] = $post['tujuan'];
		$params['keterangan'] = $post['keterangan'] != "" ? $post['keterangan'] : null;
		$params['status'] = 0;
		$params['nip_admin'] = $post['admin'];
		$params['barcode_m'] = null;
		$params['nik'] = null;
		$params['barcode_i'] = $post['inven'];
		$params['nip_user'] = $this->fungsi->user_login()->nip;
		$this->db->insert('peminjaman',$params);
	}
	public function addmobil($post){
		$params['tgl_pinjam'] = $post['tgl_pinjam'];
		$params['tgl_kembali'] = $post['tgl_kembali'];
		$params['tujuan'] = $post['tujuan'];
		$params['keterangan'] = $post['keterangan'] != "" ? $post['keterangan'] : null;
		$params['status'] = 0;
		$params['nip_admin'] = null;
		$params['barcode_m'] = $post['mobil'];
		$params['nik'] = $post['driver'] != "0" ? $post['driver'] : null;
		$params['nip_user'] = $this->fungsi->user_login()->nip;
		$params['barcode_i'] = null;
		$this->db->insert('peminjaman',$params);
	}


	public function del($id){
		$this->db->where('idpeminjaman',$id);
		$this->db->delete('peminjaman');
	}
	public function myinven(){
		$nip = $this->fungsi->user_login()->nip;
			$query = $this->db->query("select *,c.nama as user,d.nama as admin, b.nama as barang, f.nama_barang as mobil, e.nama as supir,e.nik as idsup from peminjaman a left join inventaris b on a.barcode_i = b.barcode join pegawai c on a.nip_user = c.nip left join pegawai d on a.nip_admin = d.nip left join driver e on a.nik = e.nik left join mobil f on a.barcode_m = f.barcode join cabang g on c.cabang = g.kode_cabang where status=1 and a.nip_user = $nip ");
		return $query;
	}
	public function waiting(){
		$nip = $this->fungsi->user_login()->nip;
			$query = $this->db->query("select *,c.nama as user,d.nama as admin, b.nama as barang, f.nama_barang as mobil, e.nama as supir,e.nik as idsup from peminjaman a left join inventaris b on a.barcode_i = b.barcode join pegawai c on a.nip_user = c.nip left join pegawai d on a.nip_admin = d.nip left join driver e on a.nik = e.nik left join mobil f on a.barcode_m = f.barcode join cabang g on c.cabang = g.kode_cabang where status=0 and a.nip_user = $nip ");
		return $query;
	}
		public function back($id){
		$params['status'] = 2;
		$this->db->where('idpeminjaman',$id);
		$this->db->update('peminjaman',$params);
	}

	public function update_back(){
		$this->db->query("UPDATE peminjaman SET status = 2 where (TIME_TO_SEC(timeDiff(now(),tgl_kembali))/60)>30 and status = 1");
	}
}