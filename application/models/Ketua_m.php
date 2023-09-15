<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ketua_m extends CI_Model{
	public function get($id=null){
		$this->db->from('ketua');
		$this->db->join('unit', 'ketua.id_unit = unit.id_unit');
		if($id!=null){
			$this->db->where('id_ketua',$id);

		}
		$this->db->where('hapus_ketua', '0');
		$query = $this->db->get();
		return $query;
	}
	public function add($post){
		$params['nama_ketua'] = $post['nama_ketua'];
		$params['no_telp'] = $post['no_telp'];
		$params['dusun'] = $post['dusun'];
		$params['id_unit'] = $post['unit'];
		$this->db->insert('ketua',$params);
	}
	public function edit($post){
		$params['nama_ketua'] = $post['nama_ketua'];
		$params['no_telp'] = $post['no_telp'];
		$params['dusun'] = $post['dusun'];
		$params['id_unit'] = $post['unit'];
		$this->db->where('id_ketua',$post['id']);
		$this->db->update('ketua',$params);
	}
	public function del($id){
		$params['hapus_ketua'] = 1;		
		$this->db->where('id_ketua',$id);
		$this->db->update('ketua',$params);
	}			
}