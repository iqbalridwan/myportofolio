<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventaris extends CI_Controller {
	function __construct(){
		parent::__construct();
		check_not_login();
        $this->load->model('cabang_m');
        $this->load->model('inventaris_m');
        $this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->inventaris_m->get();
		$this->template->load('template','inventaris/inventaris_data',$data);
	}
	public function add()
	{
        check_admin();
        $config['upload_path']          = './uploads/inven/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = 'inven-'.date('ymd').'-'.substr(md5(rand()),0,10);
		 $this->form_validation->set_rules('barcode', 'Barcode', 'required|is_unique[inventaris.barcode]');
		 $this->form_validation->set_rules('nama', 'Nama', 'required');
         $this->form_validation->set_rules('status', 'Status', 'required');
         $this->form_validation->set_message('required', '%s Harus diisi!');
         $this->form_validation->set_message('matches', '%s tidak sama');
         $this->form_validation->set_message('is_unique', '%s sudah digunakan');
         $this->form_validation->set_error_delimiters('<span style="color:red">','</span>');
          if ($this->form_validation->run() == FALSE)
            {
				$this->template->load('template','inventaris/inventaris_form_add');
            }
            else
            {
                $post = $this->input->post(null,TRUE);
                $this->load->library('upload', $config);
                if(@$_FILES['image']['name'] != null){
                    if ($this->upload->do_upload('image')){
                        $post['image'] = $this->upload->data('file_name');
                        $this->inventaris_m->add($post);
                        if($this->db->affected_rows() >0){
                            echo "<script>alert('data berhasil disimpan');
                            window.location='".site_url('inventaris')."'
                            </script>";
                        }
                    }else{
                        $error = $this->upload->display_errors();
                        echo "<script>alert($error);
                        window.location='".site_url('inventaris/add')."'
                        </script>";
                    }
                }else{
                    $post['image'] = null;
                        $this->inventaris_m->add($post);
                        if($this->db->affected_rows() >0){
                            echo "<script>alert('data berhasil disimpan');
                            window.location='".site_url('inventaris')."'
                            </script>";
                        }
                }

            }
	}
    public function edit($id)
    {
         check_admin();
         $config['upload_path']          = './uploads/inven/';
         $config['allowed_types']        = 'gif|jpg|png|jpeg';
         $config['file_name']            = 'inven-'.date('ymd').'-'.substr(md5(rand()),0,10);
         $this->form_validation->set_rules('nama', 'Nama', 'required');
         $this->form_validation->set_rules('status', 'Status', 'required');
         $this->form_validation->set_message('required', '%s Harus diisi!');
         $this->form_validation->set_message('is_unique', '%s sudah digunakan');
         $this->form_validation->set_error_delimiters('<span style="color:red">','</span>');
          if ($this->form_validation->run() == FALSE)
            {
                $query = $this->inventaris_m->get($id);

                if($query->num_rows() > 0){
                    $data['row'] = $query;
                    $data['cbg'] = $this->cabang_m->get();
                    $this->template->load('template','inventaris/inventaris_form_edit', $data);
                }else{
                    echo "<script>alert('data tidak ditemukan')</script>";
                    redirect('inventaris');
                }
            }
            else
            {
                $post = $this->input->post(null,TRUE);
                $this->load->library('upload', $config);
                if(@$_FILES['image']['name'] != null){
                    if ($this->upload->do_upload('image')){
                        $inv = $this->inventaris_m->get($post['barcode'])->row();
                        if($inv->image != null){
                            $target_file = './uploads/inven/'.$inv->image;
                            unlink($target_file);
                        }
                        $post['image'] = $this->upload->data('file_name');
                        $this->inventaris_m->edit($post);
                        if($this->db->affected_rows() >0){
                            echo "<script>alert('data berhasil disimpan');
                            window.location='".site_url('inventaris')."'
                            </script>";
                        }
                    }else{
                        $error = $this->upload->display_errors();
                        echo "<script>alert($error);
                        window.location='".site_url('inventaris/add')."'
                        </script>";
                    }
                }else{
                    $post['image'] = null;
                        $this->inventaris_m->edit($post);
                        if($this->db->affected_rows() >0){
                            echo "<script>alert('data berhasil disimpan');
                            window.location='".site_url('inventaris')."'
                            </script>";
                        }else{
                            echo "<script>
                            window.location='".site_url('inventaris')."'
                            </script>";
                        }
                }
            }
    }
	public function del(){
		check_admin();
        $id= $this->input->post('barcode');
        $inv = $this->inventaris_m->get($id)->row();
                        if($inv->image != null){
                            $target_file = './uploads/inven/'.$inv->image;
                            unlink($target_file);
                        }
		$this->inventaris_m->del($id);

		 if($this->db->affected_rows() >0){
                    echo "<script>alert('data berhasil dihapus');
                    window.location='".site_url('inventaris')."'
                    </script>";
                }
	}
}
