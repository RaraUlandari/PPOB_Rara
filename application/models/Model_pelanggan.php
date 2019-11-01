<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pelanggan extends CI_Model {

    public function get_pelanggan()
    {
        return $this->db->join('tarif','tarif.id_tarif=pelanggan.id_tarif')->get('pelanggan')->result();
    }

}

/* End of file Model_pelanggan.php */
