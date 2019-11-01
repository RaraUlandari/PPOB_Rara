<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends CI_Controller {

    public function index()
    {
        $data['konten']='v_level';
        $this->load->model('Model_level','level');
        $data['data_level']=$this->level->get_level();
        $this->load->view('template', $data);
    }

    public function create()
    {
        # code...
    }

}

/* End of file Level.php */
