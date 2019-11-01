<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_pel extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login_pelanggan')!=true){
			redirect(base_url('index.php/login_pelanggan'),'refresh');
		}
    }
    
    public function index()
    {
        $data['konten'] = 'dashboard_pelanggan';
        $this->load->view('template_pelanggan',$data);
    }

}

/* End of file Controllername.php */
