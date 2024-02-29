<?php
include_once("koneksi/koneksi.php");
$id = $_GET['id'];
$sql = $con->query("DELETE FROM detail_penjualan WHERE PenjualanID=$id");
echo "<script>
        alert('Data berhasil dihapus');
        window.location.href = 'daftar.transaksi.php';
    </script>";
?>