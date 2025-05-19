<?php
$env = parse_ini_file('../.env');
$hostname = $env["DB_HOSTNAME"];
$username = $env["DB_USER"];
$password = $env["DB_PASSWORD"];
$db_name = $env["MODE"] === "development" ? $env["DB_NAME_DEV"] : $env["DB_NAME_PROD"];
$port = $env["DB_PORT"];

$db = new mysqli($hostname, $username, $password, $db_name, $port);

if ($db->connect_error) {
  die("Connection Failed");
}

echo "Connection Success";