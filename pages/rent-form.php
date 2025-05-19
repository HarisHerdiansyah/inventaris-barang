<?php include "../layout/top.php" ?>
<?php include "../layout/navbar.php" ?>

<main class="px-16 py-4">
  <h1 class="text-2xl font-semibold mb-4">Peminjaman Barang</h1>
  <form class="space-y-4 mb-16">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div id="form-control" class="flex flex-col">
        <label for="items">Cari Barang:</label>
        <select
          name="items"
          id="items"
          class="mt-2 border border-2 border-gray-300 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm">
          <option value="">Pilih Kategori</option>
          <option value="mebel">Mebel</option>
          <option value="elektronik">Elektronik</option>
          <option value="alat-tulis">Alat Tulis</option>
        </select>
      </div>
      <div id="form-control" class="flex flex-col">
        <label for="jumlah">Jumlah</label>
        <input
          type="number"
          name="jumlah"
          id="jumlah"
          autocomplete="off"
          class="mt-2 border border-2 border-gray-300 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm" />
      </div>
      <div id="form-control" class="flex flex-col">
        <label for="stock">Tanggal Peminjaman</label>
        <input
          type="date"
          name="stock"
          id="stock"
          autocomplete="off"
          class="mt-2 border border-2 border-gray-300 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm" />
      </div>
      <div id="form-control" class="flex flex-col">
        <label for="stock">Tanggal Pengembalian</label>
        <input
          type="date"
          name="stock"
          id="stock"
          autocomplete="off"
          class="mt-2 border border-2 border-gray-300 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm" />
      </div>
    </div>

    <div class="flex justify-end mt-16">
      <button
        type="submit"
        name="submit"
        class="px-4 py-1 flex items-center gap-2 text-lg bg-blue-500 hover:bg-blue-600 text-white rounded-md cursor-pointer">
        Buat Permintaan
      </button>
    </div>
  </form>
</main>

<?php include "../layout/bottom.php" ?>