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
		function select_data_to($id)
		{
			return $this->db->query("SELECT a.gender, a.dob, a.civil,  a.idno, a.firstname, a.middlename, a.lastname, a.id as sid, a.address, c.username, c.password
									 FROM tbl_party a, tbl_users c WHERE a.id = '$id' AND a.usertype = 2 AND a.id = c.party ")->row_array();
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
		function get_sub_byid($id)
		{
			$uid = $this->session->userdata('uid');
			return $this->db->query("SELECT tbl_subject.id, tbl_subject.subject_title 
									 FROM tbl_classes, tbl_subject WHERE uid = $uid 
									 AND subject = tbl_subject.id AND tbl_classes.section = '$id' 
									 GROUP by tbl_subject.id")->result_array();
		}
		function get_classes_byid()
		{
			$uid = $this->session->userdata('uid');
			return $this->db->query("SELECT a.section, concat(b.year, '-', b.section) sec, a.subject, a.section 
									 FROM tbl_classes a, tbl_yearsection b 
									 WHERE a.section = b.id AND uid = $uid GROUP by a.section")->result_array();

		}
		function get_classid($section, $subject)
		{
			$uid = $this->session->userdata('uid');
			$x = $this->db->query("SELECT id FROM tbl_classes WHERE section = '$section' AND subject = '$subject' AND uid = '$uid'")->row_array();
			return $x['id'];
		}
		function insert_ex($data)
		{
			$this->db->insert('tbl_exam', $data);
		}
		function get_quizes()
		{
			$uid = $this->session->userdata('uid');
			return $this->db->query("SELECT a.status, a.id, a.description, concat(c.year, '-', c.section) as sec, d.subject_title 
									 FROM tbl_exam a, tbl_classes b, tbl_yearsection c, tbl_subject d 
									 WHERE b.id = a.classid 
									 AND b.section = c.id 
									 AND b.subject = d.id
									 AND a.uid='$uid'")->result_array();
		}
		function insert_quest($data)
		{
			$this->db->insert('tbl_question', $data);
			return $this->db->insert_id();
		}
		function insert_all($choices, $answer)
		{
			$this->db->insert('tbl_choices', $choices);
			$this->db->insert('tbl_answers', $answer);
		}
		function get_all_question($id)
		{
			return $this->db->query("SELECT tbl_question.*, tbl_answers.answer 
									 FROM tbl_question, tbl_answers WHERE examid = $id 
									 AND tbl_answers.quest_id = tbl_question.id")->result_array();
		}
		function get_subject($id)
		{
			return $this->db->query("SELECT tbl_classes.id as classid,tbl_subject.subject_code,tbl_subject.subject_title,tbl_classes.section, concat(tbl_yearsection.year, ' ', tbl_yearsection.section) sec FROM tbl_party,tbl_subject,tbl_classes, tbl_yearsection WHERE tbl_party.id=tbl_classes.uid AND tbl_subject.id=tbl_classes.subject AND tbl_party.id='$id' AND tbl_yearsection.id = tbl_classes.section")->result_array();
		}
		function get_exam($id)
		{
			return $this->db->query("SELECT tbl_exam.id,tbl_exam.description FROM tbl_classes,tbl_exam WHERE tbl_exam.classid='$id' AND tbl_classes.id='$id'")->result_array();
		}
		function get_scores($id)
		{
			return $this->db->query("SELECT * FROM tbl_scores,tbl_exam,tbl_party WHERE tbl_scores.examid='$id' AND tbl_exam.id='$id' AND tbl_scores.uid=tbl_party.id")->result_array();
		}
		function select_sum_scores($id)
		{
			return $this->db->query("SELECT SUM(points) as points FROM tbl_question WHERE examid='$id'")->row_array();
		}
		function get_examid($classid)
		{
			return $this->db->query("SELECT sum(points) as p, CONCAT(tbl_party.firstname, ' ', tbl_party.middlename, ' ', tbl_party.lastname) as fname
									FROM tbl_scores,tbl_exam,tbl_party 
									WHERE tbl_scores.examid = tbl_exam.id 
									AND tbl_scores.uid=tbl_party.id 
									AND tbl_exam.classid = $classid
									GROUP by tbl_scores.uid
									ORDER by p DESC")->result_array();
		}
		function up_exam($data, $examid)
		{
			$this->db->where('id', $examid);
			$this->db->update('tbl_exam', $data);

			$this->db->where('id', $examid);
			$this->db->select('classid');
			$x = $this->db->get('tbl_exam')->row_array();
			return $x['classid'];

		}
		function get_students($classid)
		{
			$this->db->where('classid', $classid);
			$this->db->select('partyid');
			return $this->db->get('tbl_student')->result_array();
		}
		function insert_to_stud($data, $examid, $uid)
		{
			$this->db->where('examid', $examid);
			$this->db->where('uid', $uid);
			$x = $this->db->get('tbl_stud_exam')->num_rows();
			//Checking if exist in tbl_stud_exam.. if exist. update else insert
			if ($x > 0) {
				$this->db->where('uid', $uid);
				$this->db->where('examid', $examid);
				$this->db->update('tbl_stud_exam', $data);
			}
			else{
				$this->db->insert('tbl_stud_exam', $data);
			}
		}
		function deactivate($id)
		{
			$this->db->where('id', $id);
			$this->db->update('tbl_exam', array('status' => 0));

			$this->db->where('examid', $id);
			$this->db->update('tbl_stud_exam', array('status' => 0));
		}
		function getstudents($id)
		{
			return $this->db->query("SELECT a.status, b.idno, concat(b.firstname, ' ' , b.middlename, ' ' ,b.lastname) as names, b.id, a.examid 
							  FROM tbl_stud_exam a, tbl_party b 
							  WHERE a.examid = $id and a.uid = b.id")->result_array();
		}
	} 