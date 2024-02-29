<?php
$host = "localhost";
$Username = "root";
$Password = "";
$database = "kasir1";

$con = new mysqli ($host, $Username, $Password, $database);

if (!$con) {
    die("<script>alert('Tidak terhubung dengan database')</script>");
}
?>