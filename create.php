<?php
include_once "koneksi.php";
session_start();

$nim        ="";
$nama       ="";
$prodi      ="";
$angkatan   ="";
$foto       ="";
$status     ="";
$sukses     ="";
$error      ="";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    .mx-auto {width:800px}
    .card {margin-top: 10px}
</style>
</head>
<body>
<div class="mx-auto">
<div class="card">
  <div class="card-header">
    Create Data
  </div>
  <div class="card-body">

    <form action= "proses_create.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3 row">
  <label for="nim" class="form-label">NIM</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim ?>">
</div>

<div class="mb-3 row">
  <label for="nama" class="form-label">Nama</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
</div>

<div class="mb-3 row">
  <label for="prodi" class="form-label">Prodi</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" id="prodi" name="prodi" value="<?php echo $prodi ?>">
</div>

<div class="mb-3 row">
  <label for="angkatan" class="form-label">Angkatan</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" id="angkatan" name="angkatan" value="<?php echo $angkatan ?>">
</div>

<div class="mb-3 row">
  <label for="foto" class="form-label">Foto</label>
  <div class="col-sm-10">
  <input type="file" class="form-control" id="foto" name="foto">
</div>

<div class="mb-3 row">
  <label for="status" class="form-label">Status</label>
  <div class="col-sm-10">
    <select class="form-control" name="status" id="status">
        <option value ="">- Pilih Status -</option>
        <option value ="aktif" <?php if($status == "aktif") echo "selected"?>>Aktif</option>
        <option value ="tidak aktif" <?php if($status == "tidak aktif") echo "selected"?>>Tidak Aktif</option>
    </select>
</div>
</div>
<div class="col-12">
    <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
</div>
    </form>
</div>
</div>
</div>

</body>