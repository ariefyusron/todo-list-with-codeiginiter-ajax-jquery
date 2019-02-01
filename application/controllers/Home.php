<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function index()
  {
    $this->load->view('home');
  }

  public function store()
  {
    $todo = $this->input->post('todo');
    $this->model_home->store($todo);
  }

  public function todos()
  {
    $data = $this->model_home->todos();
    $no = 1;
    foreach($data as $key){
      echo '<tr>
        <td width=50%>'.$key["todo"].'<td>
        <td>'.$key["updated_at"].'<td>
      </tr>';
    }
  }

}