<?php 
include "../koneksi.php";

session_start();
if(!isset($_SESSION["login_admin"])){
    header("Location: login_admin.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="../fontawesome/css/all.min.css"></script>
    <link rel="stylesheet" href="style_admin.css">
</head>
<body>
    <div class="sidebar">
            <div class="top">
                <img src="../assets/logo.svg" alt="">
            </div>  
            <ul>
                <li><a class="#" href="#">Dashboard</a></li>
                <li><a class="#" href="tabel_pesanan.php">Tabel Pesanan</a></li>
                <li><a class="#" href="tabel_payment.php">Tabel payment</a></li>
                <li><a class="#" href="tabel_pelanggan.php">Tabel Pelanggan</a></li>
                <li><a class="#" href="tabel_feedback.php">Tabel Feedback</a></li>
                
                    <li><a class="#" href="logout_admin.php">Logout</a></li>
                    
            </ul>
        </div>
        <div class="content">
            <nav class="">
                <div class="container">
                    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                        aria-expanded="false" aria-label="Toggle navigation"></button>
                </div>
            </nav>
        <section>
            <h1 style="padding:none">Welcome to Chis With Us!</h1>
        </section>
</body>
</html>
