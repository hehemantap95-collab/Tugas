<?php
session_start();
include '../config/database.php';

if(!isset($_SESSION['admin'])){
    header('Location: login.php');
    exit;
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $status = $_POST['status'];
    mysqli_query($conn,"UPDATE laporan SET status='$status' WHERE id=$id");
}

$q = mysqli_query($conn,"SELECT * FROM laporan ORDER BY id DESC");
?>

<!doctype html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Kelola Laporan</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
<div class="container">
<span class="navbar-brand">Kelola Laporan</span>
<a href="dashboard.php" class="btn btn-light btn-sm">Dashboard</a>
</div>
</nav>

<div class="container mt-4">

<table class="table table-bordered table-striped align-middle">
<tr class="table-dark">
<th>Nama</th>
<th>Kategori</th>
<th>Lokasi</th>
<th>Status</th>
<th>Foto</th>
<th>Aksi</th>
</tr>

<?php while($d=mysqli_fetch_assoc($q)){ ?>
<tr>
<td><?= $d['nama'] ?></td>
<td><?= $d['kategori'] ?></td>
<td><?= $d['lokasi'] ?></td>
<td>
<span class="badge bg-info"><?= $d['status'] ?></span>
</td>
<td>
<img src="../public/upload/<?= $d['foto'] ?>" width="60">
</td>
<td>
<form method="POST" class="d-flex gap-1">
<select name="status" class="form-select form-select-sm">
<option <?= $d['status']=='Menunggu'?'selected':'' ?>>Menunggu</option>
<option <?= $d['status']=='Diproses'?'selected':'' ?>>Diproses</option>
<option <?= $d['status']=='Selesai'?'selected':'' ?>>Selesai</option>
</select>
<input type="hidden" name="id" value="<?= $d['id'] ?>">
<button name="update" class="btn btn-success btn-sm">Update</button>
</form>
</td>
</tr>
<?php } ?>

</table>
</div>
</body>
</html>
