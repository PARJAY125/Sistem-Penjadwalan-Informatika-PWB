<?php
include '../conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the POST data
    $id = $_POST['id'];

   // Delete the data from the database
    $sql = "DELETE FROM dosen WHERE id_user = '$id'";
    if (mysqli_query($conn, $sql)) {
        // The data was successfully deleted
        echo "Data deleted successfully.";
    } else {
        // An error occurred while deleting the data
        echo "Error: " . mysqli_error($conn);
    }
    $sql = "DELETE FROM user WHERE id = '$id'";
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

