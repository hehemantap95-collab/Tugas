<?php
session_start();
session_destroy();

// kalau mau balik ke halaman user
header('Location: ../public/index.php');
exit;
