<?php
include '../config/database.php';
$nama=$_POST['nama'];
$kontak=$_POST['kontak'];
$kategori=$_POST['kategori'];
$lokasi=$_POST['lokasi'];
$deskripsi=$_POST['deskripsi'];

$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
$ext = strtolower(pathinfo($foto, PATHINFO_EXTENSION));
$allowed = ['jpg','jpeg','png'];

if(!in_array($ext,$allowed)) die('Format tidak valid');
$newname = uniqid().'.'.$ext;
move_uploaded_file($tmp,"upload/$newname");

mysqli_query($conn,"INSERT INTO laporan VALUES(NULL,'$nama','$kontak','$kategori','$lokasi','$deskripsi','$newname','Menunggu',NOW())");
header('Location: index.php');
?>