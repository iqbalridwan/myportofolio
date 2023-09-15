<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setor_m extends CI_Model{
	public function get($id=null,$post=null){
		$unit =$this->fungsi->user_login()->id_unit;
		$lev = $this->fungsi->user_login()->level;
		$this->db->from('setor');
		$this->db->join('kategori', 'kategori.id_kategori = setor.id_kategori');
		$this->db->join('user', 'user.id_admin = setor.id_admin');
		if($lev==1){

			$this->db->join('unit', 'user.id_unit = unit.id_unit');
		}
		if($lev==0){

			$this->db->where('id_unit',$unit);
		}
		if($id!=null){
			$this->db->where('id_setor',$id);
		}
		if($post!=null){
			$this->db->where('tgl_setor>=',$id);
			$this->db->where('tgl_setor<=',$id);
		}
			$this->db->where('hapus_setor',0);
		$query = $this->db->get();
		return $query;
	}
	public function add($post){
		$params['tgl_setor'] = $post['tgl_setor'];
		$params['jml_setor'] = $post['jml_setor'] != "" ? $post['jml_setor'] : null;
		$params['nama_sampah'] = $post['nama_sampah'];
		$params['id_kategori'] = $post['id_kategori'];
		$params['id_admin'] = $post['id_admin'];
		$this->db->insert('setor',$params);
	}

	public function del($id){
		$params['hapus_setor'] = 1;
		$this->db->where('id_setor',$id);
		$this->db->update('setor',$params);
	}
	public function edit($post){
		$params['id_setor'] = $post['id_setor'];
		$params['tgl_setor'] = $post['tgl_setor'];
		$params['jml_setor'] = $post['jml_setor'];
		$params['nama_sampah'] = $post['nama_sampah'];
		$params['id_kategori'] = $post['id_kategori'];
		$this->db->where('id_setor',$post['id_setor']);
		$this->db->update('setor',$params);
	}
	public function getalready($post){
		$cbg = $this->fungsi->user_login()->cabang;
		$query = $this->db->query("select nik,nama from driver where cabang = $cbg and hapus = 0 and nik not in(select distinct b.nik from peminjaman a join driver b on a.nik = b.nik  where ('$post[tgl_pinjam]' between a.tgl_pinjam and a.tgl_kembali) or ( '$post[tgl_kembali]'  between a.tgl_pinjam and a.tgl_kembali) or (a.tgl_pinjam between '$post[tgl_pinjam]' and '$post[tgl_kembali]') or status = 2 and cabang =$cbg)");
		return $query;
	}
}