<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventaris_m extends CI_Model{
	public function get($id=null){
		$cabang =$this->fungsi->user_login()->cabang;
		$lev = $this->fungsi->user_login()->level;
		$this->db->from('inventaris');
		$this->db->join('cabang', 'cabang.kode_cabang = inventaris.cabang');
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
		$params['barcode'] = $post['barcode'];
		$params['nama'] = $post['nama'];
		$params['kondisi'] = $post['status'];
		$params['image'] = $post['image'];
		$params['cabang'] = $this->fungsi->user_login()->cabang;
		$this->db->insert('inventaris',$params);
	}

	public function del($id){
		$params['hapus'] = 1;
		$this->db->where('barcode',$id);
		$this->db->update('inventaris',$params);
	}
	public function edit($post){
		$params['barcode'] = $post['barcode'];
		$params['nama'] = $post['nama'];
		$params['kondisi'] = $post['status'];
		$params['cabang'] = $post['cabang'];
		if($post['image']!= null){
			$params['image'] = $post['image'];
		}
		$this->db->where('barcode',$post['barcode']);
		$this->db->update('inventaris',$params);
	}
	public function getalready($post){
		$cbg = $this->fungsi->user_login()->cabang;
		$query = $this->db->query("select barcode,nama from inventaris where cabang = $cbg and kondisi = 1 and hapus=0 and barcode not in( select distinct b.barcode from peminjaman a join inventaris b on a.barcode_i = b.barcode
		where ('$post[tgl_pinjam]' between a.tgl_pinjam and a.tgl_kembali)
		or ( '$post[tgl_kembali]'  between a.tgl_pinjam and a.tgl_kembali) or (a.tgl_pinjam between '$post[tgl_pinjam]' and '$post[tgl_kembali]') or status = 2 and cabang =$cbg)");
		return $query;
	}
}