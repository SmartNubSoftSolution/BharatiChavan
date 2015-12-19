<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
		$this->load->helper('url');
        $this->load->model("postmodel","post");
    }
 
    function create()
    {
        if(@$_POST['create_post'])
        {
            $data = $_POST['post'];
            $data['post_date'] = date('Y-m-d H:i:s');
            $this->post->add($data);
            $this->session->set_flashdata('message',"Post created successfully");
            redirect("post/create");
        }
        $this->load->view("post/create");
    }
	 function index()
    {
      $data['posts'] = $this->post->getAll();
       $this->load->view("post/index",$data);
    }
	 function edit()
{
    $id = $this->uri->segment(3);
    $post = $this->post->getById($id);
    if(!$post)
    {
        redirect("post");
    }
	    if(@$_POST['update_post'])
    {
        $postdata = $_POST['post'];
        $this->post->update($postdata,$id);
        $this->session->set_flashdata('message',"Post updated successfully");
        redirect("post");
    }
    $data['post'] = $post;
    $this->load->view("post/edit",$data);
}
    function delete()
{
    $id = $this->uri->segment(3);
    $this->post->delete($id);
    $this->session->set_flashdata('message',"Post deleted successfully");
    redirect("post");
}
}
 