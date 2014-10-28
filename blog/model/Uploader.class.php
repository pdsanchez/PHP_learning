<?php
class Uploader {
  private $filename;
  private $filedata;
  private $destination;
  private $errMsg;
  private $errCode;
  
  public function __construct($key) {
    $this->filename = $_FILES[$key]["name"];
    $this->filedata = $_FILES[$key]["tmp_name"];
    $this->errCode = $_FILES[$key]["error"];
  }
  
  public function saveIn($folder) {
    $this->destination = $folder;
    return $this->save();
  }
  
  public function save() {
    if ($this->readyToUpload()) {
      $name = "$this->destination/$this->filename";
      move_uploaded_file($this->filedata, $name);
    }
    else {
      $e = new Exception($this->errMsg);
      throw $e;
    }
  }
  
  private function readyToUpload() {
    $folderIsWriteable = is_writable($this->destination);
    if ($folderIsWriteable === false) {
      $this->errMsg = "Error: destination folder is ";
      $this->errMsg .= "not writable, change permissions";
      $canUpload = false;
    }
    else if ($this->errCode === 1) {
      $maxSize = ini_get('upload_max_filesize');
      $this->errMsg = "Error: file is too big.";
      $this->errMsg .= "Max file size is $maxSize";
      $canUpload = false;
    }
    else if($this->errCode > 1) {
      $this->errMsg = "Something went wrong [Error code: $this->errCode]";
      $canUpload = false;
    }
    else {
      $canUpload = true;
    }
    return $canUpload;
  }
}
?>