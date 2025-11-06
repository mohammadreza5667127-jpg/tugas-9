<?php
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM tb_pasien WHERE id_pasien='$id'");
echo "<script>alert('Data berhasil dihapus');window.location='index.php';</script>";
?>

