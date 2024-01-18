<?php
$baglanti = new PDO("mysql:host=localhost;dbname=puan", "root", "");

if (isset($_POST["gizliPuan"])) {
    $puan = $_POST["gizliPuan"];

    
    $ekleSorgu = $baglanti->prepare("INSERT INTO kayit (masa1) VALUES (:puan)");
    $ekleSorgu->bindParam(':puan', $puan);
    $ekleSorgu->execute();
}

include("uzayoyunu.php");
?>
