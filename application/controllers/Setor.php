<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setor extends CI_Controller {
	function __construct(){
		parent::__construct();
		check_not_login();
        $this->load->model('setor_m');
        $this->load->model('kategori_m');
        $this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->setor_m->get();
		$this->template->load('template','setor/setor_data',$data);
	}
	public function add()
	{
		// check_admin();
		 $this->form_validation->set_rules('nama_sampah', 'nama_sampah', 'required');
         $this->form_validation->set_message('required', '%s Harus diisi!');
         $this->form_validation->set_message('is_unique', '%s sudah digunakan');
         $this->form_validation->set_error_delimiters('<span style="color:red">','</span>');
          if ($this->form_validation->run() == FALSE)
            {
                $data['row'] = $this->kategori_m->get();
				$this->template->load('template','setor/setor_form_add',$data);
            }
            else
            {
                $post = $this->input->post(null,TRUE);
                $this->setor_m->add($post);
                if($this->db->affected_rows() >0){
                    echo "<script>alert('data berhasil disimpan');
                    window.location='".site_url('setor')."'
                    </script>";
                }
            }
	}
    public function edit($id)
    {
    	 // check_admin();
         $this->form_validation->set_rules('nama_sampah', 'nama_sampah', 'required');
         $this->form_validation->set_message('required', '%s Harus diisi!');
         $this->form_validation->set_message('is_unique', '%s sudah digunakan');
         $this->form_validation->set_error_delimiters('<span style="color:red">','</span>');
          if ($this->form_validation->run() == FALSE)
            {
               $query = $this->setor_m->get($id);

                if($query->num_rows() > 0){
                    $data['row'] = $query;
                    $data['ktg'] = $this->kategori_m->get();
                    $this->template->load('template','setor/setor_form_edit', $data);
                }else{
                    echo "<script>alert('data tidak ditemukan')</script>";
                    redirect('setor');
                }
            }
            else
            {
                $post = $this->input->post(null,TRUE);
                $this->setor_m->edit($post);
                if($this->db->affected_rows() >0){
                    echo "<script>alert('data berhasil disimpan');
                    window.location='".site_url('setor')."'
                    </script>";
                }else{
                    echo "<script>
                    window.location='".site_url('setor')."'
                    </script>";
                }
            }
    }
	public function del(){
		// check_admin();
		$id= $this->input->post('id_setor');
		$this->setor_m->del($id);

		 if($this->db->affected_rows() >0){
                    echo "<script>alert('data berhasil dihapus');
                    window.location='".site_url('setor')."'
                    </script>";
                }

	}
}
