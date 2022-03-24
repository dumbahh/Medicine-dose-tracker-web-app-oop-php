<?php
include 'add.classes.php';
include 'edit.classes.php';
include 'delete.classes.php';
if (isset($_POST['submit-med'])) {
  $med = $_POST['med'];
  $dosage = $_POST['dosage'];
  $dosageselect = $_POST['dosageselect'];
  $frequency = $_POST['frequency'];
  $per = $_POST['per'];
  $add = new add($med, $dosage, $dosageselect, $frequency, $per);
  if ($add->checkempty($med, $dosage, $dosageselect, $frequency, $per) == false) {
    header("Location: add.php?error=empty");
    exit();
  }
  else {
    $add->add($_SESSION['uid'], $med, $dosage, $dosageselect, $frequency, $per);
    header("Location: ../home.php?add");
    exit();
  }
}

if (isset($_POST['editmed'])) {
  $id = $_SESSION['id'];
  $edit = "medicine";
  $text = $_POST['med'];
  $per = "";
  $weight = "";
  $edit = new edit($_SESSION['id'], $edit, $text, $per, $weight);
  $edit->editmed();
  header("Location: ../home.php?edit=success");
  exit();
}

if (isset($_POST['editdose'])) {
  $id = $_SESSION['id'];
  $edit = "dose";
  $text = $_POST['dose'];
  $per = "";
  $weight = $_POST['dosageselect'];
  $edit = new edit($_SESSION['id'], $edit, $text, $per, $weight);
  $edit->editmed();
  header("Location: ../home.php?edit=success");
  exit();
}

if (isset($_POST['editfre'])) {
  $id = $_SESSION['id'];
  $edit = "frequency";
  $text = $_POST['fre'];
  $per = $_POST['per'];
  $weight = "";
  $edit = new edit($_SESSION['id'], $edit, $text, $per, $weight);
  $edit->editmed();
  header("Location: ../home.php?edit=success");
  exit();
}

elseif(isset($_POST['delete'])) {
  $del = new delete($_SESSION['id']);
  $del->delete();
  header("Location: ../home.php");
  exit();
}
