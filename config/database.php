<?php
$env = parse_ini_file(__DIR__.'/../.env');

$db_target = [
  "development" => "DB_NAME_DEV",
  "testing" => "DB_NAME_TEST",
  "production" => "DB_NAME_PROD"
];

$hostname = $env["DB_HOSTNAME"];
$username = $env["DB_USER"];
$password = $env["DB_PASSWORD"];
$db_name = $env[$db_target[$env["MODE"]]];
$port = $env["DB_PORT"];

$db = new mysqli($hostname, $username, $password, $db_name, $port);

if ($db->connect_error) {
  die("Connection Failed");
}
