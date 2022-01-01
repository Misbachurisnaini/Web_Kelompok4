<?php

$user_email = $_POST["email_cs"];
$user_pass = $_POST["password"];

require 'config/function.php';

if($conn)
{
    $sql = "SELECT nama FROM customer WHERE email_cs = '$user_email' AND password = '$user_pass'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
    {
        $row = mysqli_fetch_assoc($result);
        $status = "OK";
        $result_code = 1;
        $name = $row ["nama"];
        echo json_encode(array('status'=>$status,'result_code'=>$result_code,'nama'=>$name));
    }
    else
    {
        $status = "OK";
        $result_code = 0;
        echo json_encode(array('status'=>$status,'result_code'=>$result_code));
    }
}
else
{
    $status = "failed";
    echo json_encode(array('status'=>$status),JSON_FORCE_OBJECT);
}

mysqli_close($conn);

?>