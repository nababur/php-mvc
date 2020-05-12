<?php

/**
 *User Model
 */
class UserModel extends DModel{

  // Contstruct method
  public function __construct(){
    parent::__construct();
  }

  // User list Model Method
  public function userList(){
    $tble = "tbl_user";
    $order_by = array(
      'order_by' => 'id DESC'
    );
    $select_cond = array(
      'select' => 'name'
    );
    $wherecond = array(
      'where'=> array('id'=>'1', 'email'=>'rafi@gmail.com'),
      'return_type'=> 'single'
    );

    $limit = array(
      'start'=> '2',
      'end'=> '3'
    );
    return  $this->db->select($tble, $order_by);


  }



  // Get User By id Method
  public function getUserById($id){
    $tble = "tbl_user";
    $wherecond = array(
      'where'=> array('id'=>$id),
      'return_type'=> 'single'
    );


    return $this->db->select($tble, $wherecond);
  }

  // Insert User Data Method
  public function insertData($tble,$data ){
    return $this->db->insert($tble, $data);
  }

  //Update Model Method
  public function updateData($data, $id){
    $tble = "tbl_user";
    $wherecond = array('id'=>$id);
    return $this->db->update($tble, $data, $wherecond);

  }


  //User Delete By Id Method
  public function userDeleteById($id){
    $tble = "tbl_user";
    $wherecond = array('id'=>$id);
    return $this->db->delete($tble, $wherecond);

  }











}
