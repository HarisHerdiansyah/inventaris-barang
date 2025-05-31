<?php
include "../config/database.php";

function register($db, $id, $user_name, $user_email, $user_password)
{
  $hashed = password_hash($user_password, PASSWORD_DEFAULT);
  $stmt = $db->prepare("insert into users (id_user, nama, email, password) values (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $id, $user_name, $user_email, $hashed);

  if ($stmt->execute()) {
    http_response_code(201);
    echo json_encode([
      "message" => "Proses registrasi berhasil."
    ]);
  } else {
    http_response_code(500);
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
    http_response_code(500);
    echo json_encode([
      "message" => "Gagal memproses data."
    ]);
    exit;
  }

  $result = $stmt->get_result();
  if ($result->num_rows === 0) {
    http_response_code(404);
    echo json_encode([
      "message" => "Akun tidak terdaftar."
    ]);
    exit;
  }

  $user = $result->fetch_assoc();
  http_response_code(400);
  if (!password_verify($user_password, $user["password"])) {
    echo json_encode([
      "message" => "Password salah. Coba lagi."
    ]);
    exit;
  }

  session_start();
  $_SESSION["logged_in"] = 1;
  $_SESSION["uid"] = $user["id_user"];
  $_SESSION["nama"] = $user["nama"];
  $_SESSION["email"] = $user["email"];
  $_SESSION["role"] = $user["role"];

  http_response_code(201);
  echo json_encode([
    "message" => "Login berhasil",
    "role" => $user["role"]
  ]);
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
  $user_email = $_POST["email"];
  $user_password = $_POST["password"];

  if ($action === "login") {
    login($db, $user_email, $user_password);
  } else if ($action === "register") {
    $id = $_POST["id"];
    $user_name = $_POST["username"];
    register($db, $id, $user_name, $user_email, $user_password);
  } else if ($action === "logout") {
    logout();
  } else {
    not_found();
  }
}
