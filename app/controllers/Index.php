<?php

/**
 * Index Controller
 */
class Index extends DController{

  // Construct method
  public function __construct(){
    parent::__construct();
   Session::checkSession();
  }

  // Default Controller Method
  public function Index(){
    $this->home();
  }

  // Home method
  public function home(){
    $data = array();
    $userModel =  $this->load->model("UserModel");
    $data['user'] = $userModel->userList();

    $this->load->view('layouts/header');
    $this->load->view("home", $data);
    $this->load->view('layouts/footer');
  }





}
