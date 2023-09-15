<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Desa_m extends CI_Model{
	public function get($id=null){
		$this->db->from('desa');
		$this->db->where('hapus_desa', '0');
		if($id!=null){
			$this->db->where('id_desa',$id);
		}
		$query = $this->db->get();
		return $query;
	}
	public function add($post){
		$params['lokasi'] = $post['lokasi'];
		$params['dusun'] = $post['dusun'];
		$params['nama_desa'] = $post['nama_desa'];
		$this->db->insert('desa',$params);
	}
	public function edit($post){
		$params['lokasi'] = $post['lokasi'];
		$params['dusun'] = $post['dusun'];
		$params['nama_desa'] = $post['nama_desa'];
		$this->db->where('id_desa',$post['id_desa']);
		$this->db->update('desa',$params);
	}
	public function del($id){
		$params['hapus_desa'] = 1;		
		$this->db->where('id_desa',$id);
		$this->db->update('desa',$params);
	}			
}