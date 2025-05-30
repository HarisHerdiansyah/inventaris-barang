<?php include "./middleware/session.middleware.php" ?>
<?php include "./service/dashboard.service.php" ?>
<?php include "./layout/top.php" ?>
<?php include "./layout/navbar.php" ?>

<main class="px-16 py-4 bg-[url(./assets/bg-10.jpg)] min-h-screen bg-cover bg-no-repeat bg-fixed bg-center space-y-16">
  <section id="card-container" class="rounded-3xl p-8">
    <h1 class="text-2xl font-semibold mb-4">
      Metrik
    </h1>
    <div id="top-section" class="grid grid-cols-3 gap-6">
      <div class="bg-white rounded-xl p-6">
        <div class="flex justify-between items-center">
          <p>Total Barang Dipinjam (7 Hari Terakhir):</p>
          <i class="fas fa-calendar"></i>
        </div>
        <p class="text-2xl mt-2 font-semibold">
          <?php
          echo $last_seven_days["jmlh_peminjaman"];
          ?>
        </p>
      </div>
      <div class="bg-white rounded-xl p-6">
        <div class="flex justify-between items-center">
          <p>Total Anggota Aktif:</p>
          <i class="fas fa-user"></i>
        </div>
        <p class="text-2xl mt-2 font-semibold">
          <?php
          echo $total_active_staff["total_anggota"];
          ?>
        </p>
      </div>
      <div class="bg-white rounded-xl p-6">
        <div class="flex justify-between items-center">
          <p>Kategori Peminjaman Terbanyak:</p>
          <i class="fas fa-box"></i>
        </div>
        <p class="text-2xl mt-2 font-semibold">
          <?php
          echo $most_borrowed_items["nama_kategori"];
          ?>
        </p>
      </div>
    </div>
  </section>
  <section id="card-container" class="rounded-3xl p-8">
    <div id="bottom-section" class="grid grid-cols-2 gap-5">
      <div class="space-y-4">
        <h1 class="text-2xl font-semibold mb-4">
          Riwayat Peminjaman Terakhir:
        </h1>
        <table id="data-table" class="min-w-full border-collapse rounded-xl">
          <thead>
            <tr>
              <th class="p-2 font-semibold">Nama Peminjam</th>
              <th class="p-2 font-semibold">Barang</th>
              <th class="p-2 font-semibold">Tanggal Peminjaman</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($row = $last_five_records->fetch_assoc()) {
              echo '<tr>';
              echo '<td class="p-2">'.$row["nama"].'</td>';
              echo '<td class="p-2">'.$row["nama_barang"].'</td>';
              echo '<td class="p-2">'.$row["tanggal_pinjam"].'</td>';
              echo '</tr>';
            }
            ?>
          </tbody>
          <caption class="caption-bottom mt-3 underline font-semibold">
            <a href="./pages/rent-history.php">Lihat Detail</a>
          </caption>
        </table>
      </div>
      <div>
        <h1 class="text-2xl font-semibold mb-4">Quick Menu:</h1>
        <div class="grid grid-cols-3 gap-5">
          <a href="./pages/manage-category.php">
            <button class="w-full bg-emerald-500 hover:bg-emerald-600 py-2 px-4 font-semibold rounded-xl cursor-pointer text-white">
              Kelola Kategori
            </button>
          </a>
          <a href="./pages/item-list.php">
            <button class="w-full bg-orange-500 hover:bg-orange-600 py-2 px-4 font-semibold rounded-xl cursor-pointer text-white">
              Kelola Barang
            </button>
          </a>
          <a href="./pages/rent-approval.php">
            <button class="w-full bg-indigo-600 hover:bg-indigo-700 py-2 px-4 font-semibold rounded-xl cursor-pointer text-white">
              Kelola Peminjaman
            </button>
          </a>
        </div>
      </div>
    </div>
  </section>

</main>

<?php include "./layout/bottom.php" ?>