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
			$this->load->view('templates/top');
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
	}