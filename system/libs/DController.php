<?php

/**
 *Main DController
 */
class DController{

  protected $load = array();

  // Magic method autoload
  public function __construct(){
    $this->load = new Load();
  }




}
