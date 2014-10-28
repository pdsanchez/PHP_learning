<?php
include_once("model/AdminTable.class.php");

$loginFormSubmitted = isset($_POST["log-in"]);
if ($loginFormSubmitted) {
  $admin->login();
  $email = $_POST["email"];
  $pwd = $_POST["pwd"];
  $adminTable = new AdminTable($db);
  try {
    $adminTable->checkCredentials($email, $pwd);
    $admin->login();
  }
  catch(Exception $e) {
    
  }
}

$loggingOut = isset($_POST["logout"]);
if($loggingOut) {
  $admin->logout();
}

if($admin->isLoggedIn()) {
  $view = include_once("view/admin/logout-form-html.php");
}
else {
  $view = include_once("view/admin/login-form-html.php");
}

return $view;
?>