<?php 

$servername = "localhost";
$database = "db_samauntung1";
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

function tambahadmin($data){
    // input data
    global $conn;

    $email = stripcslashes($data['email']);
    $pass = mysqli_real_escape_string($conn, $data['password2']);

    // Enkripsi Password
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    // tambah akun ke database
    $akun = "INSERT INTO akun VALUES (0,'$email','$pass',2)";
    mysqli_query($conn, $akun);

    return mysqli_affected_rows($conn);
}

function login($data)
{
    global $conn;

    $email = $data['email'];
    $password = $data['password'];

    $result = mysqli_query($conn, "SELECT * FROM akun WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);

    // cek email
    if (isset($row['email'])){
        if($email === $row['email']){

            // cek password
            if(password_verify($password, $row['password'])){
                $_SESSION['admin'] = true;
                $_SESSION['email-admin'] = $email;
                $_SESSION['id-admin'] = $row['id_user'];
                $_SESSION['jenis-akun'] = $row['role'];

                header("Location:index.php");
                return;
                
            }
        }else{
            return false;
        }
       
    }else{
        return false;
    }
}

function uploadGambar()
{
    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];

    var_dump($fileName);
    var_dump($fileSize);

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

function tambahcorosel($data)
{
    global $conn;

    
    // upload foto
    $img = uploadGambar();

    strtolower(htmlspecialchars($titlecorosel = $data['title-corosel']));
    strtolower(htmlspecialchars($deskripsi = $data['deskripsi']));


    if (!$img)
    {
        return false;
    }

    $add = "INSERT INTO corosel VALUES (0,'$titlecorosel', '$img', '$deskripsi')";

    mysqli_query($conn, $add);

    return mysqli_affected_rows($conn);
}

?>