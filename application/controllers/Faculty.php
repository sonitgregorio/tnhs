<?php 

	/**
	* 
	*/
	class Faculty extends CI_Controller
	{
		function view_faculty()
		{
			$data['param'] = 'faculty';
			$this->load->model('facultymd');
			$this->load->view('templates/header');
			$this->load->view('templates/top');
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('faculty/view_faculty');
			$this->load->view('templates/footer');
		}
	}