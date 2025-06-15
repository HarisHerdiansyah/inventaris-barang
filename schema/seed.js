require('dotenv').config({ path: "../.env" });
const mysql = require('mysql2/promise');
const bcrypt = require('bcrypt');
const { nanoid } = require('nanoid');

(async () => {
  const connection = await mysql.createConnection({
    host: process.env.DB_HOSTNAME,
    user: process.env.DB_USER,
    password: process.env.DB_PASSWORD,
    database: process.env.DB_NAME_PROD,
    port: process.env.DB_PORT
  });

  const hashPassword = async (password) => {
    const salt = await bcrypt.genSalt(10);
    return await bcrypt.hash(password, salt);
  };

  const users = [
    { id: nanoid(), nama: 'Admin Satu', email: 'admin1@example.com', role: 'ADMIN', pass: 'admin123' },
    { id: nanoid(), nama: 'Admin Dua', email: 'admin2@example.com', role: 'ADMIN', pass: 'admin456' },
    { id: nanoid(), nama: 'Staff Alpha', email: 'staff1@example.com', role: 'STAFF', pass: 'staff123' },
    { id: nanoid(), nama: 'Staff Beta', email: 'staff2@example.com', role: 'STAFF', pass: 'staff456' },
  ];

  for (const u of users) {
    const hashed = await hashPassword(u.pass);
    await connection.execute(
      `INSERT INTO users (id_user, nama, email, password, role)
       VALUES (?, ?, ?, ?, ?)`,
      [u.id, u.nama, u.email, hashed, u.role]
    );
  }

  const kategori = [
    { id: nanoid(), nama: 'Elektronik' },
    { id: nanoid(), nama: 'Furnitur' },
    { id: nanoid(), nama: 'ATK' },
  ];
  for (const k of kategori) {
    await connection.execute(
      `INSERT INTO kategori (id_kategori, nama_kategori)
       VALUES (?, ?)`,
      [k.id, k.nama]
    );
  }

  const barang = [
    { id: nanoid(), nama: 'Laptop Dell XPS', kategori: kategori[0].id, stok: 5, kondisi: '1' },
    { id: nanoid(), nama: 'Proyektor Epson', kategori: kategori[0].id, stok: 3, kondisi: '1' },
    { id: nanoid(), nama: 'Kursi Kantor', kategori: kategori[1].id, stok: 10, kondisi: '1' },
    { id: nanoid(), nama: 'Meja Rapat', kategori: kategori[1].id, stok: 2, kondisi: '0' },
    { id: nanoid(), nama: 'Pulpen', kategori: kategori[2].id, stok: 100, kondisi: '1' },
    { id: nanoid(), nama: 'Map Folder', kategori: kategori[2].id, stok: 50, kondisi: '1' },
  ];

  for (const b of barang) {
    await connection.execute(
      `INSERT INTO barang (id_barang, id_kategori, nama_barang, stok)
       VALUES (?, ?, ?, ?, ?)`,
      [b.id, b.kategori, b.nama, b.stok]
    );
  }

  const peminjamanData = [
    {
      id: nanoid(),
      peminjam: users[2].id,
      barang: barang[0].id,
      jumlah: 1,
      status: 'REJECTED',
      tanggal_pinjam: '2025-05-20',
      tanggal_pengembalian: '2025-05-25',
      approver: users[0].id,
    },
    {
      id: nanoid(),
      peminjam: users[3].id,
      barang: barang[1].id,
      jumlah: 1,
      status: 'ACCEPTED',
      tanggal_pinjam: '2025-05-21',
      tanggal_pengembalian: '2025-05-26',
      approver: users[1].id,
    },
    {
      id: nanoid(),
      peminjam: users[3].id,
      barang: barang[2].id,
      jumlah: 2,
      status: 'PENDING',
      tanggal_pinjam: '2025-05-27',
      tanggal_pengembalian: '2025-06-01',
      approver: null,
    },
  ];

  for (const p of peminjamanData) {
    await connection.execute(
      `INSERT INTO peminjaman (id_peminjaman, id_peminjam, id_barang, status, jumlah, tanggal_pinjam, tanggal_pengembalian)
       VALUES (?, ?, ?, ?, ?, ?, ?)`,
      [p.id, p.peminjam, p.barang, p.status, p.jumlah, p.tanggal_pinjam, p.tanggal_pengembalian]
    );

    if (p.status !== 'PENDING') {
      await connection.execute(
        `INSERT INTO riwayat (id_riwayat, id_peminjaman, id_peminjam, id_approver, id_barang, status, jumlah, tanggal_pinjam, tanggal_pengembalian)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)`,
        [
          nanoid(),
          p.id,
          p.peminjam,
          p.approver,
          p.barang,
          p.status,
          p.jumlah,
          p.tanggal_pinjam,
          p.tanggal_pengembalian,
        ]
      );
    }
  }

  await connection.end();
})();
