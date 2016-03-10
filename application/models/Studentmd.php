<?php

	/**
	* 
	*/
	class Studentmd extends CI_Model
	{
		
		function get_section()
		{
			return $this->db->get('tbl_yearsection')->result_array();
		}
		function insert_student($party)
		{
			$this->db->insert('tbl_party', $party);
			return $this->db->insert_id();
		}
		function insert_users($users)
		{
			$this->db->insert('tbl_users', $users);
		}
		function get_stud()
		{
			return $this->db->query("SELECT a.idno, a.firstname, a.middlename, a.lastname, a.id, a.address, concat(b.year, '-', b.section) as section
									 FROM tbl_party a, tbl_yearsection b WHERE a.usertype = 3 AND b.id = a.year_section")->result_array();

		}
		function delete_stud($id)
		{
			$this->db->where('id', $id);
			$this->db->delete('tbl_party');
		}
		function select_data($id)
		{
			return $this->db->query("SELECT a.gender, a.dob, a.civil,  a.idno, a.firstname, a.middlename, a.lastname, a.id as sid, a.address, b.id as section, c.username, c.password
									 FROM tbl_party a, tbl_yearsection b, tbl_users c WHERE a.id = '$id' AND a.usertype = 3 AND b.id = a.year_section AND a.id = c.party ")->row_array();
			// $this->db->where('id', $id);
			// return $this->db->get('tbl_party')->row_array();
		}
		function update_student($id, $party)
		{
			$this->db->where('id', $id);
			$this->db->update('tbl_party', $party);
		}
		function get_last()
		{
			$x = $this->db->query("SELECT id FROM tbl_party ORDER by id DESC LIMIT 1")->row_array();
			return $x['id'];
		}
		function get_faculty()
		{
			return $this->db->query("SELECT a.idno, a.firstname, a.middlename, a.lastname, a.id, a.address
									 FROM tbl_party a WHERE a.usertype = 2")->result_array();
		}
		function get_kung_mayada_exam($id)
		{
			return $this->db->query("SELECT a.date_deactivation, a.status, a.examid, e.description, b.subject_title, concat(c.year, ' - ', c.section) as sec, a.status, a.date_activation, a.date_deactivation, a.time_start, a.time_end   
									 FROM `tbl_stud_exam` a, tbl_subject b, tbl_yearsection c, tbl_classes d, tbl_exam e  
									 WHERE a.uid = $id
									 AND a.examid = e.id 
									 AND e.classid = d.id
									 AND d.section = c.id
									 AND b.id = d.subject")->result_array();
		}
		function get_take_exam($id)
		{
			return $this->db->query("SELECT tbl_question.id,tbl_question.question,tbl_answers.answer,tbl_choices.choice1,tbl_choices.choice2,tbl_choices.choice3 FROM tbl_exam,tbl_question,tbl_choices,tbl_answers WHERE tbl_exam.id=tbl_question.examid AND tbl_choices.quest_id=tbl_question.id AND tbl_question.id=tbl_answers.quest_id AND tbl_exam.id=$id")->result_array();
		}
		function checked($id)
		{
			return $this->db->query("SELECT sum(points) FROM tbl_sa,tbl_answers,tbl_question WHERE tbl_sa.answer=tbl_answers.answer AND tbl_sa.partyid='$id'  AND tbl_question.id=tbl_sa.quest_id AND tbl_question.examid='$id1'")->result_array();
		}
		function get_myclass() 
		{
			$uid = $this->session->userdata('uid');
			return $this->db->query("SELECT b.id, concat(c.firstname, ' ', c.middlename) instructor, d.subject_title  FROM tbl_student a, tbl_classes b, tbl_party c, tbl_subject d WHERE a.classid = b.id AND a.partyid = $uid AND b.uid = c.id AND d.id = b.subject")->result_array();
		}
		function get_my_lessons($id)
		{
			return $this->db->query("SELECT b.* FROM tbl_classes a, tbl_lessons b WHERE a.id = $id AND a.uid = b.uid AND a.subject = b.subjectid")->result_array();
		}
		function get_exam_result($id)
		{
			return $this->db->query("SELECT * FROM `tbl_sa`, tbl_answers, tbl_question 
									 WHERE tbl_answers.quest_id = tbl_sa.quest_id 
									 AND tbl_answers.answer = tbl_sa.answer 
									 AND tbl_question.examid = $id 
									 AND tbl_question.id = tbl_answers.quest_id 
									 AND tbl_sa.quest_id = tbl_question.id")->result_array();
		}
		function get_all_points($id)
		{
			$x = $this->db->query("SELECT SUM(points) as p FROM tbl_question WHERE examid = '$id'")->row_array();
			return $x['p'];
		}
		function get_gradebook($id)
		{
			return $this->db->query("SELECT tbl_exam.id as ex, tbl_scores.points,tbl_exam.passing,tbl_subject.subject_title FROM tbl_scores,tbl_exam,tbl_classes,tbl_subject WHERE tbl_exam.id=tbl_scores.examid AND tbl_scores.uid=$id AND tbl_exam.status=1 AND tbl_classes.subject=tbl_subject.id AND tbl_exam.classid=tbl_classes.id")->result_array();
		}
		function get_date_time($examid, $party)
		{
			return $this->db->query("SELECT date_taken, time_taken FROM tbl_stud_exam WHERE examid = $examid AND uid = $party")->row_array();
		}
		function insert_logs($activity)
	    {
			date_default_timezone_set('Asia/Manila');
	    	
	        $time = date('h:i:s');
	        $date = date('Y-m-d');
	        $name = $this->session->userdata('names');
	        $data = array('names' => $name, 'activity' => $activity, 'date_log' => $date, 'time_log' => $time);

	        $this->db->insert('tbl_logs', $data);
	    }
	}