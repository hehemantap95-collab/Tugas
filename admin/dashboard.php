<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../config/database.php';

if(!isset($_SESSION['admin'])){
    header('Location: login.php');
    exit;
}

$all = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM laporan"));
$menunggu = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM laporan WHERE status='Menunggu'"));
$diproses = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM laporan WHERE status='Diproses'"));
$selesai = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM laporan WHERE status='Selesai'"));
?>

<!doctype html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Admin</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
<div class="container">
<span class="navbar-brand">Admin Desa Puncu</span>

<div>
<a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
<a href="../public/index.php" class="btn btn-warning btn-sm">
Close Admin
</a>
</div>

</div>
</nav>

<div class="container mt-4">
<h3 class="mb-4">Dashboard</h3>

<div class="row">
<div class="col-md-3">
<div class="card text-bg-primary mb-3">
<div class="card-body">
<h6>Total Laporan</h6>
<h2><?= $all ?></h2>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card text-bg-secondary mb-3">
<div class="card-body">
<h6>Menunggu</h6>
<h2><?= $menunggu ?></h2>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card text-bg-warning mb-3">
<div class="card-body">
<h6>Diproses</h6>
<h2><?= $diproses ?></h2>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card text-bg-success mb-3">
<div class="card-body">
<h6>Selesai</h6>
<h2><?= $selesai ?></h2>
</div>
</div>
</div>
</div>

<a href="laporan.php" class="btn btn-primary mt-3">
Kelola Laporan
</a>
</div>
</body>
</html>
