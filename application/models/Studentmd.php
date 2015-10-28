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
			return $this->db->query("SELECT a.id,a.status,a.description,d.subject_title, concat(f.year, '-', f.section) sec FROM tbl_exam a, tbl_classes b,tbl_student c, tbl_subject d, tbl_party e, tbl_yearsection f WHERE a.classid =b.id AND c.classid=b.id AND b.subject =d.id AND e.year_section =f.id AND c.partyid= e.id AND e.id='$id'")->result_array();
		}
		function get_take_exam($id)
		{
			return $this->db->query("SELECT tbl_question.id,tbl_question.question,tbl_answers.answer,tbl_choices.choice1,tbl_choices.choice2,tbl_choices.choice3 FROM tbl_exam,tbl_question,tbl_choices,tbl_answers WHERE tbl_exam.id=tbl_question.examid AND tbl_choices.quest_id=tbl_question.id AND tbl_question.id=tbl_answers.quest_id AND tbl_exam.id=$id")->result_array();
		}
		function checked($id)
		{
			return $this->db->query("SELECT sum(points) FROM tbl_sa,tbl_answers,tbl_question WHERE tbl_sa.answer=tbl_answers.answer AND tbl_sa.partyid='$id'  AND tbl_question.id=tbl_sa.quest_id AND tbl_question.examid='$id1'")->result_array();
		}
	}