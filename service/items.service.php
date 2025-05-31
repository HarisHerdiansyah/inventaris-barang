<?php
include __DIR__ . "/../config/database.php";

function get_one($db, $id)
{
  $stmt = $db->prepare("SELECT id_barang, nama_barang, id_kategori, stok FROM barang WHERE id_barang = ?");
  $stmt->bind_param("s", $id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($item = $result->fetch_assoc()) {
    header("Content-Type: application/json");
    echo json_encode([
      "message" => "Data barang ditemukan",
      "data" => $item
    ]);
  } else {
    http_response_code(404);
    echo json_encode(["message" => "Barang tidak ditemukan"]);
  }
}

function get_items($db, $category)
{
  $stmt = $db->prepare("select id_barang, nama_barang from barang where id_kategori = ? and stok > 0");
  $stmt->bind_param("s", $category);
  if (!$stmt->execute()) exit;
  $items = $stmt->get_result();

  $data = [];
  while ($row = $items->fetch_assoc()) {
    $data[] = $row;
  }

  echo json_encode([
    "message" => "Data berhasil diambil",
    "data" => $data,
    "category" => $category
  ]);
}

function insert($db, $id, $itemName, $category, $stock)
{
  $stmt = $db->prepare("INSERT INTO barang (id_barang, nama_barang, id_kategori, stok) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("sssi", $id, $itemName, $category, $stock);

  echo json_encode([
    "message" => $stmt->execute()
      ? "Barang baru berhasil ditambahkan."
      : "Gagal menambahkan data barang. Coba lagi."
  ]);
}

function update($db, $id, $itemName, $category, $stock)
{
  $stmt = $db->prepare("UPDATE barang SET nama_barang = ?, id_kategori = ?, stok = ? WHERE id_barang = ?");
  $stmt->bind_param("ssis", $itemName, $category, $stock, $id);

  echo json_encode([
    "message" => $stmt->execute()
      ? "Data barang berhasil diperbaharui."
      : "Data barang gagal diperbaharui. Coba lagi."
  ]);
}

function remove($db, $id)
{
  $stmt = $db->prepare("DELETE FROM barang WHERE id_barang = ?");
  $stmt->bind_param("s", $id);

  echo json_encode([
    "message" => $stmt->execute()
      ? "Data barang berhasil dihapus."
      : "Data barang gagal dihapus. Coba lagi."
  ]);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $action = strtolower($_POST["action"] ?? "");
  $id = $_POST["id"] ?? null;
  $itemName = $_POST["itemName"] ?? null;
  $category = $_POST["category"] ?? null;
  $stock = $_POST["stock"] ?? null;

  if ($action === "insert") {
    insert($db, $id, $itemName, $category, $stock);
  } elseif ($action === "update") {
    update($db, $id, $itemName, $category, $stock);
  } elseif ($action === "delete") {
    remove($db, $id);
  } else {
    http_response_code(400);
    echo json_encode(["message" => "Aksi tidak valid"]);
  }
} elseif ($_SERVER["REQUEST_METHOD"] === "GET") {
  if (isset($_GET["action"]) && $_GET["action"] === "GET_ONE" && isset($_GET["id"])) {
    get_one($db, $_GET["id"]);
  } elseif (isset($_GET["category"])) {
    get_items($db, $_GET["category"]);
  } else {
    http_response_code(400);
    echo json_encode(["message" => "Parameter tidak lengkap"]);
  }
}
