<?php
include "../config/database.php";

function insert($db, $id, $itemName, $category, $stock, $condition)
{
  $stmt = $db->prepare("insert into barang (id_barang, nama_barang, kategori, stok, kondisi) values (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssis", $id, $itemName, $category, $stock, $condition);

  if ($stmt->execute()) {
    echo json_encode([
      "message" => "Barang baru berhasil ditambahkan."
    ]);
  } else {
    echo json_encode([
      "message" => "Gagal menambahkan data barang. Coba lagi."
    ]);
  }
}

function update() {}

function remove() {}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $action = strtolower($_POST["action"]);
  $id = $_POST["id"];
  $itemName = $_POST["itemName"];
  $category = $_POST["category"];
  $stock = $_POST["stock"];
  $condition = $_POST["condition"];

  if ($action === "insert") {
    insert($db, $id, $itemName, $category, $stock, $condition);
  }
}
