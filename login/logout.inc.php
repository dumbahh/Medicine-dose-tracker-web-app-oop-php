<?php
session_start();
session_destroy();
include 'logout.classes.php';
$logout = new logout;
$logout->logout();
