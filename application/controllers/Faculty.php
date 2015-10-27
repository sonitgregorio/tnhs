<?php 

	/**
	* 
	*/
	class Faculty extends CI_Controller
	{
		function faildemessage()
	    {
	        return '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color:red"><span aria-hidden="true">&times;</span></button>';
	    }
	    function successMessage()
	    {
	        return'<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color:red"><span aria-hidden="true">&times;</span></button>';
	    }
		function view_faculty()
		{
			$data['param'] = 'faculty';
			$this->load->model('studentmd');
			$this->load->view('templates/header');
			// $this->load->view('templates/top');
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('faculty/view_faculty');
			$this->load->view('templates/footer');
		}
		function select_data()
		{
			$this->load->model('facultymd');
			$this->load->model('studentmd');
			$id = $this->input->post('x');
			$x = $this->facultymd->select_data($id);
			$this->load->view('faculty/register_faculty', $x);
			$this->load->view('templates/footer');	
		}
		function insert_faculty()
		{


			$this->load->model('studentmd');
			$lastinsert = $this->studentmd->get_last() + 1;
			$l = $lastinsert;
			$zero = '';
			$firstname = $this->input->post('fname');
			$mname = $this->input->post('mname');
			$lname = $this->input->post('lname');
			$gender = $this->input->post('gender');
			$civil = $this->input->post('civil');
			$dbirth = $this->input->post('dbirth');
			$address = $this->input->post('address');
			$year_section = $this->input->post('year_section');
			$username = $this->input->post('username');	
			$password = $this->input->post('password');
			$cpassword = $this->input->post('cpassword');
			$usertype = $this->input->post('usertype');
			echo 1;
			//For ID number of the student
			for ($i = strlen($lastinsert); $i < 5; $i++) { 
				$zero .= '0';
			}

			$dates = Date('Y') . "-" . $zero . $l;

			$data = array('firstname' => $firstname, 
						   'middlename' => $mname,
						   'lastname' => $lname,
						   'gender' => $gender,
						   'civil' => $civil,
						   'dob' => $dbirth,
						   'address' => $address,
						   'username' => $username,
						   'password' => $password,
						   'sid' => '');

			if($cpassword != $password){
				$this->session->set_flashdata('message', $this->faildemessage() . 'Invalid Confirm Password</div>');
				$this->load->view('faculty/register_faculty', $data);
				$this->load->view('templates/footer');	
			}
			else
			{
				$party = array('firstname' => $firstname, 
						   'middlename' => $mname,
						   'lastname' => $lname,
						   'gender' => $gender,
						   'civil' => $civil,
						   'dob' => $dbirth,
						   'address' => $address,
						   'usertype' => $usertype,
						   'idno' => $dates);


				if ($this->input->post('sid') == '') 
				{
					$this->session->set_flashdata('message', $this->successMessage() . 'Student Added</div>');

					$x = $this->studentmd->insert_student($party);
					$user = array('username' => $username,
								  'password' => $password,
								  'party' => $x);
					$this->studentmd->insert_users($user);
					$xz = 1;
				}
				else
				{
					$party2 = array('firstname' => $firstname, 
						   'middlename' => $mname,
						   'lastname' => $lname,
						   'gender' => $gender,
						   'civil' => $civil,
						   'dob' => $dbirth,
						   'address' => $address,
						   'year_section' => $year_section,
						   'usertype' => $usertype);
						 
					$this->session->set_flashdata('message', $this->successMessage() . 'Student Updated</div>');
					$this->studentmd->update_student($this->input->post('sid'), $party2);
					$xz = 1;
				}
			echo $xz;
			}

		}
		function delete_fac($id)
		{
			$this->session->set_flashdata('message', $this->successMessage() . 'Instructor Deleted</div>');
			$this->db->where('id', $id);
			$this->db->delete('tbl_party');
			redirect('/faculty');
		}
		function myclass()
		{
			$this->load->model('facultymd');
			$data['param'] = 'myclass';
			$this->load->view('templates/header');
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('faculty/class_faculty');
			$this->load->view('templates/footer');
		}
		function addclass()
		{
			$this->load->model('facultymd');
			$section = $this->input->post('InsSec');
			$newclass = array('uid' => $this->session->userdata('uid'), 
						   'schoolyear' => $this->input->post('InsSY'),
						   'section' => $this->input->post('InsSec'),
						   'subject' => $this->input->post('InsSub'));
			$x = $this->facultymd->addclass($newclass);

			foreach ($this->facultymd->get_all_student($section) as $key => $value) {
				$data = array('classid' => $x, 'partyid' => $value['id']);
				$this->facultymd->insert_stud_class($data);
			}
			redirect('/faculty_class');
		}
		function delete_classes($id)
		{
			$this->db->where('id', $id);
			$this->db->delete('tbl_classes');
			redirect('/faculty_class');
		}
		function view_student($id)
		{
			$this->load->model('facultymd');
			$data['param'] = 'myclass';
			$dats['subid'] = $id;
			$this->load->view('templates/header');
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('student/student_list', $dats);
			$this->load->view('templates/footer');
		}
		function insert_students()
		{
			$data = array('classid' => $this->input->post('classid'),
						  'partyid' =>$this->input->post('stud_id'));
			$this->db->insert('tbl_student', $data);

			redirect('view_stud/'.$this->input->post('classid'));
		}
		function delet_stud_class($id, $classid)
		{
			$this->db->where('id', $id);
			$this->db->delete('tbl_student');
			redirect('/view_stud/'.$classid);
		}
		function examination()
		{
			$this->load->model('facultymd');
			$data['param'] = 'exam';
			$this->load->view('templates/header');
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('faculty/examination');
			$this->load->view('templates/footer');
		}
		function get_sub_byid()
		{
			$id = $this->input->post('x');
			$this->load->model('facultymd');
			$x = $this->facultymd->get_sub_byid($id);
			
			foreach ($x as $key => $value) {
				echo "<option value=" . $value['id'] . ">".$value['subject_title']."</option>";
			}
		}
		function insert_exam()
		{
			$this->load->model('facultymd');
			$classid = $this->facultymd->get_classid($this->input->post('section'), $this->input->post('subject'));

			$data = array('classid' => $classid,
						  'description' => $this->input->post('description'),
						  'uid' => $this->session->userdata('uid'));

			$this->facultymd->insert_ex($data);
			$this->session->set_flashdata('message', $this->successMessage() . 'Quiz/Exam Added.</div>');
			redirect('/examination');
		}
		function add_question($id)
		{
			$this->load->model('facultymd');
			$data['param'] = 'exam';
			$data['examid'] = $id;
			$this->load->view('templates/header');
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('faculty/add_question', $data);
			$this->load->view('templates/footer');
		}
		function insert_question()
		{

			$this->load->model('facultymd');

			$question = array('question' => $this->input->post('quest'),
							  'examid' => $this->input->post('examid'),
							  'points' => $this->input->post('points'));

			$qid = $this->facultymd->insert_quest($question);

			$choices = array('choice1' => $this->input->post('c1'),
							 'choice2' => $this->input->post('c2'),
							 'choice3' => $this->input->post('c3'),
							 'quest_id' => $qid);


			$answer = array('answer' => $this->input->post('answer'),
							'quest_id' => $qid);



			$this->facultymd->insert_all($choices, $answer);
			$this->session->set_flashdata('message', $this->successMessage() . 'Question Added</div>');
			redirect('/add_question/'.$this->input->post('examid'));
		}
		function delete_questions($id, $examid)
		{
			$this->db->where('id', $id);
			$this->db->delete('tbl_question');
			$this->db->where('quest_id', $id);
			$this->db->delete('tbl_choices');
			$this->db->where('quest_id', $id);
			$this->db->delete('tbl_answers');
				redirect('/add_question/'.$examid);
		}
		function activate_exams()
		{
			$data = array('time_duration' => $this->input->post('duration'),
						  'status' => 1);

			$this->db->where('id', $this->input->post('examid'));
			$this->db->update('tbl_exam', $data);
			redirect('/examination');
		}
	}