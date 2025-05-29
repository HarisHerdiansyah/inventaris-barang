<?php include "../middleware/middleware.php" ?>
<?php include "../layout/top.php" ?>
<?php include "../layout/navbar.php" ?>

<main class="px-16 py-4 bg-[url(../assets/bg-1.jpg)] min-h-screen bg-cover bg-no-repeat bg-fixed bg-center">
  <section id="card-container" class="p-8 rounded-3xl">
    <h1 class="text-2xl font-semibold mb-4">Peminjaman Barang</h1>
    <form class="space-y-4">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div id="form-control" class="flex flex-col">
          <label for="items">Cari Barang:</label>
          <select
            name="items"
            id="items"
            class="mt-2 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm rounded-xl bg-white">
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
            class="mt-2 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm rounded-xl bg-white" />
        </div>
        <div id="form-control" class="flex flex-col">
          <label for="stock">Tanggal Peminjaman</label>
          <input
            type="date"
            name="stock"
            id="stock"
            autocomplete="off"
            class="mt-2 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm rounded-xl bg-white" />
        </div>
        <div id="form-control" class="flex flex-col">
          <label for="stock">Tanggal Pengembalian</label>
          <input
            type="date"
            name="stock"
            id="stock"
            autocomplete="off"
            class="mt-2 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm rounded-xl bg-white" />
        </div>
      </div>

      <div class="flex justify-end mt-16">
        <button
          type="submit"
          name="submit"
          class="bg-[#003262] py-2 px-4 font-semibold rounded-xl cursor-pointer text-white">
          Ajukan Peminjaman
        </button>
      </div>
    </form>
  </section>
</main>

<?php include "../layout/bottom.php" ?>