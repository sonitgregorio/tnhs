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

		//---------------------Class-------------------------
		function insert_class()
		{
			$this->load->model('adminmd');
			$data=array('year'=>$this->input->post('year'),
                    'section'=>$this->input->post('section')                   
                    );
        $this->adminmd->insert_class($data);
       
        redirect('/class');
		}
		function delete_class($id)
		{
			$this->load->model('adminmd');
			 $this->adminmd->delete_class($id);
               redirect('/class');
		}
		//--------------------------------------------------


		//---------------------Subject-------------------------
		function subject()
		{
			$data['param'] = 'subject';
			
			$this->load->model('adminmd');
			$this->load->view('templates/header');
			$this->load->view('templates/top');
			$this->load->view('templates/admin_nav',$data);
			$this->load->view('admin/subject');
			$this->load->view('templates/footer');
		}
		function insert_subject()
		{
			$this->load->model('adminmd');
			$data=array('year'=>$this->input->post('year'),
				'unit'=>$this->input->post('unit'),
				'subject_code'=>$this->input->post('subject_code'),
				'subject_title'=>$this->input->post('subject_title'),
                    'type'=>$this->input->post('type')                   
                    );
        $this->adminmd->insert_subject($data);
       
        redirect('/subject');
		}
		function delete_subject($id)
		{
			$this->load->model('adminmd');
			 $this->adminmd->delete_subject($id);
               redirect('/subject');
		}
		function edit_subject($sid)
        {
          $this->session->set_flashdata('data', $sid);
          redirect('/subject');
       }
	}