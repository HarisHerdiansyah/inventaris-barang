<?php include "../layout/top.php" ?>
<?php include "../layout/navbar.php" ?>

<main class="px-16 py-4">
  <h1 class="text-2xl font-semibold mb-4">Tambah Barang</h1>
  <form class="space-y-4 mb-16">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div id="form-control" class="flex flex-col">
        <label for="item">Nama Barang</label>
        <input
          type="text"
          name="item"
          id="item"
          autocomplete="off"
          class="mt-2 border border-2 border-gray-300 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm" />
      </div>
      <div id="form-control" class="flex flex-col">
        <label for="category">Kategori</label>
        <select
          name="category"
          id="category"
          class="mt-2 border border-2 border-gray-300 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm">
          <option value="">Pilih Kategori</option>
          <option value="mebel">Mebel</option>
          <option value="elektronik">Elektronik</option>
          <option value="alat-tulis">Alat Tulis</option>
        </select>
      </div>
      <div id="form-control" class="flex flex-col">
        <label for="stock">Stok</label>
        <input
          type="number"
          name="stock"
          id="stock"
          autocomplete="off"
          class="mt-2 border border-2 border-gray-300 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm" />
      </div>
      <div id="form-control" class="flex flex-col">
        <label for="condition">Kondisi</label>
        <select
          name="condition"
          id="condition"
          class="mt-2 border border-2 border-gray-300 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm">
          <option value="">Kondisi Barang</option>
          <option value="1">Baik</option>
          <option value="0">Kurang Baik</option>
        </select>
      </div>
    </div>

    <div class="flex justify-end mt-16">
      <button
        type="submit"
        name="submit"
        class="px-4 py-1 flex items-center gap-2 text-lg bg-blue-500 hover:bg-blue-600 text-white rounded-md cursor-pointer">
        Tambah Barang
      </button>
    </div>
  </form>
</main>

<?php include "../layout/bottom.php" ?>