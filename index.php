<?php include "./middleware/middleware.php" ?>
<?php include "./layout/top.php" ?>
<?php include "./layout/navbar.php" ?>

<main class="px-16 py-4 bg-[url(./assets/bg-1.jpg)] min-h-screen bg-cover bg-no-repeat bg-fixed bg-center">
  <div class="py-2 px-4 bg-white/50 backdrop-blur-sm rounded-xl mb-6">
    <h1 class="text-2xl font-semibold">
      Metrik
      (<?php echo $nama ?>)
    </h1>
  </div>
  <div id="top-section" class="grid grid-cols-3 gap-5 mb-14">
    <div class="bg-white/40 backdrop-blur-sm border border-2 border-gray-300 rounded-xl p-6">
      <div class="flex justify-between items-center">
        <p class="font-semibold text-lg">
          Total Barang Dipinjam (7 Hari Terakhir):
        </p>
        <i class="fas fa-calendar text-xl"></i>
      </div>
      <p class="text-2xl mt-2 font-semibold">42</p>
    </div>
    <div class="bg-white/40 backdrop-blur-sm border border-2 border-gray-300 rounded-xl p-6">
      <div class="flex justify-between items-center">
        <p class="font-semibold text-lg">Total Anggota Aktif:</p>
        <i class="fas fa-user text-xl"></i>
      </div>
      <p class="text-2xl mt-2 font-semibold">67</p>
    </div>
    <div class="bg-white/40 backdrop-blur-sm border border-2 border-gray-300 rounded-xl p-6">
      <div class="flex justify-between items-center">
        <p class="font-semibold text-lg">Kategori Peminjaman Terbanyak:</p>
        <i class="fas fa-box text-xl"></i>
      </div>
      <p class="text-2xl mt-2 font-semibold">Kebersihan</p>
    </div>
  </div>
  <div id="bottom-section" class="grid grid-cols-2 gap-5 bg-white/40 backdrop-blur-sm p-6 rounded-xl">
    <div class="space-y-4">
      <h1 class="text-2xl font-semibold mb-4">Riwayat Permintaan Terakhir:</h1>
      <table class="border border-gray-400 min-w-full border-collapse">
        <thead>
          <tr>
            <th class="p-2 font-semibold border border-gray-300">
              Nama Peminjam
            </th>
            <th class="p-2 font-semibold border border-gray-300">
              Barang
            </th>
            <th class="p-2 font-semibold border border-gray-300">
              Tanggal Permintaan
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="p-2 border border-gray-300"></td>
            <td class="p-2 border border-gray-300"></td>
            <td class="p-2 border border-gray-300"></td>
          </tr>
        </tbody>
        <caption class="caption-bottom mt-3 underline font-semibold">
          <a href="">Lihat Detail</a>
        </caption>
      </table>
    </div>
    <div>
      <h1 class="text-2xl font-semibold mb-4">Quick Menu:</h1>
      <div class="grid grid-cols-3 gap-5">
        <a href="./pages/manage-category.php">
          <button class="w-full bg-emerald-500 hover:bg-emerald-600 py-2 px-4 font-semibold rounded-md cursor-pointer text-white">
            Kelola Kategori
          </button>
        </a>
        <a href="./pages/item-list.php">
          <button class="w-full bg-orange-500 hover:bg-orange-600 py-2 px-4 font-semibold rounded-md cursor-pointer text-white">
            Kelola Barang
          </button>
        </a>
        <a href="./pages/rent-approval.php">
          <button class="w-full bg-indigo-600 hover:bg-indigo-700 py-2 px-4 font-semibold rounded-md cursor-pointer text-white">
            Kelola Peminjaman
          </button>
        </a>
      </div>
    </div>
  </div>
</main>

<?php include "./layout/bottom.php" ?>