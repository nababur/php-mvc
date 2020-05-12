<?php



/**
 *Main Databae Model
 */
class DModel{

  // DB property
  protected $db = array();

  // Construct magic method
  public function __construct(){
      $dsn  = 'mysql:dbname=db_mvc; host=localhost';
      $user = 'root';
      $pass = '';
      $this->db = new Database($dsn, $user, $pass);
  }











}
