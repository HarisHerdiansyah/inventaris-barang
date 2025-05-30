<?php include "../middleware/session.middleware.php" ?>
<?php include "../layout/top.php" ?>
<?php include "../layout/navbar.php" ?>

<main class="px-16 py-4 bg-[url(../assets/bg-4.jpg)] min-h-screen bg-cover bg-no-repeat bg-fixed bg-center">
  <section id="card-container" class="rounded-3xl p-8">
    <h1 class="text-2xl font-semibold mb-4">Daftar Peminjaman</h1>
    <table id="data-table" class="min-w-full border-collapse my-10 rounded-xl">
      <thead>
        <tr>
          <th class="p-2 font-semibold">Timestamp</th>
          <th class="p-2 font-semibold">Nama Peminjam</th>
          <th class="p-2 font-semibold">Barang</th>
          <th class="p-2 font-semibold">Jumlah</th>
          <th class="p-2 font-semibold">Tanggal Peminjaman</th>
          <th class="p-2 font-semibold">Tanggal Pengembalian</th>
          <th class="p-2 font-semibold">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="p-2">-</td>
          <td class="p-2">-</td>
          <td class="p-2">-</td>
          <td class="p-2">-</td>
          <td class="p-2">-</td>
          <td class="p-2">-</td>
          <td class="p-2">-</td>
        </tr>
      </tbody>
    </table>
  </section>
</main>

<?php include "../layout/bottom.php" ?>