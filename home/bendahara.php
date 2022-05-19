<?php
  $data_nama = $_SESSION["ses_nama"];
  $data_level = $_SESSION["ses_level"];
?>

<?php
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk'");
  while ($data= $sql->fetch_assoc()) {
    $masuk=$data['tot_masuk'];
  }

  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar'");
  while ($data= $sql->fetch_assoc()) {
    $keluar=$data['tot_keluar'];
  }

  $saldo= $masuk-$keluar;
?>

<?php
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_sosial where jenis='Masuk'");
  while ($data= $sql->fetch_assoc()) {
    $smasuk=$data['tot_masuk'];
  }

  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_sosial where jenis='Keluar'");
  while ($data= $sql->fetch_assoc()) {
    $skeluar=$data['tot_keluar'];
  }

  $ssaldo= $smasuk-$skeluar;
?>
	<div class="wrapper">
	

			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Bendahara</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Bendahara</li>
						</ol>
					</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<section class="content">
				<div class="container-fluid">
					<div class="row">
							<div class="col-12 col-sm-6 col-md-6">
								<div class="info-box">
								<span class="info-box-icon bg-success elevation-1"><i class="fas fa-mosque"></i></span>

								<div class="info-box-content">
								<span class="info-box-text"><a href="?page=rekap_km" class="small-box-footer" style="color:white">Saldo Kas Masjid</a></span>
								<span class="info-box-number"><a href="?page=rekap_km" class="small-box-footer" style="color:white"><?php echo rupiah($saldo); ?></a></span>
							</div>
								<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-12 col-sm-6 col-md-6">
								<div class="info-box mb-3">
								<span class="info-box-icon bg-info elevation-1"><i class="fas fa-handshake" style="color:white"></i></span>

								<div class="info-box-content">
									<span class="info-box-text"><a href="?page=rekap_ks" class="small-box-footer" style="color:white">Saldo Kas Sosial</a></span>
									<span class="info-box-number"><a href="?page=rekap_ks" class="small-box-footer" style="color:white"><?php echo rupiah($ssaldo); ?></a></span>
							    </div>
								<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
						</div>
					</div>
				</div>
				</section>
			
			<!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="#">SII Company</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 0.0.1
    </div>
  </footer>
</div>
	
	