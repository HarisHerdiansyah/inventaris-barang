<?php include "../middleware/session.middleware.php" ?>
<?php include "../service/category.service.php" ?>
<?php include "../layout/top.php" ?>
<?php include "../layout/navbar.php" ?>

<main class="px-16 py-4 bg-[url(../assets/bg-6.jpg)] min-h-screen bg-cover bg-no-repeat bg-fixed bg-center">
  <section id="card-container" class="rounded-3xl p-8 mb-8">
    <div class="grid grid-cols-3 gap-8">
      <div class="col-span-2">
        <h1 class="text-2xl font-semibold mb-4">
          Kategori dengan Barang Terbanyak
        </h1>
        <div class="grid grid-cols-2 gap-4">
          <?php
          while ($row = $four_most_items->fetch_assoc()) {
            echo '<div class="bg-white rounded-xl p-6">';
            echo '<p class="text-2xl font-semibold">'.$row["nama_kategori"].'</p>';
            echo '<p>Total: '.$row["jmlh"].' Barang</p>';
            echo '</div>';
          }

          if ($four_most_items->num_rows < 4) {
            echo '<div class="bg-white rounded-xl p-6">';
            echo '<p class="text-2xl font-semibold">-</p>';
            echo '<p>Total: -</p>';
            echo '</div>';
          }
          ?>
        </div>
      </div>
      <div>
        <h1 class="text-2xl font-semibold mb-4">
          Kelola Kategori
        </h1>
        <form id="categoryForm" class="space-y-4">
          <div id="form-control" class="flex flex-col">
            <input
              placeholder="Kategori"
              type="text"
              name="category"
              id="category"
              autocomplete="off"
              class="mt-2 border-2 border-gray-300 outline-none p-2 rounded-xl focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm bg-white" />
          </div>
          <div class="flex justify-end">
            <button
              data-action="insert"
              data-target=""
              id="submitBtn"
              type="submit"
              name="submit"
              class="bg-[#003262] py-2 px-4 font-semibold rounded-xl cursor-pointer text-white">
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
          <th class="p-2 font-semibold text-center">
            Kategori
          </th>
          <th class="p-2 font-semibold text-center">
            Aksi
          </th>
        </tr>
      </thead>
      <tbody>

        <?php
        while ($row = $categories->fetch_assoc()) {
          $cat_id = $row["id_kategori"];
          $cat_name = htmlspecialchars($row["nama_kategori"]);

          echo '<tr>';
          echo '<td class="p-2 text-center">' . $cat_name . '</td>';
          echo '<td class="p-2">
          <div class="flex justify-center items-center gap-2">
            <button 
              id="editBtn"
              class="edit-btn w-10 h-10 bg-yellow-400 hover:bg-yellow-500 rounded-lg cursor-pointer"
              data-id="' . $cat_id . '" 
              data-name="' . $cat_name . '">
              <i class="fas fa-pencil-alt text-xl"></i>
            </button>
            <button 
              id="deleteBtn"
              class="delete-btn w-10 h-10 bg-red-500 hover:bg-red-600 rounded-lg cursor-pointer"
              data-id="' . $cat_id . '">
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

<script type="module">
  import {
    nanoid
  } from "https://cdn.jsdelivr.net/npm/nanoid/nanoid.js";

  const categoryForm = document.getElementById("categoryForm");

  async function insertCategory(formData) {
    try {
      await fetch("../service/category.service.php", {
        method: "POST",
        body: formData
      });
    } catch (e) {
      console.log(e);
    } finally {
      window.location.reload();
    }
  }

  async function updateCategory(formData) {
    try {
      await fetch("../service/category.service.php", {
        method: "POST",
        body: formData
      });
    } catch (e) {
      console.log(e);
    } finally {
      window.location.reload();
    }
  }

  async function deleteCategory(id) {
    const formData = new FormData();
    formData.append("id", id);
    formData.append("action", "DELETE");
    try {
      await fetch("../service/category.service.php", {
        method: "POST",
        body: formData
      });
    } catch (e) {
      console.log(e);
    } finally {
      window.location.reload();
    }
  }

  categoryForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const formData = new FormData(categoryForm);
    const submitBtn = categoryForm.querySelector("#submitBtn");

    if (submitBtn.dataset.action === "insert") {
      formData.append("id", nanoid());
      formData.append("action", "INSERT")
      await insertCategory(formData);
      return;
    } else {
      formData.append("id", submitBtn.dataset.target);
      formData.append("action", "UPDATE");
      await updateCategory(formData);
      submitBtn.innerText = "Tambah Kategori";
      submitBtn.dataset.action = "insert";
      submitBtn.dataset.target = "";
      submitBtn.classList.remove("bg-purple-700", "hover:bg-purple-800");
      submitBtn.classList.add("bg-blue-500", "hover:bg-blue-600");
      return;
    }
  });

  document.addEventListener("click", async (e) => {
    const editTarget = e.target.closest(".edit-btn");
    const deleteTarget = e.target.closest(".delete-btn");

    if (editTarget) {
      const {
        id,
        name
      } = editTarget.dataset;
      const inputText = document.getElementById("category");
      inputText.value = name;

      const submitBtn = document.getElementById("submitBtn");
      submitBtn.innerText = "Edit Kategori";
      submitBtn.dataset.action = "update";
      submitBtn.dataset.target = id;
      submitBtn.classList.remove("bg-blue-500", "hover:bg-blue-600");
      submitBtn.classList.add("bg-purple-700", "hover:bg-purple-800");
    }

    if (deleteTarget) {
      const {
        id
      } = deleteTarget.dataset;
      await deleteCategory(id);
    }
  });
</script>

<?php include "../layout/bottom.php" ?>