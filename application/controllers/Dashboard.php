<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		check_not_login();     
        $this->load->model('unit_m');
        $this->load->model('users_m');
        $this->load->model('ketua_m');
        $this->load->model('desa_m');
        $this->load->model('kategori_m');
        $this->load->model('setor_m');
        $this->load->model('cetak_m');                         
	}
	public function index()
	{
		$data['unit'] = $this->unit_m->get()->num_rows();
		$data['user'] = $this->users_m->get()->num_rows();
		$data['ketua'] = $this->ketua_m->get()->num_rows();
		$data['desa'] = $this->desa_m->get()->num_rows();
		$data['kategori'] = $this->kategori_m->get()->num_rows();
		$data['setor'] = $this->setor_m->get()->num_rows();
		$this->template->load('template','dashboard',$data);
	}
}
