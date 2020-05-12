<?php

/**
 *LoginModel
 */
class LoginModel extends DModel{

  // Contstruct method
  public function __construct(){
    parent::__construct();
  }
  // User Login check Method
  public function userControl($tble, $email, $password){
    $sql = "SELECT * FROM $tble WHERE email = ? AND password = ? LIMIT 1 ";
    return $this->db->affectedRows($sql, $email, $password);
  }



  // Get single user info
  public function getUserSelect($tble, $email, $password){
    $sql = "SELECT * FROM $tble WHERE email = ? AND password = ? LIMIT 1 ";
    return $this->db->selectUserData($sql, $email, $password);
  }







}
