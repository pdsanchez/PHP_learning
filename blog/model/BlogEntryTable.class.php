<?php
include_once("model/Table.class.php");

class BlogEntryTable extends Table {
  public function saveEntry($title, $entry) {
    $sql = "insert into blog_entry(title, entry_text)
            values(?, ?)";
    $data = array($title, $entry);
    $stmt = $this->makeStatement($sql, $data);
    return $this->db->lastInsertId();
  }
  
  public function getAllEntries() {
    $sql = "select entry_id, title, substring(entry_text, 1, 150) as intro from blog_entry";
    $stmt = $this->makeStatement($sql);
    
    return $stmt;
  }
  
  public function getEntry($id) {
    $sql = "select entry_id, title, entry_text, date_created from blog_entry where entry_id=?";
    $data = array($id);
    $stmt = $this->makeStatement($sql, $data);
    
    return $stmt->fetchObject();
  }
  
  public function deleteEntry($id) {
    $this->deleteCommentsById($id);
    $sql = "delete from blog_entry where entry_id = ?";
    $data = array($id);
    $this->makeStatement($sql, $data);
  }
  
  private function deleteCommentsById($id) {
    include_once("model/CommentTable.class.php");
    $comments = new CommentTable($this->db);
    $comments->deleteEntryById($id);
  }
  
  public function updateEntry($id, $title, $entry) {
    $sql = "update blog_entry set title=?, entry_text=? where entry_id=?";
    $data = array($title, $entry, $id);
    $stmt = $this->makeStatement($sql, $data);
    return $stmt;
  }
  
  public function searchEntry($searchTerm) {
    $sql = "select entry_id, title from blog_entry where title like ? or entry_text like ?";
    $data = array("%$searchTerm%", "%$searchTerm%");
    return $this->makeStatement($sql, $data);
  }
}
?>