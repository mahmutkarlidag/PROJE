<?php
include 'veritabani_baglantisi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['sifre'];

    $sql = "SELECT * FROM kullanicilar WHERE username='$username' AND sifre='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    } else {
        echo "Kullanıcı adı veya şifre hatalı!";
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

    if (username === "" || password === "") {
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
            <div id="button-container">
                <button type="submit">Giriş Yap</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
