<?php
include_once "koneksi.php";
session_start();

$op = isset($_GET['op']) ? $_GET['op'] : "";

$nim        ="";
$nama       ="";
$prodi      ="";
$angkatan   ="";
$foto       ="";
$status     ="";
$sukses     ="";
$error      ="";


if(isset($_POST['simpan'])){ //untuk create
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $angkatan = $_POST['angkatan'];
    $status = $_POST['status'];

$foto = ""; 
    if(isset($_FILES['foto']) && $_FILES['foto']['name'] != ""){
        $namaFile = $_FILES['foto']['name'];
        $tmpFile  = $_FILES['foto']['tmp_name'];

        $ext = pathinfo($namaFile, PATHINFO_EXTENSION);
        $ext = strtolower($ext);

        // Hanya izinkan file gambar
        $allowed = ["jpg","jpeg","png","gif"];

        if(in_array($ext, $allowed)){
            
            $folder = "uploads/";

            if(!file_exists($folder)){
                mkdir($folder, 0777, true);
            }

            $namaBaru = time() . "_" . $namaFile;
            $pathFile = $folder . $namaBaru;

            if(move_uploaded_file($tmpFile, $pathFile)){
                $foto = $pathFile;
            }
        }
    }



    if($nim && $nama && $prodi && $angkatan && $status){
        if($op == 'edit'){ //untuk update (tidak aktif)
          $sql1 = "update mahasiswa set nim = '$nim', nama = '$nama',prodi = '$prodi',angkatan = '$angkatan',foto = '$foto',status = '$status' where nim = '$nim' ";
          $q1 = mysqli_query($koneksi,$sql1);
          if($q1){
            $sukses = "Data berhasil diupdate";
          }else{
            $error = "Data gagal diupdate";
          }
        }else{ //untuk insert
          $sql1 = "insert into mahasiswa(nim,nama,prodi,angkatan,foto,status) values ('$nim', '$nama', '$prodi', '$angkatan', '$foto', '$status')";
          $q1 = mysqli_query($koneksi,$sql1);
          if($q1){
            $sukses ="Berhasil memasukkan data baru";
            header("Location: index.php?sukses=" . urlencode($sukses));
          }else{
            $error = "Gagal memasukkan data";
            header("Location: create.php?error=" . urlencode($error));
          }
        }
        
    }else{
        $error ="Silahkan masukkan semua data";
        header("Location: create.php?error=" . urlencode($error));
    }
  }


?>