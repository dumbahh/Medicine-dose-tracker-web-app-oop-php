<?php

class db {


  public function conn()
  {

    try {
      $host = 'localhost';
      $uid = 'root';
      $pwd = '';
      $dbname = 'medicine';
      $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
      $pdo = new PDO($dsn, $uid, $pwd);
      return $pdo;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

  }
}
