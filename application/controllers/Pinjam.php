<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjam extends CI_Controller {
	function __construct(){
		parent::__construct();
		check_not_login();
        $this->load->model('driver_m');
        $this->load->model('users_m');
        $this->load->model('inventaris_m');
        $this->load->model('mobil_m');
        $this->load->model('cabang_m');
        $this->load->model('pinjam_m');
        $this->load->library('form_validation');
	}

	public function index()
	{
        $query = $this->pinjam_m->logpinjam();
        $data['row'] = $query;
		$this->template->load('template','peminjaman/data_pinjam_inven',$data);
	}
    public function validasipinjam(){
        check_admin();
        $query = $this->pinjam_m->validinven();
            $data['row'] = $query;
            $this->template->load('template','peminjaman/mohon_pinjam_Inventaris',$data);
    }
    public function validasikembali(){
        check_admin();
        $query = $this->pinjam_m->validinvenback();
            $data['row'] = $query;
            $this->template->load('template','peminjaman/mohon_kembali_Inventaris',$data);
    }
    public function validasi($id){
        check_admin();
        $query = $this->pinjam_m->validasi($id);
          if($this->db->affected_rows() >0){
                    echo "<script>alert('data berhasil disimpan');
                    window.location='".site_url('pinjam/validasipinjam')."'
                    </script>";
                }
    }
    public function validasiback($id){
        check_admin();
        $query = $this->pinjam_m->validasiback($id);
          if($this->db->affected_rows() >0){
                    echo "<script>alert('data berhasil disimpan');
                    window.location='".site_url('pinjam/validasikembali')."'
                    </script>";
                }
    }
    public function dateinven(){
        check_user();
        $this->pinjam_m->update_back();
        $this->template->load('template','peminjaman/pick_date');
    }
    public function datemobil(){
        check_user();
        $this->pinjam_m->update_back();
        $this->template->load('template','peminjaman/pick_date_mobil');
    }
	public function addinven()
	{
        $post = $this->input->post(null,TRUE);
        if(isset($post['pickdate'])){
		 $this->form_validation->set_rules('inven', 'Inven', 'required');
		 $this->form_validation->set_rules('admin', 'Admin', 'required');
         $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
         $this->form_validation->set_message('required', '%s Harus diisi!');
         $this->form_validation->set_error_delimiters('<span style="color:red">','</span>');
          if ($this->form_validation->run() == FALSE)
            {
                $post = $this->input->post(null,TRUE);
                $query = $this->inventaris_m->getalready($post);
                if($query->num_rows() > 0){
                $data['row'] = $query;
                $data['admin'] = $this->users_m->getadmin();
				$this->template->load('template','peminjaman/add_pinjam_inventaris',$data);
                }else{
                    echo "<script>alert('data tidak ditemukan')</script>";
                }
            }
            else
            {
                $post = $this->input->post(null,TRUE);
                $this->pinjam_m->addinven($post);
                if($this->db->affected_rows() >0){
                	echo "<script>alert('data berhasil disimpan');
                    window.location='".site_url('pinjam/myinven')."'
                    </script>";
                }
            }
        }else{
            redirect('pinjam/dateinven');
        }
	}
    public function addmobil()
    {
        $post = $this->input->post(null,TRUE);
        if(isset($post['pickdate'])){
         $this->form_validation->set_rules('mobil', 'Mobil', 'required');
         $this->form_validation->set_rules('driver', 'Driver', 'required');
         $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
         $this->form_validation->set_message('required', '%s Harus diisi!');
         $this->form_validation->set_error_delimiters('<span style="color:red">','</span>');
          if ($this->form_validation->run() == FALSE)
            {
                $post = $this->input->post(null,TRUE);
                $query = $this->driver_m->getalready($post);
                $qr = $this->mobil_m->getalready($post);
                if($qr->num_rows() > 0){
                $data['drv'] = $query;
                $data['mbl'] = $qr;
                $this->template->load('template','peminjaman/add_pinjam_mobil',$data);
                }else{
                    echo "<script>alert('data tidak ditemukan')</script>";
                }
            }
            else
            {
                $post = $this->input->post(null,TRUE);
                $this->pinjam_m->addmobil($post);
                if($this->db->affected_rows() >0){
                    echo "<script>alert('data berhasil disimpan');
                    window.location='".site_url('pinjam/myinven')."'
                    </script>";
                }
            }
        }else{
            redirect('pinjam/datemobil');
        }
    }
	public function del(){
		check_admin();
		$id = $this->input->post('idpeminjaman');
		$this->pinjam_m->del($id);

		 if($this->db->affected_rows() >0){
                    echo "<script>alert('data berhasil dihapus');
                    window.location='".site_url('pinjam/validasipinjam')."'
                    </script>";
                }
	}
    public function myinven(){
        $query = $this->pinjam_m->myinven();
            $data['row'] = $query;
            $data['wait'] = $this->pinjam_m->waiting();
            $this->template->load('template','peminjaman/data_pinjam_user',$data);
    }
    public function back($id){
        $query = $this->pinjam_m->back($id);
          if($this->db->affected_rows() >0){
                    echo "<script>alert('data berhasil disimpan');
                    window.location='".site_url('pinjam/myinven')."'
                    </script>";
                }
    }
}
