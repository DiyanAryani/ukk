<?php
session_start();
include "koneksi/koneksi.php";

$username = $_SESSION['Username'];
$level = $_SESSION['level'];
if ($_SESSION['Username']=="") {
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Petugas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
    <style>
        /* Set height of grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 640px}

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

        /* On small.screens, set height to 'auto' for the grid */
        @media screen and (max-width: 767px) {
        .row.content {height: auto}
        }
      </style>
</head>
<body>
    
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden=X5">
      <h2><?php echo $level ?></h2>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="index.php">Dashboard</a></1i>
        <li><a href="?page=stok">stok</a></li>
        <li><a href="?page=user">user</a></li>
        <li><a href="?page=logout">log out</a></LI>
      </ul><br>
    </div>
    <br>

    <div class="col-sm-9">
    <?php
         if (isset($_GET['page'])) {
          $laman = $_GET['page'];

          switch ($laman) {
            case 'user':
              include "page/user.php";
              break;

            case 'stok':
              include "page/stok.barang.php";
              break;

            case 'logout':
              include "logout.php";
              break;

            case 'tambah-barang':
              include "page/tambah.barang.php";
              break;

            case 'hapus-barang':
              include "page/hapus-barang.php";
              break;

            case 'hapus-user':
              include "page/hapus.user.php";
                break;

            case 'tambah_user':
              include "page/tambah_user.php";
                  break;

            case 'edit-user':
                include "page/edit-user.php";
                  break;

            case 'edit-barang':
                include "page/edit-barang.php";
                  break;
    

            default:
                # code
                break;
          }
        }
        else {
            include "page/dashboard.php";
        }
      ?>
    </div>
  </div>  
</div>

</body>
</html>