<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    public function index()
    {
        $data['konten']='v_pelanggan';
        $this->load->model('Model_pelanggan','pelanggan');
        $data['data_pelanggan']=$this->pelanggan->get_pelanggan();
        $this->load->view('template', $data);
    }

}

/* End of file Pelanggan.php */
