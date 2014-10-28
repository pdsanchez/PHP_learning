<?php
class AdminUser {
  
  public function __construct() {
    session_start();
  }
  
  public function isLoggedIn() {
    $sessionIsSet = isset($_SESSION["logged-in"]);
    if ($sessionIsSet) {
      $out = $_SESSION["logged-in"];
    }
    else {
      $out = false;
    }
    return $out;
  }
  
  public function login() {
    $_SESSION["logged-in"] = true;
  }
  
  public function logout() {
    $_SESSION["logged-in"] = false;
  }
}
?>