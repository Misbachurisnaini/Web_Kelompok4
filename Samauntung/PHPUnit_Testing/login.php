<?php
class Login
{
    //membuat sebuah fungsi memiliki 2 parameter, email dan password 
    function login($user_email, $password) {

        //menghubungkan php dengan koneksi database
        include 'koneksi.php';
        
        //menyeleksi data user dengan email user dan password yang sesuai    
        $login = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$user_email' AND user_password='$password'");

        if ($login) {
            echo 'Berhasil Login';
            return true;
        } else {
            echo 'Gagal Login';
            return true;
        }
    }
}
