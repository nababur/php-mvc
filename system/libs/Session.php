<?php

/**
 * Session
 */
class Session{


  // Init Method Session
  public static function init(){
    if (version_compare(phpversion( ), '5.4.0', '<')) {
      if (session_id() == '') {
        session_start();
      }
    } else {
      if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }
    }

  }


  // Session Set Method
  public static function set($key,$val){
    $_SESSION[$key] = $val;
  }


  // Session get method
  public static function get($key){
    if (isset($_SESSION[$key])) {
      return $_SESSION[$key];
    }else{
      return false;
    }
  }


  // Session Destroy Method
  public static function destroy(){
    session_destroy();
    session_unset();
    header("Location:".BASE_URL."/login");
  }


  // Check Session method
  public static function checkSession(){
    Session::init();
    if (self::get("login") == FALSE) {
      session_destroy();
      header("Location:".BASE_URL."/login");
    }
  }


  // Check Login Method
  public static function checkLogin(){
    Session::init();
    if (self::get("login") == TRUE) {
      header("Location:".BASE_URL."/Admin");
    }
  }



}
