<?php 
include "koneksi/koneksi.php";
error_reporting(0);
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['Username'];
    $password = md5($_POST['Password']);

    $sql = "SELECT * FROM user WHERE Username='$username' AND Password='$password'";
    $result = mysqli_query($con, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);

        $level = $row['level'];
        $_SESSION['level'] = $level;
        
        $_SESSION['Username'] = $row['Username'];

        header("Location: index.php");        
        echo "<script>alert('Berhasil Masuk!')</script>";
    } else {
        echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
        <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Login</h3>
</div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3 mt-3">
                            <label form="" class="form-label">Nama</label>
                            <input type="text" name="Username" class="form-control" placeholder>
                            <div class="mb-3 mt-3">
                            <label form="" class="form-label">Password</label>
                            <input type="password" name="Password" class="form-control" required>
</div>
<button name="submit"class="btn btn-primary">Login</button>
</form>
</div>
</div>
</div>
</div>

<script src="bootstrap/bootstrap.min.js"></script>
<script src="bootstrap/jquery.min.js"></script>
</body>
</html>


