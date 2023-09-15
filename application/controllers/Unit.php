<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {
	function __construct(){
		parent::__construct();
		check_not_login();
        $this->load->model('unit_m');
        $this->load->model('desa_m');
        $this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->unit_m->get();
		$this->template->load('template','unit/unit_data',$data);
	}
	public function add()
	{
		 $this->form_validation->set_rules('nama_unit', 'namaunit', 'required');
         $this->form_validation->set_rules('jml_nasabah', 'jmlnasabah', 'required');
         $this->form_validation->set_rules('jml_kk', 'jmlkk', 'required');
         $this->form_validation->set_message('required', '%s Harus diisi!');
         $this->form_validation->set_message('is_unique', '%s sudah digunakan');
         $this->form_validation->set_error_delimiters('<span style="color:red">','</span>');
          if ($this->form_validation->run() == FALSE)
            {
                $data['cbg'] = $this->desa_m->get();
				$this->template->load('template','unit/unit_form_add',$data);
            }
            else
            {
                $post = $this->input->post(null,TRUE);
                $this->unit_m->add($post);
                if($this->db->affected_rows() >0){
                    echo "<script>alert('data berhasil disimpan');
                    window.location='".site_url('unit')."'
                    </script>";
                }
            }
	}
    public function edit($id)
    {
         $this->form_validation->set_rules('nama_unit', 'nama_unit', 'required');
         $this->form_validation->set_rules('jml_nasabah', 'jmlnasabah', 'required');
         $this->form_validation->set_rules('jml_kk', 'jmlkk', 'required');
         $this->form_validation->set_message('required', '%s Harus diisi!');
         $this->form_validation->set_message('is_unique', '%s sudah digunakan');
         $this->form_validation->set_error_delimiters('<span style="color:red">','</span>');
          if ($this->form_validation->run() == FALSE)
            {
               $query = $this->unit_m->get($id);

                if($query->num_rows() > 0){
                    $data['unt'] = $this->desa_m->get();
                    $data['row'] = $query;
                    $this->template->load('template','unit/unit_form_edit', $data);
                }else{
                    echo "<script>alert('data tidak ditemukan')</script>";
                    redirect('unit');
                }
            }
            else
            {
                $post = $this->input->post(null,TRUE);
                $this->unit_m->edit($post);
                if($this->db->affected_rows() >0){
                    echo "<script>alert('data berhasil disimpan');
                    window.location='".site_url('unit')."'
                    </script>";
                }else{
                    echo "<script>
                    window.location='".site_url('unit')."'
                    </script>";
                }
            }
    }
	public function del(){
		$id= $this->input->post('id_unit');
		$this->unit_m->del($id);

		 if($this->db->affected_rows() >0){
                    echo "<script>alert('data berhasil dihapus');
                    window.location='".site_url('unit')."'
                    </script>";
                }
	}
}
