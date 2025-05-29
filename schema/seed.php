<?php
include "../config/database.php";

$data_users = [
  [
    "id" => "sp9FNu7NEjo8Hty5FVVbs",
    "role" => "ADMIN",
    "name" => "Evan Hartono",
    "email" => "evan.hartono@gmail.com",
    "password" => "12345678"
  ],
  [
    "id" => "Bw0eBMHE3K1YwaTqajl2X",
    "role" => "ADMIN",
    "name" => "Sinta Wijaya",
    "email" => "sinta.wijaya@gmail.com",
    "password" => "12345678"
  ],
  [
    "id" => "9Z-6dxt7yv9Q1JpFrvqyN",
    "role" => "ADMIN",
    "name" => "Rudi Setiawan",
    "email" => "rudi.setiawan@gmail.com",
    "password" => "12345678"
  ],
  [
    "id" => "-_17rc_YeMqg-D-F5F1D8",
    "role" => "STAFF",
    "name" => "Lina Kartika",
    "email" => "lina.kartika@gmail.com",
    "password" => "12345678"
  ],
  [
    "id" => "X6-KYCeEb8qfRBGhgwtoA",
    "role" => "STAFF",
    "name" => "Agus Pratama",
    "email" => "agus.pratama@gmail.com",
    "password" => "12345678"
  ],
  [
    "id" => "RemcW224jj_oXNTe-KHrI",
    "role" => "STAFF",
    "name" => "Dewi Maharani",
    "email" => "dewi.maharani@gmail.com",
    "password" => "12345678"
  ],
  [
    "id" => "UNbxDHie3mNguMBdRU0CY",
    "role" => "STAFF",
    "name" => "Hendra Gunawan",
    "email" => "hendra.gunawan@gmail.com",
    "password" => "12345678"
  ],
  [
    "id" => "Vv6r7L2QhxMS2fvL2A86N",
    "role" => "STAFF",
    "name" => "Mega Ardiansyah",
    "email" => "mega.ardiansyah@gmail.com",
    "password" => "12345678"
  ],
  [
    "id" => "Zd_ft9AOgC9NudwjEG7V-",
    "role" => "STAFF",
    "name" => "Tina Suprapti",
    "email" => "tina.suprapti@gmail.com",
    "password" => "12345678"
  ],
  [
    "id" => "jNfsPHjbzLCnHugRR0zOx",
    "role" => "STAFF",
    "name" => "Fajar Hidayat",
    "email" => "fajar.hidayat@gmail.com",
    "password" => "12345678"
  ]
];

$data_categories = [
  [
    "id" => "TqawxPs5Arz2qkn3C2uv1",
    "kategori" => "Alat Tulis Kantor"
  ],
  [
    "id" => "6wTIIGl-XtiYqW4SPMLRW",
    "kategori" => "Peralatan Kebersihan"
  ],
  [
    "id" => "4m-kMm5fQTe_L5MmWVcL_",
    "kategori" => "Perangkat Elektronik"
  ],
  [
    "id" => "aJFXikYl2jjudI9hO-lvS",
    "kategori" => "Peralatan Keamanan"
  ],
  [
    "id" => "w11wZi1e52gxaBsCCu9Eo",
    "kategori" => "Perlengkapan Gudang"
  ],
  [
    "id" => "AgZKcRU8zLNS5piBwjGHS",
    "kategori" => "Barang Cetakan dan Dokumen"
  ],
  [
    "id" => "gB-TjXd4VDloPmizr5zKt",
    "kategori" => "Peralatan Jaringan"
  ]
];

