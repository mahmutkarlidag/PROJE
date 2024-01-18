<?php
// Oturumu başlat
session_start();

// Oturumu sonlandır
session_unset();
session_destroy();

// Giriş sayfasına yönlendir
header("Location: giris.php");
exit();
?>
