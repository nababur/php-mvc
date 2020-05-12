<?php

/**
 * Admin Controller
 */
class Admin extends DController{

  // Construct method
  public function __construct(){
    parent::__construct();
   Session::checkSession();
  }

  // index method Load
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

  // Add new user Method
  public function addNewUser(){
    $this->load->view('layouts/header');
    $this->load->view("adduser");
    $this->load->view('layouts/footer');

  }

  // Insert user Method
  public function insertUser(){

    $input = $this->load->validation("Fromvalidation");
    $input->isPost('name')
          ->isEmpty()
          ->isLength(5, 15);

    $input->isPost('email')
          ->isEmailValidate()
          ->isEmpty();

    $input->isPost('information')
          ->isEmpty()
          ->isLength(150, 350);

    $input->isPost('password')
          ->isEmpty()
          ->isStorngPass()
          ->isLength(8, 14);



    if ($input->isSubmit()) {
      $data = array();
      $tble = 'tbl_user';
      $data = array(
        'name'        => $input->values['name'],
        'email'       => $input->values['email'],
        'information' => $input->values['information'],
        'password'    => md5($input->values['password'])

      );

      $userModel =  $this->load->model("UserModel");
      $result = $userModel->insertData($tble,$data );
      $mgdata = array();

      if ($result == 1) {
        $mgdata['msg'] = '<div class="alert alert-success alert-dismissible" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success !</strong> New User added Successfully !</div>';
      }else{
        $mgdata['msg'] = '<div class="alert alert-danger alert-dismissible" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> Something went wrong !</div>';
      }
      $this->load->view('layouts/header');
      $this->load->view("adduser", $mgdata);
      $this->load->view('layouts/footer');
    } else {
      $data = array();
      $data['postErrors'] = $input->errors;
      $this->load->view('layouts/header');
      $this->load->view("adduser", $data);
      $this->load->view('layouts/footer');
    }





  }



  // Select all userlist method
  public function userlist(){
    $data = array();
    $userModel =  $this->load->model("UserModel");
    $data['user'] = $userModel->userList();

    $this->load->view('layouts/header');
    $this->load->view("userlist", $data);
    $this->load->view('layouts/footer');
  }


  // User By method
  public function userbyid($id = NULL){

    if ($id  != NULL) {
      $data = array();
      $userModel = $this->load->model("UserModel");
      $data['userbyid'] = $userModel->getUserById($id);

      $this->load->view('layouts/header');
      $this->load->view("userbyid", $data);
      $this->load->view('layouts/footer');
    }else{
      header("Location:".BASE_URL."/Index/home");
    }


  }



  // Update user By id Method
  public function updateUser($id = NULL){
    $input = $this->load->validation("Fromvalidation");
    $input->isPost('name')
          ->isEmpty()
          ->isLength(5, 15);

    $input->isPost('email')
          ->isEmailValidate()
          ->isEmpty();

    $input->isPost('information')
          ->isEmpty()
          ->isLength(150, 350);

    $input->isPost('id');


    if ($id  != NULL) {

      if ($input->isSubmit()) {
        $data = array();
        $id = $id;
        $data = array(
          'id'          => $input->values['id'],
          'name'        => $input->values['name'],
          'email'       => $input->values['email'],
          'information' => $input->values['information']
        );

        $userModel =  $this->load->model("UserModel");
        $result = $userModel->updateData($data, $id);

        if ($result == 1) {
          $data['msg'] = '<div class="alert alert-success alert-dismissible" id="flash-msg">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success !</strong> User information updated Successfully !</div>';
        }else{
          $data['msg'] = '<div class="alert alert-danger alert-dismissible" id="flash-msg">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error !</strong> Did not changed anything !</div>';
        }
        $this->load->view('layouts/header');
        $data['userbyid'] = $userModel->getUserById($id);
        $this->load->view("userbyid", $data);
        $this->load->view('layouts/footer');
      } else {
        $data = array();
        $data['postErrors'] = $input->errors;
        $this->load->view('layouts/header');
        $userModel = $this->load->model("UserModel");
        $data['userbyid'] = $userModel->getUserById($id);
        $this->load->view("userbyid", $data);
        $this->load->view('layouts/footer');
      }
    }else{
      header("Location:".BASE_URL."/Index/home");
    }




  }




  // Delete User By Method
  public function deleteUser($id = NULL){


    if ($id  != NULL) {
      $data = array();
      $mgdata = array();
      $id = $id;
      $userModel =  $this->load->model("UserModel");
      $data['user'] = $userModel->userList();
      $result = $userModel->userDeleteById($id);

      if ($result == 1) {
        $mgdata['msg'] = '<div class="alert alert-success alert-dismissible" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success !</strong> User deleted Successfully !</div>';
      }else{
        $mgdata['msg'] = '<div class="alert alert-danger alert-dismissible" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> Did not deleted anything !</div>';
      }
      // $this->load->view('layouts/header');
      // $this->load->view("userlist", $data);
      // $this->load->view('layouts/footer');
      $url = BASE_URL."/Admin/userlist?msg=".urlencode(serialize($mgdata));
      header("Location:$url");
    }else{
      header("Location:".BASE_URL."/Index/home");
    }



  }











}
