<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manage Items</title>
  <link rel="stylesheet" href="manage-style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Sora:wght@100..800&display=swap" rel="stylesheet">
  <style>
    .hidden {
      display: none;
    }
  </style>
</head>

<body>
  <header>
    <div class="navbar">
        <div class="text">Dashboard</div>
        <button id="logout">Logout</button>
    </div>
  </header>

  <main>
    <div class="form-container">
      <h2>Tambah Barang</h2>
      <form id="itemForm">
        <label for="kategori">Kategori</label>
        <select id="kategori" name="kategori" required>
          <option value="" disabled selected>Pilih Kategori</option>
          <option value="senjata">Senjata</option>
          <option value="mobil">Mobil</option>
        </select>

        <div id="namaBarangContainer" class="hidden">
          <label for="namaBarang">Nama Barang</label>
          <select id="namaBarang" name="namaBarang" required>
            <option value="" disabled selected>Pilih Nama Barang</option>
          </select>
        </div>

        <label for="stok">Stok</label>
        <input type="number" id="stok" name="stok" placeholder="Total" required />

        <button type="submit" class="submit-btn">Buat Permintaan</button>
      </form>
    </div>
  </main>

  <script>
    const kategoriSelect = document.getElementById("kategori");
    const namaBarangSelect = document.getElementById("namaBarang");
    const namaBarangContainer = document.getElementById("namaBarangContainer");

    const barangOptions = {
      senjata: ["Pistol", "Senapan", "Granat"],
      mobil: ["Sedan", "Truk", "SUV"]
    };

    kategoriSelect.addEventListener("change", function () {
      const selectedKategori = this.value;
      namaBarangSelect.innerHTML = '<option value="" disabled selected>Pilih Nama Barang</option>';
      if (barangOptions[selectedKategori]) {
        barangOptions[selectedKategori].forEach(function (barang) {
          const option = document.createElement("option");
          option.value = barang.toLowerCase();
          option.textContent = barang;
          namaBarangSelect.appendChild(option);
        });
      }
    });
  </script>
</body>
</html>
