<?php include "../middleware/session.middleware.php" ?>
<?php include "../service/rent-admin.service.php" ?>
<?php include "../layout/top.php" ?>
<?php include "../layout/navbar.php" ?>

<main class="px-16 py-4 bg-[url(../assets/bg-2.jpg)] min-h-screen bg-cover bg-no-repeat bg-fixed bg-center">
  <section id="card-container" class="rounded-3xl p-8">
    <h1 class="text-2xl font-semibold mb-4">Riwayat Peminjaman</h1>
    <table id="data-table" class="min-w-full border-collapse my-10 rounded-xl">
      <thead>
        <tr>
          <th class="p-2 font-semibold">Nama Peminjam</th>
          <th class="p-2 font-semibold">Barang</th>
          <th class="p-2 font-semibold">Jumlah</th>
          <th class="p-2 font-semibold">Approver</th>
          <th class="p-2 font-semibold">Status</th>
          <th class="p-2 font-semibold">Timestamp</th>
        </tr>
      </thead>
      <tbody>
        <?php $history = get_history(); ?>
        <?php if ($history && $history->num_rows > 0): ?>
          <?php while ($row = $history->fetch_assoc()): ?>
            <tr class="hover:bg-gray-100 transition">
              <td class="p-2">
                <?= htmlspecialchars($row["nama_peminjam"]) ?>
              </td>
              <td class="p-2">
                <?= htmlspecialchars($row["nama_barang"]) ?>
              </td>
              <td class="p-2">
                <?= htmlspecialchars($row["jumlah"]) ?>
              </td>
              <td class="p-2">
                <?= htmlspecialchars($row["approver"]) ?>
              </td>
              <td class="p-2">
                <?= htmlspecialchars($row["status"]) ?>
              </td>
              <td class="p-2">
                <?php if ($row["approved_at"]): ?>
                  <?= htmlspecialchars($row["approved_at"]) ?>
                <?php else: ?>
                  <?= "-" ?>
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