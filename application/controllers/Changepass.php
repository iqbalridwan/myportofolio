<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changepass extends CI_Controller {
	function __construct(){
		parent::__construct();
		check_not_login();
		$this->load->model('users_m');
    $this->load->library('form_validation');
	}

	public function index()
	{
    $this->form_validation->set_rules('passwordlama', 'Passwordlama', 'min_length[3]|callback_password_check');
    $this->form_validation->set_rules('passwordbaru', 'Passwordlama', 'min_length[3]|required');
    $this->form_validation->set_rules('passconf', 'Konfirmasi password', 'matches[passwordbaru]|required');
    $this->form_validation->set_message('matches', '%s tidak sama');
    $this->form_validation->set_message('required', '%s Harus diisi!');
    $this->form_validation->set_error_delimiters('<span style="color:red">','</span>');
    if ($this->form_validation->run() == FALSE)
        {
             $this->template->load('template','user/user_ganti_pass');
        }
        else{
            $post = $this->input->post(null,TRUE);
                $this->users_m->gantipass($post);
                if($this->db->affected_rows() >0){
                    echo "<script>alert('data berhasil disimpan');
                    window.location='".site_url('auth/logout')."'
                    </script>";
                }
        }
	}

  function password_check(){
        $post = $this->input->post(null,TRUE);
        $pass = $this->fungsi->user_login()->password;
        $userpass = $post['passwordlama'];
        if ($pass == $userpass){
            return TRUE;
        }else{
        $this->form_validation->set_message('password_check', '{field} salah silahkan check kembali');
        return FALSE;
        }
    }
}
