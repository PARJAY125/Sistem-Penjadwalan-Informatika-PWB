<?php
include '../conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the POST data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // Update the data in the database
    $sql = "UPDATE user SET `nama_lengkap` = '$name', `WA` = '$phone', `email` = '$email' WHERE id = '$id'";
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
