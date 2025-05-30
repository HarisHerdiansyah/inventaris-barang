<?php
session_start();
if (!isset($_SESSION["logged_in"])) {
  header("Location: /inventaris-barang/login.php");
  exit;
}

$uid = $_SESSION["uid"];
$nama = $_SESSION["nama"];
$email = $_SESSION["email"];
$role = $_SESSION["role"];
