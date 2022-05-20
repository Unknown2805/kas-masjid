<?php
$data_nama = $_SESSION["ses_nama"];
$data_level = $_SESSION["ses_level"];

$sql = $koneksi->query("SELECT COUNT(id_pengguna) as pengguna from tb_pengguna");
while ($data = $sql->fetch_assoc()) {
  $jml = $data['pengguna'];
}
?>

<?php
$sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk'");
while ($data = $sql->fetch_assoc()) {
  $masuk = $data['tot_masuk'];
}

$sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar'");
while ($data = $sql->fetch_assoc()) {
  $keluar = $data['tot_keluar'];
}

$saldo = $masuk - $keluar;
?>

<?php
$sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_sosial where jenis='Masuk'");
while ($data = $sql->fetch_assoc()) {
  $smasuk = $data['tot_masuk'];
}

$sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_sosial where jenis='Keluar'");
while ($data = $sql->fetch_assoc()) {
  $skeluar = $data['tot_keluar'];
}

$ssaldo = $smasuk - $skeluar;
?>



<!-- /.card -->


<!-- /.card -->
</div>
<!-- /.col-md-6 -->
<div class="col-lg-6">
  <div class="card">
    <div class="card-header border-0">
      <div class="d-flex justify-content-between">
        <h3 class="card-title">Rekap Kas Masjid</h3>
        <a href="?page=rekap_km" class="nav-link">View Report</a>
      </div>
    </div>
    <div class="card-body">
      <div class="d-flex">
        <p class="d-flex flex-column">
          <span class="text-bold text-lg">Rp 2.775.000,00</span>
          <span>Sales Over Time</span>
        </p>
        <p class="ml-auto d-flex flex-column text-right">
          <span class="text-success">
            <i class="fas fa-arrow-up"></i> 33.1%
          </span>
          <span class="text-muted">Since last month</span>
        </p>
      </div>
      <!-- /.d-flex -->

      <div class="position-relative mb-4">
        <canvas id="sales-chart" height="200"></canvas>
      </div>

      <div class="d-flex flex-row justify-content-end">
        <span class="mr-2">
          <i class="fas fa-square text-primary"></i> Kas Masjid
        </span>

        <span>
          <i class="fas fa-square text-gray"></i> Kas Sosial
        </span>
      </div>
    </div>
  </div>
  <!-- /.card -->


  <!-- /.col-md-6 -->
</div>
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>


<script src="dist/js/pages/dashboard3.js"></script>