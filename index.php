<?php include "./middleware/session.middleware.php" ?>
<?php include "./service/dashboard.service.php" ?>
<?php include "./layout/top.php" ?>
<?php include "./layout/navbar.php" ?>

<main class="px-16 py-4 bg-[url(./assets/bg-10.jpg)] min-h-screen bg-cover bg-no-repeat bg-fixed bg-center space-y-16">
  <section id="card-container" class="rounded-3xl p-8">
    <h1 class="text-2xl font-semibold mb-4">Metrik</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="bg-white rounded-xl p-6 shadow">
        <div class="flex justify-between items-center">
          <p>Total Barang Dipinjam (7 Hari Terakhir):</p>
          <i class="fas fa-calendar"></i>
        </div>
        <p class="text-2xl mt-2 font-semibold">
          <?= htmlspecialchars($last_seven_days["jmlh_peminjaman"] ?? "0") ?>
        </p>
      </div>
      <div class="bg-white rounded-xl p-6 shadow">
        <div class="flex justify-between items-center">
          <p>Total Anggota Aktif:</p>
          <i class="fas fa-user"></i>
        </div>
        <p class="text-2xl mt-2 font-semibold">
          <?= htmlspecialchars($total_active_staff["total_anggota"] ?? "0") ?>
        </p>
      </div>
      <div class="bg-white rounded-xl p-6 shadow">
        <div class="flex justify-between items-center">
          <p>Kategori Peminjaman Terbanyak:</p>
          <i class="fas fa-box"></i>
        </div>
        <p class="text-2xl mt-2 font-semibold">
          <?= htmlspecialchars($most_borrowed_items["nama_kategori"] ?? "-") ?>
        </p>
      </div>
    </div>
  </section>

  <section id="card-container" class="rounded-3xl p-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
      <div class="space-y-4">
        <h1 class="text-2xl font-semibold mb-4">Riwayat Peminjaman Terakhir:</h1>
        <div class="overflow-auto max-h-96 rounded-xl shadow bg-white">
          <table id="data-table" class="min-w-full border-collapse">
            <thead class="bg-gray-100">
              <tr>
                <th class="p-2 font-semibold">Nama Peminjam</th>
                <th class="p-2 font-semibold">Barang</th>
                <th class="p-2 font-semibold">Tanggal Peminjaman</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($last_five_records->num_rows > 0): ?>
                <?php while ($row = $last_five_records->fetch_assoc()): ?>
                  <tr class="hover:bg-gray-100">
                    <td class="p-2"><?= htmlspecialchars($row["nama"]) ?></td>
                    <td class="p-2"><?= htmlspecialchars($row["nama_barang"]) ?></td>
                    <td class="p-2"><?= htmlspecialchars($row["tanggal_pinjam"]) ?></td>
                  </tr>
                <?php endwhile; ?>
              <?php else: ?>
                <tr>
                  <td colspan="3" class="p-4 text-center text-gray-500">Belum ada peminjaman terbaru.</td>
                </tr>
              <?php endif; ?>
            </tbody>
            <caption class="caption-bottom mt-3 underline font-semibold text-center p-2">
              <a href="./pages/rent-history.php">Lihat Detail</a>
            </caption>
          </table>
        </div>
      </div>

      <div>
        <h1 class="text-2xl font-semibold mb-4">Quick Menu:</h1>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
          <a href="./pages/manage-category.php">
            <button class="w-full bg-emerald-500 hover:bg-emerald-600 py-2 px-4 font-semibold rounded-xl text-white">
              Kelola Kategori
            </button>
          </a>
          <a href="./pages/item-list.php">
            <button class="w-full bg-orange-500 hover:bg-orange-600 py-2 px-4 font-semibold rounded-xl text-white">
              Kelola Barang
            </button>
          </a>
          <a href="./pages/rent-approval.php">
            <button class="w-full bg-indigo-600 hover:bg-indigo-700 py-2 px-4 font-semibold rounded-xl text-white">
              Kelola Peminjaman
            </button>
          </a>
        </div>
      </div>
    </div>
  </section>
</main>

<?php include "./layout/bottom.php" ?>