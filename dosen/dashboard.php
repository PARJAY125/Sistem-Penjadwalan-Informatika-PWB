<?php
include '../conn.php';

// Menjalankan query untuk mengambil data jadwal kuliah, dosen, mata kuliah, dan kelas dari database
$sql = "SELECT 
        jadwal_kuliah.id AS id_jadwal, 
        jadwal_kuliah.nama_jadwal, 
        mata_kuliah.nama_mata_kuliah, 
        user.username AS nama_dosen, 
        kelas.nama_kode_kelas,
        CASE
            WHEN jadwal_kuliah.lokasi = 'offline' THEN gedung.nama_gedung
            ELSE 'online'
        END AS lokasi,
        jadwal_kuliah.waktu_kuliah
        FROM 
        jadwal_kuliah
        INNER JOIN 
        mata_kuliah ON jadwal_kuliah.id_mata_kuliah = mata_kuliah.id
        INNER JOIN 
        dosen ON mata_kuliah.id_dosen = dosen.id
        INNER JOIN 
        user ON dosen.id_user = user.id
        INNER JOIN 
        kelas_partisipan_pada_jadwal_kuliah ON jadwal_kuliah.id = kelas_partisipan_pada_jadwal_kuliah.id_jadwal_kuliah
        INNER JOIN 
        kelas ON kelas_partisipan_pada_jadwal_kuliah.id_kelas = kelas.id
        LEFT JOIN
        gedung ON jadwal_kuliah.lokasi = gedung.id
        ORDER BY 
        jadwal_kuliah.waktu_kuliah;
";

$result = $conn->query($sql);

session_start();
if (isset($_SESSION)) {
  // There is a session.
} else {
  // kick
}
?>

