<?php

$user_email = $_POST["email_cs"];
$user_pass = $_POST["password"];
$user_name = $_POST['username'];
$name = $_POST["nama"];
$alamat = $_POST['alamat'];

require 'config/function.php';

if($conn)
{
    $sql = "SELECT * FROM customer WHERE email_cs='user_email'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0)
    {
        $status = "OK";
        $result_code = 0;
        echo json_encode(array('status'=>$status,'result_code'=>$result_code));
    }
    else
    {
        $sql = "INSERT INTO customer(username,nama,email_cs,alamat,password) VALUE('$user_name','$name','$user_email','$alamat','$user_pass')";
        if(mysqli_query($conn,$sql))
        {
            $status = "OK";
            $result_code = 1;
            echo json_encode(array('status'=>$status,'resulr_code'=>$result_code));
        }
        else
        {
            $status = "failed";
            echo json_encode(array('status'=>$status),JSON_FORCE_OBJECT);
        }
    }
}
else
{
    $status = "failed";
    echo json_encode(array('status'=>$status),JSON_FORCE_OBJECT);
}

mysqli_close($conn);

?>