<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Pasien</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
  <h2>Tambah Data Pasien</h2>
  <form method="post">
    <div class="mb-3">
      <label>Nama</label>
      <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Umur</label>
      <input type="number" name="umur" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Alamat</label>
      <textarea name="alamat" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
      <label>Jenis Kelamin</label>
      <select name="jenis_kelamin" class="form-select" required>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
      </select>
    </div>
    <div class="mb-3">
      <label>Keluhan</label>
      <input type="text" name="keluhan" class="form-control" required>
    </div>
    <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>

<?php
if (isset($_POST['simpan'])) {
  $nama = $_POST['nama'];
  $umur = $_POST['umur'];
  $alamat = $_POST['alamat'];
  $jk = $_POST['jenis_kelamin'];
  $keluhan = $_POST['keluhan'];

  $query = "INSERT INTO tb_pasien (nama, umur, alamat, jenis_kelamin, keluhan)
            VALUES ('$nama', '$umur', '$alamat', '$jk', '$keluhan')";
  if (mysqli_query($conn, $query)) {
    echo "<script>alert('Data berhasil disimpan');window.location='index.php';</script>";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
?>
</body>
</html>
