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
						   'sid' => '');

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

		function delete_stud($id)
		{
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

			$data1['qid']=$id;
			$data['param'] = 'student_examination';
			$this->load->model('studentmd');
			$this->load->view('templates/header');
			$this->load->view('templates/top');
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('student/take_exam',$data1);
			$this->load->view('templates/footer');
		}
	}