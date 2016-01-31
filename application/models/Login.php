<?php 
/**
* 
*/
class Login extends CI_Model
{
	function checkUser($username, $pw)
	{
		return $this->db->query("SELECT tbl_users.*, tbl_party.*, tbl_party.id as uid FROM tbl_users, tbl_party
						  WHERE tbl_users.party = tbl_party.id 
						  AND tbl_users.username = '$username'
						  AND tbl_users.password = '$pw'")->row_array();

	}
	public function getinfo()
	{
		$x = $this->session->userdata('uid');
		$this->db->where('tbl_party.id', $x);
		$this->db->where('tbl_users.party = tbl_party.id');
		return $this->db->get('tbl_party, tbl_users')->row_array();
	}
	function update_data($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_party', $data);
	}

}

 ?>