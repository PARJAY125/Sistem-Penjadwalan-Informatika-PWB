<?php
include '../conn.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $name = $_POST['namaAdmin'];
    $username =  $_POST['username'];
    $password = $_POST['password'];
    $WA = $_POST['noTelp'];
    $role = 'admin';
    
    // Apakah Email sudah ada di DB
    $query = "SELECT * FROM user WHERE email = '$email'";
    if(mysqli_num_rows(mysqli_query($conn,$query)) !== 0){
        gagal_regis('Email Sudah Terdaftar');
    }

    // Apakah username sudah ada di DB
    $query = "SELECT * FROM user WHERE username = '$username'";
    if(mysqli_num_rows(mysqli_query($conn,$query)) !== 0){
        gagal_regis('Username Sudah Terdaftar');
    }

    // Menambahkan User
    add_user_table($conn, $name,$username, $email, $password,$role,$WA);

    $query = "SELECT id FROM user Where username ='$username'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $id = $row['id'];
    // Menambahkan data di tabel admin
    $query = "INSERT INTO admin (id_user) VALUES ($id)";
    mysqli_query($conn,$query);



    

}

function gagal_regis($msg_error){
    header('Location: index.php?error='.$msg_error);
    exit;
}

function add_user_table($conn, $name, $username,  $email, $password, $role, $WA){
    $query = "INSERT INTO user (nama_lengkap,  email, password, role, username, WA) 
    VALUES ('$name', '$email', '$password','$role','$username', '$WA')";
    
    if (mysqli_query($conn, $query)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    // mysqli_close($conn);
    
}