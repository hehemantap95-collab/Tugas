<?php include '../config/database.php';
$id=$_GET['id'];
$d=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM laporan WHERE id=$id"));
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
<div class="card shadow">
<div class="card-header bg-primary text-white">
Detail Laporan Desa Puncu
</div>
<div class="card-body">
<h4><?= $d['kategori'] ?></h4>
<p><b>Pelapor:</b> <?= $d['nama'] ?></p>
<p><b>Kontak:</b> <?= $d['kontak'] ?></p>
<p><b>Lokasi:</b> <?= $d['lokasi'] ?></p>
<p><b>Deskripsi:</b><br><?= $d['deskripsi'] ?></p>
<p><b>Status:</b> 
<span class="badge bg-info"><?= $d['status'] ?></span>
</p>
<img src="upload/<?= $d['foto'] ?>" class="img-fluid rounded shadow">
<a href="index.php" class="btn btn-secondary mt-3">Kembali</a>
</div>
</div>
</div>