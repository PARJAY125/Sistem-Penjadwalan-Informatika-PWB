<?php

$host = 'localhost'; // Change this if your database is hosted on a different server
$dbName = 'jadwal_kuliah_informatika'; // Replace with your actual database name
$username = 'root'; // Replace with your actual database username
$password = ''; // Replace with your actual database password

try {
    // Mencoba melakukan koneksi ke database
    $conn = new mysqli($host, $username, $password, $dbName);

    if ($conn->connect_error) 
        throw new Exception('Gagal terhubung dengan database: ' . $conn->connect_error);

    // echo "Terhubung dengan database";
} catch (Exception $e) {
    echo "Terjadi kesalahan: " . $e->getMessage();
}

?>