$data_items = [
  ["id" => "nhiSdGS37NsHLtkFeB3kz", "nama_barang" => "Pulpen Gel", "stok" => 45, "kategori" => "TqawxPs5Arz2qkn3C2uv1"],
  ["id" => "dbxkWTn5OtCXnxCnDA5ON", "nama_barang" => "Sapu Lantai", "stok" => 30, "kategori" => "6wTIIGl-XtiYqW4SPMLRW"],
  ["id" => "MbcF6AVxhUay0IgHcDIco", "nama_barang" => "Printer Inkjet", "stok" => 12, "kategori" => "4m-kMm5fQTe_L5MmWVcL_"],
  ["id" => "9LTarkTdbjXbfman1Lr4R", "nama_barang" => "CCTV Wireless", "stok" => 18, "kategori" => "aJFXikYl2jjudI9hO-lvS"],
  ["id" => "aJ1pUUStZsE-Klp3BzD69", "nama_barang" => "Rak Besi", "stok" => 25, "kategori" => "w11wZi1e52gxaBsCCu9Eo"],
  ["id" => "8tpu0ghc2S21vUUiUmFyv", "nama_barang" => "Map Folder", "stok" => 60, "kategori" => "TqawxPs5Arz2qkn3C2uv1"],
  ["id" => "EDNO1lUnEJMXHPwds0dPM", "nama_barang" => "Tissue Gulung", "stok" => 40, "kategori" => "6wTIIGl-XtiYqW4SPMLRW"],
  ["id" => "57K2HJutfSOTID7PcDXoi", "nama_barang" => "Monitor LED", "stok" => 15, "kategori" => "4m-kMm5fQTe_L5MmWVcL_"],
  ["id" => "jyIFPJQbtflk0JGxXjDuR", "nama_barang" => "Alat Pemadam Api", "stok" => 8, "kategori" => "aJFXikYl2jjudI9hO-lvS"],
  ["id" => "ptKKOVYq5VReSLCgGyLYn", "nama_barang" => "Pallet Plastik", "stok" => 22, "kategori" => "w11wZi1e52gxaBsCCu9Eo"],
  ["id" => "irCW13toL3ExmQTPCWFRx", "nama_barang" => "Kertas HVS", "stok" => 100, "kategori" => "AgZKcRU8zLNS5piBwjGHS"],
  ["id" => "2i8afDXOMe92L6VuABYS0", "nama_barang" => "Kabel LAN", "stok" => 35, "kategori" => "gB-TjXd4VDloPmizr5zKt"],
  ["id" => "0kp1MB-CGZDQeEP0nJ4oH", "nama_barang" => "Spidol Whiteboard", "stok" => 50, "kategori" => "TqawxPs5Arz2qkn3C2uv1"],
  ["id" => "Du0oJ2Tw66q3-lJ29MoMZ", "nama_barang" => "Lap Pel", "stok" => 33, "kategori" => "6wTIIGl-XtiYqW4SPMLRW"],
  ["id" => "0uDI3up8ckxPIL7uJ0tm_", "nama_barang" => "Scanner Dokumen", "stok" => 10, "kategori" => "4m-kMm5fQTe_L5MmWVcL_"],
  ["id" => "9prMCRUxvKzxMVBjdfqRl", "nama_barang" => "Alarm Keamanan", "stok" => 7, "kategori" => "aJFXikYl2jjudI9hO-lvS"],
  ["id" => "3-_zPNefCP2Wr3M1o4Ou-", "nama_barang" => "Troli Barang", "stok" => 20, "kategori" => "w11wZi1e52gxaBsCCu9Eo"],
  ["id" => "kIPLSFC1oK9rNt5-wdfBj", "nama_barang" => "Stempel Otomatis", "stok" => 18, "kategori" => "AgZKcRU8zLNS5piBwjGHS"],
  ["id" => "xhm7HoAhjQ2P9-OAqi7oI", "nama_barang" => "Switch Hub", "stok" => 12, "kategori" => "gB-TjXd4VDloPmizr5zKt"],
  ["id" => "cUvi-ahv-AW_s6TSdvDE3", "nama_barang" => "Binder Notebook", "stok" => 65, "kategori" => "TqawxPs5Arz2qkn3C2uv1"],
  ["id" => "k2H6C_m4PpGvt0d3_4ykg", "nama_barang" => "Sabun Cuci", "stok" => 55, "kategori" => "6wTIIGl-XtiYqW4SPMLRW"],
  ["id" => "FmWq6JRqSKg9aPB1lT0S6", "nama_barang" => "Proyektor LCD", "stok" => 6, "kategori" => "4m-kMm5fQTe_L5MmWVcL_"],
  ["id" => "cOi_8yTFkdO94RXcux4zW", "nama_barang" => "Kunci Pintu Digital", "stok" => 11, "kategori" => "aJFXikYl2jjudI9hO-lvS"],
  ["id" => "B_E05rDLAT4hcz3BCfmTm", "nama_barang" => "Tangga Aluminium", "stok" => 14, "kategori" => "w11wZi1e52gxaBsCCu9Eo"],
  ["id" => "sB7iAz9J1pW_ObtFcQZMX", "nama_barang" => "Amplop Coklat", "stok" => 70, "kategori" => "AgZKcRU8zLNS5piBwjGHS"],
  ["id" => "GUIlooPRg9vLU66OXV5oo", "nama_barang" => "Router Wireless", "stok" => 17, "kategori" => "gB-TjXd4VDloPmizr5zKt"],
  ["id" => "nDf637xIVp3mFpA2OWvEA", "nama_barang" => "Kertas Label", "stok" => 80, "kategori" => "AgZKcRU8zLNS5piBwjGHS"],
  ["id" => "mfx_xI_i1L8AiPBqZruJk", "nama_barang" => "Mouse Wireless", "stok" => 25, "kategori" => "4m-kMm5fQTe_L5MmWVcL_"],
  ["id" => "3asEhQK3A4h7cZ1o-Mk1b", "nama_barang" => "Dispenser Sabun", "stok" => 22, "kategori" => "6wTIIGl-XtiYqW4SPMLRW"],
  ["id" => "6phuxOaxFDmNkg1la3UK1", "nama_barang" => "Lemari Arsip", "stok" => 10, "kategori" => "w11wZi1e52gxaBsCCu9Eo"],
  ["id" => "ykbaWVOnlaYKcA6taXOJk", "nama_barang" => "ID Card Holder", "stok" => 58, "kategori" => "TqawxPs5Arz2qkn3C2uv1"],
  ["id" => "eMAkNRUgr7eNrX2W5-gQe", "nama_barang" => "Pel Lantai Otomatis", "stok" => 19, "kategori" => "6wTIIGl-XtiYqW4SPMLRW"],
  ["id" => "WoGUAVqR_NySjdgUYbxEJ", "nama_barang" => "Scanner Barcode", "stok" => 13, "kategori" => "4m-kMm5fQTe_L5MmWVcL_"],
  ["id" => "_FAcUFlxRV76HGVmqapDQ", "nama_barang" => "Alarm Pintu", "stok" => 9, "kategori" => "aJFXikYl2jjudI9hO-lvS"],
  ["id" => "4kBmEc5b2_VLVcw81eM3b", "nama_barang" => "Hand Pallet", "stok" => 16, "kategori" => "w11wZi1e52gxaBsCCu9Eo"],
  ["id" => "HYAetKeZXLJsWs6Kw05rc", "nama_barang" => "Buku Agenda", "stok" => 48, "kategori" => "AgZKcRU8zLNS5piBwjGHS"],
  ["id" => "_oduPzRhgILO1p3AaVbcx", "nama_barang" => "Access Point", "stok" => 21, "kategori" => "gB-TjXd4VDloPmizr5zKt"],
  ["id" => "JlJrbykwgazEgABYjOYSR", "nama_barang" => "Amplifier Ruangan", "stok" => 10, "kategori" => "4m-kMm5fQTe_L5MmWVcL_"]
];

