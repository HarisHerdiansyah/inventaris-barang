<?php
function admin_only()
{
  $role = $_SESSION["role"];
  if ($role !== "ADMIN") {
    header("Location: /inventaris-barang/pages/home.php");
    exit;
  }
}

function staff_only()
{
  $role = $_SESSION["role"];
  if ($role !== "STAFF") {
    header("Location: /inventaris-barang/index.php");
    exit;
  }
}
