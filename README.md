# php-mvc framework with Dynamic Sql Query

<ul>
 <li> Pull project to your server with git or download 
  <pre>  git clone https://github.com/nababur/php-mvc.git
  </pre>
  </li>
</ul>

<div class="script-details">
  <h3>Framework Highlight::-</h3>

<ul>
<li> Controllers  
<pre>

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


</pre>
</li>
</ul>


</div>

![2020-05-12_205321](https://user-images.githubusercontent.com/8381528/81720755-a577ee00-94a0-11ea-9aeb-8f367b144450.png)
![2020-05-12_205244](https://user-images.githubusercontent.com/8381528/81720823-be809f00-94a0-11ea-90ec-d5489a5ce8f1.png)
![2020-05-12_205221](https://user-images.githubusercontent.com/8381528/81720928-dfe18b00-94a0-11ea-8c8f-81d16652ad75.png)

<div class='install-script'>
  <h3>How to Install</h3>
  <ul>
 <li>Create a database name (db_mvc)</li>
 <li>Import database file (db_mvc.sql)</li>
 <li>Admin:Info</li>
 <li>Admin username: nababurbd@gmail.com</li>
 <li>Admin pass: Ba123456</li>

</ul>

<h3>Author</h3>
<span>Nababur Rahaman</span>
<ul>
  <li><a href='https://github.com/nababur'>Author profile</a></li>
   <li><a href='https://codeceil.com/'>Website: codeceil.com</a></li>
</ul>
<h4>Happy Open Source....</h4>
</div>
