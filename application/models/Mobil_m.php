<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil_m extends CI_Model{
	public function get($id=null){
		$cabang =$this->fungsi->user_login()->cabang;
		$lev = $this->fungsi->user_login()->level;
		$this->db->from('mobil');
		$this->db->join('cabang', 'cabang.kode_cabang = mobil.cabang');
		if($id!=null){
			$this->db->where('barcode',$id);
		}
		if($lev!=3){
			$this->db->where('cabang',$cabang);
		}
		$this->db->where('hapus',0);
		$query = $this->db->get();
		return $query;
	}
	public function add($post){
		$params['barcode'] = $post['barecode'];
		$params['nama_barang'] = $post['nama_barang'];
		$params['tgl_perolehan'] = $post['tgl_perolehan'];
		$params['nomor_polisi'] = $post['nomor_polisi'];
		$params['nomor_asuransi'] = $post['nomor_asuransi'];
		$params['asuransi'] = $post['asuransi'];
		$params['masa_asuransi'] = $post['masa_asuransi'];
		$params['masa_pajak'] = $post['masa_pajak'];
		$params['cabang'] = $this->fungsi->user_login()->cabang;
		$params['kondisi'] = $post['status'];
		$params['tgl_service'] = $post['masa_service'];
		$params['KM'] = $post['km'];
		$params['image'] = $post['image'];
		$this->db->insert('mobil',$params);
	}

	public function del($id){
		$params['hapus'] = 1;
		$this->db->where('barcode',$id);
		$this->db->update('mobil',$params);
	}
	public function edit($post){
		$params['barcode'] = $post['barcode'];
		$params['nama_barang'] = $post['nama_barang'];
		$params['tgl_perolehan'] = $post['tgl_perolehan'];
		$params['nomor_polisi'] = $post['nomor_polisi'];
		$params['nomor_asuransi'] = $post['nomor_asuransi'];
		$params['asuransi'] = $post['asuransi'];
		$params['masa_asuransi'] = $post['masa_asuransi'];
		$params['masa_pajak'] = $post['masa_pajak'];
		$params['tgl_service'] = $post['masa_service'];
		$params['KM'] = $post['km'];
		$params['cabang'] = $post['cabang'];
		$params['kondisi'] = $post['status'];
		if($post['image']!= null){
			$params['image'] = $post['image'];
		}
		$this->db->where('barcode',$post['barcode']);
		$this->db->update('mobil',$params);
	}
	public function getPajak(){
		$cabang =$this->fungsi->user_login()->cabang;
		$query = $this->db->query("select * from mobil where (masa_pajak<=curdate() or masa_pajak<=(Date_Add(curdate(),interval 1 month))) and cabang=$cabang and hapus = 0 order by masa_pajak ASC");
		return $query;
	}
	public function getService(){
		$cabang =$this->fungsi->user_login()->cabang;
		$query = $this->db->query("select * from mobil where (tgl_service<=curdate() or tgl_service<=(Date_Add(curdate(),interval 1 month))) and cabang=$cabang and hapus = 0 order by tgl_service ASC");
		return $query;
	}
	public function editpajak($post){
		$params['masa_pajak'] = $post['masa_pajak'];
		$this->db->where('barcode',$post['barcode']);
		$this->db->update('mobil',$params);
	}
	public function editservice($post){
		$params['tgl_service'] = $post['masa_service'];
		$this->db->where('barcode',$post['barcode']);
		$this->db->update('mobil',$params);
	}
	public function getalready($post){
		$cbg = $this->fungsi->user_login()->cabang;
		$query = $this->db->query("select barcode,nama_barang from mobil where cabang = $cbg and kondisi = 1 and hapus = 0 and barcode not in (select distinct b.barcode from peminjaman a join mobil b on a.barcode_m = b.barcode where ('$post[tgl_pinjam]' between a.tgl_pinjam and a.tgl_kembali) or ( '$post[tgl_kembali]'  between a.tgl_pinjam and a.tgl_kembali) or (a.tgl_pinjam between '$post[tgl_pinjam]' and '$post[tgl_kembali]') or status = 2 and cabang = $cbg )");
		return $query;
	}
}