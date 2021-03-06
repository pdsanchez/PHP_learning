<?php
include_once "model/Table.class.php";

class AdminTable extends Table {
  
  public function checkCredentials($email, $pwd) {
    $sql = "select email from admin where email = ? and pwd = MD5(?)";
    $data = array($email, $pwd);
    $stmt = $this->makeStatement($sql,$data);
    if ($stmt->rowCount() === 1) {
      $out = true;
    }
    else {
      $loginProblem = new Exception("Login failed");
      throw $loginProblem;
    }
    return $out;
  }
  
  public function create($email, $pwd) {
    $this->checkEmail($email);
    $sql = "insert into admin (Email, pwd) values(?, MD5(?))";
    $data = array($email, $pwd);
    $this->makeStatement($sql, $data);
  }
  
  private function checkEmail($email) {
    $sql = "select email from admin where email=?";
    $data = array($email);
    $stmt = $this->makeStatement($sql, $data);
    if($stmt->rowCount() === 1) {
      $e = new Exception("Error: '$email' already used");
      throw $e;
    }
  }
}
?>