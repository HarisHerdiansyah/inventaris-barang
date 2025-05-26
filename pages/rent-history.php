<?php include "../layout/top.php" ?>
<?php include "../layout/navbar.php" ?>

<main class="px-16 py-4 bg-[url(../assets/bg-2.jpg)] min-h-screen bg-cover bg-no-repeat bg-fixed bg-center">
  <section class="bg-white/50 rounded-lg p-4">
    <div class="bg-white/60 px-4 py-2 rounded-lg font-semibold">
      <h1 class="text-3xl">Riwayat Peminjaman Barang</h1>
    </div>
    <table id="table-history" class="w-full border-collapse my-6 bg-white/90 overflow-hidden rounded-md table-fixed">
      <thead class="text-lg">
        <tr>
          <th class="bg-blue-primary font-semibold text-center text-white py-0.5 border-r border-white">
            Nama Peminjam
          </th>
          <th class="bg-blue-primary font-semibold text-center text-white py-0.5 border-r border-white">
            Barang
          </th>
          <th class="bg-blue-primary font-semibold text-center text-white py-0.5 border-r border-white">
            Jumlah
          </th>
          <th class="bg-blue-primary font-semibold text-center text-white py-0.5 border-r border-white">
            Tanggal Peminjaman
          </th>
          <th class="bg-blue-primary font-semibold text-center text-white py-0.5 border-r border-white">
            Tanggal Pengembalian
          </th>
          <th class="bg-blue-primary font-semibold text-center text-white py-0.5 border-r border-white">
            Approver
          </th>
          <th class="bg-blue-primary font-semibold text-center text-white py-0.5 border-r border-white">
            Status
          </th>
          <th class="bg-blue-primary font-semibold text-center text-white py-0.5">
            Aksi
          </th>
        </tr>
      </thead>
      <tbody class="text-lg">
        <tr>
          <td class="p-4">-</td>
          <td class="p-4">-</td>
          <td class="p-4">-</td>
          <td class="p-4">-</td>
          <td class="p-4">-</td>
          <td class="p-4">-</td>
          <td class="p-4 text-center">
            <span class="badge approved px-2 py-0.5 rounded-full">
              Approved
            </span>
          </td>
          <td class="p-4 text-center">
            <button class="bg-red-500 hover:bg-red-600 cursor-pointer w-8 h-8 rounded-md">
              <i class="fas fa-trash text-white"></i>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </section>
</main>

<?php include "../layout/bottom.php" ?>