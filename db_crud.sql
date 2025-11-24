create database BA243;

use BA243;

CREATE TABLE mahasiswa (
    nim INT NOT NULL PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    prodi VARCHAR(100) NOT NULL,
    angkatan INT NOT NULL,
    foto LONGBLOB,
    status ENUM('aktif', 'tidak aktif') NOT NULL
);

use BA243;
ALTER TABLE mahasiswa
MODIFY COLUMN foto VARCHAR(255);