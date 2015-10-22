<?php 

	/**
	* 
	*/
	class Admin extends CI_Controller
	{
		function year_section()
		{
			$data['param'] = 'class';
			
			$this->load->model('adminmd');
			$this->load->view('templates/header');
			$this->load->view('templates/top');
			$this->load->view('templates/admin_nav',$data);
			$this->load->view('admin/class');
			$this->load->view('templates/footer');
		}
	}