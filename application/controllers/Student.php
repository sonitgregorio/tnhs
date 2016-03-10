<?php 

	/**
	* 
	*/
	class Student extends CI_Controller
	{

		function faildemessage()
	    {
	        return '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color:red"><span aria-hidden="true">&times;</span></button>';
	    }
	    function successMessage()
	    {
	        return'<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color:red"><span aria-hidden="true">&times;</span></button>';
	    }
		function view_student()
		{
			$data['param'] = 'student';
			$this->load->model('studentmd');
			$this->load->view('templates/header');
			$this->load->view('templates/top');
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('student/view_student');
			$this->load->view('templates/footer');
		}
		function insert_stud()
		{

			$this->studentmd->insert_logs('inserted student');

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
			$idno = $this->input->post('idno');

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
						   'year_section' => $year_section,
						   'username' => $username,
						   'password' => $password,
						   'sid' => '',
						   'idno' => $idno);

			if($cpassword != $password){
				$this->session->set_flashdata('message', $this->faildemessage() . 'Invalid Confirm Password</div>');
				$this->load->view('student/register_student.php', $data);
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
						   'year_section' => $year_section,
						   'usertype' => $usertype,
						   'idno' => $idno);


				if ($this->input->post('sid') == '') 
				{

					$x = $this->db->query("SELECT * FROM tbl_party WHERE firstname = '$firstname' and lastname = '$lname'")->num_rows();
					if ($x > 0) {
						$xz = 4;
					}else{
						$this->session->set_flashdata('message', $this->successMessage() . 'Student Added</div>');

						$x = $this->studentmd->insert_student($party);
						$user = array('username' => $username,
									  'password' => $password,
									  'party' => $x);
						$this->studentmd->insert_users($user);
						$xz = 1;	
					}

					echo $xz;
					
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

					echo $xz;
				}
			}

		}

		function delete_stud($id)
		{
			$this->studentmd->insert_logs('Deeleted Student');

			$this->session->set_flashdata('message', $this->successMessage() . 'Student Deleted.</div>');
			$this->load->model('studentmd');
			$this->studentmd->delete_stud($id);
			redirect('/student');
		}
		function select_data()
		{
			$this->load->model('studentmd');
			$id = $this->input->post('x');
			$x = $this->studentmd->select_data($id);
			$this->load->view('student/register_student', $x);
			$this->load->view('templates/footer');	
		}
		function student_examination()
		{
			$data['param'] = 'student_examination';
			$this->load->model('studentmd');
			$this->load->view('templates/header');
			$this->load->view('templates/top');
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('student/student_examination');
			$this->load->view('templates/footer');
		}
		function take_exam($id)
		{
			$this->studentmd->insert_logs('Taken Exam');

			date_default_timezone_set('Asia/Manila');
			$time = date('h:i:s');
			$uid = $this->session->userdata('uid');
			$this->db->where('uid', $uid);
			$this->db->where('examid', $id);
			$this->db->update('tbl_stud_exam', array('date_taken' => date('Y-m-d'), 'time_taken' => $time));
			$data1['qid']=$id;
			$data['param'] = 'student_examination';
			$this->load->model('studentmd');
			$this->load->view('templates/header');
			$this->load->view('templates/top');
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('student/take_exam',$data1);
			$this->load->view('templates/footer');
			$this->load->view('templates/timer');
		}
		function submit_score($id,$id1)
		{
			$this->studentmd->checked($id,$id1);
		}
		function my_score($id,$id1)
		{
			$data['param'] = 'student_examination';
			$this->load->model('studentmd');
			$this->load->view('templates/header');
			$this->load->view('templates/top');
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('student/take_exam',$data1);
			$this->load->view('templates/footer');
		}
		function student_class()
		{
			$data['param'] = 'myclass';
			$this->load->model('studentmd');
			$this->load->view('templates/header');
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('student/student_class');
			$this->load->view('templates/footer');
		}
		function view_lessons($id)
		{
			$data['param'] = 'myclass';
			$data1['classid'] = $id;
			$this->load->model('studentmd');
			$this->load->view('templates/header');
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('student/student_lessons', $data1);	
			$this->load->view('templates/footer');
		}
		function view_pdf($filenamess)
		{
			$file = './assets/lessons/'.$filenamess;
			$filename = $filenamess; /* Note: Always use .pdf at the end. */

			header('Content-type: application/pdf');
			header('Content-Disposition: inline; filename="' . $filename . '"');
			header('Content-Transfer-Encoding: binary');
			header('Content-Length: ' . filesize($file));
			header('Accept-Ranges: bytes');

			@readfile($file);
		}
		function checked_ans($id)
		{
			$points = 0;
			$this->load->model('studentmd');
			$examid = $id;
			$sumpoints = $this->studentmd->get_all_points($id);



			$get_result = $this->studentmd->get_exam_result($examid);

			foreach ($get_result as $key => $value) {
				$points += $value['points'];
			}



			echo $points . "|" . $sumpoints . "|" . $sumpoints * .6;


			$data = array('examid' => $id,
						  'points' => $points,
						  'uid' => $this->session->userdata('uid'));

			$data2 = array('sumpoints' => $sumpoints,
						   'points' => $points);



			$get_passing = $this->db->query("SELECT passing FROM tbl_exam WHERE id = $id")->row_array();


			$data2['passing'] = $get_passing['passing'];


			$this->db->insert('tbl_scores', $data);
			$data['param'] = 'student_examination';
			$data1['classid'] = $examid;

			//UPDATE STATUS
			$this->db->where('examid', $id);
			$this->db->where('uid', $this->session->userdata('uid'));
			$this->db->update('tbl_stud_exam', array('status' => 0));



			$this->load->view('templates/header');
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('student/exam_result', $data2);	
			$this->load->view('templates/footer');
		}


		function grade_book()
		{
			$data['param'] = 'grade_book';
			$this->load->model('studentmd');
			$this->load->view('templates/header');
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('student/grade_book');	
			$this->load->view('templates/footer');
		}
		
	}