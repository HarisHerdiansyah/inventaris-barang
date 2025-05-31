<?php
include __DIR__ . "/../config/database.php";

function get_current_rent(): mysqli_result
{
  global $db;
  return $db->query("
    SELECT 
      p.updated_at AS 'timestamp',
      p.id_peminjaman,
      u.nama,
      p.id_barang,
      brg.nama_barang AS 'barang',
      p.jumlah,
      p.status,
      p.tanggal_pinjam,
      p.tanggal_pengembalian
    FROM peminjaman p
    LEFT JOIN users u ON u.id_user = p.id_peminjam
    LEFT JOIN barang brg ON brg.id_barang = p.id_barang
    WHERE p.status = 'PENDING'
    ORDER BY p.updated_at ASC
  ");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  handle_rent_action($_POST);
}

function handle_rent_action($data)
{
  global $db;
  $db->autocommit(false);

  try {
    session_start();
    $userId = $_SESSION["uid"] ?? null;
    if (!$userId || !is_admin($userId)) throw new Exception("Akses ditolak");

    $rentId = $data["rentId"];
    $itemId = $data["itemId"];
    $quantity = (int)$data["quantity"];
    $status = $data["status"];

    if ($status === "ACCEPTED") {
      if (!check_item_stock($itemId, $quantity)) {
        throw new Exception("Stok tidak mencukupi");
      }
      update_item_stock($itemId, $quantity);
    }

    update_rent_status($rentId, $status);
    insert_history($userId, $rentId);

    $db->commit();
    http_response_code(201);
    echo json_encode(["message" => "Peminjaman berhasil diperbarui."]);
  } catch (Exception $e) {
    $db->rollback();
    http_response_code(400);
    echo json_encode([
      "message" => "Peminjaman gagal diperbarui.",
      "error" => $e->getMessage(),
    ]);
  } finally {
    $db->autocommit(true);
  }
}

function is_admin(string $userId): bool
{
  global $db;
  $stmt = $db->prepare("SELECT role FROM users WHERE id_user = ?");
  $stmt->bind_param("s", $userId);
  $stmt->execute();
  $result = $stmt->get_result()->fetch_assoc();
  return $result && $result["role"] === "ADMIN";
}

function check_item_stock(string $itemId, int $requiredQty): bool
{
  global $db;
  $stmt = $db->prepare("SELECT stok FROM barang WHERE id_barang = ?");
  $stmt->bind_param("s", $itemId);
  $stmt->execute();
  $result = $stmt->get_result()->fetch_assoc();
  return $result && $result["stok"] >= $requiredQty;
}

function update_item_stock(string $itemId, int $qty): void
{
  global $db;
  $stmt = $db->prepare("UPDATE barang SET stok = stok - ? WHERE id_barang = ?");
  $stmt->bind_param("is", $qty, $itemId);
  if (!$stmt->execute()) throw new Exception("Gagal update stok");
}

function update_rent_status(string $rentId, string $status): void
{
  global $db;
  $stmt = $db->prepare("UPDATE peminjaman SET status = ? WHERE id_peminjaman = ?");
  $stmt->bind_param("ss", $status, $rentId);
  if (!$stmt->execute()) throw new Exception("Gagal update status peminjaman");
}

function insert_history(string $approverId, string $rentId): void
{
  global $db;
  $stmt = $db->prepare("
    INSERT INTO riwayat (
      id_riwayat, id_peminjaman, id_peminjam, id_approver,
      id_barang, status, jumlah, tanggal_pinjam,
      tanggal_pengembalian, approved_at
    )
    SELECT 
      uuid(), id_peminjaman, id_peminjam, ?, id_barang, status, jumlah, tanggal_pinjam,
      tanggal_pengembalian, NOW()
    FROM peminjaman
    WHERE id_peminjaman = ?
  ");
  $stmt->bind_param("ss", $approverId, $rentId);
  if (!$stmt->execute()) throw new Exception("Gagal menyimpan riwayat");
}

function get_history()
{
  global $db;
  $stmt = $db->prepare("select u.nama as 'nama_peminjam', brg.nama_barang, r.jumlah, app.nama as 'approver', r.status, r.approved_at from riwayat as r left join users as u on r.id_peminjam = u.id_user left join users as app on r.id_approver = app.id_user left join barang as brg on r.id_barang = brg.id_barang");
  if (!$stmt->execute()) throw new Exception("Gagal mengambil data riwayat");
  $result = $stmt->get_result();
  return $result;
}
