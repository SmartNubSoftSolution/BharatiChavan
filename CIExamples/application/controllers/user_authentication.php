

<?php

//session_start(); //we need to start session in order to access it through CI

Class User_Authentication extends CI_Controller {

public function __construct()
 {
  parent::__construct();

// Load form helper library
$this->load->helper('form');

// Load form validation library
$this->load->library('form_validation');

// Load session library
$this->load->library('session');

 //$this->load->library("security");
 
// Load database
$this->load->model('model_db');

}

// Show login page
public function index() {
$this->load->view('logfrm');
}

// Show registration page
public function user_registration_show() {
$this->load->view('registration_form');
}

// Validate and store registration data in database
public function new_user_registration() {

//$data = $this->security->xss_clean($data);

// Check validation for user input in SignUp form
$this->form_validation->set_rules('username', 'Username', 'required');
$this->form_validation->set_rules('email_value', 'Email', 'required');
$this->form_validation->set_rules('password', 'Password', 'required');
if ($this->form_validation->run() == FALSE) {
$this->load->view('registration_form');
} else {
$data = array(
'user_name' => $this->input->post('username'),
'user_email' => $this->input->post('email_value'),
'user_password' => $this->input->post('password')
);
$result = $this->model_db->registration_insert($data);
if ($result == TRUE) {
$data['message_display'] = 'Registration Successfully !';
$this->load->view('logfrm', $data);
} else {
$data['message_display'] = 'Username already exist!';
$this->load->view('registration_form', $data);
}
}
}

// Check for user login process
public function user_login_process() {

$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[9]');
$this->form_validation->set_rules('password', 'Password', 'required');

if ($this->form_validation->run() == FALSE) {
if(isset($this->session->userdata['logged_in'])){
$this->load->view('admin_page');
}else{
$this->load->view('logfrm');
}
} else {
$data = array(
'username' => $this->input->post('username'),
'password' => $this->input->post('password')
);
$result = $this->model_db->login($data);
if ($result == TRUE) {

$username = $this->input->post('username');
$result = $this->model_db->read_user_information($username);
if ($result != false) {
$session_data = array(
'username' => $result[0]->user_name,
'email' => $result[0]->user_email,
);
// Add user data in session
$this->session->set_userdata('logged_in', $session_data);
$this->load->view('admin_page');
}
} else {
$data = array(
'error_message' => 'Invalid Username or Password'
);
$this->load->view('logfrm', $data);
}
}
}

// Logout from admin page
public function logout() {

// Removing session data
$sess_array = array(
'username' => ''
);
$this->session->unset_userdata('logged_in', $sess_array);
$data['message_display'] = 'Successfully Logout';
$this->load->view('logfrm', $data);
}

}

?>

