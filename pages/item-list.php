<?php include "../middleware/session.middleware.php" ?>
<?php include "../layout/top.php" ?>
<?php include "../layout/navbar.php" ?>
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
          <i class="fas fa-plus mr-2"></i>
          Tambah Barang
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
        <?php
        while ($row = $items->fetch_assoc()) {
          $id = $row["id_barang"];
          $nama_barang = $row["nama_barang"];
          $stok = $row["stok"];
          $kategori = $row["nama_kategori"];

          echo '<tr>';
          echo '<td class="p-2">' . $nama_barang . '</td>';
          echo '<td class="p-2">' . $kategori . '</td>';
          echo '<td class="p-2">' . $stok . '</td>';
          echo '<td class="p-2">
          <div class="flex justify-center items-center gap-2">
            <a href="../pages/manage-items.php?mode=edit&id=' . $id . '">
              <button 
                id="editBtn"
                class="edit-btn w-10 h-10 bg-yellow-400 hover:bg-yellow-500 rounded-lg cursor-pointer flex items-center justify-center"
                data-id="' . $id . '">
                <i class="fas fa-pencil-alt text-xl"></i>
              </button>
            </a>
            <button 
              id="deleteBtn"
              class="delete-btn w-10 h-10 bg-red-500 hover:bg-red-600 rounded-lg cursor-pointer flex items-center justify-center"
              data-id="' . $id . '">
              <i class="fas fa-trash text-xl text-white"></i>
            </button>
          </div>
        </td>';
          echo '</tr>';
        }
        ?>
      </tbody>
    </table>
  </section>
</main>

<script>
  async function removeItem(formData) {
    try {
      await fetch("../service/items.service.php", {
        method: "POST",
        body: formData
      });
    } catch (e) {
      console.log(e);
    } finally {
      window.location.reload();
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
  })
</script>

<?php include "../layout/bottom.php" ?>