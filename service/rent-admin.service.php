<?php
include __DIR__ . "/../config/database.php";

function get_current_rent()
{
  global $db;
  $rents = $db->query("select p.updated_at as 'timestamp', p.id_peminjaman, u.nama, p.id_barang, brg.nama_barang as 'barang', p.jumlah, p.status, p.tanggal_pinjam, p.tanggal_pengembalian from peminjaman as p left join users as u on u.id_user = p.id_peminjam left join barang as brg on brg.id_barang = p.id_barang where status = 'PENDING' order by p.updated_at asc;
  ");
  return $rents;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $rent_id = $_POST["rentId"];
  $item_id = $_POST["itemId"];
  $status = $_POST["status"];
  $quantity = $_POST["quantity"];

  $db->autocommit(false);

  try {
    session_start();
    $current_uid = $_SESSION["uid"];

    $u_stmt = $db->prepare("SELECT role FROM users WHERE id_user = ?");
    $u_stmt->bind_param("s", $current_uid);
    if (!$u_stmt->execute()) throw new Exception("Gagal cek role user");
    $u_result = $u_stmt->get_result();
    if ($u_result->num_rows === 0) throw new Exception("User tidak ditemukan");
    $u_data = $u_result->fetch_assoc();
    if ($u_data["role"] !== "ADMIN") throw new Exception("Akses ditolak");

    if ($status === "ACCEPTED") {
      $stok_stmt = $db->prepare("SELECT stok FROM barang WHERE id_barang = ?");
      $stok_stmt->bind_param("s", $item_id);
      if (!$stok_stmt->execute()) throw new Exception("Gagal cek stok barang");
      $stok_result = $stok_stmt->get_result();
      if ($stok_result->num_rows === 0) throw new Exception("Barang tidak ditemukan");
      $stok = $stok_result->fetch_assoc()["stok"];
      if ($stok < $quantity) throw new Exception("Stok tidak mencukupi");

      $brg_stmt = $db->prepare("UPDATE barang SET stok = stok - ? WHERE id_barang = ?");
      $brg_stmt->bind_param("is", $quantity, $item_id);
      if (!$brg_stmt->execute()) throw new Exception("Gagal update stok");
    }

    $p_stmt = $db->prepare("UPDATE peminjaman SET status = ? WHERE id_peminjaman = ?");
    $p_stmt->bind_param("ss", $status, $rent_id);
    if (!$p_stmt->execute()) throw new Exception("Gagal update status peminjaman");

    $r_stmt = $db->prepare("
      INSERT INTO riwayat (
        id_riwayat, id_peminjaman, id_peminjam, id_approver,
        id_barang, status, jumlah, tanggal_pinjam,
        tanggal_pengembalian, approved_at
      )
      SELECT uuid(), id_peminjaman, id_peminjam, ?, id_barang, status, jumlah, tanggal_pinjam, tanggal_pengembalian, NOW()
      FROM peminjaman
      WHERE id_peminjaman = ?
    ");
    $r_stmt->bind_param("ss", $current_uid, $rent_id);
    if (!$r_stmt->execute()) throw new Exception("Gagal menyimpan riwayat");

    $db->commit();
    echo json_encode([
      "message" => "Peminjaman berhasil diperbarui."
    ]);
  } catch (Exception $e) {
    $db->rollback();
    echo json_encode([
      "message" => "Peminjaman gagal diperbarui.",
      "error" => $e->getMessage()
    ]);
  }

  $db->autocommit(true);
}
