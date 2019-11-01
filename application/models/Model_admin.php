<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_admin extends CI_Model {

    public function get_admin()
	{
		return $this->db->join('level','level.id_level=admin.id_level')->get('admin')->result();
	}

	public function sukses()
	{
		$data_admin=array(
			'nama_admin'=>$this->input->post('nama_admin'),
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('password'),
			'id_level'=>$this->input->post('id_level')
		);
		return $sql_sukses=$this->db->insert('admin',$data_admin);
	}

	public function detailnya($id_admin)
	{
		return $this->db->where('id_admin',$id_admin)->get('admin')->row();
	}

	public function updatenya()
	{
		$update_admin=array(
			'nama_admin'=>$this->input->post('nama_admin'),
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('password')
		);
		return $sql_update=$this->db->where('id_admin',$this->input->post('id_admin'))->update('admin',$update_admin);
	}

	public function hapusnya($id_admin)
	{
		return $this->db->where('id_admin',$id_admin)->delete('admin');
	}
}

/* End of file Model_admin.php */
