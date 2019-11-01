<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tarif extends CI_Controller {

    public function index()
    {
        $data['konten']='v_tarif';
        $this->load->model('Model_tarif','tarif');
        $data['data_tarif']=$this->tarif->get_tarif();
        $this->load->view('template', $data);
    }

    public function create_tarif()
    {
        $this->form_validation->set_rules('daya', 'daya', 'trim|required',
		array('required' => 'daya harus diisi'));
		$this->form_validation->set_rules('tarifperkwh', 'tarifperkwh', 'trim|required',
		array('required' => 'tarifperkwh harus diisi'));


		if ($this->form_validation->run() == TRUE) {
			$this->load->model('Model_tarif','tarif');
			$masuk=$this->tarif->sukses();
			if($masuk==true){
				$this->session->set_flashdata('pesan', 'sukses simpan');
			} else {
				//$this->session->set_flashdata('pesan', 'gagal masuk');
			}
			redirect(base_url('index.php/tarif'),'refresh');
		} else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/tarif'),'refresh');

		}
    }

    public function get_detail($id_tarif='')
    {
        $this->load->model('Model_tarif','tarif');
        $detail=$this->tarif->detailnya($id_tarif);
        echo json_encode ($detail);
    }

    public function update_tarif()
    {
        $this->form_validation->set_rules('daya', 'daya', 'trim|required',array('required' => 'daya harus diisi'));
		$this->form_validation->set_rules('tarifperkwh', 'tarifperkwh', 'trim|required',array('required' => 'tarifperkwh harus diisi'));
		
        if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/tarif'),'refresh');
		} else {
			$this->load->model('Model_tarif','tarif');
			$proses_update=$this->tarif->updatenya();
			if($proses_update){
				$this->session->set_flashdata('pesan', 'sukses update');
			} else {
				$this->session->set_flashdata('pesan', 'gagal update');
			}
			redirect(base_url('index.php/tarif'),'refresh');
		}
    }

    public function delete_tarif($id_tarif)
    {
        $this->load->model('Model_tarif','tarif');
		$hapus=$this->tarif->hapusnya($id_tarif);
		if($hapus){
			$this->session->set_flashdata('pesan', 'sukses hapus data');
			} else {
				$this->session->set_flashdata('pesan', 'gagal hapus data');
			}
			redirect(base_url('index.php/tarif'),'refresh');
    }
}
