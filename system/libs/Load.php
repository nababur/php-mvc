<?php


/**
 * Load
 */
class Load{



  // View method
  public function view($fileName, $data = false){
    if ($data == true) {
      extract($data);
    }
    include 'app/views/'.$fileName.'.php';
    return $fileName;
  }

  // Model method
  public function model($modelName){
    include 'app/models/'.$modelName.'.php';
    return  new $modelName();
  }

  // Validation method
  public function validation($modelName){
    include 'app/validation/'.$modelName.'.php';
    return  new $modelName();
  }




}
