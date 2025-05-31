<?php
include "../middleware/session.middleware.php";
include "../service/rent-admin.service.php";
include "../layout/top.php";
include "../layout/navbar.php";
?>

<?php 
include "../middleware/route.middleware.php";
admin_only();
?>

<main class="px-16 py-4 bg-[url(../assets/bg-4.jpg)] min-h-screen bg-cover bg-no-repeat bg-fixed bg-center">
  <section id="card-container" class="rounded-3xl p-8">
    <h1 class="text-2xl font-semibold mb-4">Daftar Peminjaman</h1>
    <table class="min-w-full border-collapse my-10 rounded-xl" id="data-table">
      <thead>
        <tr>
          <?php
          $headers = ["Timestamp", "Nama Peminjam", "Barang", "Jumlah", "Tanggal Peminjaman", "Tanggal Pengembalian", "Aksi"];
          foreach ($headers as $header) echo "<th class='p-2 font-semibold'>$header</th>";
          ?>
        </tr>
      </thead>
      <tbody>
        <?php foreach (get_current_rent() as $row): ?>
          <tr>
            <td class="p-2"><?= $row["timestamp"] ?></td>
            <td class="p-2"><?= $row["nama"] ?></td>
            <td class="p-2"><?= $row["barang"] ?></td>
            <td class="p-2"><?= $row["jumlah"] ?></td>
            <td class="p-2"><?= $row["tanggal_pinjam"] ?></td>
            <td class="p-2"><?= $row["tanggal_pengembalian"] ?></td>
            <td class="p-2 space-x-2">
              <?php foreach (["ACCEPTED" => "green", "REJECTED" => "red"] as $status => $color): ?>
                <button
                  data-status="<?= $status ?>"
                  data-rent="<?= $row['id_peminjaman'] ?>"
                  data-item="<?= $row['id_barang'] ?>"
                  data-quantity="<?= $row['jumlah'] ?>"
                  class="rent-action-btn w-10 h-10 bg-<?= $color ?>-500 hover:bg-<?= $color ?>-600 cursor-pointer rounded-lg">
                  <i class="fas fa-<?= $status === 'ACCEPTED' ? 'check' : 'times' ?> text-xl text-white"></i>
                </button>
              <?php endforeach; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </section>
</main>

<script>
  document.querySelectorAll(".rent-action-btn").forEach(button => {
    button.addEventListener("click", async () => {
      const {
        rent,
        item,
        quantity,
        status
      } = button.dataset;
      const formData = new FormData();
      formData.append("rentId", rent);
      formData.append("itemId", item);
      formData.append("quantity", quantity);
      formData.append("status", status);

      await fetch("../service/rent-admin.service.php", {
        method: "POST",
        body: formData,
      });

      window.location.reload();
    });
  });
</script>

<?php include "../layout/bottom.php"; ?>