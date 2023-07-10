<?php
include("..\conn.php");
session_start();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $username =  $_POST['username'];
    $password = $_POST['password'];
    $telp = $_POST['telp'];
    $role = $_GET['category'];

        
    // Apakah Email sudah ada di DB
    $query = "SELECT * FROM user WHERE email = '$email'";
    if(mysqli_num_rows(mysqli_query($conn,$query)) !== 0){
        gagal_regis($role, 'Email Sudah Terdaftar');
    }


    if($role === 'mahasiswa'){
        // Apakah NIM sudah ada di DB
        $query = "SELECT * FROM user WHERE username = '$username'";
        if(mysqli_num_rows(mysqli_query($conn,$query)) !== 0){
            gagal_regis($role,'NIM Sudah Terdaftar');
        }

        // Menambahkan User
        add_user_table($conn,$name,$username,$email,$password,$role,$telp);
        
        // Mencari id pada tabel user
        $user_id = find_user_id($conn, $username);

        // Memeriksa apakah kelas sudah benar
        $class = $_POST['class'];
        $query = "SELECT * FROM kelas WHERE nama_kode_kelas = '$class'";
        $class_row = mysqli_query($conn,$query);
        if(mysqli_num_rows($class_row) === 0){
            gagal_regis($role,'Kelas tidak ada');
        }
        $class_row = mysqli_fetch_assoc($class_row);
        $class_id = $class_row['id'];

        // Update jumlah mahasiswa
        $query = "UPDATE kelas SET jumlah_mahasiswa = jumlah_mahasiswa + 1 WHERE id = $class_id";
        mysqli_query($conn,$query);

        

        // Menambahkan data di tabel mahasiswa
        $query = "INSERT INTO mahasiswa (id_user, kelas) VALUES ($user_id,$class_id)";
        mysqli_query($conn,$query);
        
        $_SESSION['username'] = $name;
        header('Location: ../mahasiswa/dashboard.php');
        exit;
    }elseif($role === 'dosen'){
        // Memeriksa NIP
        $query = "SELECT * FROM user WHERE username = '$username'";
        if(mysqli_num_rows(mysqli_query($conn,$query)) !== 0){
            gagal_regis($role,'NIP Sudah Terdaftar');
        }

        // Menambahkan User
        add_user_table($conn,$name,$username,$email,$password,$role,$telp);

        // Mencari id pada tabel user
        $user_id = find_user_id($conn, $username);


        // Menambahkan data di tabel dosen
        $query = "INSERT INTO dosen (id_user) VALUES ($user_id)";
        mysqli_query($conn,$query);
        
        $_SESSION['username'] = $name;
        header('Location: ../web_penjadwalan/dashboard_dosen.html');
        exit;
    }

    

}

function gagal_regis($category,$msg_error){
    header('Location: ../web_penjadwalan/registrasi_'.$category.'.php?error='.$msg_error);
    exit;
}

function add_user_table($conn, $name, $username,$email,$password,$role, $telp){
    $query = "INSERT INTO user (nama_lengkap, username, email, password,role,wa) 
    VALUES ('$name', $username, '$email', '$password','$role','$telp')";

    if (mysqli_query($conn, $query)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    // mysqli_close($conn);
}

function find_user_id($conn,$username){
    $query = "SELECT * FROM user WHERE username = '$username'";
    $user_row = mysqli_query($conn,$query);
    $temp = mysqli_fetch_assoc($user_row);
    $user_id = $temp['id'];

    return $user_id;
}
?>