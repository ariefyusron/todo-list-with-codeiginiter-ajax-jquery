<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function index()
  {
    $this->load->view('home/index');
  }

  public function store()
  {
    $todo = $this->input->post('todo');
    $this->model_home->store($todo);
  }

  public function todos()
  {
    $data['data'] = $this->model_home->todos();
    $this->load->view('home/components/listTodo',$data);
  }

}