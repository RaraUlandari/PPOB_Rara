<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_tarif extends CI_Model {

    public function get_tarif()
    {
        return $this->db->get('tarif')->result();
    }

    public function sukses()
	{
		$data_tarif=array(
			'daya'=>$this->input->post('daya'),
			'tarifperkwh'=>$this->input->post('tarifperkwh')
		);
		return $sql_sukses=$this->db->insert('tarif',$data_tarif);
	}

	public function detailnya($id_tarif)
	{
		return $this->db->where('id_tarif',$id_tarif)->get('tarif')->row();
	}

	public function updatenya()
	{
		$update_tarif=array(
			'daya'=>$this->input->post('daya'),
			'tarifperkwh'=>$this->input->post('tarifperkwh')
		);
		return $sql_update=$this->db->where('id_tarif',$this->input->post('id_tarif'))->update('tarif',$update_tarif);
	}

	public function hapusnya($id_tarif)
	{
		return $this->db->where('id_tarif',$id_tarif)->delete('tarif');
	}
}

/* End of file Model_tarif.php */
