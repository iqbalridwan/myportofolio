<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_m extends CI_Model{
	public function login($post){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username',$post['username']);
		$this->db->where('password',$post['password']);
		$this->db->where('hapus',0);
		$query = $this->db->get();
		return $query;
	}
	public function getall($id=null){
		$this->db->from('user');
		if($id!=null){
			$this->db->where('id_admin',$id);
		}
		$this->db->where('hapus',0);			
		$query = $this->db->get();
		return $query;
	}
	public function get($id=null){
		$this->db->from('user');
		$this->db->join('unit', 'unit.id_unit = user.id_unit');	
		$this->db->where('hapus',0);
		if($id!=null){
			$this->db->where('id_admin',$id);
		}		
		$query = $this->db->get();
		return $query;
	}

	// public function getdataadmin($id=null){
	// 	$this->db->from('user');
	// 	$this->db->join('cabang', 'cabang.kode_cabang = user.cabang');
	// 	$this->db->where('level',1);
	// 	if($id!=null){
	// 		$this->db->where('id_admin',$id);
	// 	}
	// 	$this->db->where('hapus',0);		
	// 	$query = $this->db->get();
	// 	return $query;
	// }

	public function add($post){
		$params['username'] = $post['username'];
		$params['password'] = $post['password'];
		$params['id_unit'] = $post['unit'];
		$params['level'] = "0";
		$this->db->insert('user',$params);
	}

	// public function addadmin($post){
	// 	$options = [
	// 	    'cost' => 10,
	// 	];
	// 	$params['id_admin'] = $post['id_admin'];
	// 	$params['nama'] = $post['fullname'];
	// 	$params['alamat'] = $post['alamat'] != "" ? $post['alamat'] : null;
	// 	$params['username'] = $post['username'];
	// 	$params['password'] = password_hash($post['password'], PASSWORD_DEFAULT, $options);
	// 	$params['level'] = 1;
	// 	$params['cabang'] =  $post['cabang'];
	// 	$this->db->insert('user',$params);
	// }


	public function del($id){
		$params['hapus'] = 1;
		$this->db->where('id_admin',$id);
		$this->db->update('user',$params);
	}
	public function edit($post){
		$params['username'] = $post['username'];
		$params['password'] = $post['password'];
		// if(!empty($post['password'])){
		// $params['password'] = password_hash($post['password'], PASSWORD_DEFAULT, $options);
		// }
		$params['id_unit'] = $post['unit'];
		$this->db->where('id_admin',$post['id']);
		$this->db->update('user',$params);
	}
	// public function editadmin($post){
	// 			$options = [
	// 	    'cost' => 10,
	// 	];
	// 	$params['id_admin'] = $post['id_admin'];
	// 	$params['nama'] = $post['fullname'];
	// 	$params['alamat'] = $post['alamat'] != "" ? $post['alamat'] : null;
	// 	$params['username'] = $post['username'];
	// 	if(!empty($post['password'])){
	// 	$params['password'] = password_hash($post['password'], PASSWORD_DEFAULT, $options);
	// 	}
	// 	$params['cabang'] = $post['cabang'];
	// 	$this->db->where('id_admin',$post['id_admin']);
	// 	$this->db->update('user',$params);
	// }
	public function gantipass($post){		
		$params['password'] = $post['passwordbaru'];
		$id_admin = $this->fungsi->user_login()->id_admin;
		$this->db->where('id_admin',$id_admin);
		$this->db->update('user',$params);
	}
}