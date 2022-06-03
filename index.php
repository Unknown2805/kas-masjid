<?php
//Mulai Sesion
session_start();
if (isset($_SESSION["ses_username"]) == "") {
	header("location: login");
} else {
	$data_id = $_SESSION["ses_id"];
	$data_nama = $_SESSION["ses_nama"];
	$data_user = $_SESSION["ses_username"];
	$data_level = $_SESSION["ses_level"];
}

//KONEKSI DB
include "inc/koneksi.php";
//FUNGSI RUPIAH
include "inc/rupiah.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php
	$sql = $koneksi->query("select * from tb_masjid");
	while ($row = mysqli_fetch_array($sql)) {
	?>

		<title><?php echo $row['name']; ?></title>

		<link rel="icon" href="profile_images/<?php echo $row['profile']; ?>">
	<?php } ?>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Alert -->
	<script src="plugins/alert.js"></script>
</head>


<body class="hold-transition sidebar-mini sidebar">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-default navbar-darkd">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu">
						<i class="fas fa-bars"></i>
					</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="http://localhost/kas_masjid/" class="nav-link text-secondary" style="font-family:Arial, Helvetica, sans-serif;">Home</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="?page=rekap_km" class="nav-link text-secondary" style="font-family:Arial, Helvetica, sans-serif;">Rekap Kas Masjid</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="?page=rekap_ks" class="nav-link text-secondary" style="font-family:Arial, Helvetica, sans-serif;">Rekap Kas Sosial</a>
				</li>
			</ul>




			<!-- SEARCH FORM -->
			<style type="text/css">
				p {
					display: inline;
					margin: 8px;

				}

				#time {
					font-size: 20px;
					color: #218838;
				}

				#day {
					font-size: 20px;
					color: #218838;
				}

				#date {
					font-size: 20px;
					color: #218838;
				}
			</style>

			<div>
				<p id="day">SUN</p>
				<p id="date">9 May 2021</p>
				<p id="time">1:20PM</p>
			</div>

			<script type="text/javascript">
				const getCurrentTimeDate = () => {
					let currentTimeDate = new Date();

					var weekday = new Array(7);
					weekday[0] = "SUN";
					weekday[1] = "MON";
					weekday[2] = "TUE";
					weekday[3] = "WED";
					weekday[4] = "THU";
					weekday[5] = "FRI";
					weekday[6] = "SAT";

					var month = new Array();
					month[0] = "JAN";
					month[1] = "FEB";
					month[2] = "MAR";
					month[3] = "APR";
					month[4] = "May";
					month[5] = "JUN";
					month[6] = "JUL";
					month[7] = "AUG";
					month[8] = "SEP";
					month[9] = "OCT";
					month[10] = "NOV";
					month[11] = "DEC";

					var hours = currentTimeDate.getHours();

					var minutes = currentTimeDate.getMinutes();
					minutes = minutes < 10 ? '0' + minutes : minutes;

					var AMPM = hours >= 12 ? 'PM' : 'AM';

					if (hours === 12) {
						hours = 12;

					} else {

						hours = hours % 12;

					}

					var currentTime = `${hours}:${minutes}${AMPM}`;
					var currentDay = weekday[currentTimeDate.getDay()];

					var currentDate = currentTimeDate.getDate();
					var currentMonth = month[currentTimeDate.getMonth()];
					var CurrentYear = currentTimeDate.getFullYear();

					var fullDate = `${currentDate} ${currentMonth} ${CurrentYear}`;


					document.getElementById("time").innerHTML = currentTime;
					document.getElementById("day").innerHTML = currentDay;
					document.getElementById("date").innerHTML = fullDate;

					setTimeout(getCurrentTimeDate, 500);

				}
				getCurrentTimeDate();
			</script>

			<!-- Right navbar links -->

		</nav>
		<!-- /.navbar -->

		<!-- Modal -->
		<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						...
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Understood</button>
					</div>
				</div>
			</div>
		</div>



		
		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-light-primary elevation-4">	
			<!-- Brand Logo -->
			
			


			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<?php
			// database connection
			$con = mysqli_connect("localhost", "root", "", "kas_masjid");

			$select = mysqli_query($con, "select * from tb_masjid");
			while ($row = mysqli_fetch_array($select)) {
			?>
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
					<img src="profile_images/<?php echo $row['profile']; ?>" style="width:40px;height:40px;border-radius:20px;">
					</div>
					<div class="info">
					<p class="d-block"><?php echo $row['name']; ?></p>

					
						<a href="update_image.php?id=<?php echo $row['id']; ?>" style="color:blue" class="d-block">Edit</a>
					
					</div>
				</div>
				<br/><?php } ?>


				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="http://localhost/kas_masjid/" class="d-block">
							<?php echo $data_nama; ?>
						</a>
						<span class="badge badge-success">
							<?php echo $data_level; ?>
						</span>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

						<!-- Level  -->
						<?php
						if ($data_level == "Administrator") {
						?>
							<li class="nav-item">
								<a href="http://localhost/kas_masjid/" class="nav-link active" style="background-color:#17a2b8">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>
										Dashboard

									</p>
								</a>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-bell"></i>
									<p>
										Kas Masjid
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="http://localhost/kas_masjid/?page=i_data_km&desc=desc" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Pemasukan Kas Masjid</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="http://localhost/kas_masjid/?page=o_data_km&desc=desc" class="nav-link">
											<i class="nav-icon far fa-circle text-danger"></i>
											<p>Pengeluaran Kas Masjid</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=rekap_km" class="nav-link">
											<i class="nav-icon far fa-circle text-primary"></i>
											<p>Rekap Kas Masjid</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-users"></i>
									<p>
										Kas Sosial
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="http://localhost/kas_masjid/?page=i_data_ks&desc=desc" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Pemasukan Kas Sosial</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="http://localhost/kas_masjid/?page=o_data_ks&desc=desc" class="nav-link">
											<i class="nav-icon far fa-circle text-danger"></i>
											<p>Pengeluaran Kas Sosial</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=rekap_ks" class="nav-link">
											<i class="nav-icon far fa-circle text-primary"></i>
											<p>Rekap Kas Sosial</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-file"></i>
									<p>
										Laporan Kas
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=lap_masjid" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Rekap Kas Masjid</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=lap_sosial" class="nav-link">
											<i class="nav-icon far fa-circle text-info"></i>
											<p>Rekap Kas Sosial</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-header">Settings</li>
							<li class="nav-item">
								<a href="?page=MyApp/data_pengguna" class="nav-link">
									<i class="nav-icon far fa-user"></i>
									<p>
										Users
									</p>
								</a>
							</li>

						<?php
						} elseif ($data_level == "Bendahara") {
						?>
							<li class="nav-item">
								<a href="http://localhost/kas_masjid/" class="nav-link active">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>
										Dashboard

									</p>
								</a>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-bell"></i>
									<p>
										Kas Masjid
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="http://localhost/kas_masjid/?page=i_data_km&desc=desc" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Pemasukan Kas Masjid</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=o_data_km" class="nav-link">
											<i class="nav-icon far fa-circle text-danger"></i>
											<p>Pengeluaran Kas Masjid</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=rekap_km" class="nav-link">
											<i class="nav-icon far fa-circle text-primary"></i>
											<p>Rekap Kas Masjid</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-users"></i>
									<p>
										Kas Sosial
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="http://localhost/kas_masjid/?page=i_data_ks&desc=desc" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Pemasukan Kas Sosial</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="http://localhost/kas_masjid/?page=o_data_ks&desc=desc" class="nav-link">
											<i class="nav-icon far fa-circle text-danger"></i>
											<p>Pengeluaran Kas Sosial</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=rekap_ks" class="nav-link">
											<i class="nav-icon far fa-circle text-primary"></i>
											<p>Rekap Kas Sosial</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-file"></i>
									<p>
										Laporan Kas
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=lap_masjid" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Rekap Kas Masjid</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=lap_sosial" class="nav-link">
											<i class="nav-icon far fa-circle text-info"></i>
											<p>Rekap Kas Sosial</p>
										</a>
									</li>
							</li>
					</ul>
					</li>
				<?php
						}
				?>

				<li class="nav-item">
					<a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php" class="nav-link">
						<i class="nav-icon far fa-circle text-danger"></i>
						<p>
							Logout
						</p>
					</a>
				</li>

				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			</section>

			<!-- Main content -->
			<section class="content">
				<!-- /. WEB DINAMIS DISINI ############################################################################### -->
				<div class="container-fluid">

					<?php
					if (isset($_GET['page'])) {
						$hal = $_GET['page'];

						switch ($hal) {
								//Klik Halaman Home Pengguna
							case 'MyApp/admin':
								include "home/admin.php";
								break;
							case 'bendahara':
								include "home/bendahara.php";
								break;

								//Pengguna
							case 'MyApp/data_pengguna':
								include "admin/pengguna/data_pengguna.php";
								break;
							case 'MyApp/add_pengguna':
								include "admin/pengguna/add_pengguna.php";
								break;
							case 'MyApp/edit_pengguna':
								include "admin/pengguna/edit_pengguna.php";
								break;
							case 'MyApp/del_pengguna':
								include "admin/pengguna/del_pengguna.php";
								break;

								//Masjid in
							case 'i_data_km':
								include "bendahara/masjid/in/data_kas.php";
								break;
							case 'i_add_km':
								include "bendahara/masjid/in/add_kas.php";
								break;
							case 'i_edit_km':
								include "bendahara/masjid/in/edit_kas.php";
								break;
							case 'i_del_km':
								include "bendahara/masjid/in/del_kas.php";
								break;

								//Masjid out
							case 'o_data_km':
								include "bendahara/masjid/out/data_kas.php";
								break;
							case 'o_add_km':
								include "bendahara/masjid/out/add_kas.php";
								break;
							case 'o_edit_km':
								include "bendahara/masjid/out/edit_kas.php";
								break;
							case 'o_del_km':
								include "bendahara/masjid/out/del_kas.php";
								break;

							case 'rekap_km':
								include "bendahara/masjid/rekap_kas.php";
								break;

								//sos in
							case 'i_data_ks':
								include "bendahara/sosial/in/data_kas.php";
								break;
							case 'i_add_ks':
								include "bendahara/sosial/in/add_kas.php";
								break;
							case 'i_edit_ks':
								include "bendahara/sosial/in/edit_kas.php";
								break;
							case 'i_del_ks':
								include "bendahara/sosial/in/del_kas.php";
								break;

								//sos out
							case 'o_data_ks':
								include "bendahara/sosial/out/data_kas.php";
								break;
							case 'o_add_ks':
								include "bendahara/sosial/out/add_kas.php";
								break;
							case 'o_edit_ks':
								include "bendahara/sosial/out/edit_kas.php";
								break;
							case 'o_del_ks':
								include "bendahara/sosial/out/del_kas.php";
								break;

							case 'rekap_ks':
								include "bendahara/sosial/rekap_kas.php";
								break;

								//lap kas mas
							case 'lap_masjid':
								include "bendahara/laporan/lap_mas.php";
								break;
							case 'lap_sosial':
								include "bendahara/laporan/lap_sos.php";
								break;


								//default
							default:
								echo "<center><h1> ERROR !</h1></center>";
								break;
						}
					} else {
						// Auto Halaman Home Pengguna
						if ($data_level == "Administrator") {
							include "home/admin.php";
						} elseif ($data_level == "Bendahara") {
							include "home/bendahara.php";
						}
					}
					?>

				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				<?php
				// database connection
				$con = mysqli_connect("localhost", "root", "", "kas_masjid");

				$select = mysqli_query($con, "select * from tb_masjid");
				while ($row = mysqli_fetch_array($select)) {
				?>

					<tr>
						<td><?php echo $row['name']; ?></td>
					</tr>
				<?php } ?>
			</div>

		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-light">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="plugins/select2/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<!-- page script -->
	<script>
		$('.sidebar-toggle-btn').PushMenu(options)
		$(function() {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});

		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>

</body>

</html>