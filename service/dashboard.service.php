<?php
include __DIR__ . "/../config/database.php";

if (!isset($_SESSION["logged_in"]) || $_SESSION["role"] !== "ADMIN") {
  echo "Access Denied";
  exit;
}

$last_seven_days = $db->query("select sum(jumlah) as 'jmlh_peminjaman' from riwayat where tanggal_pinjam >= date(now() - interval 10 day)");
$last_seven_days = $last_seven_days->fetch_assoc();

$total_active_staff = $db->query("select count(*) as 'total_anggota' from users where role = 'STAFF'");
$total_active_staff = $total_active_staff->fetch_assoc();

$most_borrowed_items = $db->query("select max(k.id_kategori), k.nama_kategori from riwayat as r left join barang as brg on r.id_barang = brg.id_barang left join kategori as k on brg.id_kategori = k.id_kategori group by k.nama_kategori");
$most_borrowed_items = $most_borrowed_items->fetch_assoc();

$last_five_records = $db->query("select u.nama, brg.nama_barang, r.tanggal_pinjam from riwayat as r inner join users as u on r.id_peminjam = u.id_user inner join barang as brg on r.id_barang = brg.id_barang order by r.tanggal_pinjam desc limit 5");
