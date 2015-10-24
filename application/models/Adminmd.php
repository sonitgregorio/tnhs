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
		function insert_class($data)
		{
			$this->db->insert('tbl_yearsection',$data);
		}
		function delete_class($id)
		{
			$this->db->where('id', $id);
        	$this->db->delete('tbl_yearsection');
		}

		//subject
		function get_subject()
		{
			return $this->db->get('tbl_subject')->result_array();
		}
		function insert_subject($data)
		{
			$this->db->insert('tbl_subject',$data);
		}
		function delete_subject($id)
		{
			$this->db->where('id', $id);
        	$this->db->delete('tbl_subject');
		}
		function get_subject_by_id($id)
		{
			 $this->db->where('id', $id);
      		$x = $this->db->get('tbl_subject')->row_array();
		}

	}