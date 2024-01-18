
<?php
include 'veritabani_baglantisi.php';

session_start();
$username = isset($_SESSION["username"]) ? $_SESSION["username"] : "";

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];

    // Kullanıcı adına göre skoru veritabanından al
    $query = "SELECT skor FROM kullanicilar WHERE username = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $skor = $row['skor'];
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uzay Oyunu</title>
    <link rel="stylesheet" href="uzayoyunu.css">
    <script src="uzayoyunu.js" defer></script>
</head>
<body>
<form id="puanForm" method="post" action="puankaydet.php ">
        <input type="hidden" name="gizliPuan" id="gizliPuan"> 
        <input type="submit" value="gonder" onclick="puaniKaydet()">
    </form>

    <script>
        
        function puaniKaydet() {
            var puan = document.getElementById("p_yazisi").innerText;
            document.getElementById("gizliPuan").value = puan;
            
            document.getElementById("puanForm").submit();
        }
    </script>
    
    <h1>Uzay Oyunu</h1>
    <canvas id="board"></canvas>
    <div class="buttons">
        <button id="tekrarOynaBtn">Tekrar Oyna</button>
    </div>

    <?php

        $username = isset($_SESSION["username"]) ? $_SESSION["username"] : "";

        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
            echo "<p>Kullanıcı Adı: $username</p>";
            echo"<p>Skor: $skor </p>";
        } else {
            echo "<p>Kullanıcı adı oturumda bulunamadı.</p>";
        }
    ?>

<script>
    document.getElementById('tekrarOynaBtn').addEventListener('click', function() {
        getScoreFromDatabase(); // Skoru veritabanından almak için bu fonksiyonu çağır
    });

    function getScoreFromDatabase() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'guncelle_skor.php');
        xhr.setRequestHeader('Content-Type', 'application/json');

        xhr.onload = function() {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.skor) {
                    // Skor başarıyla alındı, ekrana yazdırabiliriz
                    var skor = response.skor;
                    console.log('Kullanıcı Skoru: ' + skor);
                    // Burada skoru istediğiniz şekilde kullanabilirsiniz
                    // Örneğin: skor değişkenini kullanarak işlemler yapabilirsiniz
                } else {
                    // Hata oluştu, işlemleri burada yönetebilirsiniz
                    console.error('Skor alınamadı.');
                }
            }
        };

        xhr.send();
    }
</script>
</body>
</html>
