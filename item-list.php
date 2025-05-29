<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Barang</title>
  <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Sora:wght@100..800&display=swap"
        rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="item-style.css">
</head>
<body>
    <div class="navbar">
        <div class="text">Dashboard</div>
        <button id="logout">Logout</button>
    </div>

<div class="content">
        <div class="segmen">
            <div class="judul">List Barang</div>
            <div class="tablebody">
                <table>
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Jumlah</th>
                            <th>Kondisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Danial</td>
                            <td>Kalkulator Cinta</td>
                            <td>1</td>
                            <td>23-05-2025</td>
                            <td>
                                <button class="delete pen"> <img id="icon" src="pen.png" alt=""> </button>
                                <button class="delete bin"> <img id="icon" src="delete.png" alt=""> </button>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>

        </div>

    </div>

</body>
</html>
