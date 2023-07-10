<?php
include("conn.php");
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' AND password = '$password'");
    if(mysqli_num_rows($result) === 1){
        $temp = mysqli_fetch_assoc($result);
        var_dump($temp);
        $_SESSION[$username] = $temp['username'];
        if($temp['role'] === 'admin'){
            header('Location: dashboardAdmin.php');
        }elseif($temp['role'] === 'user'){
            header('Location: dashboardMahasiswa.php');
        }else{
            header('Location: dashboardAdmin.php');
        }
        exit;

    }else{
        header('Location: index.html');
        exit;
    }
}
?>
