<?php
// 1 = medicine 2= dose 3 = frequency

require_once '../db.php';

class edit {
  public $id;
  public $edit;
  public $text;
  public $per;
  public $weight;

  function __construct($id, $edit, $text, $per, $weight) {
    $this->id = $id;
    $this->edit = $edit;
    $this->text = $text;
    $this->per = $per;
    $this->weight = $weight;
  }
  public function editmed() {
     if ($this->edit == "dose") {
      $db = new db;
      $sql = "UPDATE med SET dosage=?, weight=? WHERE id=?";
      $stmt = $db->conn()->prepare($sql);
      $stmt->execute([$this->text, $this->weight, $this->id]);
    }
  elseif ($this->edit == "medicine") {
      $db = new db;
      $sql = "UPDATE med SET med=? WHERE id=?";
      $stmt = $db->conn()->prepare($sql);
      $stmt->execute([$this->text, $this->id]);
   }
    elseif ($this->edit == "frequency") {
      $db = new db;
      $sql = "UPDATE med SET frequency=?, day=? WHERE id=?";
      $stmt = $db->conn()->prepare($sql);
      $stmt->execute([$this->text, $this->per, $this->id]);
    }

    /*switch ($this->edit) {
      case 'medicine':
      $db = new db;
      $sql = "UPDATE med SET med=? WHERE id=?";
      $stmt = $db->conn()->prepare($sql);
      $stmt->execute([$this->text, $this->id]);
        break;

        case 'dose':
        $db = new db;
        $sql = "UPDATE med SET dosage=?, weight=? WHERE id=?";
        $stmt = $db->conn()->prepare($sql);
        $stmt->execute([$this->text, $this->weight, $this->id]);
          break;

          case 'frequency':
          $db = new db;
          $sql = "UPDATE med SET frequency=?, day=? WHERE id=?";
          $stmt = $db->conn()->prepare($sql);
          $stmt->execute([$this->text, $this->per, $this->id]);
            break;

      default:
        // code...
        break;
    } */

  }
}
