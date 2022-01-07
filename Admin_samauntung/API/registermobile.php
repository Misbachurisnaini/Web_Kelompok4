<?php

require 'config/function.php';

if ($con) {
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $email = $_POST['email_cs'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];

    $insert = "INSERT INTO customer(username, nama, email_cs, alamat, password) VALUE ('$username', '$nama', '$email', '$alamat', '$password')";

    if ($username != "" && $nama != "" && $email != "" && $alamat != "" && $password != "") {
        $result = mysqli_query($con, $insert);
        $response = array();

        if ($result) {
            array_push($response, array(
                'status' => 'OK'
            ));
        } else {
            array_push($response, array(
                'status' => 'FAILED'
            ));
        }
    } else {
        array_push($response, array(
            'status' => 'FAILED'
        ));
    }
} else {
    array_push($response, array(
        'status' => 'FAILED'
    ));
}

echo json_encode(array("server_response" => $response));
mysqli_close($con);

?>