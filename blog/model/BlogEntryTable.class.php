<?php
  class BlogEntryTable {
    private $db;
    
    public function __construct($db) {
      $this->db = $db;
    }
    
    public function saveEntry($title, $entry) {
      $sql = "insert into blog_entry(title, entry_text)
              values(?, ?)";
      $stmt = $this->db->prepare($sql);
      
      $formdata = array($title, $entry);
      
      try {
        $stmt->execute($formdata);        
      }
      catch (Exception $e) {
        $msg = "<p>You tried to run this sql: $sql</p>
                <p>Exception: $e</p>";
        trigger_error($msg);
      }
    }
  }
?>