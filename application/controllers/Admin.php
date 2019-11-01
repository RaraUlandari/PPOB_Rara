<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
    {
        $data['konten']='v_admin';
        $this->load->model('Model_admin','admin');
        $data['data_admin']=$this->admin->get_admin();
        $this->load->model('Model_level','level');
        $data['data_level']=$this->level->get_level();
        $this->load->view('template', $data);
    }

    public function create()
    {
        $this->form_validation->set_rules('nama_admin', 'Nama admin', 'trim|required',
		array('required' => 'nama admin harus diisi'));
		$this->form_validation->set_rules('username', 'Username', 'trim|required',
		array('required' => 'Username harus diisi'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required',
		array('required' => 'Password harus diisi'));
		$this->form_validation->set_rules('id_level', 'Nama Level', 'trim|required',
		array('required' => 'Nama level harus diisi'));


		if ($this->form_validation->run() == TRUE) {
			$this->load->model('Model_admin','admin');
			$masuk=$this->admin->sukses();
			if($masuk==true){
				$this->session->set_flashdata('pesan', 'sukses simpan');
			} else {
				//$this->session->set_flashdata('pesan', 'gagal masuk');
			}
			redirect(base_url('index.php/admin'),'refresh');
		} else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/admin'),'refresh');

		}
    }

    public function get_detail($id_admin='')
    {
        $this->load->model('Model_admin','admin');
        $detail=$this->admin->detailnya($id_admin);
        echo json_encode ($detail);
    }

    public function update_admin()
    {
        $this->form_validation->set_rules('nama_admin', 'Nama admin', 'trim|required',array('required' => 'nama admin harus diisi'));
		$this->form_validation->set_rules('username', 'Username', 'trim|required',array('required' => 'Username harus diisi'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required',array('required' => 'Password harus diisi'));
        
        if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/admin'),'refresh');
		} else {
			$this->load->model('Model_admin','admin');
			$proses_update=$this->admin->updatenya();
			if($proses_update){
				$this->session->set_flashdata('pesan', 'sukses update');
			} else {
				$this->session->set_flashdata('pesan', 'gagal update');
			}
			redirect(base_url('index.php/admin'),'refresh');
		}
    }

    public function delete_admin($id_admin)
    {
        $this->load->model('Model_admin','admin');
		$hapus=$this->admin->hapusnya($id_admin);
		if($hapus){
			$this->session->set_flashdata('pesan', 'sukses hapus data');
			} else {
				$this->session->set_flashdata('pesan', 'gagal hapus data');
			}
			redirect(base_url('index.php/admin'),'refresh');
    }
}

/* End of file Admin.php */
