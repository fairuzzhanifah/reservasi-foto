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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="style_admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <style>
        .content {
            margin-left: 260px; /* Menyesuaikan dengan lebar sidebar */
            width: calc(100% - 260px); /* Menyesuaikan dengan lebar sidebar */
        }
        @media (max-width: 768px) {
            .content {
                margin-left: 0;
                width: 100%;
            }
        }
        .table-responsive {
            overflow-x: auto;
            padding: 15px;
        }
        .table {
            width: 100%;
        }
    </style>
</head>
<body>
        <div class="sidebar">
            <div class="top">
                <img src="../assets/logo.svg" alt="">
            </div>  
            <ul>
                <li><a class="#" href="dashboard.php">Dashboard</a></li>
                <li><a class="#" href="tabel_pesanan.php">Tabel Pesanan</a></li>
                <li><a class="#" href="#">Tabel Pembayaran</a></li>
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
            <div class="page-title-box">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <h4 class="page-title mb-4 mt-4" style="">Daftar Pembayaran Pelanggan</h4>
                            <ol class="breadcrumb m-10 mb-5">
                                <li class="breadcrumb-item"><a href="dashboard.php" style= "color:brown">Admin</a></li>
                                <li class="breadcrumb-item active">Tabel Pembayaran</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>id_payment</th>
                        <th>bukti bayar</th>
                        <th>ukuran file</th>
                        <th>tanggal upload</th>
                        <th>status</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if(isset($_GET['payment'])){
                        $konfirm = $_GET['payment'];
                        $sql = "SELECT * FROM payment WHERE id_payment LIKE '%".$payment."%'";
                        $query = mysqli_query($conn,$sql);
                    } else {
                        $sql = "SELECT * FROM payment";
                        $query = mysqli_query($conn, $sql);
                    }
                    while($data=mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $data['id_payment']; ?></td>
                            <td><a href="../upload/<?php echo $data['nama_file']; ?>"><?php echo $data['nama_file']; ?></a></td>
                            <td><?php echo $data['ukuran_file']; ?></td>
                            <td><?php echo $data['tanggal_upload']; ?></td>
                            <td id="status-<?php echo $data['id_payment']; ?>"><?php echo $data['status']; ?></td>
                            <td>
                                <form action="#" method="post">
                                    <select name="languages" id="lang" onchange="getValue(this, <?php echo $data['id_payment']; ?>)">
                                <option selected disabled hidden value="">
                                    &#9998;
                                </option>
                                <option value="Valid">Valid</option>
                                <option value="Invalid">Invalid</option>
                                    </select>
                                    <a href="hapus_pesanan.php?id_confirm=<?php echo $data['id_payment']; ?>" data-tip="delete"> <img src="../assets/trash-solid.svg" alt="" width= 16px; >Hapus</a>
                                </form>

                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- end content -->

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIyTWPoqL+o3EhF6HA6tu4gU2tYn2Aiz+dJZI2B2" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
    <script>
    function getValue(select, id_payment) {
        // Mengambil nilai yang dipilih
        var selectedOption = select.value;

        // Mengirim data ke server untuk mengubah status
        $.ajax({
            type: "POST",
            url: "update_status.php",
            data: { id: id_payment, status: selectedOption },
            success: function (response) {
                // Menampilkan pesan atau melakukan tindakan setelah berhasil memperbarui status
                alert("Status berhasil diperbarui");

                // Mengubah nilai pada elemen <td> dengan id_confirm yang sesuai
                var statusCell = document.getElementById("status-" + id_payment);
                statusCell.innerHTML = selectedOption;
            }
        });
    }
</script>
</body>
</html>
