<?php

require 'koneksi.php';

if ($conn) {
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $email = $_POST['email_cs'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];

    $insert = "INSERT INTO customer(username, nama, email_cs, alamat, password) VALUE ('$username', '$nama', '$email', '$alamat', '$password')";

    if ($username != "" && $nama != "" && $email != "" && $alamat != "" && $password != "") {
        $result = mysqli_query($conn, $insert);
        // $response = array();

        if ($result) {
            $response = array(
                'status' => 'OK');
        } else {
            $response = array(
                'status' => 'FAILED');
        }
    } else {
        $response = array(
            'status' => 'FAILED');
    }
} else {
    $response = array(
        'status' => 'FAILED');
}

echo json_encode($response);
mysqli_close($conn);

?>