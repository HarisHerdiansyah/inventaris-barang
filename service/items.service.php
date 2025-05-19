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

function update($db, $id, $itemName, $category, $stock, $condition) 
{
  $stmt = $db->prepare("update barang set nama_barang = ?, kategori = ?, stok = ?, kondisi = ? where id_barang = ?");
  $stmt->bind_param("ssiss", $itemName, $category, $stock, $condition, $id);

  if ($stmt->execute()) {
    echo json_encode([
      "message" => "Data barang berhasil diperbaharui."
    ]);
  } else {
    echo json_encode([
      "message" => "Data barang gagal diperbaharui. Coba lagi."
    ]);
  }
}

function remove($db, $id) {
  $stmt = $db->prepare("delete from barang where id_barang = ?");
  $stmt->bind_param("s", $id);

  if ($stmt->execute()) {
    echo json_encode([
      "message" => "Data barang berhasil dihapus."
    ]);
  } else {
    echo json_encode([
      "message" => "Data barang gagal dihapus. Coba lagi."
    ]);
  }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $action = strtolower($_POST["action"]);
  $id = $_POST["id"];
  $itemName = $_POST["itemName"];
  $category = $_POST["category"];
  $stock = $_POST["stock"];
  $condition = $_POST["condition"];

  if ($action === "insert") {
    insert($db, $id, $itemName, $category, $stock, $condition);
  } else if ($action === "update") {
    update($db, $id, $itemName, $category, $stock, $condition);
  } else {
    remove($db, $id);
  }
}
