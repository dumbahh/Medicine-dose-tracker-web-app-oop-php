<?php

class logout {
  public function logout() {
    header("Location: ../index.php");
    exit();
  }
}
