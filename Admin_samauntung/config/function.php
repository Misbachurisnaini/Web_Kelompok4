<?php 

$servername = "localhost";
$database = "samauntung";
$username = "root";
$password =  "";

// untuk tulisan bercetak tebal silakan sesuaikan dengan detail database Anda
// membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);
// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
// echo "Koneksi berhasil";
// mysqli_close($conn):
//
// time zone
date_default_timezone_set('Asia/Jakarta');

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function delete($query){
    global $conn;

    $del = "DELETE FROM user WHERE id_user = $query ";
    mysqli_query($conn, $del);

    return mysqli_affected_rows($conn);
}

function editadmin($query) {
    global $conn;

    htmlspecialchars($username = $query['username']);
    htmlspecialchars($email = $query['email']);
    htmlspecialchars($confirm = $query['confirm']);
    htmlspecialchars($id_user = $query['id_user']);

    $pass = password_hash($confirm, PASSWORD_DEFAULT);
    $update = "UPDATE user SET user_name = '$username', email = '$email', password = '$pass' WHERE id_user = $id_user";
    mysqli_query($conn, $update);
    return mysqli_affected_rows($conn);
}

function tambahadmin($data){
    // input data
    global $conn;

    $username = stripcslashes($data['user_name']);
    $email = stripcslashes($data['email']);
    $pass = mysqli_real_escape_string($conn, $data['password2']);

    // Enkripsi Password
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    // tambah akun ke database
    $user = "INSERT INTO user VALUES (0,'$username','$email','$pass',2)";
    mysqli_query($conn, $user);

    return mysqli_affected_rows($conn);
}

function tambahProduk($data)
{
    global $conn;

    strtolower(htmlspecialchars($namaProduk = $data['nama_produk']));
    htmlspecialchars($kategori = $data['nama_kategori']);
    htmlspecialchars($stok = $data['stok']);
    htmlspecialchars($harga = $data['harga']);
    strtolower(htmlspecialchars($deskripsi = $data['deskripsi_produk']));

    // upload foto
    $img = uploadGambar();

    if (!$img) {
        return false;
    }

    $add = "INSERT INTO produk VALUES (0, '$namaProduk', '$kategori', '$stok', '$harga', '$deskripsi', '$img')";

    mysqli_query($conn, $add);

    return mysqli_affected_rows($conn);
}

function login($data)
{
    global $conn;

    $email = $data['email'];
    $password = $data['password'];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);

    if(isset($row['email'])){
        if($email === $row['email']){

            if(password_verify($password, $row['password'])){
                $_SESSION['admin'] = true;
                $_SESSION['email-admin'] = $email;
                $_SESSION['id-admin'] = $row['id_user'];
                $_SESSION['jenis-akun'] = $row['user_level'];

                header("Location:index.php");
                return;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}

function editcustomer($query)
{
    global $conn;

    htmlspecialchars($nama = $query['nama']);
    // htmlspecialchars($username = $query['username']);
    htmlspecialchars($email = $query['email_cs']);
    htmlspecialchars($alamat = $query['alamat']);
    // htmlspecialchars($date = $query['date_register']);
    htmlspecialchars($id_cs = $query['id_customer']);
    htmlspecialchars($imageOld = $query['image-old']);
    htmlspecialchars($orders = $query['orders']);
    htmlspecialchars($total = $query['total_spend']);
    htmlspecialchars($id_dcs = $query['id_customer_detail']);

    // apakah user upload foto baru
    if ($_FILES['image']['error'] === 4) {
        $img = $imageOld;
    } else {
        $img = uploadGambar();
        unlink("img/posting/$imageOld");
        if (!$img) {
            return false;
        }
    }

    // $update = "UPDATE customer SET nama = '$nama', 
    // email_cs = '$email', alamat = '$alamat', image = '$img' 
    // WHERE id_customer = $id_cs";

    //$update2 = "UPDATE customer_detail SET orders = '$orders', total_spend = '$total' WHERE id_customer_detail = '$id_dcs'";

    $update = "UPDATE customer c JOIN customer_detail d 
    ON c.id_customer = '$id_cs' = d.id_customer 
    SET c.nama = '$nama', c.email_cs = '$email', c.alamat = '$alamat' = d.orders = '$orders', d.total_spend = '$total'
    ";

    mysqli_query($conn, $update);

    return mysqli_affected_rows($conn);
}

function uploadGambar()
{
    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];

    // var_dump($fileName);
    // var_dump($fileSize);

    // cek apakah ada gambar diupload
    if ($error === 4) {
        echo "
        <script>
            alert('No image file');
        </script>";
        return false;
    }

    // cek apakah yg diupload file gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'webp'];
    $ekstensiGambar = explode('.', $fileName);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
        <script>
            alert('upload image file!!!');
        </script>";
        return false;
    }

    //cek ukuran file
    if ($fileSize > 100000000 || $fileSize == 0) {
        echo "
        <script>
            alert('File too big!!!');
        </script>";
        return false;
    }

    //gambar siap diupload
    $newFileName = uniqid();
    $newFileName .= '.';
    $newFileName .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/posting/' . $newFileName);

    return $newFileName;
}