<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Dashboard</title>
        <!-- bootstrap 5 css -->
        <link
          rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
          integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK"
          crossorigin="anonymous"
        />
        <!-- custom css -->
        <!-- <link rel="stylesheet" href="style.css" /> -->
        <link
          rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
        />
        <style>
          li {
            list-style: none;
            margin: 20px 0 20px 0;
          }
    
          a {
            text-decoration: none;
          }
    
          .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            margin-left: -300px;
            transition: 0.4s;
            background-color: #363940;;
          }
    
          .active-main-content {
            margin-left: 250px;
          }
    
          .active-sidebar {
            margin-left: 0;
          }
    
          #main-content {
            transition: 0.4s;
          }
        </style>
      </head>
    
      <body>
        <div>
          <div class="sidebar p-4" id="sidebar">
            <h4 class="mb-5 text-white">Sistem Penjadwalan</h4>
            <li>
              <a class="text-white" href="#">
                <i class="bi mr-2"><img src="./assets/dashboard.svg" alt="" width="9%"></i>
                Dashboard
              </a>
            </li>
            <li>
              <a class="text-white" href="#">
                <i class="bi mr-2"><img src="./assets/student.svg" alt="" width="9%"></i>
                Mahasiswa
              </a>
            </li>
            <li>
              <a class="text-white" href="#">
                <i class="bi mr-2"><img src="./assets/dosen.svg" alt="" width="9%"></i>
                Dosen
              </a>
            </li>
            <li>
              <a class="text-white" href="#">
                <i class="bi mr-2"><img src="./assets/matakuliah.svg" alt="" width="9%"></i>
                Matakuliah
              </a>
            </li>
          </div>
        </div>
        <div class="p-4" id="main-content">
          <button class="btn btn-secondary" id="button-toggle">
            <i class="bi bi-list"></i>
          </button>
          <p style="margin-left: 85%; margin-top: -40px; font-size: 25px; font-weight: bold; color: #999999;">
            <?php
              echo("{$_SESSION['username']}")
            ?>
          </p>
          <img src="./assets/logout.svg" alt="" width="30px" style="margin-left: 95%; margin-top: -90px;">
          
          <!-- <button class="btn btn-primary" href="#addJadwalModal">Buat Jadwal Baru</button> -->
          <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
            <a href="#addJadwalModal" class="btn btn-success add" data-toggle="modal">
            <i class="material-icons">&#xE147;</i>
            <span>Buat Jadwal Baru</span>
            </a>
          </div>
          
          <!----add-modal start--------->
				<div class="modal fade" tabindex="-1" id="addJadwalModal" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Daftar Admin</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label>Nama Lengkap</label>
									<input type="text" id="namaAdmin" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Username</label>
									<input type="text" id="username" class="form-control" required>
								</div>
								<div class="form-group">
									<label>No Telepon</label>
									<input type="text" id="noTelp" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="email" id="email" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="text" id="password" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Konfirmasi Password</label>
									<input type="text" id="confirmPassword" class="form-control" required>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
								<button type="button" class="btn btn-success" >Daftar</button>
							</div>
						</div>
					</div>
				</div>
				<!----add-modal end--------->

          <div class="card mt-5">
            <div class="card-body">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Dosen</th>
                    <th scope="col">Mata Kuliah</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Hari/Tanggal</th>
                    <th scope="col">waktu</th>
                    <th scope="col">aksi </th>
                  </tr>
                </thead>

                <tbody>
                  
                  <?php
                    if ($result->num_rows > 0) {
                      // Output data dari setiap baris
                      while($row = $result->fetch_assoc()) {
                          echo "<tr>
                                  <th>" . $row["nomor"]. "</td>
                                  <td>" . $row["nama_dosen"]. "</td>
                                  <td>" . $row["nama_mata_kuliah"]. "</td>
                                  <td>" . $row["nama_kode_kelas"]. "</td>
                                  <td>" . date('D, d M Y H:i', strtotime($row["waktu_kuliah"])). "</td>
                                  <td>" . $row["lokasi"]. "</td>
                                  <td> <button type='button' class='btn btn-primary'>Lihat Komentar</button> <button type='button' class='btn btn-warning'>Edit</button> <button type='button' class='btn btn-danger'>Delete</button></td>
                                </tr>";
                      }
                    } else {
                      echo "<tr><td colspan='7'>0 results</td></tr>";
                    }
                    // Menutup koneksi database
                    $conn->close();
                  ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
    
        <script>
    
          // event will be executed when the toggle-button is clicked
          document.getElementById("button-toggle").addEventListener("click", () => {
    
            // when the button-toggle is clicked, it will add/remove the active-sidebar class
            document.getElementById("sidebar").classList.toggle("active-sidebar");
    
            // when the button-toggle is clicked, it will add/remove the active-main-content class
            document.getElementById("main-content").classList.toggle("active-main-content");
          });
    
        </script>

        <script type="text/javascript">
          $(document).ready(function(){
              $(".xp-menubar").on('click',function(){
                $("#sidebar").toggleClass('active');
                $("#content").toggleClass('active');
              });
              
              $('.xp-menubar,.body-overlay').on('click',function(){
                $("#sidebar,.body-overlay").toggleClass('show-nav');
              });

              $("#addJadwalModal").on("click", ".btn-success", function() {
              console.log("worked");
              var namaAdmin = $("#namaAdmin").val();
              var username = $("#username").val();
              var noTelp = $("#noTelp").val();
              var email = $("#email").val();
              var password = $("#password").val();
              var confirmPassword = $("#confirmPassword").val();

              // Validate password confirmation
              if (password !== confirmPassword) {
                alert("Password and Confirm Password do not match.");
                return;
              }

              // Send the data to addJadwalModalthe server for insertion
              $.ajax({
                url: "add.php", // Replace with the URL of your server-side script to add the data
                type: "POST",
                data: {
                  namaAdmin: namaAdmin,
                  username: username,
                  noTelp: noTelp,
                  email: email,
                  password: password
                },
                success: function(response) {
                  console.log(response); // You can handle the response from the server here
                  // If the data is successfully added, you may need to refresh the table or perform other operations
                },
                error: function(xhr, status, error) {
                  console.error(error); // You can handle any errors that occur during the AJAX request here
                }
              });

            })
          });
      </body>
    </html>
