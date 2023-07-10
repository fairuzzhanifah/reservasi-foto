<?php
include('./koneksi.php');

$id = $_POST['id_confirm'];


try {
  $sql = mysqli_query($conn, "UPDATE konfirmasi SET status = 'COMPLETED' WHERE id_confirm='$id'");

  if ($sql) {
    echo "<script>
      alert('Booking berhasil dikonfirmasi');
      window.location = 'activity.php';
    </script>";

    exit();
  } else {
    $errorMessage = "Kesalahan input pesanan. Error: " . $sql . "<br>" . $conn->error;
    echo "<script>
                alert('$errorMessage');
                window.location = 'activity.php';
              </script>";
    exit();
  }
} catch (Exception $error) {
  echo "<script>
      alert('" . $error->getMessage() . "');
      window.location = 'activity.php';
    </script>";
  exit();
}

