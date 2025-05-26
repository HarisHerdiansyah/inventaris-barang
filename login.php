<?php include "./layout/top.php" ?>

<main class="bg-[url(./assets/bg-2.jpg)] min-h-screen bg-cover bg-no-repeat bg-fixed bg-center flex justify-center items-center">
  <form id="loginForm" class="bg-white/90 py-8 px-10 rounded-3xl max-w-[500px] flex-1">
    <h1 class="font-semibold text-4xl text-center mt-6 mb-14">Welcome Back</h1>
    <section class="space-y-2">
      <div id="form-control" class="flex flex-col">
        <label class="text-xl mb-1.5 font-semibold" for="email">
          Email
        </label>
        <input type="email" id="email" name="email" class="bg-[#f7faff] outline-none border-2 border-[#ccc] focus:border-[#003262] px-3 py-2 rounded-xl" autocomplete="off">
      </div>
      <div id="form-control" class="flex flex-col">
        <label class="text-xl mb-1.5 font-semibold" for="passowrd">
          Password
        </label>
        <input type="password" id="passowrd" name="password" class="bg-[#f7faff] outline-none border-2 border-[#ccc] focus:border-[#003262] px-3 py-2 rounded-xl" autocomplete="off">
      </div>
      <button class="bg-[#003262] w-full mt-8 rounded-full text-white text-xl py-2 cursor-pointer hover:scale-103 transition-all">
        Login
      </button>
      <div class="text-center my-6">
        <a href="./pages/register-form.php" class="font-semibold">Don't have account?
          <span class="text-[#003262] hover:underline cursor-pointer">Sign Up</span>
        </a>
      </div>
    </section>
  </form>
</main>

<script>
  const loginForm = document.getElementById("loginForm");
  loginForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(loginForm);
    formData.append("action", "LOGIN");

    try {
      await fetch("./service/auth.service.php", {
        method: "POST",
        body: formData
      });
      window.location.reload();
    } catch (error) {
      console.error("error login", error);
    }
  })
</script>

<?php include "./layout/bottom.php" ?>