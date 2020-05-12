<?php


/**
 * Main
 */
class Main{

  // Property method
  public $url;
  public $controllerName  = "Index";
  public $methodName      = "Index";
  public $controllerPath  = "app/controllers/";
  public $controller;


  //Auto Load construct
  public function __construct(){
    $this->getUrl();
    $this->loadController();
    $this->callMethod();

  }



  // Load Url Method
  public function getUrl(){

    $this->url = isset($_GET['url']) ? $_GET['url'] : NULL;

    if ($this->url != NULL) {
      $this->url = rtrim($this->url , '/');
      $this->url = explode('/', filter_var($this->url, FILTER_SANITIZE_URL));
    } else {
      unset($this->url);
    }

  }




  // Load controller method
  public function loadController(){
    if (!isset($this->url[0])) {
        include $this->controllerPath . $this->controllerName.".php";
        $this->controller = new $this->controllerName();
    }else{
      $this->controllerName = $this->url[0];
      $fileName = $this->controllerPath . $this->controllerName.".php";
      if (file_exists($fileName)) {
          include $fileName;
          if (class_exists($this->controllerName)) {
            $this->controller = new $this->controllerName();
          }else{
              header("Location:".BASE_URL."/Index");
          }
      }else{
          header("Location:".BASE_URL."/Index");
      }
    }
  }



    // Load Method
    public function callMethod(){
      if (isset($this->url[2])) {
        $this->methodName = $this->url[1];
        if (method_exists($this->controller, $this->methodName)) {
          $this->controller->{$this->methodName}($this->url[2]);
        }else{
          header("Location:".BASE_URL."/Index");
        }
      }else{
        if (isset($this->url[1])) {
          $this->methodName = $this->url[1];
          if (method_exists($this->controller, $this->methodName)) {
            $this->controller->{$this->methodName}();
          }else{
            header("Location:".BASE_URL."/Index");
          }
        }else{
          if (method_exists($this->controller, $this->methodName)) {
            $this->controller->{$this->methodName}();
          }else{
            header("Location:".BASE_URL."/Index");
          }
        }
      }
    }








}
