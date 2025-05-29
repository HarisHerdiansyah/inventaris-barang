<?php include "../middleware/middleware.php" ?>
<?php include "../layout/top.php" ?>
<?php include "../layout/navbar.php" ?>
<?php
include "../config/database.php";

$mode = $_GET["mode"] ?? "add";
$id = $_GET["id"] ?? null;
$categories = $db->query("select * from kategori order by nama_kategori asc");
$wording = $mode === "add" ? "Tambah Barang" : "Edit Barang";

?>

<main class="px-16 py-4 bg-[url(../assets/bg-5.jpg)] min-h-screen bg-cover bg-no-repeat bg-fixed bg-center">
  <section id="manage-items" class="rounded-3xl p-8">
    <h1 class="text-2xl font-semibold mb-4">Tambah Barang</h1>
    <form id="itemForm" class="space-y-4">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div id="form-control" class="flex flex-col">
          <label for="itemName">Nama Barang</label>
          <input
            type="text"
            name="itemName"
            id="itemName"
            autocomplete="off"
            class="mt-2 border-2 border-gray-300 outline-none p-2 rounded-xl focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm bg-white" />
        </div>
        <div id="form-control" class="flex flex-col">
          <label for="category">Kategori</label>
          <select
            name="category"
            id="category"
            class="mt-2 border-2 border-gray-300 outline-none p-2 rounded-xl focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm bg-white">
            <option value="">Pilih Kategori</option>
            <?php
            while ($row = $categories->fetch_assoc()) {
              $id = $row["id_kategori"];
              $category = htmlspecialchars($row["nama_kategori"]);
              echo '<option value="' . $id . '">' . $category . '</option>';
            }
            ?>
          </select>
        </div>
        <div id="form-control" class="flex flex-col">
          <label for="stock">Stok</label>
          <input
            type="number"
            name="stock"
            id="stock"
            autocomplete="off"
            class="mt-2 border-2 border-gray-300 outline-none p-2 rounded-xl focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm bg-white" />
        </div>
      </div>

      <div class="flex justify-end mt-16">
        <?php
        echo '<button type="submit" id="manage-items-btn" name="submit" class="py-2 px-4 font-semibold rounded-xl cursor-pointer text-white">' . $wording . '</button>';
        ?>
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

  async function insertItem(formData) {
    try {
      await fetch("../service/items.service.php", {
        method: "POST",
        body: formData
      });
      window.location.reload();
    } catch (e) {
      console.log(e);
    }
  }

  async function updateItem(formData) {
    try {
      await fetch("../service/items.service.php", {
        method: "POST",
        body: formData
      });
      window.location.reload();
    } catch (e) {
      console.log(e);
    }
  }

  itemForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(itemForm);

    if (params.get("mode") && params.get("id")) {
      formData.append("id", params.get("id"));
      formData.append("action", "UPDATE");
      await updateItem(formData);
      return;
    }

    formData.append("id", nanoid());
    formData.append("action", "INSERT");
    await insertItem(formData);
  });
</script>

<?php include "../layout/bottom.php" ?>