<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		check_already_login();
		$this->load->view('login');
	}
	public function process()
	{
		$post = $this->input->post(null,TRUE);
		if(isset($post['login'])){
			$userpass = $post['password'];
			$this->load->model('users_m');
			$query = $this->users_m->login($post);
			if ($query->num_rows()>0) {
				$row = $query->row();
				$pas = $row->password;
				
				$params = array(
					'id_admin' => $row->id_admin,
					'level' => $row->level	
				);
				$this->session->set_userdata($params);
				echo "<script>
					alert('Selamat Login Berhasil');
					window.location='".site_url('dashboard')."'
				</script>";
			
			}else{
				echo "<script>
					alert('Username/Password Salah');
					window.location='".site_url('auth/login')."'
				</script>";
			}
		}
	}
	public function logout()
	{
		$params = array('id_admin','level');
		$this->session->unset_userdata($params);
		redirect('auth/login');
	}
}
