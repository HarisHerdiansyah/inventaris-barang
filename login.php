<?php include "./layout/top.php" ?>

<main class="bg-[url(./assets/bg-2.jpg)] min-h-screen bg-cover bg-no-repeat bg-fixed bg-center flex justify-center items-center">
  <form class="bg-white/90 py-8 px-10 rounded-lg max-w-[500px] flex-1">
    <h1 class="font-semibold text-4xl text-center">Welcome Back</h1>
    <section class="my-6 space-y-2">
      <div id="form-control" class="flex flex-col">
        <label class="text-xl mb-1.5 font-semibold" for="email">
          Email
        </label>
        <input type="email" id="email" class="bg-[#f7faff] outline-none border-2 border-[#ccc] focus:border-[#003262] px-3 py-2 rounded-xl" autocomplete="off">
      </div>
      <div id="form-control" class="flex flex-col">
        <label class="text-xl mb-1.5 font-semibold" for="passowrd">
          Password
        </label>
        <input type="password" id="passowrd" class="bg-[#f7faff] outline-none border-2 border-[#ccc] focus:border-[#003262] px-3 py-2 rounded-xl" autocomplete="off">
      </div>
      <button class="bg-[#003262] w-full mt-8 rounded-full text-white text-xl py-2 cursor-pointer hover:scale-103 transition-all">
        Login
      </button>
      <div class="text-center mt-6">
        <p class="font-semibold">Don't have account?
          <span class="text-[#003262] hover:underline cursor-pointer">Sign Up</span>
        </p>
      </div>
    </section>
  </form>
</main>

<?php include "./layout/bottom.php" ?>