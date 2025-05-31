<?php
include "../middleware/session.middleware.php";
include "../service/category.service.php";
include "../layout/top.php";
include "../layout/navbar.php";

$mode = $_GET["mode"] ?? "add";
$itemId = $_GET["id"] ?? null;
$wording = $mode === "add" ? "Tambah Barang" : "Edit Barang";
$buttonColor = $mode === "add" ? "bg-[#003262]" : "bg-purple-700";
?>

<main class="px-16 py-4 bg-[url(../assets/bg-5.jpg)] min-h-screen bg-cover bg-no-repeat bg-fixed bg-center">
  <section id="card-container" class="rounded-3xl p-8">
    <h1 class="text-2xl font-semibold mb-6"><?= $wording ?></h1>

    <form id="itemForm" class="space-y-4">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        <!-- Nama Barang -->
        <div class="flex flex-col">
          <label for="itemName">Nama Barang</label>
          <input
            type="text"
            name="itemName"
            id="itemName"
            required
            autocomplete="off"
            class="mt-2 border-2 border-gray-300 outline-none p-2 rounded-xl focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm bg-white" />
        </div>

        <!-- Kategori -->
        <div class="flex flex-col">
          <label for="category">Kategori</label>
          <select
            name="category"
            id="category"
            required
            class="mt-2 border-2 border-gray-300 outline-none p-2 rounded-xl focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm bg-white">
            <option value="">Pilih Kategori</option>
            <?php while ($row = $categories->fetch_assoc()): ?>
              <option value="<?= htmlspecialchars($row["id_kategori"]) ?>">
                <?= htmlspecialchars($row["nama_kategori"]) ?>
              </option>
            <?php endwhile; ?>
          </select>
        </div>

        <!-- Stok -->
        <div class="flex flex-col">
          <label for="stock">Stok</label>
          <input
            type="number"
            name="stock"
            id="stock"
            required
            min="1"
            class="mt-2 border-2 border-gray-300 outline-none p-2 rounded-xl focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm bg-white" />
        </div>

      </div>

      <!-- Tombol Submit -->
      <div class="flex justify-end mt-16">
        <button
          type="submit"
          class="py-2 px-4 font-semibold rounded-xl text-white <?= $buttonColor ?>">
          <?= $wording ?>
        </button>
      </div>
    </form>
  </section>
</main>

<script type="module">
  import {
    nanoid
  } from "https://cdn.jsdelivr.net/npm/nanoid/nanoid.js";

  const itemForm = document.getElementById("itemForm");
  const params = new URLSearchParams(window.location.search);
  const mode = params.get("mode");
  const id = params.get("id");

  if (mode === "edit" && id) {
    fetch(`../service/items.service.php?action=GET_ONE&id=${id}`)
      .then((res) => res.json())
      .then((data) => {
        if (data) {
          document.getElementById("itemName").value = data.nama_barang || "";
          document.getElementById("category").value = data.id_kategori || "";
          document.getElementById("stock").value = data.stok || 0;
        }
      })
      .catch((err) => {
        console.error("Gagal mengambil data barang:", err);
        alert("Gagal memuat data barang untuk diedit.");
      });
  }

  itemForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const formData = new FormData(itemForm);

    const isEdit = mode === "edit" && id;
    formData.append("id", isEdit ? id : nanoid());
    formData.append("action", isEdit ? "UPDATE" : "INSERT");

    try {
      await fetch("../service/items.service.php", {
        method: "POST",
        body: formData
      });
      window.location.href = "pages/item-list.php";
    } catch (error) {
      console.error("Gagal menyimpan data barang:", error);
      alert("Terjadi kesalahan saat menyimpan. Silakan coba lagi.");
    }
  });
</script>

<?php include "../layout/bottom.php" ?>