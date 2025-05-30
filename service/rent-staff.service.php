<?php
include __DIR__ . "/../config/database.php";

function unauthorized()
{
  echo json_encode([
    "message" => "Tidak terautentikasi"
  ]);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  session_start();
  if (!$_SESSION["uid"]) {
    unauthorized();
    exit;
  }

  $action = strtolower($_POST["action"]);
  $id = $_POST["id"];
  $uid = $_SESSION["uid"];
  $items = $_POST["items"];
  $quantity = $_POST["quantity"];
  $borrow_date = $_POST["borrow_date"];
  $restore_date = $_POST["restore_date"];

  if ($action === "insert") {
    $stmt = $db->prepare("insert into peminjaman(id_peminjaman, id_peminjam, id_barang, jumlah, tanggal_pinjam, tanggal_pengembalian) values (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiss", $id, $uid, $items, $quantity, $borrow_date, $restore_date);

    if (!$stmt->execute()) exit;

    echo json_encode([
      "message" => "Peminjaman berhasil diajukan"
    ]);
  }
}

$stmt = $db->prepare("select brg.nama_barang, p.jumlah, p.updated_at as 'waktu_pengajuan', p.tanggal_pinjam, p.status from peminjaman as p left join barang as brg on p.id_barang = brg.id_barang where p.id_peminjam = ?");
$stmt->bind_param("s", $_SESSION["uid"]);
if (!$stmt->execute()) exit;
$rents = $stmt->get_result();
