<?php
include __DIR__ . "/../config/database.php";

function unauthorized()
{
  echo json_encode(["message" => "Tidak terautentikasi"]);
  exit;
}

function insertRent($db, $uid)
{
  $id = $_POST["id"] ?? null;
  $items = $_POST["items"] ?? null;
  $quantity = $_POST["quantity"] ?? 0;
  $borrow_date = $_POST["borrow_date"] ?? null;
  $restore_date = $_POST["restore_date"] ?? null;

  if (!$id || !$items || !$borrow_date || !$restore_date) {
    http_response_code(400);
    echo json_encode(["message" => "Data tidak lengkap"]);
    exit;
  }

  $stmt = $db->prepare("insert into peminjaman (id_peminjaman, id_peminjam, id_barang, jumlah, tanggal_pinjam, tanggal_pengembalian) values (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssiss", $id, $uid, $items, $quantity, $borrow_date, $restore_date);

  if (!$stmt->execute()) {
    http_response_code(500);
    echo json_encode(["message" => "Gagal menyimpan peminjaman"]);
    exit;
  }

  echo json_encode(["message" => "Peminjaman berhasil diajukan"]);
  exit;
}

function fetchRents($db, $uid)
{
  $stmt = $db->prepare("select p.id_peminjaman, brg.nama_barang, p.jumlah, p.updated_at as waktu_pengajuan, p.tanggal_pinjam, p.status from peminjaman as p left join barang as brg on p.id_barang = brg.id_barang where p.id_peminjam = ? order by status");
  $stmt->bind_param("s", $uid);
  $stmt->execute();
  return $stmt->get_result();
}

function retryRent($db)
{
  $rent_id = $_POST["rentId"];
  $stmt = $db->prepare("update peminjaman set status = 'PENDING' where id_peminjaman = ?");
  $stmt->bind_param("s", $rent_id);

  if (!$stmt->execute()) {
    http_response_code(500);
    echo json_encode(["message" => "Gagal melakukan pengajuan ulang"]);
    exit;
  }

  echo json_encode(["message" => "Pengajuan ulang berhasil"]);
  exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  session_start();
  if (!isset($_SESSION["uid"])) {
    unauthorized();
  }

  $action = strtolower($_POST["action"]);

  if ($action === "insert") {
    insertRent($db, $_SESSION["uid"]);
  } else if ($action === "update") {
    retryRent($db);
  }
}

if (isset($_SESSION["uid"])) {
  $rents = fetchRents($db, $_SESSION["uid"]);
}
