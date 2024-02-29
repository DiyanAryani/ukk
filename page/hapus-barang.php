<?php
include_once("koneksi/koneksi.php");

$id = $_GET['id'];

$result = mysqli_query($con, "DELETE FROM produk WHERE ProdukID=$id");

header("Location:index.php?page=stok");
?>