$data_loans = [
  [
    "id" => "a4H6po9cxWa5eunZrRl2v",
    "status" => "ACCEPTED",
    "jumlah" => 3,
    "tanggal_pinjam" => "2025-04-02",
    "tanggal_pengembalian" => "2025-04-12",
    "id_peminjam" => "RemcW224jj_oXNTe-KHrI",
    "id_barang" => "jyIFPJQbtflk0JGxXjDuR"
  ],
  [
    "id" => "E-qDpCLcvsnRulLDw1o5C",
    "status" => "REJECTED",
    "jumlah" => 2,
    "tanggal_pinjam" => "2025-03-27",
    "tanggal_pengembalian" => "2025-04-06",
    "id_peminjam" => "Zd_ft9AOgC9NudwjEG7V-",
    "id_barang" => "EDNO1lUnEJMXHPwds0dPM"
  ],
  [
    "id" => "SG3BjG_03JkD9sHtX9mbn",
    "status" => "PENDING",
    "jumlah" => 4,
    "tanggal_pinjam" => "2025-04-01",
    "tanggal_pengembalian" => "2025-04-10",
    "id_peminjam" => "Vv6r7L2QhxMS2fvL2A86N",
    "id_barang" => "MbcF6AVxhUay0IgHcDIco"
  ],
  [
    "id" => "A56DqB5mbeE7Z_Qb3Q9lb",
    "status" => "ACCEPTED",
    "jumlah" => 1,
    "tanggal_pinjam" => "2025-03-30",
    "tanggal_pengembalian" => "2025-04-08",
    "id_peminjam" => "X6-KYCeEb8qfRBGhgwtoA",
    "id_barang" => "9LTarkTdbjXbfman1Lr4R"
  ],
  [
    "id" => "Vn6T7jfZthCsYSYUlPWpk",
    "status" => "REJECTED",
    "jumlah" => 5,
    "tanggal_pinjam" => "2025-03-26",
    "tanggal_pengembalian" => "2025-04-05",
    "id_peminjam" => "UNbxDHie3mNguMBdRU0CY",
    "id_barang" => "kIPLSFC1oK9rNt5-wdfBj"
  ],
  [
    "id" => "pq75kpkDH5u-8rjQJVavY",
    "status" => "PENDING",
    "jumlah" => 2,
    "tanggal_pinjam" => "2025-03-25",
    "tanggal_pengembalian" => "2025-04-03",
    "id_peminjam" => "Zd_ft9AOgC9NudwjEG7V-",
    "id_barang" => "0kp1MB-CGZDQeEP0nJ4oH"
  ],
  [
    "id" => "9nP7p8eNkbzGAzBCoTMYm",
    "status" => "REJECTED",
    "jumlah" => 3,
    "tanggal_pinjam" => "2025-03-31",
    "tanggal_pengembalian" => "2025-04-09",
    "id_peminjam" => "RemcW224jj_oXNTe-KHrI",
    "id_barang" => "8tpu0ghc2S21vUUiUmFyv"
  ],
  [
    "id" => "_KRWgAJ9PC6e-HukGEHNh",
    "status" => "ACCEPTED",
    "jumlah" => 1,
    "tanggal_pinjam" => "2025-04-03",
    "tanggal_pengembalian" => "2025-04-11",
    "id_peminjam" => "Vv6r7L2QhxMS2fvL2A86N",
    "id_barang" => "0uDI3up8ckxPIL7uJ0tm_"
  ],
  [
    "id" => "GZ76f0BIpFWEpIdTyrnyR",
    "status" => "ACCEPTED",
    "jumlah" => 3,
    "tanggal_pinjam" => "2025-04-04",
    "tanggal_pengembalian" => "2025-04-14",
    "id_peminjam" => "UNbxDHie3mNguMBdRU0CY",
    "id_barang" => "nhiSdGS37NsHLtkFeB3kz"
  ],
  [
    "id" => "UdaYJ3J7gLhHseSejqZ2G",
    "status" => "REJECTED",
    "jumlah" => 4,
    "tanggal_pinjam" => "2025-03-29",
    "tanggal_pengembalian" => "2025-04-06",
    "id_peminjam" => "jNfsPHjbzLCnHugRR0zOx",
    "id_barang" => "dbxkWTn5OtCXnxCnDA5ON"
  ],
  [
    "id" => "ol4R7cnewNUs1a5bFmDcr",
    "status" => "PENDING",
    "jumlah" => 1,
    "tanggal_pinjam" => "2025-04-05",
    "tanggal_pengembalian" => "2025-04-13",
    "id_peminjam" => "Zd_ft9AOgC9NudwjEG7V-",
    "id_barang" => "nDf637xIVp3mFpA2OWvEA"
  ],
  [
    "id" => "kPTSOTjWLm5_lvUJELQnx",
    "status" => "ACCEPTED",
    "jumlah" => 5,
    "tanggal_pinjam" => "2025-03-28",
    "tanggal_pengembalian" => "2025-04-09",
    "id_peminjam" => "UNbxDHie3mNguMBdRU0CY",
    "id_barang" => "flyY65cUoc0OvgUxJ2ZgW"
  ],
  [
    "id" => "7s3ZtG8F2KyaEg-XU8aBU",
    "status" => "REJECTED",
    "jumlah" => 2,
    "tanggal_pinjam" => "2025-04-01",
    "tanggal_pengembalian" => "2025-04-08",
    "id_peminjam" => "RemcW224jj_oXNTe-KHrI",
    "id_barang" => "GUIlooPRg9vLU66OXV5oo"
  ],
  [
    "id" => "IP4sYLwaZGI1ifUny3mij",
    "status" => "ACCEPTED",
    "jumlah" => 4,
    "tanggal_pinjam" => "2025-03-26",
    "tanggal_pengembalian" => "2025-04-06",
    "id_peminjam" => "Zd_ft9AOgC9NudwjEG7V-",
    "id_barang" => "sfn4VkwDwpgBAztUJbAnI"
  ],
  [
    "id" => "Ep7Ew6UYv0tu7fhlLsuUf",
    "status" => "PENDING",
    "jumlah" => 3,
    "tanggal_pinjam" => "2025-04-03",
    "tanggal_pengembalian" => "2025-04-11",
    "id_peminjam" => "X6-KYCeEb8qfRBGhgwtoA",
    "id_barang" => "pbPur1_vFp1kxdXIjHhwT"
  ]
];

