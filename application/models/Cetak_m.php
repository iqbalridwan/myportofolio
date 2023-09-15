<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak_m extends CI_Model{
	public function unit($post){
			$tglmulai=$post['tgl_mulai'];
			$tglakhir=$post['tgl_akhir'];
			$query = $this->db->query(
				"SELECT 
				u.nama_unit,d.nama_desa,d.dusun,k.nama_ketua,k.no_telp,u.jml_nasabah,u.th_berdiri,
				SUM(s.jml_setor) as total,
				(SELECT SUM(jml_setor) FROM `setor`
				WHERE id_kategori=1 AND id_admin=usr.id_admin AND tgl_setor BETWEEN '$tglmulai' AND '$tglakhir') as plastik,
				(SELECT SUM(jml_setor) FROM `setor`
				WHERE id_kategori=3 AND id_admin=usr.id_admin AND tgl_setor BETWEEN '$tglmulai' AND '$tglakhir') as kaleng,
				(SELECT SUM(jml_setor) FROM `setor`
				WHERE id_kategori=6 AND id_admin=usr.id_admin AND tgl_setor BETWEEN '$tglmulai' AND '$tglakhir') as organik,
				(SELECT SUM(jml_setor) FROM `setor`
				WHERE id_kategori=7 AND id_admin=usr.id_admin AND tgl_setor BETWEEN '$tglmulai' AND '$tglakhir') as residu,
				(SELECT SUM(jml_setor) FROM `setor`
				WHERE id_kategori=5 AND id_admin=usr.id_admin AND tgl_setor BETWEEN '$tglmulai' AND '$tglakhir') as kertas,
				(SELECT SUM(jml_setor) FROM `setor`
				WHERE id_kategori=4 AND id_admin=usr.id_admin AND tgl_setor BETWEEN '$tglmulai' AND '$tglakhir') as kaca
			FROM unit u 
			LEFT JOIN ketua k ON k.id_unit=u.id_unit
			LEFT JOIN desa d ON d.id_desa=u.id_desa
			LEFT JOIN user usr ON usr.id_unit=u.id_unit
			LEFT JOIN setor s ON s.id_admin=usr.id_admin
			WHERE s.tgl_setor BETWEEN '$tglmulai' AND '$tglakhir'
			GROUP BY u.id_unit");
		return $query;
	}
}