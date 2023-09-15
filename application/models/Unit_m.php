<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_m extends CI_Model{
	public function get($id=null){
		$this->db->from('unit');
		$this->db->join('desa', 'desa.id_desa = unit.id_desa');
		if($id!=null){
			$this->db->where('id_unit',$id);
		}
		$this->db->where('hapus_unit', '0');
		$query = $this->db->get();
		return $query;
	}
	public function add($post){
		$params['nama_unit'] = $post['nama_unit'];
		$params['jml_nasabah'] = $post['jml_nasabah'] != "" ? $post['jml_nasabah'] : null;
		$params['id_desa'] = $post['desa'];
		$params['jml_kk'] = $post['jml_kk'];
		$params['th_berdiri'] = $post['th_berdiri'];
		$this->db->insert('unit',$params);
	}
	public function edit($post){
		$params['nama_unit'] = $post['nama_unit'];
		$params['jml_nasabah'] = $post['jml_nasabah'];
		$params['jml_kk'] = $post['jml_kk'];
		$params['th_berdiri'] = $post['th_berdiri'];
		$params['id_desa'] = $post['desa'];
		$this->db->where('id_unit',$post['id']);
		$this->db->update('unit',$params);
	}
	public function del($id){
		$params['hapus_unit'] = 1;		
		$this->db->where('id_unit',$id);
		$this->db->update('unit',$params);
	}			
}