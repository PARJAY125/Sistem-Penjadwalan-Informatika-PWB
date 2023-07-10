<?php
	include '../conn.php';
	$count = 0;
	ini_set('display_errors', 1);
	error_reporting(E_ALL);

	// Menjalankan query untuk mengambil data jadwal kuliah, mahasiswa, mata kuliah, dan kelas dari database
	$sql = 	"SELECT nama_lengkap AS `Nama Mahasiswa`, WA AS `No Telp`, email AS `Email`, id AS `id`
			FROM user
			WHERE role = 'mahasiswa';";

	$result = $conn->query($sql);
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Data Mahasiswa</title>
	    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
	    <!----css3---->
        <link rel="stylesheet" href="css/custom.css">
		
		
		<!--google fonts -->
	    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
	
	
	   <!--google material icon-->
      <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">
	  <script src="https://kit.fontawesome.com/542a1c1f6b.js" crossorigin="anonymous"></script>
  </head>
  <body>
  


<div class="wrapper">
     
	  <div class="body-overlay"></div>
	 
	 <!-------sidebar--design------------>
	 
	 <div id="sidebar">
	    <div class="sidebar-header">
		   <h3 class="d-flex justify-content-center"><span>Sistem Penjadwalan</span></h3>
		</div>
		<ul class="list-unstyled component m-0">
		  <li class="">
		  	<a href="index.php" class="dashboard"><i class="material-icons">dashboard</i>Dashboard </a>
		  </li>
		  
		  <li class="active">
		  	<a href="#" class="dashboard"><i class="material-icons">library_books</i>Data Mahasiswa </a>
		  </li>
		  
		  <li class="">
		  	<a href="datakelas.php" class="dashboard"><i class="material-icons">school</i>Data Kelas </a>
		  </li>
		  
		  <li class="">
		  	<a href="datamatkul.html" class="dashboard"><i class="material-icons">menu_book</i>Data Matkul </a>
		  </li>
		  
		  <li class="">
            <a href="daftardosen.php" class="dashboard"><i class="material-icons">person</i>Daftar Dosen </a>
          </li>
		  
		  <li class="">
			<a href="jadwalkhusus.html" class=""><i class="material-icons">date_range</i>Jadwal Khusus </a>
		  </li>

		  <li class="">
			<a href="calender.html" class=""><i class="material-icons">event_note</i>Calender </a>
		  </li>
		</ul>
	 </div>
	 
   <!-------sidebar--design- close----------->
   

      <!-------page-content start----------->
   
      <div id="content">
	     
		  <!------top-navbar-start-----------> 
		     
		  <div class="top-navbar">
		     <div class="xd-topbar">
			     <div class="row">
				     <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
					    <div class="xp-menubar">
						    <span class="material-icons text-white">signal_cellular_alt</span>
						</div>
					 </div>
					 
					 <div class="col-md-5 col-lg-3 order-3 order-md-2">
					     <div class="xp-searchbar">
						     <form>
							    <div class="input-group">
								  <input type="search" class="form-control"
								  placeholder="Search">
								  <div class="input-group-append">
								     <button class="btn" type="submit" id="button-addon2">
										<i class="fa-solid fa-magnifying-glass"></i>
									 </button>
								  </div>
								</div>
							 </form>
						 </div>
					 </div>
					 
					 
					 <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
					     <div class="xp-profilebar text-right">
						    <nav class="navbar p-0">
							   <ul class="nav navbar-nav flex-row ml-auto">
							   <li class="dropdown nav-item active">
							     <a class="nav-link" href="#" data-toggle="dropdown">
								  <span class="material-icons">notifications</span>
								  <span class="notification">4</span>
								 </a>
								  <ul class="dropdown-menu">
								     <li><a href="#">You Have 4 New Messages</a></li>
									 <li><a href="#">You Have 4 New Messages</a></li>
									 <li><a href="#">You Have 4 New Messages</a></li>
									 <li><a href="#">You Have 4 New Messages</a></li>
								  </ul>
							   </li>
							   
							   <li class="nav-item">
							     <a class="nav-link" href="#">
								   <span class="material-icons">question_answer</span>
								 </a>
							   </li>
							   
							   <li class="dropdown nav-item">
							     <a class="nav-link" href="#" data-toggle="dropdown">
								  <img src="img/user.png" style="width:40px; border-radius:50%;"/>
								  <span class="xp-user-live"></span>
								 </a>
								  	<ul class="dropdown-menu small-menu">
								     	<li><a href="#">
									 	<span class="material-icons">person_outline</span>
									 	Profile
									 	</a></li>
									 	<li><a href="#">
									 	<span class="material-icons">settings</span>
									 	Settings
									 	</a></li>
									 	<li><a href="#">
									 	<span class="material-icons">logout</span>
									 	Logout
									 	</a></li>
								  	</ul>
							   </li>
							   </ul>
							</nav>
						 </div>
					 </div>
				 </div>
				 
				 <div class="xp-breadcrumbbar text-center">
				    <h4 class="page-title mt-2">Data Mahasiswa</h4>
				 </div>
			 </div>
		  </div>
		  <!------top-navbar-end-----------> 
		  
		  
		   <!------main-content-start-----------> 
		<div class="main-content">
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrapper">		
						<table class="table table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>NIM</th>
									<th>Nama Mahasiswa</th>
									<th>No Telp</th>
									<th>Email</th>
									<th>Action</th>
								</tr>
							</thead>
		
							<tbody>
								<tr>
									<?php
										while ($row = mysqli_fetch_assoc($result)) {
											$count++; //menghitung jumlah data
											//mencetak data yang ada pada tabel
											echo '<tr id="row_' . $row['id'] . '">';
											echo '<td>' . $count . '</td>';
											echo '<td>' . $row['id'] . '</td>';
											echo '<td>' . $row['Nama Mahasiswa'] . '</td>';
											echo '<td>' . $row['No Telp'] . '</td>';
											echo '<td>' . $row['Email'] . '</td>';
											echo '<td>';
											echo '<a href="#editEmployeeModal" class="edit" data-toggle="modal" data-id="' . $row['id'] . '">';
											echo '<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>';
											echo '</a>';
											echo '<a href="#deleteEmployeeModal" class="delete" data-toggle="modal" data-id="' . $row['id'] . '">';
											echo '<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>';
											echo '</a>';
											echo '</td>';
											echo '</tr>';
											
										}
										mysqli_close($conn);
									?>
								</tr>
						    </tbody>
						</table>
		
						<div class="clearfix">
							<div class="hint-text">showing <b>1</b> out of <b>10</b></div>
							<ul class="pagination">
								<li class="page-item disabled"><a href="#">Previous</a></li>
								<li class="page-item active"><a href="#" class="page-link">1</a></li>
								<li class="page-item "><a href="#" class="page-link">2</a></li>
								<li class="page-item "><a href="#" class="page-link">3</a></li>
								<li class="page-item "><a href="#" class="page-link">4</a></li>
								<li class="page-item "><a href="#" class="page-link">5</a></li>
								<li class="page-item "><a href="#" class="page-link">Next</a></li>
							</ul>
						</div>
					</div>
				</div>	
		
				<!----edit-modal start--------->
				<div class="modal fade" tabindex="-1" id="editEmployeeModal" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Data</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label>Nama Mahasiswa</label>
									<input type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label>No Telp</label>
									<input type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="text" class="form-control" required>
								</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
								<button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
							</div>
						</div>
					</div>
				</div>
		
				<!----edit-modal end--------->
		
		
				<!----delete-modal start--------->
				<div class="modal fade" tabindex="-1" id="deleteEmployeeModal" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Delete Data</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<p>Are You Sure You Want To Delete This Data?</p>
								<p class="text-warning"><small>this action Cannot be Undone</small></p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
								<button type="button" class="btn btn-success">Delete</button>
							</div>
						</div>
					</div>
				</div>
		
				<!----edit-modal end--------->
		
		
		
		
			</div>
		</div>
		
		<!------main-content-end----------->
		 
		 
		 <!----footer----->
		 
		 <footer class="footer">
		    <div class="container-fluid">
			   <div class="footer-in">
			      <p class="mb-0">&copy 2023. All Rights Reserved.</p>
			   </div>
			</div>
		 </footer>
		 
		 
	  </div>
