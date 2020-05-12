<?php



// Login class

Class Login extends DController{


  // Auto load __construct method
  public function __construct(){
    parent::__construct();

  }


  // Index method
  public function Index(){
    $this->login();
  }


  // Login Method
  public function login(){
    Session::init();
    Session::checkLogin();
    $this->load->view('layouts/header');
    $this->load->view("login/login");
    $this->load->view('layouts/footer');
  }


  // User login loginAuthotication
  public function loginAuthotication(){


    $input = $this->load->validation("Fromvalidation");


    $input->isPost('email')
          ->isEmailValidate()
          ->isEmpty();
    $input->isPost('password')
          ->isEmpty()
          ->isStorngPass();



    if ($input->isSubmit()) {
      $tble = 'tbl_user';
      $email = $_POST['email'];
      $password = md5($_POST['password']);
      $loginModel = $this->load->model("LoginModel");
      $count = $loginModel->userControl($tble, $email, $password);
      if ($count > 0) {
        $result = $loginModel->getUserSelect($tble, $email, $password);
        Session::init();
        Session::set("login", $result[0]['email']);
        Session::set("id", $result[0]['id']);
        Session::set("name", $result[0]['name']);
        header("Location:".BASE_URL."/Admin");

      } else {
        $msg = '<div class="alert alert-danger alert-dismissible" id="flash-msg">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Error !</strong> Email or password did not Matched !</div>';
        Session::init();
        Session::set('msg', $msg);
        $this->load->view('layouts/header');
        $this->load->view("login/login");
        $this->load->view('layouts/footer');
      }




    } else {
      $data = array();
      $data['postErrors'] = $input->errors;
      $this->load->view('layouts/header');
      $this->load->view("login/login", $data);
      $this->load->view('layouts/footer');
    }





  }



















}
