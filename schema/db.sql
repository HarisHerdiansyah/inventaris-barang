-- JANGAN DIUBAH ATAU EXECUTE DI TERMINAL

create table users (
  id_user varchar(50) primary key not null,
  nama varchar(100) not null,
  email varchar(100) unique not null,
  password varchar(100) not null,
  role enum('ADMIN', 'STAFF')
);

create table kategori (
  id_kategori varchar(50) primary key not null,
  nama_kategori varchar(100) not null
);

create table barang (
  id_barang varchar(50) primary key not null,
  kategori varchar(50) not null,
  nama_barang varchar(100) not null,
  stok int unsigned not null default 0,
  kondisi enum('0', '1'),
  -- 0: Kurang baik; 1: Baik
  foreign key (kategori) references kategori(id_kategori)
);

create table peminjaman (
  id_peminjaman varchar(50) primary key not null,
  id_peminjam varchar(50) not null,
  id_barang varchar(50) not null,
  status enum('PENDING', 'ACCEPTED', 'REJECTED'),
  jumlah int unsigned not null default 1,
  tanggal_pinjam date not null,
  tanggal_pengembalian date not null,
  foreign key (id_peminjam) references users(id_user),
  foreign key (id_barang) references barang(id_barang)
);

create table riwayat (
  id_riwayat varchar(50) primary key not null,
  id_peminjaman varchar(50) not null,
  id_peminjam varchar(50) not null,
  id_approver varchar(50) not null,
  id_barang varchar(50) not null,
  foreign key (id_peminjaman) references peminjaman(id_peminjaman),
  foreign key (id_peminjam) references users(id_user),
  foreign key (id_approver) references users(id_user),
  foreign key (id_barang) references barang(id_barang)
);
