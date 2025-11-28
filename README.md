# CRUD Data Mahasiswa
Entitas yang digunakan adalah entitas Mahasiswa. Aplikasi ini memungkinkan pengguna untuk melakukan creat, read, update, dan delete data mahasiswa.
- Menggunakan bahasa pemrograman PHP 8.0
- Menggunakan built-in web server (php -S localhost:8000)
- Menggunakan basis data MySQL

## Fitur Aplikasi
- Create: melakukan create/membuat data baru mahasiswa.
- Read: melihat data mahasiswa yang telah dibuat.
- Update: melakukan edit/perbaikan pada data mahasiswa.
- Delete: menghapus data mahasiswa.

## Struktur 
Tugas_1/
├── create.php
├── delete.php
├── index.php
├── koneksi.php
├── proses_create.php
├── proses_update.php
├── update.php
├── db_crud.sql
├── uploads/
└── README.md

## Penjelasan 

### 1. `index.php`
Halaman utama yang menampilkan data dari database dalam bentuk tabel yang berisi:
- Menampilkan daftar data
- Link menuju create.php untuk menambah data
- Link menuju update.php untuk mengedit data
- Link menuju delete.php untuk menghapus data

### 2. `create.php`
Halaman form untuk menambahkan data baru.  
Berisi form input yang nantinya dikirim ke `proses_create.php`.

### 3. `proses_create.php`
File backend untuk memproses form dari `create.php`.  
Fungsinya:
- Mengambil data POST dari form
- Upload file 
- Insert data ke database

### 4. `update.php`
Halaman form untuk mengedit data yang sudah ada.  
Menampilkan data lama dan memungkinkan pengguna untuk mengedit data tersebut.

### 5. `proses_update.php`
File backend untuk memproses perubahan data dari `update.php`.  
Fungsinya:
- Mengambil data POST
- Mengelola perubahan foto 
- Update data di database

### 6. `delete.php`
File untuk menghapus data berdasarkan ID. ID disini menggunakan NIM.  
Proses yang dilakukan:
- Mendapatkan `id` dari URL
- Menghapus record di database

### 7. `koneksi.php`
File yang berisi koneksi database MySQL.  
Digunakan oleh semua file lain.

### 8. `db_crud.sql`
File SQL yang digunakan untuk membuat tabel pada database.
Berisi:

CREATE DATABASE

CREATE TABLE

### 9. `uploads/`
Folder untuk menyimpan file atau foto yang diunggah user.
Wajib dibuat dengan permission write (chmod 775 atau 777).

## Panduan
1. Import database dari file `db_crud.sql`.
2. Pengaturan koneksi:
   ```
   $host = "localhost";
   $user = "root";
   $pass = "12345"; //sesuaikan, jika tidak ada password, kosongkan
   $db   = "BA243"; //sesuaikan
   $koneksi = mysqli_connect($host, $user, $pass, $db);
  
3.Jalankan web server pada cmd visual studio code dengan mengetikkan:
   ```
   php -S localhost:8000
   ```
 
5. Buka di browser:
   ```
   http://localhost/Tugas_1/index.php
   ```
6. CRUD sudah berhasil dijalankan.

## Pengujian

1. Tekan "Tambah Data"
2. Input seluruh data yang diperlukan
3. Data baru dengan nama Stevi berhasil muncul
4. Jika ingin mengedit, klik tombol "Edit"
5. Edit data yang diperlukan, seperti contoh saya mengedit data status mahasiswa
6. Data berhasil diedit
7. Jika ingin mengapus data, klik tombol "Delete"
8. Konfirmasi apakah anda serius ingin menghapus data
9. Data berhasil dihapus 

   







