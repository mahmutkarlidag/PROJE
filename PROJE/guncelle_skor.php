<?php
include 'veritabani_baglantisi.php';
$username = 'mahmut';
    $skor = '599';

    $query = "SELECT skor FROM kullanicilar WHERE username = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $update_query = "UPDATE kullanicilar SET skor = ? WHERE username = ?";
            $update_stmt = $conn->prepare($update_query);

            if ($update_stmt) {         
                $update_stmt->bind_param("ss", $skor, $username);
                $update_stmt->execute();

                $response['status'] = 'success';
                $response['message'] = 'Skor başarıyla güncellendi.';
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Skor güncelleme hatası: ' . $conn->error;
            }
            $update_stmt->close();
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Kullanıcı bulunamadı.';
        }
        $stmt->close();
    }
/*
$response = array();
$json_data = json_decode(file_get_contents('php://input'), true);
echo ($json_data);
if (isset($json_data['username']) && isset($json_data['skor'])) {
    $username = $json_data['username'];
    $skor = $json_data['skor'];

    $query = "SELECT skor FROM kullanicilar WHERE username = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $update_query = "UPDATE kullanicilar SET skor = ? WHERE username = ?";
            $update_stmt = $conn->prepare($update_query);

            if ($update_stmt) {         
                $update_stmt->bind_param("ss", $skor, $username);
                $update_stmt->execute();

                $response['status'] = 'success';
                $response['message'] = 'Skor başarıyla güncellendi.';
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Skor güncelleme hatası: ' . $conn->error;
            }
            $update_stmt->close();
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Kullanıcı bulunamadı.';
        }
        $stmt->close();
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Sorgu hazırlama hatası: ' . $conn->error;
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Eksik veya hatalı veri.';
}

*/
header("application/json");
echo json_encode($response);

$conn->close();
?>
