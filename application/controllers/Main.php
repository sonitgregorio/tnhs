<?php 

	/**
	* 
	*/
	class Main extends CI_Controller
	{
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
			// $username = $this->input->post('username');
			// $password = $this->input->post('password');
			$data['param'] = 'home';
			$this->load->view('templates/header');
			// $this->load->view('templates/top');
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('pages/home');
			$this->load->view('templates/footer');
		}
		
	}