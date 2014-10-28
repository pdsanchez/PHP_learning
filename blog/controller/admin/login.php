<?php
$loginFormSubmitted = isset($_POST["log-in"]);
if ($loginFormSubmitted) {
  $admin->login();
}
$view = include_once("view/admin/login-form-html.php");
return $view;
?>