<?php
$host = "localhost";
$user = "root";
$pass = "12345";
$db   = "BA243";

$koneksi = mysqli_connect($host,$user,$pass,$db);
if(!$koneksi){
    die("Tidak bisa terkoneksi ke database");
}
