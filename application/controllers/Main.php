<?php 

	/**
	* 
	*/
	class Main extends CI_Controller
	{
		function faildemessage()
	    {
	        return '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color:red"><span aria-hidden="true">&times;</span></button>';
	    }
	    function successMessage()
	    {
	        return'<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color:red"><span aria-hidden="true">&times;</span></button>';
	    }

		function index()
		{
			$this->load->view('templates/header');
			// $this->load->view('templates/top');
			$this->load->view('templates/navigation');
			$this->load->view('index');
			$this->load->view('templates/footer');
		}
		function verify()
		{
			$this->load->model('login');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$x = $this->login->checkuser($username,$password);
			if (empty($x['id'])) {
				$this->session->set_flashdata('loginerror',$this->faildemessage().'Login failed, try again! </div>');
				redirect('/');
			} else {
				$this->session->set_userdata('usertype',$x['usertype']);
				$this->session->set_userdata('uid',$x['uid']);
				$this->session->set_userdata('ngaran',$x['firstname']/*." ". $x['middlename'] ." ".$x['lastname']*/ );
				$data['param'] = 'home';
				$this->load->view('templates/header');
				// $this->load->view('templates/top');
				$this->load->view('templates/admin_nav', $data);
				$this->load->view('pages/home');
				$this->load->view('templates/footer');
			}		


			
		}
		
	}