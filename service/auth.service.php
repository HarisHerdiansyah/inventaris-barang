<?php
include "../config/database.php";

function register($db, $id, $user_name, $user_email, $user_password)
{
  $hashed = password_hash($user_password, PASSWORD_DEFAULT);
  $stmt = $db->prepare("insert into users (id_user, nama, email, password, role) values (?, ?, ?, ?, ?)");
  $role = "ADMIN";
  $stmt->bind_param("sssss", $id, $user_name, $user_email, $hashed, $role);

  if ($stmt->execute()) {
    echo json_encode([
      "message" => "Proses registrasi berhasil."
    ]);
  } else {
    echo json_encode([
      "message" => "Proses registrasi gagal. Coba lagi."
    ]);
  }
}

function login($db, $user_email, $user_password)
{
  $stmt = $db->prepare("select * from users where email = ?");
  $stmt->bind_param("s", $user_email);

  if (!$stmt->execute()) {
    echo json_encode([
      "message" => "Gagal memproses data."
    ]);
    die();
  }

  $result = $stmt->get_result();
  if ($result->num_rows === 0) {
    echo json_encode([
      "message" => "Akun tidak terdaftar."
    ]);
    die();
  }

  $user = $result->fetch_assoc();
  if (!password_verify($user_password, $user["password"])) {
    echo json_encode([
      "message" => "Password salah. Coba lagi."
    ]);
    die();
  }

  session_start();
  $_SESSION["logged_in"] = 1;
  $_SESSION["uid"] = $user["id_user"];
  $_SESSION["nama"] = $user["nama"];
  $_SESSION["email"] = $user["email"];
}

function logout()
{
  session_start();
  $_SESSION = array();
  setcookie(session_name(), '', 100);
  session_unset();
  session_destroy();
}

function not_found()
{
  echo json_encode([
    "message" => "Aksi tidak dapat diproses."
  ]);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $action = strtolower($_POST["action"]);
  $id = $_POST["id"];
  $user_name = $_POST["username"];
  $user_email = $_POST["email"];
  $user_password = $_POST["password"];

  if ($action === "login") {
    login($db, $user_email, $user_password);
  } else if ($action === "register") {
    register($db, $id, $user_name, $user_email, $user_password);
  } else if ($action === "logout") {
    logout();
  } else {
    not_found();
  }
}
