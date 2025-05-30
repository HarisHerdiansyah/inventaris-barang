<?php include "../middleware/session.middleware.php" ?>
<?php include "../service/category.service.php" ?>
<?php include "../layout/top.php" ?>
<?php include "../layout/navbar.php" ?>

<main class="px-16 py-4 bg-[url(../assets/bg-1.jpg)] min-h-screen bg-cover bg-no-repeat bg-fixed bg-center">
  <section id="card-container" class="p-8 rounded-3xl">
    <h1 class="text-2xl font-semibold mb-4">Peminjaman Barang</h1>
    <form id="rentForm" class="space-y-4">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div id="form-control" class="flex flex-col">
          <label for="category">Kategori Barang:</label>
          <select
            name="category"
            id="category"
            class="mt-2 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm rounded-xl bg-white">
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
          <label for="borrow_date">Tanggal Peminjaman</label>
          <input
            type="date"
            name="borrow_date"
            id="borrow_date"
            autocomplete="off"
            class="mt-2 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm rounded-xl bg-white" />
        </div>
        <div id="form-control" class="flex flex-col">
          <label for="items">Cari Barang:</label>
          <select
            name="items"
            id="items"
            class="mt-2 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm rounded-xl bg-white disabled:bg-gray-300 disabled:text-gray-400"
            disabled>
            <option value="">Pilih Barang</option>
          </select>
        </div>
        <div id="form-control" class="flex flex-col">
          <label for="restore_date">Tanggal Pengembalian</label>
          <input
            type="date"
            name="restore_date"
            id="restore_date"
            autocomplete="off"
            class="mt-2 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm rounded-xl bg-white" />
        </div>
        <div id="form-control" class="flex flex-col">
          <label for="quantity">Jumlah</label>
          <input
            type="number"
            name="quantity"
            id="quantity"
            autocomplete="off"
            class="mt-2 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm rounded-xl bg-white" />
        </div>
      </div>
      <div class="flex justify-end mt-16">
        <button
          type="submit"
          name="submit"
          class="bg-[#003262] py-2 px-4 font-semibold rounded-xl cursor-pointer text-white">
          Ajukan Peminjaman
        </button>
      </div>
    </form>
  </section>
</main>

<script type="module">
  import {
    nanoid
  } from "https://cdn.jsdelivr.net/npm/nanoid/nanoid.js";

  const categoryDropdown = document.querySelector("select#category");
  const itemsDropdown = document.querySelector("select#items");
  const rentForm = document.getElementById("rentForm");

  rentForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const formData = new FormData(rentForm);
    formData.append("id", nanoid());
    formData.append("action", "INSERT");

    try {
      await fetch("../service/rent-staff.service.php", {
        method: "POST",
        body: formData
      });
      window.location.href = "rent-form.php";
    } catch (error) {
      console.error("error", error);
    }
  });

  categoryDropdown.addEventListener("change", async (e) => {
    if (e.target.value != "") {
      itemsDropdown.disabled = false;
    } else {
      itemsDropdown.disabled = true;
    }
    const formData = new FormData();
    formData.append("category", e.target.value);
    const response = await fetch("../service/items.service.php?category=" + e.target.value, {
      method: "GET"
    })
    const responseJson = await response.json();
    const options = responseJson.data;
    itemsDropdown.innerHTML = "";
    options.forEach((opt) => {
      const optionNode = document.createElement("option");
      optionNode.value = opt.id_barang;
      optionNode.innerText = opt.nama_barang;
      itemsDropdown.appendChild(optionNode);
    });
  });
</script>

<?php include "../layout/bottom.php" ?>