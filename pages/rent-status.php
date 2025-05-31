<?php include "../middleware/session.middleware.php" ?>
<?php include "../service/rent-staff.service.php" ?>
<?php include "../layout/top.php" ?>
<?php include "../layout/navbar.php" ?>

<main class="px-16 py-4 bg-[url(../assets/bg-2.jpg)] min-h-screen bg-cover bg-no-repeat bg-fixed bg-center">
  <section class="rounded-3xl p-8 bg-white bg-opacity-70">
    <h1 class="text-2xl font-semibold mb-4">
      Status Peminjaman <?php echo htmlspecialchars($nama) ?>
    </h1>

    <table class="min-w-full border-collapse my-10 rounded-xl bg-white shadow-md">
      <thead>
        <tr>
          <th class="p-2 font-semibold text-left">Barang</th>
          <th class="p-2 font-semibold">Jumlah</th>
          <th class="p-2 font-semibold">Waktu Pengajuan</th>
          <th class="p-2 font-semibold">Tanggal Peminjaman</th>
          <th class="p-2 font-semibold">Status</th>
          <th class="p-2 font-semibold">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($rents && $rents->num_rows > 0): ?>
          <?php while ($row = $rents->fetch_assoc()): ?>
            <tr class="hover:bg-gray-100 transition">
              <td class="p-2"><?= htmlspecialchars($row["nama_barang"]) ?></td>
              <td class="p-2 text-center"><?= htmlspecialchars($row["jumlah"]) ?></td>
              <td class="p-2 text-center"><?= htmlspecialchars($row["waktu_pengajuan"]) ?></td>
              <td class="p-2 text-center"><?= htmlspecialchars($row["tanggal_pinjam"]) ?></td>
              <td class="p-2 text-center"><?= htmlspecialchars($row["status"]) ?></td>
              <td class="p-2 text-center">
                <?php if ($row["status"] === "REJECTED"): ?>
                  <a href="./rent-form.php" class="underline font-semibold text-blue-600 hover:text-blue-800">Ajukan Ulang</a>
                <?php else: ?>
                  -
                <?php endif; ?>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr>
            <td colspan="6" class="p-4 text-center text-gray-500">Belum ada riwayat peminjaman.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </section>
</main>

<?php include "../layout/bottom.php" ?>