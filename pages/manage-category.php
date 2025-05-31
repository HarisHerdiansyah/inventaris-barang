<?php include "../middleware/session.middleware.php" ?>
<?php include "../service/category.service.php" ?>
<?php include "../layout/top.php" ?>
<?php include "../layout/navbar.php" ?>

<main class="px-16 py-4 bg-[url(../assets/bg-6.jpg)] min-h-screen bg-cover bg-no-repeat bg-fixed bg-center">

  <section id="card-container" class="rounded-3xl p-8 mb-8">
    <div class="grid grid-cols-3 gap-8">
      <div class="col-span-2">
        <h1 class="text-2xl font-semibold mb-4">Kategori dengan Barang Terbanyak</h1>
        <div class="grid grid-cols-2 gap-4">
          <?php while ($row = $four_most_items->fetch_assoc()): ?>
            <div class="bg-white rounded-xl p-6">
              <p class="text-2xl font-semibold"><?= htmlspecialchars($row["nama_kategori"]) ?></p>
              <p>Total: <?= htmlspecialchars($row["jmlh"]) ?> Barang</p>
            </div>
          <?php endwhile; ?>

          <?php if ($four_most_items->num_rows < 4): ?>
            <div class="bg-white rounded-xl p-6">
              <p class="text-2xl font-semibold">-</p>
              <p>Total: -</p>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <div>
        <h1 class="text-2xl font-semibold mb-4">Kelola Kategori</h1>
        <form id="categoryForm" class="space-y-4">
          <div class="flex flex-col">
            <input
              type="text"
              name="category"
              id="category"
              placeholder="Kategori"
              autocomplete="off"
              class="mt-2 border-2 border-gray-300 outline-none p-2 rounded-xl focus:ring focus:ring-blue-500 shadow-sm bg-white" />
          </div>
          <div class="flex justify-end">
            <button
              id="submitBtn"
              data-action="insert"
              data-target=""
              type="submit"
              class="bg-[#003262] py-2 px-4 font-semibold rounded-xl text-white">
              Tambah Kategori
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>

  <section id="card-container" class="rounded-3xl p-8">
    <h1 class="text-2xl font-semibold mb-4">Daftar Kategori</h1>
    <table id="data-table" class="min-w-full border-collapse my-10 rounded-xl">
      <thead>
        <tr>
          <th class="p-2 font-semibold text-center">Kategori</th>
          <th class="p-2 font-semibold text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $categories->fetch_assoc()): ?>
          <tr class="hover:bg-gray-100 transition">
            <td class="p-2 text-center"><?= htmlspecialchars($row["nama_kategori"]) ?></td>
            <td class="p-2">
              <div class="flex justify-center items-center gap-2">
                <button
                  class="edit-btn w-10 h-10 bg-yellow-400 hover:bg-yellow-500 rounded-lg"
                  data-id="<?= htmlspecialchars($row["id_kategori"]) ?>"
                  data-name="<?= htmlspecialchars($row["nama_kategori"]) ?>">
                  <i class="fas fa-pencil-alt text-xl"></i>
                </button>
                <button
                  class="delete-btn w-10 h-10 bg-red-500 hover:bg-red-600 rounded-lg text-white"
                  data-id="<?= htmlspecialchars($row["id_kategori"]) ?>">
                  <i class="fas fa-trash text-xl"></i>
                </button>
              </div>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </section>
</main>

<script type="module">
  import {
    nanoid
  } from "https://cdn.jsdelivr.net/npm/nanoid/nanoid.js";

  const form = document.getElementById("categoryForm");
  const submitBtn = document.getElementById("submitBtn");
  const inputField = document.getElementById("category");

  async function sendCategory(formData, action) {
    try {
      await fetch("../service/category.service.php", {
        method: "POST",
        body: formData
      });
    } catch (error) {
      console.error(error);
    } finally {
      window.location.reload();
    }
  }

  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    const formData = new FormData(form);

    const action = submitBtn.dataset.action;
    const id = submitBtn.dataset.target || nanoid();

    formData.append("id", id);
    formData.append("action", action.toUpperCase());

    await sendCategory(formData, action);

    if (action === "update") {
      resetForm();
    }
  });

  function resetForm() {
    inputField.value = "";
    submitBtn.textContent = "Tambah Kategori";
    submitBtn.dataset.action = "insert";
    submitBtn.dataset.target = "";
    submitBtn.classList.remove("bg-purple-700", "hover:bg-purple-800");
    submitBtn.classList.add("bg-[#003262]");
  }

  document.addEventListener("click", async (e) => {
    const editBtn = e.target.closest(".edit-btn");
    const deleteBtn = e.target.closest(".delete-btn");

    if (editBtn) {
      const {
        id,
        name
      } = editBtn.dataset;
      inputField.value = name;
      submitBtn.textContent = "Edit Kategori";
      submitBtn.dataset.action = "update";
      submitBtn.dataset.target = id;
      submitBtn.classList.remove("bg-[#003262]");
      submitBtn.classList.add("bg-purple-700", "hover:bg-purple-800");
    }

    if (deleteBtn) {
      const {
        id
      } = deleteBtn.dataset;
      const formData = new FormData();
      formData.append("id", id);
      formData.append("action", "DELETE");
      await sendCategory(formData, "delete");
    }
  });
</script>

<?php include "../layout/bottom.php" ?>