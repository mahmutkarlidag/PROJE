<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: giris.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oyun Sitesi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="navbar">
        <div class="logo">
            <a href="#">OldGameX</a>
        </div>
        <ul>
            <li><a href="/PROJE">Ana Sayfa</a></li>
            <li><a href="hakkımızda">Hakkımızda</a></li>
            <li><a href="yapımcılar">Yapımcılar</a></li>
            <li><a href="iletişim">İletişim</a></li>
            <li><a href="cikis.php">Çıkış Yap</a></li>
        </ul>
    </div>
    <div class="center">
        <h1>OldGameX'e</h1>
        <h2>HOŞGELDİNİZ!</h2>
        <div class="buttons">
            <a href="uzayoyunu.php"><button>Uzay Oyununa</button></a> 
            <a href="flappybirds.php"><button>Flappy Birds</button></a>
        </div>
    </div>
</div>

</body>
</html>
