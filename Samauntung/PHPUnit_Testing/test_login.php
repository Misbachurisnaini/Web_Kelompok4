<?php
//menggunakan Framework PHPUnit
use PHPUnit\Framework\TestCase;

//class yang akan di TEST.
require_once "login.php";

//class untuk menjalankan Testing.
class Test_login extends TestCase
{
    //membuat sebuah fungsi
    public function testLoginPost()
    {
        //class yang akan dipakai
        $insert = new Login();

        //memasukkan email user dan password sesuai dengan database yang telah dibuat sebelumnya
        $user_email = "admin1@gmail.com";
        $password = "admin1@gmail.com";
        $hasil = $insert->login($user_email, $password);
        $this->assertTrue($hasil);
    }
}
