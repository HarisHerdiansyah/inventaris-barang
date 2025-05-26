<?php include "../middleware/middleware.php" ?>
<?php include "../layout/top.php" ?>
<?php include "../layout/navbar.php" ?>
<?php
include "../config/database.php";
$categories = $db->query("select * from kategori");
?>

<main class="px-16 py-4">
  <h1 class="text-2xl font-semibold mb-4">Kelola Kategori</h1>
  <form id="categoryForm" class="space-y-4 mb-16">
    <div id="form-control" class="flex flex-col">
      <label for="category">Kategori</label>
      <input
        type="text"
        name="category"
        id="category"
        autocomplete="off"
        class="mt-2 border-2 border-gray-300 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm" />
    </div>
    <div class="flex justify-end">
      <button
        data-action="insert"
        data-target=""
        id="submitBtn"
        type="submit"
        name="submit"
        class="bg-blue-500 hover:bg-blue-600 py-2 px-4 font-semibold rounded-md cursor-pointer text-white">
        Tambah Kategori
      </button>
    </div>
  </form>

  <h1 class="text-2xl font-semibold mb-4">Daftar Kategori</h1>
  <table class="border border-gray-400 min-w-full border-collapse my-10">
    <thead>
      <tr>
        <th class="p-2 font-normal border border-gray-300 text-center">
          Kategori
        </th>
        <th class="p-2 font-normal border border-gray-300 text-center">
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
        echo '<td class="p-2 border border-gray-300 text-center">' . $cat_name . '</td>';
        echo '<td class="p-2 border border-gray-300">
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
    console.log("invo")
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