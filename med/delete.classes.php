<?php
include_once '../db.php';

class delete {
  public $id;

  function __construct($id) {
    $this->id = $id;
  }
  public function delete() {
    $db = new db;
    $sql = "DELETE FROM med WHERE id=?";
    $stmt = $db->conn()->prepare($sql);
    $stmt->execute([$this->id]);
  }
}
