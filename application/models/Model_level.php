<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_level extends CI_Model {

    public function get_level()
	{
		return $this->db->get('level')->result();
	}

}

/* End of file Model_level.php */
