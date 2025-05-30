<?php include "../middleware/session.middleware.php" ?>
<?php include "../service/rent.service.php" ?>
<?php include "../layout/top.php" ?>
<?php include "../layout/navbar.php" ?>

<main class="px-16 py-4 bg-[url(../assets/bg-2.jpg)] min-h-screen bg-cover bg-no-repeat bg-fixed bg-center">
  <section id="card-container" class="rounded-3xl p-8">
    <h1 class="text-2xl font-semibold mb-4">
      Status Peminjaman <?php echo $nama ?>
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
        <?php
        while ($row = $rents->fetch_assoc()) {
          echo '<tr>';
          echo '<td class="p-2">' . $row["nama_barang"] . '</td>';
          echo '<td class="p-2 text-center">' . $row["jumlah"] . '</td>';
          echo '<td class="p-2 text-center">' . $row["waktu_pengajuan"] . '</td>';
          echo '<td class="p-2 text-center">' . $row["tanggal_pinjam"] . '</td>';
          echo '<td class="p-2 text-center">' . $row["status"] . '</td>';

          if ($row["status"] === "REJECTED") {
            echo '<td class="p-2 text-center">
              <a href="./rent-form.php" class="underline font-semibold cursor-pointer">
                Ajukan Ulang
              </a>
            </td>';
          } else {
            echo '<td>-</td>';
          }

          echo '</tr>';
        }
        ?>
      </tbody>
    </table>
  </section>
</main>

<?php include "../layout/bottom.php" ?>