<?php
$host = "localhost";
$user = "xirpl2-29";
$pass = "3085861622";
$db   = "db_xirpl2-29_1";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}
?>
