<?php
require_once "koneksi.php";
require_once 'tes.php';
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

if (isset($_SESSION['id_confirm'])) {
    $id_confirm = $_SESSION['id_confirm'];
    $get_booking_data = mysqli_query($conn, "SELECT * FROM konfirmasi WHERE id_confirm='$id_confirm'");

    if ($get_booking_data) {
        while ($row = mysqli_fetch_assoc($get_booking_data)) {
            // Access individual columns using $row['column_name']
            $paket = $row['paket'];
            $background = $row['background'];
            $tanggal_booking = $row['tanggal_booking'];
            $jam_booking = $row['jam_booking'];
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header("Location: reservation.php");
    exit;
}


if (isset($_SESSION['subtotal'])) {
    $subtotal = $_SESSION['subtotal'];
} else {
    $subtotal = 0;
}

// Menghitung total (subtotal + service fee)
$total = $subtotal + 1000;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Payment</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top bg-dark">
        <div class="container">
            <a class="navbar-brand fs-4 text-white" href="#"><img src="assets/logo.svg" alt="" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
                <ul class="navbar-nav flex-grow-1 justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="reservation.php">Reservation</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <div class="dropdown">
                        <button class="dropdown bg-transparent border-0" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="assets/profile.svg" alt="" />
                            <img src="assets/panahprofile.svg" alt="" />
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="profile.php"><img class="me-3" src="assets/iconprofile.svg" alt="" />Profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="activity.php"><img class="me-3" src="assets/iconactivity.svg" alt="" />Activy</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="index.php"><img class="me-3" src="assets/iconlogout.svg" alt="" />Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div style="height: 64px"></div>

    <section>
        <div class="container">
            <p class="fw-bold d-flex justify-content-center fs-4">
                PAYMENT METHOD
            </p>
            <div class="d-flex justify-content-center">
                <img src="assets/choosepayment.svg" alt="" width="12px" />PAY NOW >
                <img class="ms-3" src="assets/paynow.svg" alt="" width="12px" />CONFIRM PAYMENT
            </div>

            <div class="row justify-content-between mt-5">
                <div class="col-5">
                    <div class="py-3 border px-4 rounded-2">
                        <p class="tetx text-center fs-4 fw-semibold">
                            FINISH YOUR PAYMENT
                        </p>
                        <div class="g-col-2 rounded-3 d justify-content-center text-center">
                            <div class="border rounded-2 text-center" style="background-color: #fec84b">
                                <p class="mb-2 mt-2">
                                    Pay Before 01th June 2023, 11.00 WITA
                                </p>
                            </div>
                            <div class="p-5">
                                <p style="font-weight: bold;">Transfer to:</p>
                                <img src="assets/bca.jpg" alt="" width="160px" />
                                <p class="mt-3">
                                    3928285942916170
                                    <img src="assets/salin.svg" alt="" height="16px" />
                                </p>
                                <p class="mt-5">AMOUNT TO BE PAID</p>
                                <p class="fw-bold">Rp <?php echo number_format($total, 2, ',', '.'); ?></p>
                            </div>
                        </div>
                    </div>
                    <ul>
                        <li class="mt-5 mb-5">
                            Please transfer to the account number above to process the
                            payment and upload proof of the transaction
                        </li>
                    </ul>
                </div>

                <div class="col-6 row">
                    <div class="col-12 shadow-sm border rounded-2 mb-3">
                        <p class="mb-0 fs-4 mt-3 mb-3 fw-semibold">ORDER SUMMARY (1)</p>
                    </div>
                    <div class="col-12 shadow-sm p-3 border rounded-2">
                        <div class="row mb-3">
                            <div class="col-4">
                                <img src="assets/package.svg" alt="" width="160px" />
                            </div>
                            <div class="col-8">
                                <div class="d-flex justify-content-between">
                                    <p>Package</p>
                                    <p><?php echo $paket ?></p>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <p>Background</p>
                                    <p><?php echo $background ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p>Date</p>
                                    <p><?php echo $tanggal_booking ?></p>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <p>Time</p>
                                    <p><?php echo $jam_booking; ?></p>

                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Subtotal</p>
                            <p>Rp <?php echo number_format($subtotal, 2, ',', '.'); ?></p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Service Fee</p>
                            <p>Rp 1000,00</p>
                        </div>
                        <div class="d-flex justify-content-between pt-3 border-top">
                            <p class="fs-4 m-0 fw-semibold">TOTAL</p>
                            <p class="fs-4 m-0">Rp <?php echo number_format($total, 2, ',', '.'); ?></p>
                        </div>
                    </div>

                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                        <div class="upload mt-4">
                            <label for="konfirmasi"></label>
                            <input type="file" name="bukti_bayar" id="bukti_bayar" required>
                        </div>
                        <button type="submit" class="btn rounded mb-5 mt-3 border-0 w-100" style="background-color: #c37b52; border: none; color: white;">
                            Confirm Payment
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <section class="py-5 border-top border-1 border-dark">
        <div class="container">
            <div class="row">
                <div class="col-6 d-flex my-auto">
                    <p class="m-0">2023 © All Right Reserved</p>
                </div>
                <div class="col-6 d-flex justify-content-end gap-3">
                    <img src="assets/Group 68.svg" alt="" />
                    <img src="assets/Group 69.svg" alt="" />
                    <img src="assets/Group 70.svg" alt="" />
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js " integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
        $(window).scroll(function() {
            $("nav").toggleClass("scrolled", $(this).scrollTop() > 200);
        });

        $(window).scroll(function() {
            $("a").toggleClass("scrolled", $(this).scrollTop() > 200);
        });

        $(window).scroll(function() {
            $(".btn").toggleClass("scrolled", $(this).scrollTop() > 200);
        });
    </script>
    <script>
        var selectedTime = sessionStorage.getItem('selectedTime');
        document.getElementById('selectedTime').textContent = selectedTime;
    </script>
    <script src="main.js"></script>
</body>

</html>
