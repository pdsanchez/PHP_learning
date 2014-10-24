<?php
include_once("model/Table.class.php");

class CommentTable extends Table {
  public function saveComment($entryId, $author, $txt) {
    $sql = "insert into comment (entry_id, author, txt) values (?, ?, ?)";
    $data = array($entryId, $author, $txt);
    return $this->makeStatement($sql, $data);
  }
  
  public function getAllById($id) {
    $sql = "select author, txt, date from comment where entry_id=? order by comment_id desc";
    $data = array($id);
    return $this->makeStatement($sql, $data);
  }
}
?>