<?php 
	/**
	* 
	*/
	class Lessons extends CI_Controller
	{
		function faildemessage()
	    {
	        return '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color:red"><span aria-hidden="true">&times;</span></button>';
	    }
	    function successMessage()
	    {
	        return'<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color:red"><span aria-hidden="true">&times;</span></button>';
	    }
		function list_lessons()
		{
			$this->load->model('lessonsmd');
			$data['param'] = 'lessons';
			$this->load->view('templates/header');
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('lessons/lessons');
			$this->load->view('templates/footer');
		}
		function upload_lessons()
		{
			$config['upload_path']          = './assets/lessons/';
	        $config['allowed_types']        = 'pdf|mp4';
	        $config['encrypt_name']         =  FALSE;
	        $this->load->library('upload', $config);
	        if ( ! $this->upload->do_upload('uploads'))
	        {
	            $this->session->set_flashdata('message', $this->faildemessage() . $this->upload->display_errors() . '</div>');
	        }
	        else
	        {
	        	$this->session->set_flashdata('message', $this->faildemessage() . 'Lessons Added</div>');
	      		$filename = $this->upload->data('file_name');
	      		$subject = $this->input->post('subject');
	      		$description = $this->input->post('description');
	      		$uid = $this->session->userdata('uid');

	      		$data = array('filename' => $filename,
	      					  'subjectid' => $subject,
	      					  'uid' => $uid,
	      					  'description' => $description);
	      		$this->db->insert('tbl_lessons', $data);
	        }
	     	redirect('/lessons');
		}
		function delete_lessons($id)
		{
			$this->session->set_flashdata('message', $this->faildemessage() . 'Lessons Deleted</div>');
			$this->db->where('id', $id);
			$this->db->delete('tbl_lessons');
			redirect('/lessons');
		}
	}