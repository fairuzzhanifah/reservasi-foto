<?php
include "../koneksi.php";
session_start();
if(isset($_SESSION["login_admin"])){
    header("Location: dashboard.php");
	exit;
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Bootstrap CSS -->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous" />
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/style1.css" />
        <title>Login</title>
    </head>
    <body>
        <section class="masuk" id="masuk">
            <div class="container-fluid p-0">
                <div class="row px-0 mx-0">
                    <div class="col-md-6 px-0 d-none d-md-block">
                        <img
                            src="../assets/login.jpg"
                            alt=""
                            style="
                                width: 100%;
                                height: 100vh;
                                object-fit: cover;
                                object-position: right;
                            " />
                    </div>
                    <div class="col-md-6 px-182 my-auto">
                        <h3 class="mb-5 display-6 fw-600 font-sora">Login Admin</h3>
                        <form action="../tes.php" method="post">
    <div class="form-group">
        <label for="user">Username</label>
        <input type="username" class="form-control border-radius-none h-40 btn-border-2px fs-14px" name="username_admin" aria-describedby="emailHelp" placeholder="Username" />
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control border-radius-none h-40 btn-border-2px fs-14px" id="exampleInputPassword1" name="password_admin" placeholder="Password" />
    </div>
    <button type="submit" class="btn btn-primary btn-block border-radius-none border-none h-48 mt-5" name="login_admin" style="background-color: #c37b52">
        Login
    </button>
</form>               
                    </div>
                </div>
            </div>
        </section>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script
            src="https://code.jquery.com/jquery-3.2.1.slim.min.js "
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN "
            crossorigin="anonymous "></script>
        <script
            src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js "
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q "
            crossorigin="anonymous "></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js "
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl "
            crossorigin="anonymous "></script>
        <!-- Bootsrap 5.2 -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js "
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p "
            crossorigin="anonymous "></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js "
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF "
            crossorigin="anonymous "></script>
    </body>
</html>
