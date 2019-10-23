<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('v_login_admin');
    }
    
	public function cek_login()
	{
		$this->load->model('Model_login','log_user');
		if ($this->session->userdata('login_user') == false) 
		{
			$this->form_validation->set_rules('username','username','trim|required',array('required'=>'username harus diisi !'));
			$this->form_validation->set_rules('password','password','trim|required',array('required'=>'password harus diisi !'));

			if ($this->form_validation->run() == true) 
			{
				if ($this->log_user->cek_user() == true) 
				{
					redirect('Dashboard','refresh');
				}
				else
				{
					$this->session->set_flashdata('pesan','Login Gagal');
					redirect('Login','refresh');
				}
			} 
			else 
			{
				$this->session->set_flashdata('pesan', validation_errors());
				redirect('Login','refresh');
			}
		}
		else
		{
			redirect('Dashboard','refresh');
		}
    }
    
    public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('index.php/Login'),'refresh');
	}
}

/* End of file Login.php */
