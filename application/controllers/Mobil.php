<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil extends CI_Controller {
	function __construct(){
		parent::__construct();
		check_not_login();
        $this->load->model('mobil_m');
        $this->load->model('cabang_m');
        $this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->mobil_m->get();
		$this->template->load('template','mobil/mobil_data',$data);
	}
	public function add()
	{
        check_admin();
        $config['upload_path']          = './uploads/mobil/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = 'mobil-'.date('ymd').'-'.substr(md5(rand()),0,10);
		 $this->form_validation->set_rules('barecode', 'Barecode', 'required|is_unique[mobil.barcode]');
		 $this->form_validation->set_rules('nama_barang', 'Nama_barang', 'required');
         $this->form_validation->set_rules('tgl_perolehan', 'Tgl_perolehan', 'required');
         $this->form_validation->set_rules('nomor_asuransi', 'Nomor_asuransi', 'required');
         $this->form_validation->set_rules('nomor_polisi', 'Nomor_polisi', 'required');
         $this->form_validation->set_rules('status', 'Status', 'required');
         $this->form_validation->set_rules('masa_asuransi', 'Masa_asuransi', 'required');
         $this->form_validation->set_rules('masa_pajak', 'masa_pajak', 'required');
         $this->form_validation->set_rules('masa_service', 'masa_service', 'required');
         $this->form_validation->set_message('required', '%s Harus diisi!');
         $this->form_validation->set_message('matches', '%s tidak sama');
         $this->form_validation->set_message('is_unique', '%s sudah digunakan');
         $this->form_validation->set_error_delimiters('<span style="color:red">','</span>');
          if ($this->form_validation->run() == FALSE)
            {
				$this->template->load('template','mobil/mobil_form_add');
            }
            else
            {
                $post = $this->input->post(null,TRUE);
                $this->load->library('upload', $config);
                if(@$_FILES['image']['name'] != null){
                    if ($this->upload->do_upload('image')){
                        $post['image'] = $this->upload->data('file_name');
                        $this->mobil_m->add($post);
                        if($this->db->affected_rows() >0){
                            echo "<script>alert('data berhasil disimpan');
                            window.location='".site_url('mobil')."'
                            </script>";
                        }
                    }else{
                        $error = $this->upload->display_errors();
                        echo "<script>alert($error);
                        window.location='".site_url('mobil/add')."'
                        </script>";
                    }
                }else{
                    $post['image'] = null;
                        $this->mobil_m->add($post);
                        if($this->db->affected_rows() >0){
                            echo "<script>alert('data berhasil disimpan');
                            window.location='".site_url('mobil')."'
                            </script>";
                        }
                }

            }
	}
    public function edit($id)
    {
         check_admin();
         $config['upload_path']          = './uploads/mobil/';
         $config['allowed_types']        = 'gif|jpg|png|jpeg';
         $config['file_name']            = 'mobil-'.date('ymd').'-'.substr(md5(rand()),0,10);
         $this->form_validation->set_rules('nama_barang', 'Nama_barang', 'required');
         $this->form_validation->set_rules('tgl_perolehan', 'Tgl_perolehan', 'required');
         $this->form_validation->set_rules('nomor_asuransi', 'Nomor_asuransi', 'required');
         $this->form_validation->set_rules('nomor_polisi', 'Nomor_polisi', 'required');
         $this->form_validation->set_rules('status', 'Status', 'required');
         $this->form_validation->set_rules('masa_asuransi', 'Masa_asuransi', 'required');
         $this->form_validation->set_rules('masa_pajak', 'masa_pajak', 'required');
         $this->form_validation->set_message('required', '%s Harus diisi!');
         $this->form_validation->set_message('matches', '%s tidak sama');
         $this->form_validation->set_message('is_unique', '%s sudah digunakan');
         $this->form_validation->set_error_delimiters('<span style="color:red">','</span>');
          if ($this->form_validation->run() == FALSE)
            {
                $query = $this->mobil_m->get($id);

                if($query->num_rows() > 0){
                    $data['row'] = $query;
                    $data['cbg'] = $this->cabang_m->get();
                    $this->template->load('template','mobil/mobil_form_edit', $data);
                }else{
                    echo "<script>alert('data tidak ditemukan')</script>";
                    redirect('mobil');
                }
            }
            else
            {
                $post = $this->input->post(null,TRUE);
                $this->load->library('upload', $config);
                if(@$_FILES['image']['name'] != null){
                    if ($this->upload->do_upload('image')){
                        $car = $this->mobil_m->get($post['barcode'])->row();
                        if($car->image != null){
                            $target_file = './uploads/mobil/'.$car->image;
                            unlink($target_file);
                        }
                        $post['image'] = $this->upload->data('file_name');
                        $this->mobil_m->edit($post);
                        if($this->db->affected_rows() >0){
                            echo "<script>alert('data berhasil disimpan');
                            window.location='".site_url('mobil')."'
                            </script>";
                        }
                    }else{
                        $error = $this->upload->display_errors();
                        echo "<script>alert($error);
                        window.location='".site_url('mobil/add')."'
                        </script>";
                    }
                }else{
                    $post['image'] = null;
                        $this->mobil_m->edit($post);
                        if($this->db->affected_rows() >0){
                            echo "<script>alert('data berhasil disimpan');
                            window.location='".site_url('mobil')."'
                            </script>";
                        }else{
                            echo "<script>
                            window.location='".site_url('mobil')."'
                            </script>";
                        }
                }
            }
    }
	public function del(){
        check_admin();
        $id= $this->input->post('barcode');
        $car = $this->mobil_m->get($id)->row();
        if($car->image != null){
            $target_file = './uploads/mobil/'.$car->image;
            unlink($target_file);
        }
		$this->mobil_m->del($id);
		 if($this->db->affected_rows() >0){
                    echo "<script>alert('data berhasil dihapus');
                    window.location='".site_url('mobil')."'
                    </script>";
                }

	}
    public function pajak()
    {
        check_admin();
        $data['row'] = $this->mobil_m->getPajak();
        $this->template->load('template','mobil/mobil_pajak',$data);
    }
    public function service()
    {
        check_admin();
        $data['row'] = $this->mobil_m->getService();
        $this->template->load('template','mobil/mobil_service',$data);
    }
        public function editpajak($id)
    {
         check_admin();
         $this->form_validation->set_rules('masa_pajak', 'masa_pajak', 'required');
         $this->form_validation->set_message('required', '%s Harus diisi!');

         $this->form_validation->set_error_delimiters('<span style="color:red">','</span>');
          if ($this->form_validation->run() == FALSE)
            {
                $query = $this->mobil_m->get($id);

                if($query->num_rows() > 0){
                    $data['row'] = $query;
                    $this->template->load('template','mobil/mobil_form_edit_pajak', $data);
                }else{
                    echo "<script>alert('data tidak ditemukan')</script>";
                    redirect('mobil');
                }
            }
            else
            {
                $post = $this->input->post(null,TRUE);
                $this->mobil_m->editpajak($post);
                if($this->db->affected_rows() >0){
                    echo "<script>alert('data berhasil disimpan');
                    window.location='".site_url('mobil/pajak')."'
                    </script>";
                }else{
                    echo "<script>
                    window.location='".site_url('mobil/pajak')."'
                    </script>";
                }
            }
    }
 public function editservice($id)
    {
         check_admin();
         $this->form_validation->set_rules('masa_service', 'masa_service', 'required');
         $this->form_validation->set_message('required', '%s Harus diisi!');

         $this->form_validation->set_error_delimiters('<span style="color:red">','</span>');
          if ($this->form_validation->run() == FALSE)
            {
                $query = $this->mobil_m->get($id);

                if($query->num_rows() > 0){
                    $data['row'] = $query;
                    $this->template->load('template','mobil/mobil_form_edit_service', $data);
                }else{
                    echo "<script>alert('data tidak ditemukan')</script>";
                    redirect('mobil');
                }
            }
            else
            {
                $post = $this->input->post(null,TRUE);
                $this->mobil_m->editservice($post);
                if($this->db->affected_rows() >0){
                    echo "<script>alert('data berhasil disimpan');
                    window.location='".site_url('mobil/service')."'
                    </script>";
                }else{
                    echo "<script>
                    window.location='".site_url('mobil/service')."'
                    </script>";
                }
            }
    }
}
