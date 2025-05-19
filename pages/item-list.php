<?php include "../layout/top.php" ?>
<?php include "../layout/navbar.php" ?>

<main class="px-16 py-4">
  <div class="flex justify-between items-center">
    <h1 class="text-2xl font-semibold">Daftar Barang</h1>
    <a href="./manage-items.php">
      <button class="bg-blue-500 hover:bg-blue-600 py-2 px-4 font-semibold rounded-md cursor-pointer text-white">
        <i class="fas fa-plus mr-2"></i>
        Tambah Barang
      </button>
    </a>
  </div>
  <table class="border border-gray-400 min-w-full border-collapse my-10">
    <thead>
      <tr>
        <th class="p-2 font-normal border border-gray-300">Nama Barang</th>
        <th class="p-2 font-normal border border-gray-300">Kategori</th>
        <th class="p-2 font-normal border border-gray-300">Jumlah</th>
        <th class="p-2 font-normal border border-gray-300">Kondisi</th>
        <th class="p-2 font-normal border border-gray-300">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="p-2 border border-gray-300"></td>
        <td class="p-2 border border-gray-300"></td>
        <td class="p-2 border border-gray-300"></td>
        <td class="p-2 border border-gray-300"></td>
        <td class="p-2 border border-gray-300"></td>
      </tr>
    </tbody>
  </table>
</main>

<?php include "../layout/bottom.php" ?>