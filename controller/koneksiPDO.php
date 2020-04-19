<?php
$host = 'infotani.mif-project.com'; // Nama hostnya
$username = 'u8823774_infotani'; // Username
$password = 'mif2017'; // Password (Isi jika menggunakan password)
$database = 'u8823774_infotani'; // Nama databasenya

// Koneksi ke MySQL dengan PDO
$pdo = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
?>

