<?php
class Poll {
  private $db;
  
  public function __construct($db) {
    $this->db = $db;
  }
  
  public function getPollData() {
    $sql = "select poll_question, yes, no from poll where poll_id=1";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    
    $polldata = $stmt->fetchObject();
    return $polldata;
  }
  
  public function updatePoll($input) {
    if ($input === 'yes') {
      $sql = "update poll set yes = yes+1 where poll_id = 1";
    }
    else if ($input === 'no') {
      $sql = "update poll set no = no+1 where poll_id = 1";
    }
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
  }
}
?>