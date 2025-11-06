<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Pasien Puskesmas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
  <h2>Data Pasien Puskesmas</h2>
  <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Pasien</a>
  <table class="table table-bordered table-striped">
    <tr class="table-dark text-center">
      <th>ID</th>
      <th>Nama</th>
      <th>Umur</th>
      <th>Alamat</th>
      <th>Jenis Kelamin</th>
      <th>Keluhan</th>
      <th>Aksi</th>
    </tr>
    <?php
    $query = mysqli_query($conn, "SELECT * FROM tb_pasien");
    while ($data = mysqli_fetch_assoc($query)) {
    ?>
    <tr>
      <td><?= $data['id_pasien'] ?></td>
      <td><?= $data['nama'] ?></td>
      <td><?= $data['umur'] ?></td>
      <td><?= $data['alamat'] ?></td>
      <td><?= $data['jenis_kelamin'] ?></td>
      <td><?= $data['keluhan'] ?></td>
      <td>
        <a href="edit.php?id=<?= $data['id_pasien'] ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="hapus.php?id=<?= $data['id_pasien'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
      </td>
    </tr>
    <?php } ?>
  </table>
</div>

</body>
</html>
