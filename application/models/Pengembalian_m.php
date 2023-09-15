<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian_m extends CI_Model{
	public function get($id=null){
		$this->db->from('pengembalian');
		if($id!=null){
			$this->db->where('pengembalian',$id);
		}
		$query = $this->db->get();
		return $query;
	}
	public function add($post){
		$params['idpengembalian'] = $post['idpengembalian'];
		$params['tgl_pinjam'] = $post['tgl_pinjam'];
		$params['tgl_kembali'] = $post['tgl_kembali'];
		$params['tujuan'] = $post['tujuan'];
		$params['status'] = $post['status'];
		$params['keterangan'] = $post['keterangan'];
		$params['nip'] = $post['nip'];
		$params['barcode_m'] = $post['barcode_m'];
		$params['nik'] = $post['nik'];
		$params['nip'] = $post['nip'];
		$params['idpeminjaman'] = $post['idpeminjaman'];
		$params['barcode_i'] = $post['barcode_i'];
		$this->db->insert('pengembalian',$params);
	}

	public function del($id){
		$this->db->where('idpengembalian',$barcode);
		$this->db->delete('pengembalian');
	}
	public function edit($post){	
		$params['idpengembalian'] = $post['idpengembalian'];
		$params['tgl_pinjam'] = $post['tgl_pinjam'];
		$params['tgl_kembali'] = $post['tgl_kembali'];
		$params['tujuan'] = $post['tujuan'];
		$params['status'] = $post['status'];
		$params['keterangan'] = $post['keterangan'];
		$params['nip'] = $post['nip'];
		$params['barcode_m'] = $post['barcode_m'];
		$params['nik'] = $post['nik'];
		$params['nip'] = $post['nip'];
		$params['idpeminjaman'] = $post['idpeminjaman'];
		$params['barcode_i'] = $post['barcode_i'];
		$this->db->where('idpengembalian',$post['idpengembalian']);
		$this->db->update('pengembalian',$params);
	}
}