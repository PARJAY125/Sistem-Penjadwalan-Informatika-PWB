<?php
  session_start();

  // Check if the session exists and if the username is set
  if (isset($_SESSION['email'])) {
      $email = $_SESSION['email'];
      // Display the dashboard content
      echo "Welcome, $email! This is your dashboard.";
  } else {
      // Session doesn't exist or username is not set, redirect to the login page
      header("Location: login view.php");
      exit();
  }

?>

<!DOCTYPE html>
<html>

<head>
    <title>Aplikasi Penjadwalan Kuliah - Admin</title>
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>
    <div class="container">
        <h1>Aplikasi Penjadwalan Kuliah - Mahasiswa</h1>
        
        <div class="dashboard">
            <h2>Dashboard</h2>
            <form action="logout.php" method="post"><button type="submit">logout</button></form>
            <div class="summary">
                <div class="summary-box">
                    <h3>Jumlah Dosen :</h3>
                    <p>50 Dosen</p>
                </div>
                <div class="summary-box">
                    <h3>Jumlah Mahasiswa Kelas C :</h3>
                    <p>20 Mahasiswa</p>
                </div>
                <div class="summary-box">
                    <h3>Jumlah Mata Kuliah :</h3>
                    <p>7 Mata Kuliah</p>
                </div>
            </div>
        </div>

        <div class="management-section">
            <h2>Manajemen Pengguna</h2>
            <table class="user-list">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Peran</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="notification-section">
            <h2>Notifikasi</h2>
            <div>
              <ul class="notification-list">
              </ul>
            </div>
        </div>
    </div>
    <script>
        // Daftar Pengguna
        const userList = [
          { name: "Saya Siapa", email: "sayasiapa@example.com", role: "Admin" },
          { name: "Jane Smith", email: "janesmith@example.com", role: "Dosen" },
          { name: "Alice Johnson", email: "alicejohnson@example.com", role: "Mahasiswa" }
        ];
    
        // Menampilkan daftar pengguna
        function displayUserList() {
          const tableBody = document.querySelector(".user-list tbody");
    
          userList.forEach(user => {
            const row = document.createElement("tr");
            row.innerHTML = `
              <td>${user.name}</td>
              <td>${user.email}</td>
              <td>${user.role}</td>
            `;
    
            tableBody.appendChild(row);
          });
        }
    
        displayUserList();
    
        // Notifikasi
        const notifications = [
          "Perubahan jadwal kuliah terbaru",
          "Pengumuman penting mengenai mata kuliah",
          "Permintaan persetujuan jadwal kuliah dari dosen"
        ];
    
        // Menampilkan daftar notifikasi
        function displayNotifications() {
          const notificationList = document.querySelector(".notification-list");
    
          notifications.forEach(notification => {
            const listItem = document.createElement("li");
            listItem.textContent = notification;
            notificationList.appendChild(listItem);
          });
        }
    
        displayNotifications();
    </script>
</body>
</html>