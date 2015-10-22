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
			$usertype = 3;
			$dates = date('Y');



			$data = array('firstname' => $firstname, 
						   'middlename' => $mname,
						   'lastname' => $lname,
						   'gender' => $gender,
						   'civil' => $civil,
						   'dob' => $dbirth,
						   'address' => $address,
						   'year_section' => $year_section,
						   'username' => $username,
						   'password' => $password);

			if($cpassword != $password){
				$this->session->set_flashdata('data', $data);
				$this->session->set_flashdata('message', $this->faildemessage() . 'Invalid Confirm Password</div>');
				$this->load->view('student/register_student.php');
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

			$x = $this->studentmd->insert_student($party);

			$user = array('username' => $username,
						  'password' => $password,
						  'party' => $x);
			$this->studentmd->insert_users($user);

			echo $x;

			}

		}

		function delete_stud($id)
		{
			$this->session->set_flashdata('message', $this->successMessage() . 'Student Deleted.</div>');
			$this->load->model('studentmd');
			$this->studentmd->delete_stud($id);
			redirect('/student');
		}
		function select_data($id)
		{
			$this->load->model('studentmd');
			$x = $this->studentmd->select_data($id);
			print_r($x);
			$this->session->set_flashdata('data', $x);
			//$this->load->view('student/register_student');
		}
	}