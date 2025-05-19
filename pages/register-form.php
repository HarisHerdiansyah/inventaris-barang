<?php include "../layout/top.php" ?>

<main class="pt-12">
  <form
    class="mx-auto py-5 px-8 rounded-lg max-w-[500px] border border-2 border-gray-200 shadow">
    <p class="text-center text-2xl font-semibold mb-10">Register</p>
    <div class="space-y-6 mb-10">
      <div id="form-control" class="flex flex-col space-y-2">
        <label for="nama">Nama:</label>
        <input
          type="text"
          name="nama"
          id="nama"
          autocomplete="off"
          class="border border-2 border-gray-300 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-400 focus:border-blue-400 shadow-sm" />
      </div>
      <div id="form-control" class="flex flex-col space-y-2">
        <label for="email">Email:</label>
        <input
          type="email"
          name="email"
          id="email"
          autocomplete="off"
          class="border border-2 border-gray-300 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-400 focus:border-blue-400 shadow-sm" />
      </div>
      <div id="form-control" class="flex flex-col space-y-2">
        <label for="password">Password:</label>
        <input
          type="password"
          name="password"
          id="password"
          autocomplete="off"
          class="border border-2 border-gray-300 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-400 focus:border-blue-400 shadow-sm" />
      </div>
      <div id="form-control" class="flex flex-col space-y-2">
        <label for="confirm-password">Konfirmasi Password:</label>
        <input
          type="password"
          name="confirm-password"
          id="confirm-password"
          autocomplete="off"
          class="border border-2 border-gray-300 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-400 focus:border-blue-400 shadow-sm" />
      </div>
      <button
        type="submit"
        name="submit"
        class="mt-6 w-full px-4 py-2 text-lg bg-purple-700 hover:bg-purple-800 text-white rounded-md cursor-pointer">
        Daftar
      </button>
    </div>
  </form>
</main>

<?php include "../layout/bottom.php" ?>