<?php
 class Test extends CI_Controller{
 	public function index()
	{
		echo "Hellow World";
		$this->load->view("test.php");
	}
	public function otherpage()
	{
		echo "<h1> Hello World</h1>";
	}
 }
?>