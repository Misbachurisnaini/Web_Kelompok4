<?php

require 'koneksi.php';

if ($conn) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM customer WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    // $response = array();

    $row = mysqli_num_rows($result);

    if ($row > 0) {
        $row = mysqli_fetch_assoc($result);
        $id = $row ["id_customer"];
        $name = $row ["nama"];
            $response = array('status' => 'OK','id_customer' => $id, 'nama' => $name);
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
