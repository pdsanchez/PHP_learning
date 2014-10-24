<?php
  class BlogEntryTable {
    private $db;
    
    public function __construct($db) {
      $this->db = $db;
    }
    
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
      $sql = "delete from blog_entry where entry_id = ?";
      $data = array($id);
      $this->makeStatement($sql, $data);
    }
    
    public function updateEntry($id, $title, $entry) {
      $sql = "update blog_entry set title=?, entry_text=? where entry_id=?";
      $data = array($title, $entry, $id);
      $stmt = $this->makeStatement($sql, $data);
      return $stmt;
    }
    
    private function makeStatement($sql, $data = NULL) {
      $stmt = $this->db->prepare($sql);
      try {
        $stmt->execute($data);
      }
      catch(Exception $e) {
        $msg = "<p>You tried to run this sql: $sql</p>
                <p>Exception: $e</p>";
        trigger_error($msg);
      }
      return $stmt;
    }
  }
?>