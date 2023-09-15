<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_m extends CI_Model{
	public function get($id=null){
		$this->db->from('kategori');
		if($id!=null){
			$this->db->where('id_kategori',$id);
		}
		$this->db->where('hapus_kategori', '0');
		$query = $this->db->get();
		return $query;
	}
	public function add($post){
		$params['kategori_sampah'] = $post['kategori_sampah'];
		$this->db->insert('kategori',$params);
	}
	public function edit($post){
		$params['kategori_sampah'] = $post['kategori_sampah'];
		$this->db->where('id_kategori',$post['id_kategori']);
		$this->db->update('kategori',$params);
	}
	public function del($id){
		$params['hapus_kategori'] = 1;		
		$this->db->where('id_kategori',$id);
		$this->db->update('kategori',$params);
	}			
}