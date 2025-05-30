<?php include "../middleware/session.middleware.php" ?>
<?php include "../service/rent-admin.service.php" ?>
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
        <?php
        $rents = get_current_rent();
        while ($row = $rents->fetch_assoc()) {
          echo '<tr>';
          echo '<td class="p-2">' . $row["timestamp"] . '</td>';
          echo '<td class="p-2">' . $row["nama"] . '</td>';
          echo '<td class="p-2">' . $row["barang"] . '</td>';
          echo '<td class="p-2">' . $row["jumlah"] . '</td>';
          echo '<td class="p-2">' . $row["tanggal_pinjam"] . '</td>';
          echo '<td class="p-2">' . $row["tanggal_pengembalian"] . '</td>';
          echo '<td class="p-2 space-x-2">
            <button data-rent="' . $row["id_peminjaman"] . '" data-item="' . $row["id_barang"] . '" data-quantity="' . $row["jumlah"] . '" class="approve-btn w-10 h-10 bg-green-500 hover:bg-green-600 cursor-pointer rounded-lg">
              <i class="fas fa-check text-xl text-white"></i>
            </button>
            <button data-rent="' . $row["id_peminjaman"] . '" data-item="' . $row["id_barang"] . '" data-quantity="' . $row["jumlah"] . '" class="reject-btn w-10 h-10 bg-red-500 hover:bg-red-600 cursor-pointer rounded-lg">
              <i class="fas fa-times text-xl text-white"></i>
            </button>
          </td>';
          echo '</tr>';
        }
        ?>
      </tbody>
    </table>
  </section>
</main>

<script>
  document.addEventListener("click", async (e) => {
    const approveBtn = e.target.closest(".approve-btn");
    const rejectBtn = e.target.closest(".reject-btn");

    if (approveBtn) {
      alert("invoked")
      const {
        rent,
        item,
        quantity
      } = approveBtn.dataset;
      const payload = new FormData();
      payload.append("rentId", rent);
      payload.append("itemId", item);
      payload.append("quantity", quantity);
      payload.append("status", "ACCEPTED");

      await fetch("../service/rent-admin.service.php", {
        method: "POST",
        body: payload
      });
    }

    if (rejectBtn) {
      const {
        rent,
        item,
        quantity
      } = rejectBtn.dataset;
      const payload = new FormData();
      payload.append("rentId", rent);
      payload.append("itemId", item);
      payload.append("quantity", quantity);
      payload.append("status", "REJECTED");

      await fetch("../service/rent-admin.service.php", {
        method: "POST",
        body: payload
      });
    }

    window.location.reload();
  });
</script>

<?php include "../layout/bottom.php" ?>