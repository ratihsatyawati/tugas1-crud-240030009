<?php
include_once "koneksi.php";
session_start();

if(isset($_GET['nim'])){
  $nim = $_GET['nim'];
  $sql1 = "delete from mahasiswa where nim = '$nim'";
  $q1 = mysqli_query($koneksi,$sql1);

  if($q1){
    $sukses = "Berhasil hapus data";
    header("Location: index.php?sukses=" . urlencode($sukses));
    exit;
  }else{
    $error = "Gagal hapus data";
    header("Location: index.php?error=" . urlencode($error));
    exit;
  }
}

?>