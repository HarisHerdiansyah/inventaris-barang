<script>
  const logoutBtn = document.getElementById("logoutBtn");
  logoutBtn.addEventListener("click", async () => {
    const payload = new FormData();
    payload.append("action", "LOGOUT");
    try {
      await fetch("/inventaris-barang/service/auth.service.php", {
        method: "POST",
        body: payload
      });
      window.location.reload();
    } catch (error) {
      console.error("error logout", error);
    }
  });
</script>

</body>

</html>