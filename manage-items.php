<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manage Items</title>
  <link rel="stylesheet" href="manage-style.css" />
  <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Sora:wght@100..800&display=swap"
        rel="stylesheet">
</head>

<body>
  <header>
    <div class="navbar">
        <div class="text">Dashboard</div>
        <button id="logout">Logout</button>
    </div>

  <main>
    <div class="form-container">
      <h2>Tambah Barang</h2>
      <form>

        <label for="kategori">Kategori</label>
        <select id="kategori" name="kategori" required>
          <option value="" disabled selected>Pilih Kategori</option>
          <option>Senjata</option>
          <option>Mobil</option>
        </select>

        <label>Nama Barang</label>
        <select id="namaBarang" name="namaBarang" required>
            <option value="" disabled selected>Pilih Nama Barang</option>
            <option>Pistol</option>
        </select>

        <label> Stok </label>
        <input type="number" placeholder="Total" required />

        <!-- <label>Kondisi</label>
        <select id="kondisi" name="kondisi" required>
          <option value="" disabled selected>Pilih Kondisi</option>
          <option value="Sewa">Sewa</option>
        </select> -->

        <button type="submit" class="submit-btn">Buat Permintaan</button>
      </form>
    </div>
  </main>
</body>
</html>
