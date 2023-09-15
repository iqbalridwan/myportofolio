<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	function __construct(){
		parent::__construct();
		check_not_login();
        $this->load->model('kategori_m');
        $this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->kategori_m->get();
		$this->template->load('template','kategori/kategori_data',$data);
	}
	public function add()
	{
		 $this->form_validation->set_rules('kategori_sampah', 'kategori', 'required');
         $this->form_validation->set_message('required', '%s Harus diisi!');
         $this->form_validation->set_message('is_unique', '%s sudah digunakan');
         $this->form_validation->set_error_delimiters('<span style="color:red">','</span>');
          if ($this->form_validation->run() == FALSE)
            {
				$this->template->load('template','kategori/kategori_form_add');
            }
            else
            {
                $post = $this->input->post(null,TRUE);
                $this->kategori_m->add($post);
                if($this->db->affected_rows() >0){
                    echo "<script>alert('data berhasil disimpan');
                    window.location='".site_url('kategori')."'
                    </script>";
                }
            }
	}
    public function edit($id)
    {
         $this->form_validation->set_rules('kategori_sampah', 'kategori', 'required');
         $this->form_validation->set_message('required', '%s Harus diisi!');
         $this->form_validation->set_message('is_unique', '%s sudah digunakan');
         $this->form_validation->set_error_delimiters('<span style="color:red">','</span>');
          if ($this->form_validation->run() == FALSE)
            {
               $query = $this->kategori_m->get($id);

                if($query->num_rows() > 0){
                    $data['row'] = $query;
                    $this->template->load('template','kategori/kategori_form_edit', $data);
                }else{
                    echo "<script>alert('data tidak ditemukan')</script>";
                    redirect('kategori');
                }
            }
            else
            {
                $post = $this->input->post(null,TRUE);
                $this->kategori_m->edit($post);
                if($this->db->affected_rows() >0){
                    echo "<script>alert('data berhasil disimpan');
                    window.location='".site_url('kategori')."'
                    </script>";
                }else{
                    echo "<script>
                    window.location='".site_url('kategori')."'
                    </script>";
                }
            }
    }
	public function del(){
		$id= $this->input->post('id_kategori');
		$this->kategori_m->del($id);

		 if($this->db->affected_rows() >0){
                    echo "<script>alert('data berhasil dihapus');
                    window.location='".site_url('unit')."'
                    </script>";
                }
	}
}
