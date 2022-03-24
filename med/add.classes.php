<?php
session_start();
include '../db.php';
class add {
  public $med;
  public $dosage;
  public $weight;
  public $frequency;
  public $day;

  function __construct($med, $dosage, $weight, $frequency, $day) {
    $this->med = $med;
    $this->dosage = $dosage;
    $this->weight = $weight;
    $this->frequency = $frequency;
    $this->day = $day;
  }

  public function checkempty($med, $dosage, $weight, $frequency, $day) {
    $result;
    if (empty($med) || empty($dosage) || empty($weight) || empty($frequency) || empty($day)) {
      $result = false;
    }
    else {
      $result = true;
    }
    return $result;
  }

  public function add($uid, $med, $dosage, $weight, $frequency, $day) {
    $db = new db;
    $insert = "INSERT INTO med (uid, med, dosage, weight, frequency, day) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $db->conn()->prepare($insert);
    $stmt->execute([$uid, $med, $dosage, $weight, $frequency, $day]);

  }

  
}
