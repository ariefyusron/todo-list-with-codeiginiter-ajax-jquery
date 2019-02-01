<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Bangkok");

class Model_home extends CI_Model {

  public function store($todo)
  {
    $data = array(
      'todo' => $todo,
      'isDelete' => 0,
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
      'deleted_at' => date("Y-m-d H:i:s")
    );

    $this->db->insert('list', $data);
  }

  public function todos()
  {
    $this->db->order_by('created_at','DESC');
    $query = $this->db->get('list');
    return $query->result_array(); 
  }

}