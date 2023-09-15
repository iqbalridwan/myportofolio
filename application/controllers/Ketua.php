<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ketua extends CI_Controller {
	function __construct(){
		parent::__construct();
		check_not_login();
        check_admin();
		$this->load->model('ketua_m');
        $this->load->model('unit_m');
        $this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->ketua_m->get();
		$this->template->load('template','ketua/ketua_data',$data);
	}
	public function add()
	{
		 
         $this->form_validation->set_rules('nama_ketua', 'nama ketua', 'required');
         $this->form_validation->set_rules('no_telp', 'no telp', 'required');
         $this->form_validation->set_rules('dusun', 'dusun', 'required');
         $this->form_validation->set_rules('unit', 'unit', 'required');
         $this->form_validation->set_message('required', '%s Harus diisi!');
         $this->form_validation->set_error_delimiters('<span style="color:red">','</span>');
          if ($this->form_validation->run() == FALSE)
            {
                $data['cbg'] = $this->ketua_m->get();
                $data['unt'] = $this->unit_m->get();
				$this->template->load('template','ketua/ketua_form_add',$data);
            }
            else
            {
                $post = $this->input->post(null,TRUE);
                $this->ketua_m->add($post);
                if($this->db->affected_rows() >0){
                    echo "<script>alert('data berhasil disimpan');
                    window.location='".site_url('ketua')."'
                    </script>";
                }
            }
	}
    public function edit($id)
    {
         
        $this->form_validation->set_rules('nama_ketua', 'nama ketua', 'required');
         $this->form_validation->set_rules('no_telp', 'no telp', 'required');
         $this->form_validation->set_rules('dusun', 'dusun', 'required');
         $this->form_validation->set_rules('unit', 'unit', 'required');
         $this->form_validation->set_message('required', '%s Harus diisi!');
         $this->form_validation->set_error_delimiters('<span style="color:red">','</span>');
          if ($this->form_validation->run() == FALSE)
            {
                $query = $this->ketua_m->get($id);

                if($query->num_rows() > 0){
                    $data['row'] = $query;
                    $data['ketua'] = $this->ketua_m->get();
                    $data['unt'] = $this->unit_m->get();
                    $this->template->load('template','ketua/ketua_form_edit', $data);
                }else{
                    echo "<script>alert('data tidak ditemukan')</script>";
                    redirect('user');
                }
            }
            else
            {
                $post = $this->input->post(null,TRUE);
                $this->ketua_m->edit($post);
                if($this->db->affected_rows() >0){
                    echo "<script>alert('data berhasil disimpan');
                    window.location='".site_url('ketua')."'
                    </script>";
                }else{
                    echo "<script>
                    window.location='".site_url('ketua')."'
                    </script>";
                }
            }
    }
    // function username_check(){
    //     $post = $this->input->post(null,TRUE);
    //     $query = $this->db->query("select * from pegawai where username = '$post[username]' and nip != '$post[nip]' ");
    //     if($query->num_rows()>0){
    //     $this->form_validation->set_message('username_check', '{field} ini sudah dipakai, silahkan diganti');
    //     return FALSE;
    //     }else{
    //         return TRUE;
    //     }
    // }
	public function del(){
		$id= $this->input->post('id');
		$this->ketua_m->del($id);

		 if($this->db->affected_rows() >0){
                    echo "<script>alert('data berhasil dihapus');
                    window.location='".site_url('ketua')."'
                    </script>";
                }
	}

}
