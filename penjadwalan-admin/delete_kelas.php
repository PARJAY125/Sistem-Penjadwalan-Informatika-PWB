<?php
include '../conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the POST data
    $id = $_POST['id'];

    $sql = "DELETE FROM kelas WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {
        // The data was successfully deleted
        echo "Data deleted successfully.";
    } else {
        // An error occurred while deleting the data
        echo "Error: " . mysqli_error($conn);
    }

   // Delete the data from the database
   $sql = "DELETE FROM kelas_partisipan_pada_jadwal_kuliah WHERE id = '$id'";
   if (mysqli_query($conn, $sql)) {
       // The data was successfully deleted
       echo "Data deleted successfully.";
   } else {
       // An error occurred while deleting the data
       echo "Error: " . mysqli_error($conn);
   }
    
}

// Close the database connection
mysqli_close($conn);
?>

