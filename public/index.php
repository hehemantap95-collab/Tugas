<?php include '../config/database.php'; ?>
<!doctype html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lapor Fasilitas Desa Puncu</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
<style>
.hero {
  background: linear-gradient(135deg,#0d6efd,#20c997);
  color:white;
  padding:70px 20px;
}
.card-hover:hover{
  transform:scale(1.02);
  transition:.3s;
}
</style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">
      <i class="bi bi-buildings"></i> Desa Puncu
    </a>

    <!-- BUTTON ADMIN -->
    <div class="ms-auto">
      <a href="../admin/login.php" class="btn btn-light btn-sm">
        <i class="bi bi-shield-lock"></i> Admin
      </a>
    </div>
  </div>
</nav>


<!-- HERO -->
<section class="hero text-center">
  <div class="container">
    <h1 class="fw-bold">Sistem Lapor Fasilitas</h1>
    <p class="lead">Laporkan fasilitas umum yang rusak di Desa Puncu</p>
  </div>
</section>

<!-- FORM -->
<div class="container my-5">
<div class="row">
<div class="col-md-6">
<div class="card shadow">
<div class="card-header bg-success text-white">
<i class="bi bi-pencil-square"></i> Form Laporan
</div>
<div class="card-body">
<form action="submit.php" method="POST" enctype="multipart/form-data">
<input name="nama" class="form-control mb-2" placeholder="Nama pelapor" required>
<input name="kontak" class="form-control mb-2" placeholder="Email / No HP" required>

<select name="kategori" class="form-control mb-2">
<option>Jalan</option>
<option>Lampu</option>
<option>Air</option>
<option>Bangunan</option>
<option>Lainnya</option>
</select>

<textarea name="lokasi" class="form-control mb-2" placeholder="Lokasi kejadian"></textarea>
<textarea name="deskripsi" class="form-control mb-2" placeholder="Deskripsi masalah"></textarea>
<input type="file" name="foto" class="form-control mb-3" required>

<button class="btn btn-success w-100">
<i class="bi bi-send"></i> Kirim Laporan
</button>
</form>
</div>
</div>
</div>

<!-- LIST LAPORAN (ACC AKTIF) -->
<div class="col-md-6">
<h4 class="mb-3">Laporan Terbaru</h4>
<div class="row">
<?php 
$q=mysqli_query($conn,
"SELECT * FROM laporan 
 WHERE status IN ('Diproses','Selesai') 
 ORDER BY id DESC"
);
while($d=mysqli_fetch_assoc($q)){ 
$statusColor = $d['status']=='Diproses'?'warning':'success';
?>
<div class="col-12 mb-3">
<div class="card card-hover shadow-sm">
<div class="card-body">
<h5><?= $d['kategori'] ?> - <?= $d['lokasi'] ?></h5>
<p class="text-muted"><?= substr($d['deskripsi'],0,60) ?>...</p>
<span class="badge bg-<?= $statusColor ?>"><?= $d['status'] ?></span>
<a href="detail.php?id=<?= $d['id'] ?>" class="btn btn-sm btn-outline-primary float-end">
Detail
</a>
</div>
</div>
</div>
<?php } ?>
</div>
</div>
</div>
</div>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center p-3 mt-5">
© 2026 Pemerintah Desa Puncu  
<br>Sistem Informasi Lapor Fasilitas
</footer>

</body>
</html>