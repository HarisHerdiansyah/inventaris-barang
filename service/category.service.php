<?php
include __DIR__ . "/../config/database.php";

function insert($db, $id, $category_name)
{
  $stmt = $db->prepare("insert into kategori (id_kategori, nama_kategori) values (?, ?)");
  $stmt->bind_param("ss", $id, $category_name);

  if ($stmt->execute()) {
    echo json_encode([
      "message" => "Kategori berhasil ditambahkan."
    ]);
  } else {
    echo json_encode([
      "message" => "Kategori gagal ditambahkan. Coba lagi."
    ]);
  }
}

function update($db, $id, $category_name)
{
  $stmt = $db->prepare("update kategori set nama_kategori = ? where id_kategori = ?");
  $stmt->bind_param("ss", $category_name, $id);

  if ($stmt->execute()) {
    echo json_encode([
      "message" => "Kategori berhasil diperbaharui."
    ]);
  } else {
    echo json_encode([
      "message" => "Kategori gagal diperbaharui. Coba lagi."
    ]);
  }
}

function remove($db, $id)
{
  $stmt = $db->prepare("delete from kategori where id_kategori = ?");
  $stmt->bind_param("s", $id);

  if ($stmt->execute()) {
    echo json_encode([
      "message" => "Kategori berhasil dihapus."
    ]);
  } else {
    echo json_encode([
      "message" => "Kategori gagal diperbaharui. Coba lagi."
    ]);
  }
}

function not_found()
{
  echo json_encode([
    "message" => "Aksi tidak dapat diproses."
  ]);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $id = $_POST["id"];
  $category_name = $_POST["category"];
  $action = strtolower($_POST["action"]);

  if ($action === "insert") {
    insert($db, $id, $category_name);
  } else if ($action === "update") {
    update($db, $id, $category_name);
  } else if ($action === "delete") {
    remove($db, $id);
  } else {
    not_found();
  }
}


$four_most_items = $db->query("select k.nama_kategori, count(brg.id_kategori) as 'jmlh' from barang as brg left join kategori as k on brg.id_kategori = k.id_kategori group by brg.id_kategori order by jmlh desc limit 4");

$categories = $db->query("select * from kategori");
