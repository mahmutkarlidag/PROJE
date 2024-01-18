<?php
// skorKaydet.php dosyası

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // AJAX isteği ile gönderilen skor verisini alın
    $skor = $_POST["skor"];

    // Skoru istediğiniz şekilde kullanabilirsiniz, örneğin bir dosyaya kaydetme
    $dosya = fopen("skor.txt", "w");
    fwrite($dosya, $skor);
    fclose($dosya);

    // İsteğin başarıyla tamamlandığını belirten bir cevap gönderin
    echo "Skor başarıyla kaydedildi.";
} else {
    // Geçersiz istek durumunda hata mesajı gönderin
    header("HTTP/1.1 400 Bad Request");
    echo "Geçersiz istek.";
}
?>
