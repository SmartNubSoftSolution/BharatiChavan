<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

function __construct()

{

parent::__construct();

$this->load->helper('url');

$this->load->model('users_model');

 #$this->load->helper('form');
}

public function index()

{

$data['user_list'] = $this->users_model->get_all_users();

$this->load->view('user_view', $data);

}

  public function add_form()

{

  $this->load->view('insert');

}
    public function insert_new_user()

{
 $udata['id']=$this->input->post('id');

$udata['name'] = $this->input->post('name');

$udata['email'] = $this->input->post('email');


$udata['mobile'] = $this->input->post('mobile');

$res = $this->users_model->insert_users_to_db($udata);

if($res){

header('location:'.base_url()."index.php/users/".$this->index());

}

}
public function update()

{

$mdata['name']=$_POST['name'];

$mdata['email']=$_POST['email'];



$mdata['mobile']=$_POST['mobile'];

$res=$this->users_model->update_info($mdata, $_POST['id']);

if($res){

header('location:'.base_url()."index.php/users/".$this->index());

}
  
}
    public function delete($id)

{

$this->users_model->delete_a_user($id);

$this->index();

}
}




