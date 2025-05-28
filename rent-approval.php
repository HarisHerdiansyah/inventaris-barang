<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Permintaan</title>
  <link rel="stylesheet" href="rent-style.css">
  <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Sora:wght@100..800&display=swap"
        rel="stylesheet" />
</head>
<body>
<div class="navbar">
        <div class="text">Dashboard</div>
        <button id="logout">Logout</button>
    </div>

 <div class="content">
        <div class="segmen">
            <div class="judul">Rent Approval</div>
            <div class="tablebody">
                <table>
                    <thead>
                        <tr>
                            <th>Nama Peminjam</th>
                            <th>Barang</th>
                            <th>Jumlah</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Danial</td>
                            <td>Kalkulator Cinta</td>
                            <td>1</td>
                            <td>23-05-2025</td>
                            <td>23-05-2025</td>
                            <td>
                              <button class="button check"> <img id="icon" src="check.png" alt=""> </button>
                              <button class="button false"> <img id="icon" src="cross.png" alt=""> </button>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>

        </div>

    </div>

</body>
</html>
