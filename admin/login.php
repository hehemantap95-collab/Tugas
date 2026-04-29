<?php
session_start();
include '../config/database.php';

if(isset($_POST['login'])){
    $u = $_POST['user'];
    $p = md5($_POST['pass']);
    $q = mysqli_query($conn,"SELECT * FROM admin WHERE username='$u' AND password='$p'");
    if(mysqli_num_rows($q)>0){
        $_SESSION['admin']=true;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!doctype html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login Admin</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-primary d-flex justify-content-center align-items-center" style="height:100vh">

<div class="card shadow" style="width:360px">
<div class="card-body">
<h4 class="text-center mb-3">Login Admin Desa Puncu</h4>

<?php if(isset($error)){ ?>
<div class="alert alert-danger"><?= $error ?></div>
<?php } ?>

<form method="POST">
  <input name="user" class="form-control mb-2" placeholder="Username" required>
  <input type="password" name="pass" class="form-control mb-3" placeholder="Password" required>

  <button name="login" class="btn btn-primary w-100 mb-2">
    Login
  </button>
</form>

<!-- BUTTON KEMBALI -->
<a href="../public/index.php" class="btn btn-outline-secondary w-100">
  ← Kembali ke Beranda
</a>

</div>