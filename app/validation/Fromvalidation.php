<?php


/**
 * Form Validation
 */
class Fromvalidation{

  public $currentValue;
  public $values = array();
  public $errors = array();


  public function isPost($key){
    if(isset($_POST) && array_key_exists($key,$_POST))
     {
       $this->values[$key] = trim($_POST[$key]);
       $this->values[$key] = stripcslashes($_POST[$key]);
       $this->values[$key] = htmlspecialchars($_POST[$key]);
       $this->currentValue = $key;
     }


    return $this;
  }


  public function isEmpty(){
    if (empty($this->values[$this->currentValue])) {
      $this->errors[$this->currentValue]['empty'] = "Field must not be Empty ! </br>";

    }
    return $this;
  }

  public function isEmailValidate(){
    if(isset($this->values[$this->currentValue]))
     {
       if (!filter_var($this->values[$this->currentValue], FILTER_VALIDATE_EMAIL)) {
           $this->errors[$this->currentValue ]['isEmailValidate'] = ' Please enter validate Email address ! </br>';
       }
     }

      return $this;
  }

  public function isStorngPass(){
    if(isset($this->values[$this->currentValue]))
     {
       if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $this->values[$this->currentValue])) {
         $this->errors[$this->currentValue]['isStorngPass'] = 'Must be contain 8 characters of letters, numbers, special character ! </br>';
       }
     }


    return $this;
  }

  public function isLength($min = 0, $max){
    if(isset($this->values[$this->currentValue]))
     {
       if (strlen($this->values[$this->currentValue] ) < $min OR strlen($this->values[$this->currentValue] ) > $max ) {
         $this->errors[$this->currentValue ]['isLength'] = ' Should be Min '.$min.' And Max '.$max.' Characters. ! </br>';
       }
     }



    return $this;
  }

  // Is Submit method
  public function isSubmit(){
    if (empty($this->errors)) {
      return true;
    }else{
      return false;
    }
  }







}
