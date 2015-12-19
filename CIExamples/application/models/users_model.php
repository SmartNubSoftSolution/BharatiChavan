<?php

class Users_model extends CI_Model {

function __construct()

{

parent::__construct();

$this->load->database("ci_test");

}

public function get_all_users()

{

$query = $this->db->get('users');

return $query->result();

}
 public function insert_users_to_db($data)

{

  return $this->db->insert('users', $data);
 
}
 public function getById($id)
 {
 	
  $query = $this->db->get_where('users',array('id'=>$id));
   return $query->row_array();
}
  public function edit()
  {
     $id = $this->uri->segment(3,0);
     $data['user'] = $this->users_model->getById($id);
     $this->load->view('edit', $data);
   }
  
    public function update_info($data,$id)

{

  $this->db->where('users.id',$id);

   return $this->db->update('users', $data);

}
 public function delete_a_user($id)

{

$this->db->where('users.id',$id);

return $this->db->delete('users');

}
}
?>