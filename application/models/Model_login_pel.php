<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login_pel extends CI_Model {

    public function mengecek()
        {
            return $this->db->where('username', $this->input->post('username'))
                        ->where('password', $this->input->post('password'))
                        ->get('pelanggan');
        }

}

/* End of file Model_login_pel.php */
