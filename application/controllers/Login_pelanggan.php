<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_pelanggan extends CI_Controller {

    public function index()
	{
        $this->load->model('Model_tarif','tarif');
		$data['tarif']=$this->tarif->get_tarif();
		$this->load->view('v_login_pelanggan',$data);
	}

    public function cek_pelanggan()
    {
        $this->load->model('Model_login_pel','pelanggan');
        $login=$this->pelanggan->mengecek();
        if($login->num_rows()>0) {
            $dt_pelanggan=$login->row();
            $array = array(
                'id_pelanggan' => $dt_pelanggan->id_pelanggan,
                'nama_pelanggan' => $dt_pelanggan->nama_pelanggan,
                'username' => $dt_pelanggan->username,
                'password' => $dt_pelanggan->password,
				'login_pelanggan' => TRUE,
				'id_tarif' => $dt_pelanggan->id_tarif,
            );
            
            $this->session->set_userdata( $array );
            redirect(base_url('index.php/dashboard_pel'),'refresh');
        }
        else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Username dan password tidak cocok</div>');
			redirect(base_url('index.php/login_pelanggan'),'refresh');
        }
    }
    public function simpan()
    {
        $this->load->model('Model_login_pel','pelanggan');
        $cek_data=$this->pelanggan->tambah_pelanggan();
        if($cek_data) {
            $data['status']=1;
            $data['keterangan']="Anda sukses menambah data";
            echo json_encode($data);
        }
        else {
            $data['status']=0;
            $data['keterangan']="Anda gagal menambah data";
            echo json_encode($data);
        }
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('index.php/Login_pelanggan'),'refresh');
	}

}

/* End of file Login_pelanggan.php */
