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
			if ($this->session->userdata('uid') != "" OR $this->session->userdata('uid') != 0) {
				$this->redirectpage();
			} else {
			
			$this->load->view('templates/header');
			// $this->load->view('templates/top');
			$this->load->view('templates/navigation');
			$this->load->view('index');
			$this->load->view('templates/footer');
			
			}
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
					$this->session->set_userdata('pics',$x['picfile']);
					$this->session->set_userdata('names',$x['firstname'] ." ". $x['middlename'] ." ".$x['lastname']);
					$this->studentmd->insert_logs('user login');

					$this->session->set_userdata('ngaran',$x['firstname']/*." ". $x['middlename'] ." ".$x['lastname']*/ );
					$this->redirectpage();
				}		

		}
		function logout()
		{
			$this->studentmd->insert_logs('user log out');

			$this->session->unset_userdata('uid');
			$this->index();
		}
		
		function redirectpage()
		{
				
			$data['param'] = 'home';
			$this->load->view('templates/header');
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('pages/home');
			$this->load->view('templates/footer');
		}
		function accountsettings()
		{
			$this->load->model('login');
			$data['param'] = 'accountsettings';
			$this->load->view('templates/header');
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('pages/accountsettings');
			$this->load->view('templates/footer');
		}
		function update_users()
		{

			$this->load->model('login');
			$firstname = $this->input->post('fname');
			$mname = $this->input->post('mname');
			$lname = $this->input->post('lname');
			$dob = $this->input->post('dob');
			$address = $this->input->post('address');

			$uid = $this->session->userdata('uid');


			$this->studentmd->insert_logs('update user');

			$config['upload_path']          = './assets/images/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['encrypt_name']         = TRUE;
	        $this->load->library('upload', $config);
	        if ( ! $this->upload->do_upload('picture'))
	        {
				$data = ['firstname' => $firstname, 'middlename' => $mname, 'lastname' => $lname, 'dob' => $dob, 'address' => $address];
	        }else{
				$data = ['firstname' => $firstname, 'middlename' => $mname, 'lastname' => $lname, 'dob' => $dob, 'address' => $address, 'picfile' => $this->upload->data('file_name')];
	        	$this->session->set_userdata('pics',$this->upload->data('file_name'));
	        }


			$this->login->update_data($data, $uid);
			$this->session->set_flashdata('message',$this->successMessage().'Successfully Updated! </div>');

			redirect('/account_settings');
		}
		function change_pass()
		{
			$this->studentmd->insert_logs('Change Password');

			$opass = $this->input->post('opassword');
			$oldpass = $this->input->post('oldpassword');
			$npass = $this->input->post('npassword');
			$cpass = $this->input->post('cpassword');

			if ($opass != $oldpass) {
				$this->session->set_flashdata('changepass',$this->faildemessage().'Invalid Old Password! </div>');

			}
			elseif ($npass != $cpass)
			{
				$this->session->set_flashdata('changepass',$this->faildemessage().'Invalid Confirm Password! </div>');

			}else{
				$this->session->set_flashdata('changepass',$this->successMessage().'Password Successfully Updated! </div>');
				$this->db->where('party', $this->session->userdata('uid'));
				$this->db->update('tbl_users', array('password' => $npass));
			}
			redirect('/account_settings');
		}
		function about()
		{
			if ($this->session->userdata('uid') != "" OR $this->session->userdata('uid') != 0) {
				$this->redirectpage();
			} else {
			
			$this->load->view('templates/header');
			// $this->load->view('templates/top');
			$this->load->view('templates/navigation');
			$this->load->view('pages/about');
			$this->load->view('templates/footer');
			
			}
		}
		function logs()
		{
			$data['param'] = 'logs';
			$this->load->view('templates/header');
			$this->load->view('templates/admin_nav', $data);
			$this->load->view('pages/logs');
			$this->load->view('templates/footer');
		}
	}