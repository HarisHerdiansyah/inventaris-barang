<?php include "../layout/top.php" ?>
<?php include "../layout/navbar.php" ?>
<?php
include "../config/database.php";
$items = $db->query("select b.id_barang, b.nama_barang, k.nama_kategori, b.stok, b.kondisi from barang as b left join kategori as k on b.kategori = k.id_kategori order by b.nama_barang asc");
?>

<main class="px-16 py-4">
  <div class="flex justify-between items-center">
    <h1 class="text-2xl font-semibold">Daftar Barang</h1>
    <a href="./manage-items.php">
      <button class="bg-blue-500 hover:bg-blue-600 py-2 px-4 font-semibold rounded-md cursor-pointer text-white">
        <i class="fas fa-plus mr-2"></i>
        Tambah Barang
      </button>
    </a>
  </div>
  <table class="border border-gray-400 min-w-full border-collapse my-10">
    <thead>
      <tr>
        <th class="p-2 font-normal border border-gray-300">Nama Barang</th>
        <th class="p-2 font-normal border border-gray-300">Kategori</th>
        <th class="p-2 font-normal border border-gray-300">Jumlah</th>
        <th class="p-2 font-normal border border-gray-300">Kondisi</th>
        <th class="p-2 font-normal border border-gray-300">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($row = $items->fetch_assoc()) {
        $id = $row["id_barang"];
        $nama_barang = $row["nama_barang"];
        $stok = $row["stok"];
        $kondisi = $row["kondisi"] === "0" ? "Kurang Baik" : "Baik";
        $kategori = $row["nama_kategori"];

        echo '<tr>';
        echo '<td class="p-2 border border-gray-300">' . $nama_barang . '</td>';
        echo '<td class="p-2 border border-gray-300">' . $kategori . '</td>';
        echo '<td class="p-2 border border-gray-300">' . $stok . '</td>';
        echo '<td class="p-2 border border-gray-300">' . $kondisi . '</td>';
        echo '<td class="p-2 border border-gray-300">
          <div class="flex justify-center items-center gap-2">
            <a href="../pages/manage-items.php">
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
</main>

<?php include "../layout/bottom.php" ?>