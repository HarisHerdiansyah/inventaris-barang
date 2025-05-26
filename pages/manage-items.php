<?php include "../middleware/middleware.php" ?>
<?php include "../layout/top.php" ?>
<?php include "../layout/navbar.php" ?>
<?php
include "../config/database.php";

$mode = $_GET["mode"] ?? "add";
$id = $_GET["id"] ?? null;
$categories = $db->query("select * from kategori order by nama_kategori asc");
$btn_class = $mode === "add" ? "bg-blue-500 hover:bg-blue-600 " : "bg-purple-700 hover:bg-purple-800 ";
$wording = $mode === "add" ? "Tambah Barang" : "Edit Barang";

?>

<main class="px-16 py-4">
  <h1 class="text-2xl font-semibold mb-4">Tambah Barang</h1>
  <form id="itemForm" class="space-y-4 mb-16">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div id="form-control" class="flex flex-col">
        <label for="itemName">Nama Barang</label>
        <input
          type="text"
          name="itemName"
          id="itemName"
          autocomplete="off"
          class="mt-2 border-2 border-gray-300 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm" />
      </div>
      <div id="form-control" class="flex flex-col">
        <label for="category">Kategori</label>
        <select
          name="category"
          id="category"
          class="mt-2 border-2 border-gray-300 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm">
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
          class="mt-2 border-2 border-gray-300 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm" />
      </div>
      <div id="form-control" class="flex flex-col">
        <label for="condition">Kondisi</label>
        <select
          name="condition"
          id="condition"
          class="mt-2 border-2 border-gray-300 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm">
          <option value="">Kondisi Barang</option>
          <option value="1">Baik</option>
          <option value="0">Kurang Baik</option>
        </select>
      </div>
    </div>

    <div class="flex justify-end mt-16">
      <?php
      echo '<button type="submit" name="submit" class="' . $btn_class . 'py-2 px-4 font-semibold rounded-md cursor-pointer text-white">' . $wording . '</button>';
      ?>
    </div>
  </form>
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