$data_history = [
  [
    "id_riwayat" => "_50sS05r3rrlxWkKmB_UM",
    "id_peminjaman" => "a4H6po9cxWa5eunZrRl2v",
    "id_peminjam" => "RemcW224jj_oXNTe-KHrI",
    "id_approver" => "Bw0eBMHE3K1YwaTqajl2X",
    "id_barang" => "jyIFPJQbtflk0JGxXjDuR"
  ],
  [
    "id_riwayat" => "VJPAzWBOH0WQYTTFDlG8J",
    "id_peminjaman" => "E-qDpCLcvsnRulLDw1o5C",
    "id_peminjam" => "Zd_ft9AOgC9NudwjEG7V-",
    "id_approver" => "sp9FNu7NEjo8Hty5FVVbs",
    "id_barang" => "EDNO1lUnEJMXHPwds0dPM"
  ],
  [
    "id_riwayat" => "GWsf35RN7wwvKpeYRxA6_",
    "id_peminjaman" => "SG3BjG_03JkD9sHtX9mbn",
    "id_peminjam" => "Vv6r7L2QhxMS2fvL2A86N",
    "id_approver" => "9Z-6dxt7yv9Q1JpFrvqyN",
    "id_barang" => "MbcF6AVxhUay0IgHcDIco"
  ],
  [
    "id_riwayat" => "8XeiCQIW7j4AiIVRhq3UV",
    "id_peminjaman" => "A56DqB5mbeE7Z_Qb3Q9lb",
    "id_peminjam" => "X6-KYCeEb8qfRBGhgwtoA",
    "id_approver" => "Bw0eBMHE3K1YwaTqajl2X",
    "id_barang" => "9LTarkTdbjXbfman1Lr4R"
  ],
  [
    "id_riwayat" => "SEI0G4d6IR4-rHsHPpIEa",
    "id_peminjaman" => "Vn6T7jfZthCsYSYUlPWpk",
    "id_peminjam" => "UNbxDHie3mNguMBdRU0CY",
    "id_approver" => "sp9FNu7NEjo8Hty5FVVbs",
    "id_barang" => "kIPLSFC1oK9rNt5-wdfBj"
  ],
  [
    "id_riwayat" => "540L5p4UYf55CQwidzmhO",
    "id_peminjaman" => "pq75kpkDH5u-8rjQJVavY",
    "id_peminjam" => "Zd_ft9AOgC9NudwjEG7V-",
    "id_approver" => "9Z-6dxt7yv9Q1JpFrvqyN",
    "id_barang" => "0kp1MB-CGZDQeEP0nJ4oH"
  ],
  [
    "id_riwayat" => "UCms1skNFUdRfCyqR5_ri",
    "id_peminjaman" => "9nP7p8eNkbzGAzBCoTMYm",
    "id_peminjam" => "RemcW224jj_oXNTe-KHrI",
    "id_approver" => "sp9FNu7NEjo8Hty5FVVbs",
    "id_barang" => "8tpu0ghc2S21vUUiUmFyv"
  ],
  [
    "id_riwayat" => "jBDjAEkNlBASzypW6c6vV",
    "id_peminjaman" => "_KRWgAJ9PC6e-HukGEHNh",
    "id_peminjam" => "Vv6r7L2QhxMS2fvL2A86N",
    "id_approver" => "Bw0eBMHE3K1YwaTqajl2X",
    "id_barang" => "0uDI3up8ckxPIL7uJ0tm_"
  ],
  [
    "id_riwayat" => "TKGK7EJa2wjl1Licus3UF",
    "id_peminjaman" => "GZ76f0BIpFWEpIdTyrnyR",
    "id_peminjam" => "UNbxDHie3mNguMBdRU0CY",
    "id_approver" => "9Z-6dxt7yv9Q1JpFrvqyN",
    "id_barang" => "nhiSdGS37NsHLtkFeB3kz"
  ],
  [
    "id_riwayat" => "FiY9RUB6DotMJxqyeZzDH",
    "id_peminjaman" => "UdaYJ3J7gLhHseSejqZ2G",
    "id_peminjam" => "jNfsPHjbzLCnHugRR0zOx",
    "id_approver" => "Bw0eBMHE3K1YwaTqajl2X",
    "id_barang" => "dbxkWTn5OtCXnxCnDA5ON"
  ],
  [
    "id_riwayat" => "TCOpVS5M5TV2rHsRbVycY",
    "id_peminjaman" => "ol4R7cnewNUs1a5bFmDcr",
    "id_peminjam" => "Zd_ft9AOgC9NudwjEG7V-",
    "id_approver" => "sp9FNu7NEjo8Hty5FVVbs",
    "id_barang" => "nDf637xIVp3mFpA2OWvEA"
  ],
  [
    "id_riwayat" => "mDCj4hxhm9eeB7cR5l0DU",
    "id_peminjaman" => "kPTSOTjWLm5_lvUJELQnx",
    "id_peminjam" => "UNbxDHie3mNguMBdRU0CY",
    "id_approver" => "9Z-6dxt7yv9Q1JpFrvqyN",
    "id_barang" => "flyY65cUoc0OvgUxJ2ZgW"
  ],
  [
    "id_riwayat" => "3Vcg_Rh52WnuQ5E-eDfId",
    "id_peminjaman" => "7s3ZtG8F2KyaEg-XU8aBU",
    "id_peminjam" => "RemcW224jj_oXNTe-KHrI",
    "id_approver" => "Bw0eBMHE3K1YwaTqajl2X",
    "id_barang" => "GUIlooPRg9vLU66OXV5oo"
  ],
  [
    "id_riwayat" => "ysgOx_Nr0JMq8tKbG3bdd",
    "id_peminjaman" => "IP4sYLwaZGI1ifUny3mij",
    "id_peminjam" => "Zd_ft9AOgC9NudwjEG7V-",
    "id_approver" => "sp9FNu7NEjo8Hty5FVVbs",
    "id_barang" => "sfn4VkwDwpgBAztUJbAnI"
  ],
  [
    "id_riwayat" => "iXG9tdzRUWKQGQ3FEZnBc",
    "id_peminjaman" => "Ep7Ew6UYv0tu7fhlLsuUf",
    "id_peminjam" => "X6-KYCeEb8qfRBGhgwtoA",
    "id_approver" => "9Z-6dxt7yv9Q1JpFrvqyN",
    "id_barang" => "pbPur1_vFp1kxdXIjHhwT"
  ]
];
