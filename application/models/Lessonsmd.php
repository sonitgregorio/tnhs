<?php
	/**
	* 
	*/
	class Lessonsmd extends CI_Model
	{
		function get_subject()
		{
			$uid = $this->session->userdata('uid');
			return $this->db->query("SELECT b.id, b.subject_title FROM tbl_classes a, tbl_subject b WHERE a.subject = b.id AND uid = $uid group by subject")->result_array();
		}
		function get_lessons()
		{
			$uid = $this->session->userdata('uid');
			return $this->db->query("SELECT a.*, b.subject_title  FROM `tbl_lessons` a, tbl_subject b WHERE uid = $uid AND a.subjectid = b.id")->result_array();
		}
		
	}