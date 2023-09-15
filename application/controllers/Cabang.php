<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang extends CI_Controller {
	function __construct(){
		parent::__construct();
		check_not_login();
        check_super_admin();
        $this->load->model('cabang_m');
        $this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->cabang_m->get();
		$this->template->load('template','cabang/cabang_data',$data);
	}
	public function add()
	{
		 $this->form_validation->set_rules('kode', 'Kode', 'required|is_unique[cabang.kode_cabang]');
		 $this->form_validation->set_rules('nama', 'Nama', 'required');
         $this->form_validation->set_message('required', '%s Harus diisi!');
         $this->form_validation->set_message('is_unique', '%s sudah digunakan');
         $this->form_validation->set_error_delimiters('<span style="color:red">','</span>');
          if ($this->form_validation->run() == FALSE)
            {
				$this->template->load('template','cabang/cabang_form_add');
            }
            else
            {
                $post = $this->input->post(null,TRUE);
                $this->cabang_m->add($post);
                if($this->db->affected_rows() >0){
                    echo "<script>alert('data berhasil disimpan');
                    window.location='".site_url('cabang')."'
                    </script>";
                }
            }
	}
    public function edit($id)
    {
         $this->form_validation->set_rules('nama', 'Nama', 'required');
         $this->form_validation->set_message('required', '%s Harus diisi!');
         $this->form_validation->set_message('is_unique', '%s sudah digunakan');
         $this->form_validation->set_error_delimiters('<span style="color:red">','</span>');
          if ($this->form_validation->run() == FALSE)
            {
               $query = $this->cabang_m->get($id);

                if($query->num_rows() > 0){
                    $data['row'] = $query;
                    $this->template->load('template','cabang/cabang_form_edit', $data);
                }else{
                    echo "<script>alert('data tidak ditemukan')</script>";
                    redirect('cabang');
                }
            }
            else
            {
                $post = $this->input->post(null,TRUE);
                $this->cabang_m->edit($post);
                if($this->db->affected_rows() >0){
                    echo "<script>alert('data berhasil disimpan');
                    window.location='".site_url('cabang')."'
                    </script>";
                }else{
                    echo "<script>
                    window.location='".site_url('cabang')."'
                    </script>";
                }
            }
    }
	public function del(){
		$id= $this->input->post('kode');
		$this->cabang_m->del($id);

		 if($this->db->affected_rows() >0){
                    echo "<script>alert('data berhasil dihapus');
                    window.location='".site_url('cabang')."'
                    </script>";
                }
	}
}
