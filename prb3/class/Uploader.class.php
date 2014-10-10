<?php
class Uploader {
  private $filename;
  private $filedata;
  private $destination;
  
  public function __construct($key) {
    $this->filename = $_FILES[$key]["name"];
    $this->filedata = $_FILES[$key]["tmp_name"];
  }
  
  public function saveIn($folder) {
    $this->destination = $folder;
    return $this->save();
  }
  
  public function save() {
    $folderWritable = is_writable($this->destination);
    if ($folderWritable) {
      $name = "$this->destination/$this->filename";
      $success = move_uploaded_file($this->filedata, $name);
    }
    else {
      trigger_error("cannot write to $this->destination");
      $success = false;
    }
    return $success;
  }
}
?>