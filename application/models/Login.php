<?php 
/**
* 
*/
class Login extends CI_Model
{
	function checkUser($username, $pw){
		return $this->db->query("SELECT tbl_users.*, tbl_party.*, tbl_party.id as uid FROM tbl_users, tbl_party
						  WHERE tbl_users.party = tbl_party.id 
						  AND tbl_users.username = '$username'
						  AND tbl_users.password = '$pw'")->row_array();

	}

}

 ?>