<?php

	/**
	* 
	*/
	class Facultymd extends CI_Model
	{
		
		function select_data($id)
		{
			return $this->db->query("SELECT a.gender, a.dob, a.civil,  a.idno, a.firstname, a.middlename, a.lastname, a.id as sid, a.address, b.id as section, c.username, c.password
									 FROM tbl_party a, tbl_yearsection b, tbl_users c WHERE a.id = '$id' AND a.usertype = 2 AND b.id = a.year_section AND a.id = c.party ")->row_array();
			
		}
	
	}