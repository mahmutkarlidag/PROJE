<?php
include 'veritabani_baglantisi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['sifre'];
    $password_repeat = $_POST['sifre_tekrar'];

    if ($password !== $password_repeat) {
        echo "Şifreler eşleşmiyor!";
    } else {
        $sql = "INSERT INTO kullanicilar (username, sifre, skor) VALUES ('$username', '$password', 0)";

        if ($conn->query($sql) === TRUE) {
            echo "Yeni kayıt başarıyla oluşturuldu";
        } else {
            echo "Hata: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
    body {
        background-image: url('kayitgiris.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh;
        margin: 0;
    }
    #form-container {
        width: 400px;
        margin: auto;
        padding: 20px;
        border: 1px solid #000;
        background-color: #f2f2f2;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }
    #form {
        text-align: center;
    }
    #button-container {
        display: flex;
        justify-content: space-between;
    }
    .input-container {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
    }
    .input-container label {
        width: 100px;
    }
    .input-container input {
        width: 200px;
    }
</style>
<script>
function validateForm() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("sifre").value;
    var passwordRepeat = document.getElementById("sifre_tekrar").value;

    if (username === "" || password === "" || passwordRepeat === "") {
        alert("Lütfen tüm alanları doldurun.");
        return false;
    }
}
</script>
</head>
<body>

<div id="form-container">
    <div id="form">
        <form method="post" onsubmit="return validateForm()">
            <div class="input-container">
                <label for="username">Kullanıcı adı:</label>
                <input type="text" name="username" id="username">
            </div>
            <div class="input-container">
                <label for="sifre">Şifre:</label>
                <input type="password" name="sifre" id="sifre">
            </div>
            <div class="input-container">
                <label for="sifre_tekrar">Şifre Tekrarı:</label>
                <input type="password" name="sifre_tekrar" id="sifre_tekrar">
            </div>
            <div id="button-container">
                <button type="submit">Kayıt Ol</button>
            </div>
            <div class="buttons">
            <a href="giris.php"><button>Giriş Yap</button></a> 
        </form>
    </div>
</div>

</body>
</html>
