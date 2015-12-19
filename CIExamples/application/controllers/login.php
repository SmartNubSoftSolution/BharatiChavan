<?php 
class Login extends CI_Controller{
	function index(){
		$data['main_content'] = 'login_form';
		$this->load->view('include/templates', $data);
	}
	function validate_credentials(){
		$this->load->model('register_model');
		$query = $this->register_model->validate();
		
		if($query){
			$data = array(
				'username'=> $this->input->post('username'),
				'is_logged_in' => true
			);
			
			$this->session->set_userdata($data);
			redirect('site/members_area');
		}else{
			$this->index();
		}
	}
	
	function signup(){
		$data['main_content']= 'signup_form';
		$this->load->view('include/templates', $data);
	}
	function create_member(){
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('first name', 'first name', 'trim|required');
		$this->form_validation->set_rules('last name', 'last name', 'trim|required');
		$this->form_validation->set_rules('e-mail', 'Email Address', 'trim|required|valid_email');
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
		
		if($this->form_validation->run()==FALSE){
			$this->signup();
		}else{
			$this->load->model('register_model');
			if($query = $this->register_model->create_member()){
				$data['main_content'] = 'signup_successful';
				$this->load->view('include/templates', $data);
			}else{
				$this->load->view('signup_form');
			}
		}
	}
}
