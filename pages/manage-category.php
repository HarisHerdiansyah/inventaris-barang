<?php include "../layout/top.php" ?>

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
        class="mt-2 border border-2 border-gray-300 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 shadow-sm" />
    </div>
    <div class="flex justify-end">
      <button
        data-action="insert"
        data-target=""
        id="submitBtn"
        type="submit"
        name="submit"
        class="px-4 py-1 flex items-center gap-2 text-lg bg-purple-700 hover:bg-purple-800 text-white rounded-md cursor-pointer">
        Tambah
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
      <tr>
        <td class="p-2 border border-gray-300 text-center">
          Nama Kategori
        </td>
        <td class="p-2 border border-gray-300">
          <div class="flex justify-center items-center gap-2">
            <button
              id="editBtn"
              class="edit-btn w-10 h-10 bg-yellow-400 hover:bg-yellow-500 rounded-lg cursor-pointer">
              <i class="fas fa-pencil-alt text-xl"></i>
            </button>
            <button
              id="deleteBtn"
              class="delete-btn w-10 h-10 bg-red-500 hover:bg-red-600 rounded-lg cursor-pointer">
              <i class="fas fa-trash text-xl text-white"></i>
            </button>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</main>

<?php include "../layout/bottom.php" ?>