</div>



<!-------complete html----------->





  
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="js/jquery-3.3.1.slim.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery-3.3.1.min.js"></script>
  
  
  <script type="text/javascript">
       $(document).ready(function(){
	      $(".xp-menubar").on('click',function(){
		    $("#sidebar").toggleClass('active');
			$("#content").toggleClass('active');
		  });
		  
		  $('.xp-menubar,.body-overlay').on('click',function(){
		     $("#sidebar,.body-overlay").toggleClass('show-nav');
		  });

		  // Edit button click event
			$(document).on("click", ".edit", function() {
				// Get the row ID and populate the modal with its data
				var id = $(this).data("id");
				var name = $("#row_" + id).find("td:eq(2)").text();
				var phone = $("#row_" + id).find("td:eq(3)").text();
				var email = $("#row_" + id).find("td:eq(4)").text();
				$("#editEmployeeModal").find("input:eq(0)").val(name);
				$("#editEmployeeModal").find("input:eq(1)").val(phone);
				$("#editEmployeeModal").find("input:eq(2)").val(email);
				$("#editEmployeeModal").find(".btn-success").data("id", id);
		});

		// Save button click event
			$("#editEmployeeModal").on("click", ".btn-success", function() {
				var id = $(this).data("id");
				var name = $("#editEmployeeModal").find("input:eq(0)").val();
				var phone = $("#editEmployeeModal").find("input:eq(1)").val();
				var email = $("#editEmployeeModal").find("input:eq(2)").val();

				// Update the table row with the edited data
				$("#row_" + id).find("td:eq(2)").text(name);
				$("#row_" + id).find("td:eq(3)").text(phone);
				$("#row_" + id).find("td:eq(4)").text(email);

				// Make an AJAX request to update the data in the database
				$.ajax({
					url: "update.php", // Replace with the URL of your server-side script to update the data
					type: "POST",
					data: { id: id, name: name, phone: phone, email: email },
					success: function(response) {
						console.log(response); // You can handle the response from the server here
					},
					error: function(xhr, status, error) {
						console.error(error); // You can handle any errors that occur during the AJAX request here
					}
				});

				// Close the modal
				$("#editEmployeeModal").modal("hide");
			})

			// Delete button click event
			$(document).on("click", ".delete", function() {
				console.log("worked");
				// Get the row ID
				var id = $(this).closest("tr").attr("id").split("_")[1];
				$("#deleteEmployeeModal").data("id", id);

				var id = $("#deleteEmployeeModal").data("id");

				// Make an AJAX request to delete the data from the database
				$.ajax({
					url: "delete_mahasiswa.php", // Replace with the URL of your server-side script to delete the data
					type: "POST",
					data: { id: id },
					success: function(response) {
						console.log(response); // You can handle the response from the server here
						
						// Remove the table row from the HTML
						$("#row_" + id).remove();
					},
					error: function(xhr, status, error) {
						console.error(error); // You can handle any errors that occur during the AJAX request here
					}
				});

			});

		  
	   });
  </script>
  </body>
  </html>


