
<?php
session_start();
if (!isset($_SESSION['login'])) {
  echo "<script>alert('Silakan login terlebih dahulu');window.location='login.php';</script>";
  exit;
}
?>

<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_pasien WHERE id_pasien=$id"));
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Pasien</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
  <h2>Edit Data Pasien</h2>
  <form method="post">
    <input type="hidden" name="id" value="<?= $data['id_pasien'] ?>">
    <div class="mb-3">
      <label>Nama</label>
      <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
    </div>
    <div class="mb-3">
      <label>Umur</label>
      <input type="number" name="umur" class="form-control" value="<?= $data['umur'] ?>" required>
    </div>
    <div class="mb-3">
      <label>Alamat</label>
      <textarea name="alamat" class="form-control" required><?= $data['alamat'] ?></textarea>
    </div>
    <div class="mb-3">
      <label>Jenis Kelamin</label>
      <select name="jenis_kelamin" class="form-select" required>
        <option value="Laki-laki" <?= $data['jenis_kelamin']=='Laki-laki'?'selected':'' ?>>Laki-laki</option>
        <option value="Perempuan" <?= $data['jenis_kelamin']=='Perempuan'?'selected':'' ?>>Perempuan</option>
      </select>
    </div>
    <div class="mb-3">
      <label>Keluhan</label>
      <input type="text" name="keluhan" class="form-control" value="<?= $data['keluhan'] ?>" required>
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>

<?php
if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $umur = $_POST['umur'];
  $alamat = $_POST['alamat'];
  $jk = $_POST['jenis_kelamin'];
  $keluhan = $_POST['keluhan'];

  $update = mysqli_query($conn, "UPDATE tb_pasien SET 
    nama='$nama', umur='$umur', alamat='$alamat', jenis_kelamin='$jk', keluhan='$keluhan'
    WHERE id_pasien='$id'");

  if ($update) {
    echo "<script>alert('Data berhasil diupdate');window.location='index.php';</script>";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
?>
</body>
</html>
