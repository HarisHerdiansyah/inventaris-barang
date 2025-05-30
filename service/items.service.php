<?php
include __DIR__ . "/../config/database.php";

function insert($db, $id, $itemName, $category, $stock)
{
  $stmt = $db->prepare("insert into barang (id_barang, nama_barang, id_kategori, stok) values (?, ?, ?, ?)");
  $stmt->bind_param("sssi", $id, $itemName, $category, $stock);

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

function update($db, $id, $itemName, $category, $stock) 
{
  $stmt = $db->prepare("update barang set nama_barang = ?, id_kategori = ?, stok = ?, kondisi = ? where id_barang = ?");
  $stmt->bind_param("ssis", $itemName, $category, $stock, $id);

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

function get_items($category) {
  global $db;
  $stmt = $db->prepare("select id_barang, nama_barang from barang where id_kategori = ? and stok > 0");
  $stmt->bind_param("s", $category);
  if (!$stmt->execute()) exit;
  $items = $stmt->get_result();

  if ($items->num_rows <= 0) exit;

  $data = array();
  while ($row = $items->fetch_assoc()) {
    $data[] = $row;
  }
  
  echo json_encode([
    "message" => "Data berhasil diambil",
    "data" => $data,
    "category" => $category
  ]);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $action = strtolower($_POST["action"]);
  $id = $_POST["id"];
  $itemName = $_POST["itemName"];
  $category = $_POST["category"];
  $stock = $_POST["stock"];

  if ($action === "insert") {
    insert($db, $id, $itemName, $category, $stock);
  } else if ($action === "update") {
    update($db, $id, $itemName, $category, $stock);
  } else {
    remove($db, $id);
  }
} else if ($_SERVER["REQUEST_METHOD"] === "GET") {
  $category = $_GET["category"];
  get_items($category);
}
