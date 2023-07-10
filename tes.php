<?php
session_start();
require_once "koneksi.php";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $jam_booking = $_POST['jam_booking'];

    // Cek konfirmasi password
    if ($password != $confirmPassword) {
        echo "<script>
            alert('Password yang Anda masukkan tidak sama dengan password konfirmasi.');
            window.location = 'register.php';
        </script>";
        exit;
    }

    // Cek apakah username sudah terdaftar
    $cek_user = mysqli_query($conn, "SELECT * FROM pelanggan WHERE username = '$username'");
    $cek_login = mysqli_num_rows($cek_user);

    if ($cek_login > 0) {
        echo "<script>
            alert('Username telah terdaftar');
            window.location = 'register.php';
        </script>";
        exit;
    } else {
        // Username belum terdaftar, lakukan penyimpanan data
        $sql = "INSERT INTO pelanggan (username, email, number, password) VALUES ('$username', '$email', '$number','$password')";
        mysqli_query($conn, $sql);

        echo "<script>
            alert('Data berhasil dikirim');
            window.location = 'login.php';
        </script>";
        exit;
    }
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM pelanggan WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Login berhasil
        // Mendapatkan data pengguna dari hasil quer
        $row = mysqli_fetch_assoc($result);

        // set session
        $_SESSION["login"] = true;
        $_SESSION["id_pelanggan"] = $row['id_pelanggan'];
        $_SESSION["username"] = $row['username'];
        $_SESSION["email"] = $row['email'];
        $_SESSION["number"] = $row['number'];
        $_SESSION["password"] = $row['password'];
        echo "<script>
    window.location = 'home.php';
    </script>";
    } else {
        // Login gagal
        echo "<script>
    alert('Login gagal. Periksa kembali username dan password Anda.');
    window.location = 'login.php';
    </script>";
    }
}

if (isset($_POST['login_admin'])) {
    $username_admin = $_POST['username_admin'];
    $password_admin = $_POST['password_admin'];

    // Menjalankan pernyataan SQL untuk memeriksa kecocokan username dan password
    $query = "SELECT * FROM admin WHERE username_admin = '$username_admin' AND password_admin = '$password_admin'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Login berhasil
        // Mendapatkan data pengguna dari hasil quer
        $row = mysqli_fetch_assoc($result);
        
        // Menyimpan nilai-nilai pengguna ke dalam session
        $_SESSION["login_admin"] = true;
        $_SESSION["id_admin"] = $row['id_admin'];
        $_SESSION["username_admin"] = $row['username_admin'];
        $_SESSION["password_admin"] = $row['password_admin'];
    
        // Mengarahkan pengguna ke halaman selanjutnya
        header("Location: admin/dashboard.php");
    } else {
        // Login gagal
        // Tampilkan pesan kesalahan atau arahkan pengguna kembali ke halaman login
        header("Location: login_admin.php");
    }
}


$enumPaket = ['1' => 'WEEKDAYS', '2' => 'WEEKEND', '3' => 'PROMO'];
$enumBackground = ['1' => 'BLUE', '2' => 'BROWN', '3' => 'WHITE'];

$hargaPaket = [
    '1' => 80000, // Harga untuk WEEKDAYS
    '2' => 100000, // Harga untuk WEEKEND
    '3' => 60000 // Harga untuk PROMO
];

// Mendefinisikan harga tambahan per orang
$hargaTambahanPerOrang = 20000;
$serviceFee = 1000;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['konfirm'])) {

    // Mengambil nilai dari form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $instagram = $_POST['instagram'];
    $numOfPeople = $_POST['numOfPeople'];
    $tanggal_booking = $_POST['tanggal_booking'];
    $jam_booking = $_POST['jam_booking'];
    $background = $enumBackground[$_POST['background']];
    $paket = $enumPaket[$_POST['paket']];
    // Lakukan validasi data jika diperlukan

    $hargaPaketPilihan = $hargaPaket[$_POST['paket']];
    $hargaTambahanOrang = ($numOfPeople > 2) ? ($numOfPeople - 2) * $hargaTambahanPerOrang : 0;

    $subtotal = $hargaPaketPilihan + $hargaTambahanOrang;
    $total = $subtotal + $serviceFee;

    // Mengamil user id dari login
    $user_id = $_SESSION['id_pelanggan'];

    // Membuat query untuk menyimpan data
    $sql = "INSERT INTO konfirmasi (name, email, phone, instagram, numOfPeople, tanggal_booking, jam_booking, background, paket, status, user_id)
            VALUES ('$name', '$email', '$phone', '$instagram', '$numOfPeople', '$tanggal_booking', '$jam_booking', '$background', '$paket', 'UPCOMING', '$user_id')";

    if ($conn->query($sql) === TRUE) {
        // $_SESSION['paket'] = $paket;
        // $_SESSION['background'] = $background;
        // $_SESSION['numOfPeople'] = $numOfPeople;
        // $_SESSION['tanggal_booking'] = $tanggal_booking;
        $_SESSION['subtotal'] = $subtotal;
        $_SESSION['total'] = $total;
        $_SESSION['id_confirm'] = $conn->insert_id;

        // Jika penyimpanan data berhasil
        echo "<script>
            alert('Booking berhasil dikonfirmasi');
            window.location = 'payment.php';
        </script>";
        exit();
    } else {
        // Jika terjadi kesalahan saat menyimpan data
        $errorMessage = "Kesalahan input pesanan. Error: " . $sql . "<br>" . $conn->error;
        echo "<script>
                alert('$errorMessage');
                window.location = 'reservation.php';
              </script>";
        exit();
    }
}
