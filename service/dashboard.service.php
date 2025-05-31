<?php
include __DIR__ . "/../config/database.php";

if (!isset($_SESSION["logged_in"]) || $_SESSION["role"] !== "ADMIN") {
  echo "Access Denied";
  exit;
}

$last_seven_days = $db->query("select sum(jumlah) as 'jmlh_peminjaman' from riwayat where tanggal_pinjam >= date(now() - interval 7 day) group by status having status = 'ACCEPTED'")->fetch_assoc();

$total_active_staff = $db->query("select count(*) as 'total_anggota' from users where role = 'STAFF'")->fetch_assoc();

$most_borrowed_items = $db->query("select k.nama_kategori, count(*) as jumlah_peminjaman from riwayat r join barang as brg on r.id_barang = brg.id_barang join kategori as k on brg.id_kategori = k.id_kategori group by k.id_kategori order by jumlah_peminjaman desc limit 1")->fetch_assoc();

$last_five_records = $db->query("select u.nama, brg.nama_barang, r.tanggal_pinjam from riwayat as r inner join users as u on r.id_peminjam = u.id_user inner join barang as brg on r.id_barang = brg.id_barang order by r.tanggal_pinjam desc limit 5");
