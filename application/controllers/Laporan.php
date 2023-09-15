<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	function __construct(){
		parent::__construct();
		// check_not_login();
		// check_admin();
		 $this->load->model('cetak_m');
        $this->load->library('form_validation');
	}

	public function index()
	{
		$this->template->load('template','laporan/cetaklaporan');
	}
		public function cek()
	{
		$this->load->view('contoh');
	}
    public function cetak(){
		$post = $this->input->post(null,TRUE);
		$query = $this->cetak_m->unit($post);
					
		if($query->num_rows() > 0){
			$data['row'] = $query;			
			$data['tgl_mulai'] = $post['tgl_mulai'];
			$data['tgl_akhir'] = $post['tgl_akhir'];
        $html = $this->load->view('contoh',$data,true);
        $this->fungsi->pdfGenerator($html,'Laporan','A4','landscape');
		}else{
			echo "<script>alert('data tidak ditemukan')</script>";
		}
    }
	
}
