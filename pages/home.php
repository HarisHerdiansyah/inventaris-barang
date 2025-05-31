<?php include "../middleware/session.middleware.php" ?>
<?php include "../layout/top.php" ?>
<?php include "../layout/navbar.php" ?>

<?php 
include "../middleware/route.middleware.php";
staff_only();
?>

<main class="px-16 py-4 bg-[url(../assets/bg-1.jpg)] min-h-screen bg-cover bg-no-repeat bg-fixed bg-center">
  <section id="card-container" class="rounded-3xl p-8">
    <h1 class="text-2xl font-semibold mb-4">
      Selamat Datang, <?= $nama ?>
    </h1>
    <div class="max-w-[600px] grid grid-cols-2 gap-8">
      <a href="./rent-form.php">
        <button class="w-full bg-purple-700 hover:bg-purple-800 py-2 px-4 font-semibold rounded-xl cursor-pointer text-white">
          Ajukan Peminjaman
        </button>
      </a>
      <a href="./rent-status.php">
        <button class="w-full bg-teal-700 hover:bg-teal-800 py-2 px-4 font-semibold rounded-xl cursor-pointer text-white">
          Status Peminjaman
        </button>
      </a>
    </div>
  </section>
</main>

<?php include "../layout/bottom.php" ?>