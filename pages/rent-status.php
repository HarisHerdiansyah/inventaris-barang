<?php include "../middleware/session.middleware.php" ?>
<?php include "../service/rent-staff.service.php" ?>
<?php include "../layout/top.php" ?>
<?php include "../layout/navbar.php" ?>

<?php
include "../middleware/route.middleware.php";
staff_only();
?>

<main class="px-16 py-4 bg-[url(../assets/bg-2.jpg)] min-h-screen bg-cover bg-no-repeat bg-fixed bg-center">
  <section id="card-container" class="rounded-3xl p-8">
    <h1 class="text-2xl font-semibold mb-4">
      Status Peminjaman <?php echo htmlspecialchars($nama) ?>
    </h1>

    <table id="data-table" class="min-w-full border-collapse my-10 rounded-xl">
      <thead>
        <tr>
          <th class="p-2 font-semibold">Barang</th>
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
              <td class="p-2">
                <?php if ($row["status"] === "PENDING"): ?>
                  <div class="mx-auto bg-gray-200 w-min text-gray-700 px-1.5 py-0.5 rounded-full">
                    <?= htmlspecialchars($row["status"]) ?>
                  </div>
                <?php elseif ($row["status"] === "REJECTED"): ?>
                  <div class="mx-auto bg-red-200 w-min text-red-500 px-1.5 py-0.5 rounded-full">
                    <?= htmlspecialchars($row["status"]) ?>
                  </div>
                <?php elseif ($row["status"] === "ACCEPTED"): ?>
                  <div class="mx-auto bg-green-200 w-min text-green-700 px-1.5 py-0.5 rounded-full">
                    <?= htmlspecialchars($row["status"]) ?>
                  </div>
                <?php endif; ?>
              </td>
              <td class="p-2 text-center">
                <?php if ($row["status"] === "REJECTED"): ?>
                  <p data-rent="<?= htmlspecialchars($row["id_peminjaman"]) ?>" class="retry-rent underline font-semibold cursor-pointer">Ajukan Ulang</p>
                <?php else: ?>
                  -
                <?php endif; ?>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr>
            <td colspan="6" class="p-4 text-center text-gray-500">Belum ada peminjaman yang diajukan.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </section>
</main>

<script>
  document.querySelectorAll(".retry-rent").forEach((clickable) => {
    clickable.addEventListener("click", async () => {
      const {
        rent
      } = clickable.dataset;
      const formData = new FormData();
      formData.append("action", "UPDATE");
      formData.append("rentId", rent);

      const response = await fetch("../service/rent-staff.service.php", {
        method: "POST",
        body: formData
      });
      const responseJson = await response.json();

      if (!response.ok) {
        Swal.fire({
          title: responseJson.message,
          icon: 'error',
        })
        return;
      } else {
        Swal.fire({
          title: responseJson.message,
          icon: 'success',
        })
        return;
      }
    });
  });
</script>

<?php include "../layout/bottom.php" ?>