<?php include "../layout/top.php" ?>

<main class="bg-[url(../assets/bg-2.jpg)] min-h-screen bg-cover bg-no-repeat bg-fixed bg-center flex justify-center items-center">
  <form id="registerForm" class="bg-white/90 py-8 px-10 rounded-3xl max-w-[500px] flex-1">
    <h1 class="font-semibold text-4xl text-center mt-6 mb-14">Create an Account</h1>
    <section class="space-y-2">
      <div id="form-control" class="flex flex-col">
        <label class="text-xl mb-1.5 font-semibold" for="username">
          Username
        </label>
        <input type="text" id="username" name="username" class="bg-[#f7faff] outline-none border-2 border-[#ccc] focus:border-[#003262] px-3 py-2 rounded-xl" autocomplete="off">
      </div>
      <div id="form-control" class="flex flex-col">
        <label class="text-xl mb-1.5 font-semibold" for="email">
          Email
        </label>
        <input type="email" id="email" name="email" class="bg-[#f7faff] outline-none border-2 border-[#ccc] focus:border-[#003262] px-3 py-2 rounded-xl" autocomplete="off">
      </div>
      <div id="form-control" class="flex flex-col">
        <label class="text-xl mb-1.5 font-semibold" for="password">
          Password
        </label>
        <input type="password" id="password" name="password" class="bg-[#f7faff] outline-none border-2 border-[#ccc] focus:border-[#003262] px-3 py-2 rounded-xl" autocomplete="off">
      </div>
      <button type="submit" class="bg-[#003262] w-full mt-8 rounded-full text-white text-xl py-2 cursor-pointer hover:scale-103 transition-all">
        Register
      </button>
      <div class="text-center my-6">
        <p class="font-semibold">Already have an account?
          <a href="../login.php" class="text-[#003262] hover:underline cursor-pointer">Login</a>
        </p>
      </div>
    </section>
  </form>
</main>
<script type="module">
  import {
    nanoid
  } from "https://cdn.jsdelivr.net/npm/nanoid/nanoid.js";

  const registerForm = document.getElementById("registerForm");

  async function register(formData) {
    try {
      const response = await fetch("../service/auth.service.php", {
        method: "POST",
        body: formData
      });
      const responseJson = await response.json();

      if (!response.ok) {
        Swal.fire({
          title: responseJson.message,
          icon: 'error',
        })
        return;
      } else {
        Swal.fire({
          title: responseJson.message,
          icon: 'success',
        })
        return;
      }
    } catch (error) {
      console.error("register error", error);
    }
  }

  registerForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const formData = new FormData(registerForm);
    formData.append("id", nanoid());
    formData.append("action", "REGISTER");
    const response = await register(formData);
  });
</script>

<?php include "../layout/bottom.php" ?>