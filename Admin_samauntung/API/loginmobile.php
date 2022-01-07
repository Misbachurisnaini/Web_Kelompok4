<?php

require 'config/function.php';

if ($con) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM customer WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($con, $query);
    $response = array();

    $row = mysqli_num_rows($result);

    if ($row > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row ["nama"];
        array_push(
            $response, array('status' => 'OK','nama' => $name)
        );
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