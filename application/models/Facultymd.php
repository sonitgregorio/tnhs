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

		function selectsubjects()
		{
			return $this->db->query("SELECT * FROM tbl_subject")->result_array();
		}

		function selectsections()
		{
			return $this->db->query("SELECT * FROM tbl_yearsection")->result_array();
		}

		function addclass($newclass)
		{
			$this->db->insert('tbl_classes', $newclass);
			return $this->db->insert_id();
		}

		function selectclasses($uid)
		{
			return $this->db->query("SELECT
									 tbl_subject.subject_code,
									 tbl_subject.subject_title,
									 tbl_subject.subject_code,
									 tbl_classes.id,
									 tbl_classes.schoolyear,
									 tbl_year.sch_yr as yr,
									 concat(tbl_yearsection.year, '-', tbl_yearsection.section) as yearsec
									 FROM tbl_subject, tbl_yearsection, tbl_classes, tbl_year 
									 WHERE tbl_classes.uid = $uid 
									 AND tbl_classes.subject = tbl_subject.id 
									 AND tbl_classes.Section = tbl_yearsection.id
									 AND tbl_year.id = tbl_classes.schoolyear")->result_array();
		}
		function get_sch_year()
		{
			return $this->db->get('tbl_year')->result_array();
		}
		function get_all_student($id)
		{
			$this->db->where('year_section', $id);
			$this->db->select('id');
			return $this->db->get('tbl_party')->result_array();
		}
		function insert_stud_class($data)
		{
			$this->db->insert('tbl_student', $data);
		}
		function get_all_classes($id)
		{
			$x = $this->db->query("SELECT a.id as studids, UPPER(concat(c.firstname, ' ', c.middlename, ' ', c.lastname)) studname, concat(d.year, '-', d.section) stud_sect  
								   FROM `tbl_student` a, tbl_classes b, tbl_party c, tbl_yearsection d 
								   WHERE a.classid = b.id
								   AND c.id = a.partyid 
								   AND c.year_section = d.id 
								   AND a.classid=$id")->result_array();
			return $x;
		}
		function get_stud_class($id)
		{
			return $this->db->query("SELECT *, tbl_party.id as studid FROM `tbl_party`, tbl_yearsection WHERE tbl_party.id not in(SELECT partyid from tbl_student WHERE classid = $id) 
									 AND usertype = 3  AND tbl_yearsection.id = tbl_party.year_section")->result_array();
		}
		function get_sub_byid()
		{
			$uid = $this->session->userdata('uid');
			return $this->db->query("SELECT tbl_subject.id, tbl_subject.subject_title 
									 FROM tbl_classes, tbl_subject WHERE uid = $uid AND subject = tbl_subject.id")->result_array();
		}
	}