<?php include "../middleware/session.middleware.php" ?>
<?php include "../layout/top.php" ?>
<?php include "../layout/navbar.php" ?>

<?php
include "../middleware/route.middleware.php";
admin_only();
?>

<?php
include "../config/database.php";
$items = $db->query("select b.id_barang, b.nama_barang, k.nama_kategori, b.stok from barang as b left join kategori as k on b.id_kategori = k.id_kategori order by b.nama_barang asc");
?>

<main class="px-16 py-4 bg-[url(../assets/bg-4.jpg)] min-h-screen bg-cover bg-no-repeat bg-fixed bg-center">
  <section id="card-container" class="rounded-3xl p-8">
    <div class="flex justify-between items-center">
      <h1 class="text-2xl font-semibold">Daftar Barang</h1>
      <a href="./manage-items.php">
        <button class="bg-[#003262] py-2 px-4 font-semibold rounded-xl cursor-pointer text-white">
          <i class="fas fa-plus mr-2"></i>Tambah Barang
        </button>
      </a>
    </div>

    <table id="data-table" class="min-w-full border-collapse my-10 rounded-xl">
      <thead>
        <tr>
          <th class="p-2 font-semibold">Nama Barang</th>
          <th class="p-2 font-semibold">Kategori</th>
          <th class="p-2 font-semibold">Jumlah</th>
          <th class="p-2 font-semibold">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($items->num_rows > 0): ?>
          <?php while ($row = $items->fetch_assoc()): ?>
            <tr class="hover:bg-gray-100 transition">
              <td class="p-2"><?= htmlspecialchars($row["nama_barang"]) ?></td>
              <td class="p-2"><?= htmlspecialchars($row["nama_kategori"] ?? "-") ?></td>
              <td class="p-2"><?= htmlspecialchars($row["stok"]) ?></td>
              <td class="p-2">
                <div class="flex gap-2">
                  <a href="../pages/manage-items.php?mode=edit&id=<?= urlencode($row["id_barang"]) ?>">
                    <button
                      class="edit-btn w-10 h-10 bg-yellow-400 hover:bg-yellow-500 rounded-lg flex items-center justify-center cursor-pointer"
                      title="Edit">
                      <i class="fas fa-pencil-alt text-xl"></i>
                    </button>
                  </a>
                  <button
                    class="delete-btn w-10 h-10 bg-red-500 hover:bg-red-600 rounded-lg flex items-center justify-center text-white cursor-pointer"
                    data-id="<?= htmlspecialchars($row["id_barang"]) ?>"
                    title="Hapus">
                    <i class="fas fa-trash text-xl"></i>
                  </button>
                </div>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr>
            <td colspan="4" class="text-center py-4 text-gray-500">Tidak ada barang tersedia.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </section>
</main>

<script>
  async function removeItem(formData) {
    try {
      const response = await fetch("../service/items.service.php", {
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
    } catch (error) {
      console.error(error);
      Swal.fire({
        title: "Terjadi Kesalahan",
        icon: "error"
      });
    }
  }

  document.addEventListener("click", async (e) => {
    const deleteBtn = e.target.closest(".delete-btn");

    if (deleteBtn) {
      const formData = new FormData();
      formData.append("action", "DELETE");
      formData.append("id", deleteBtn.dataset.id);
      await removeItem(formData);
    }
  });
</script>

<?php include "../layout/bottom.php" ?>