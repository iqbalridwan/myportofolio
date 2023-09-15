<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
		parent::__construct();
		check_not_login();
        check_admin();
		$this->load->model('users_m');
        $this->load->model('unit_m');
        $this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->users_m->get();
		$this->template->load('template','user/admin_data',$data);
	}
	public function add()
	{
		 
         $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]');
         $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');
         $this->form_validation->set_rules('passconf', 'Konfirmasi password', 'required|matches[password]');
         $this->form_validation->set_message('required', '%s Harus diisi!');
         $this->form_validation->set_message('matches', '%s tidak sama');
         $this->form_validation->set_message('is_unique', '%s sudah digunakan');
         $this->form_validation->set_error_delimiters('<span style="color:red">','</span>');
          if ($this->form_validation->run() == FALSE)
            {
                $data['cbg'] = $this->unit_m->get();
				$this->template->load('template','user/admin_form_add',$data);
            }
            else
            {
                $post = $this->input->post(null,TRUE);
                $this->users_m->add($post);
                if($this->db->affected_rows() >0){
                    echo "<script>alert('data berhasil disimpan');
                    window.location='".site_url('user')."'
                    </script>";
                }
            }
	}
    public function edit($id)
    {
         
         $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]');
         $this->form_validation->set_message('required', '%s Harus diisi!');
         $this->form_validation->set_message('matches', '%s tidak sama');
         $this->form_validation->set_message('is_unique', '%s sudah digunakan');
         $this->form_validation->set_error_delimiters('<span style="color:red">','</span>');

        if($this->input->post('password')){
             $this->form_validation->set_rules('password', 'Password', 'min_length[3]');
             $this->form_validation->set_rules('passconf', 'Konfirmasi password', 'matches[password]');
        }
        if($this->input->post('passconf')){
             $this->form_validation->set_rules('passconf', 'Konfirmasi password', 'matches[password]');
        }
         $this->form_validation->set_message('matches', '%s tidak sama');
         $this->form_validation->set_message('is_unique', '%s sudah digunakan');
         $this->form_validation->set_error_delimiters('<span style="color:red">','</span>');
          if ($this->form_validation->run() == FALSE)
            {
                $query = $this->users_m->get($id);

                if($query->num_rows() > 0){
                    $data['row'] = $query;
                    $data['unt'] = $this->unit_m->get();
                    $this->template->load('template','user/admin_form_edit', $data);
                }else{
                    echo "<script>alert('data tidak ditemukan')</script>";
                    redirect('user');
                }
            }
            else
            {
                $post = $this->input->post(null,TRUE);
                $this->users_m->edit($post);
                if($this->db->affected_rows() >0){
                    echo "<script>alert('data berhasil disimpan');
                    window.location='".site_url('user')."'
                    </script>";
                }else{
                    echo "<script>
                    window.location='".site_url('user')."'
                    </script>";
                }
            }
    }
    function username_check(){
        $post = $this->input->post(null,TRUE);
        $query = $this->db->query("select * from pegawai where username = '$post[username]' and nip != '$post[nip]' ");
        if($query->num_rows()>0){
        $this->form_validation->set_message('username_check', '{field} ini sudah dipakai, silahkan diganti');
        return FALSE;
        }else{
            return TRUE;
        }
    }
	public function del(){
		$id= $this->input->post('id');
		$this->users_m->del($id);

		 if($this->db->affected_rows() >0){
                    echo "<script>alert('data berhasil dihapus');
                    window.location='".site_url('user')."'
                    </script>";
                }
	}

}
