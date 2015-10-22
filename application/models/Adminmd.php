<?php

	/**
	* 
	*/
	class Adminmd extends CI_Model
	{
		
		function get_year_section()
		{
			return $this->db->get('tbl_yearsection')->result_array();
					$this->db->group_by('user_id'); 

		}

	}