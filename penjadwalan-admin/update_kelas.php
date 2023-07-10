<?php
include '../conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the POST data
    $id = $_POST['id'];
    $namaKelas = $_POST['namaKelas'];
    $jumlah = $_POST['jumlah'];

    // Update the data in the database
    $sql = "UPDATE kelas SET `nama_kode_kelas` = '$namaKelas', `jumlah_mahasiswa` = '$jumlah' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Data updated successfully";
    } else {
        echo "Error updating data: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>