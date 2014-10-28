<?php
include_once("model/AdminTable.class.php");

$createNewAdmin = isset($_POST["new-admin"]);
if ($createNewAdmin) {
  $newEmail =$_POST["email"];
  $newPwd = $_POST["pwd"];
  $adminTable = new AdminTable($db);
  try {
    $adminTable->create($newEmail, $newPwd);
    $adminFormMsg = "New user created for $newEmail";
  }
  catch(Exception $e) {
    $adminFormMsg = $e->getMessage();
  }
}

$newAdminForm = include_once("view/admin/new-admin-form-html.php");
return $newAdminForm;
?>