<?php
  $data_nama = $_SESSION["ses_nama"];
  $data_level = $_SESSION["ses_level"];

  $sql = $koneksi->query("SELECT COUNT(id_pengguna) as pengguna from tb_pengguna");
    while ($data= $sql->fetch_assoc()) {
      $jml=$data['pengguna'];
  }
?>

<!-- kas pemasukan masjid -->
<?php
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk' and tgl_km BETWEEN '2022-01-01' AND '2022-02-01'");
  while ($data= $sql->fetch_assoc()) {
    $masuk_jan=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk' and tgl_km BETWEEN '2022-02-01' AND '2022-03-01'");
  while ($data= $sql->fetch_assoc()) {
    $masuk_feb=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk' and tgl_km BETWEEN '2022-03-01' AND '2022-04-01'");
  while ($data= $sql->fetch_assoc()) {
    $masuk_mar=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk' and tgl_km BETWEEN '2022-04-01' AND '2022-05-01'");
  while ($data= $sql->fetch_assoc()) {
    $masuk_apr=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk' and tgl_km BETWEEN '2022-05-01' AND '2022-06-01'");
  while ($data= $sql->fetch_assoc()) {
    $masuk_may=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk' and tgl_km BETWEEN '2022-06-01' AND '2022-07-01'");
  while ($data= $sql->fetch_assoc()) {
    $masuk_jun=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk' and tgl_km BETWEEN '2022-07-01' AND '2022-08-01'");
  while ($data= $sql->fetch_assoc()) {
    $masuk_jul=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk' and tgl_km BETWEEN '2022-08-01' AND '2022-09-01'");
  while ($data= $sql->fetch_assoc()) {
    $masuk_ags=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk' and tgl_km BETWEEN '2022-09-01' AND '2022-10-01'");
  while ($data= $sql->fetch_assoc()) {
    $masuk_sep=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk' and tgl_km BETWEEN '2022-10-01' AND '2022-11-01'");
  while ($data= $sql->fetch_assoc()) {
    $masuk_okt=$data['tot_masuk'];
  }$sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk' and tgl_km BETWEEN '2022-11-01' AND '2022-12-01'");
  while ($data= $sql->fetch_assoc()) {
    $masuk_nov=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk' and tgl_km BETWEEN '2022-12-01' AND '2022-01-01'");
  while ($data= $sql->fetch_assoc()) {
    $masuk_des=$data['tot_masuk'];
  }
?>

<!-- kas pengeluaran masjid -->
<?php
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar' and tgl_km BETWEEN '2022-01-01' AND '2022-02-01'");
  while ($data= $sql->fetch_assoc()) {
    $keluar_jan=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar' and tgl_km BETWEEN '2022-02-01' AND '2022-03-01'");
  while ($data= $sql->fetch_assoc()) {
    $keluar_feb=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar' and tgl_km BETWEEN '2022-03-01' AND '2022-04-01'");
  while ($data= $sql->fetch_assoc()) {
    $keluar_mar=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar' and tgl_km BETWEEN '2022-04-01' AND '2022-05-01'");
  while ($data= $sql->fetch_assoc()) {
    $keluar_apr=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar' and tgl_km BETWEEN '2022-05-01' AND '2022-06-01'");
  while ($data= $sql->fetch_assoc()) {
    $keluar_may=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar' and tgl_km BETWEEN '2022-06-01' AND '2022-07-01'");
  while ($data= $sql->fetch_assoc()) {
    $keluar_jun=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar' and tgl_km BETWEEN '2022-07-01' AND '2022-08-01'");
  while ($data= $sql->fetch_assoc()) {
    $keluar_jul=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar' and tgl_km BETWEEN '2022-08-01' AND '2022-09-01'");
  while ($data= $sql->fetch_assoc()) {
    $keluar_ags=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar' and tgl_km BETWEEN '2022-09-01' AND '2022-10-01'");
  while ($data= $sql->fetch_assoc()) {
    $keluar_sep=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar' and tgl_km BETWEEN '2022-10-01' AND '2022-11-01'");
  while ($data= $sql->fetch_assoc()) {
    $keluar_okt=$data['tot_keluar'];
  }$sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar' and tgl_km BETWEEN '2022-11-01' AND '2022-12-01'");
  while ($data= $sql->fetch_assoc()) {
    $keluar_nov=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar' and tgl_km BETWEEN '2022-12-01' AND '2022-01-01'");
  while ($data= $sql->fetch_assoc()) {
    $keluar_des=$data['tot_keluar'];
  }
?>

<!-- kas pemasukan sosial -->
<?php
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk' and tgl_km BETWEEN '2022-01-01' AND '2022-02-01'");
  while ($data= $sql->fetch_assoc()) {
    $smasuk_jan=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk' and tgl_km BETWEEN '2022-02-01' AND '2022-03-01'");
  while ($data= $sql->fetch_assoc()) {
    $smasuk_feb=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk' and tgl_km BETWEEN '2022-03-01' AND '2022-04-01'");
  while ($data= $sql->fetch_assoc()) {
    $smasuk_mar=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk' and tgl_km BETWEEN '2022-04-01' AND '2022-05-01'");
  while ($data= $sql->fetch_assoc()) {
    $smasuk_apr=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk' and tgl_km BETWEEN '2022-05-01' AND '2022-06-01'");
  while ($data= $sql->fetch_assoc()) {
    $smasuk_may=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk' and tgl_km BETWEEN '2022-06-01' AND '2022-07-01'");
  while ($data= $sql->fetch_assoc()) {
    $smasuk_jun=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk' and tgl_km BETWEEN '2022-07-01' AND '2022-08-01'");
  while ($data= $sql->fetch_assoc()) {
    $smasuk_jul=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk' and tgl_km BETWEEN '2022-08-01' AND '2022-09-01'");
  while ($data= $sql->fetch_assoc()) {
    $smasuk_ags=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk' and tgl_km BETWEEN '2022-09-01' AND '2022-10-01'");
  while ($data= $sql->fetch_assoc()) {
    $smasuk_sep=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk' and tgl_km BETWEEN '2022-10-01' AND '2022-11-01'");
  while ($data= $sql->fetch_assoc()) {
    $smasuk_okt=$data['tot_masuk'];
  }$sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk' and tgl_km BETWEEN '2022-11-01' AND '2022-12-01'");
  while ($data= $sql->fetch_assoc()) {
    $smasuk_nov=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk' and tgl_km BETWEEN '2022-12-01' AND '2022-01-01'");
  while ($data= $sql->fetch_assoc()) {
    $smasuk_des=$data['tot_masuk'];
  }
?>

<!-- kas pengeluaran sosial -->
<?php
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar' and tgl_km BETWEEN '2022-01-01' AND '2022-02-01'");
  while ($data= $sql->fetch_assoc()) {
    $skeluar_jan=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar' and tgl_km BETWEEN '2022-02-01' AND '2022-03-01'");
  while ($data= $sql->fetch_assoc()) {
    $skeluar_feb=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar' and tgl_km BETWEEN '2022-03-01' AND '2022-04-01'");
  while ($data= $sql->fetch_assoc()) {
    $skeluar_mar=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar' and tgl_km BETWEEN '2022-04-01' AND '2022-05-01'");
  while ($data= $sql->fetch_assoc()) {
    $skeluar_apr=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar' and tgl_km BETWEEN '2022-05-01' AND '2022-06-01'");
  while ($data= $sql->fetch_assoc()) {
    $skeluar_may=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar' and tgl_km BETWEEN '2022-06-01' AND '2022-07-01'");
  while ($data= $sql->fetch_assoc()) {
    $skeluar_jun=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar' and tgl_km BETWEEN '2022-07-01' AND '2022-08-01'");
  while ($data= $sql->fetch_assoc()) {
    $skeluar_jul=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar' and tgl_km BETWEEN '2022-08-01' AND '2022-09-01'");
  while ($data= $sql->fetch_assoc()) {
    $skeluar_ags=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar' and tgl_km BETWEEN '2022-09-01' AND '2022-10-01'");
  while ($data= $sql->fetch_assoc()) {
    $skeluar_sep=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar' and tgl_km BETWEEN '2022-10-01' AND '2022-11-01'");
  while ($data= $sql->fetch_assoc()) {
    $skeluar_okt=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar' and tgl_km BETWEEN '2022-11-01' AND '2022-12-01'");
  while ($data= $sql->fetch_assoc()) {
    $skeluar_nov=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar' and tgl_km BETWEEN '2022-12-01' AND '2022-01-01'");
  while ($data= $sql->fetch_assoc()) {
    $skeluar_des=$data['tot_keluar'];
  }
?>

<?php
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk from kas_masjid where jenis='Masuk'");
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


<div class="row">
          <div class="col-lg-8 col-6">
            <div class="card">

              <div class="card-header border-0">
             
                  <h3 class="card-title">Pemasukan dan Pengeluaran kas Masjid</h3>
                  
              </div>

              <div class="card-body">
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="km-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-circle text-primary"></i>Pemasukan
                  </span>

                  <span>
                    <i class="fas fa-circle text-gray"></i> Pengeluaran
                  </span>
                </div>
              </div>

            </div>
          </div>

          <div class="col-lg-4 col-6">
            <div class="card">
              <div class="card-header border-0">
           
                  <h3 class="card-title">Rekap kas Masjid saat ini</h3>
              </div>
              <div class="card-body">
               
                <!-- /.d-flex -->

                <div class="chart-responsive mb-4">
                      <canvas id="rmChart" height="210"></canvas>
                </div>

                <div class="d-flex flex-col">
                  
                  <span class="mr-1">
                    <i class="fas fa-circle text-success"></i> Pemasukan
                  </span>

                  <span class="mr-1">
                    <i class="fas fa-circle text-danger"></i> Pengeluaran
                  </span>
                  
                  <span>
                    <i class="fas fa-circle text-primary"></i> isi saldo
                  </span>
                </div>
              </div>
            </div>
          </div>
</div>
<div class="row">
          <div class="col-lg-8 h-50">
            <div class="card">

              <div class="card-header border-0">
           
                  <h3 class="card-title">Pemasukan dan Pengeluaran kas Sosial</h3>
                  
            
              </div>

              <div class="card-body">
                
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="ks-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-circle text-primary"></i> Pemasukan
                  </span>

                  <span>
                    <i class="fas fa-circle text-gray"></i> Pengeluaran                  </span>
                </div>
              </div>
              
            </div>
          </div>

          <div class="col-lg-4 col-6">
            <div class="card">
              <div class="card-header border-0">
                  <h3 class="card-title">Rekap kas Sosial saat ini</h3>   
              </div>

              <div class="card-body">
                
                <!-- /.d-flex -->

                <div class="chart-responsive mb-4">
                      <canvas id="rsChart" height="210"></canvas>
                </div>

                <div class="d-flex flex-col">
                  
                  <span class="mr-1">
                    <i class="fas fa-circle text-success"></i> Pemasukan
                  </span>

                  <span class="mr-1">
                    <i class="fas fa-circle text-danger"></i> Pengeluaran
                  </span>
                  
                  <span>
                    <i class="fas fa-circle text-primary"></i> isi saldo
                  </span>
                </div>
              </div>
            </div>
          </div>
</div>
            <!-- /.card -->

            
          
          

		<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>


<script>
  $(function() {
    'use strict'

    var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold'
    }

    var mode = 'index'
    var intersect = true

    var $kmChart = $('#km-chart')
    var kmChart = new Chart($kmChart, {
        type: 'bar',
        data: {
            labels: ['JAN','FEB','MAR','APR','MAY','JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
            datasets: [{
                    backgroundColor: '#007bff',
                    borderColor: '#007bff',
                    data: [
                      <?php echo json_encode($masuk_jan)?>,
                      <?php echo json_encode($masuk_feb)?>,
                      <?php echo json_encode($masuk_mar)?>,
                      <?php echo json_encode($masuk_apr)?>,
                      <?php echo json_encode($masuk_may)?>,
                      <?php echo json_encode($masuk_jun)?>,
                      <?php echo json_encode($masuk_jul)?>,
                      <?php echo json_encode($masuk_ags)?>,
                      <?php echo json_encode($masuk_sep)?>,
                      <?php echo json_encode($masuk_okt)?>,
                      <?php echo json_encode($masuk_nov)?>,
                      <?php echo json_encode($masuk_des)?>,
                    ]
                },
                {
                    backgroundColor: '#ced4da',
                    borderColor: '#ced4da',
                    data: [
                      <?php echo json_encode($keluar_jan)?>,
                      <?php echo json_encode($keluar_feb)?>,
                      <?php echo json_encode($keluar_mar)?>,
                      <?php echo json_encode($keluar_apr)?>,
                      <?php echo json_encode($keluar_may)?>,
                      <?php echo json_encode($keluar_jun)?>,
                      <?php echo json_encode($keluar_jul)?>,
                      <?php echo json_encode($keluar_ags)?>,
                      <?php echo json_encode($keluar_sep)?>,
                      <?php echo json_encode($keluar_okt)?>,
                      <?php echo json_encode($keluar_nov)?>,
                      <?php echo json_encode($keluar_des)?>,
                    ]
                }
               
            ]
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                mode: mode,
                intersect: intersect
            },
            hover: {
                mode: mode,
                intersect: intersect
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    // display: false,
                    gridLines: {
                        display: true,
                        lineWidth: '4px',
                        color: 'rgba(0, 0, 0, .2)',
                        zeroLineColor: 'transparent'
                    },
                    ticks: $.extend({
                        beginAtZero: true,

                        // Include a dollar sign in the ticks
                        callback: function(value) {
                            if (value <= 999000) {
                                value /= 1000
                                value += 'k';
                            }else if(value > 999000) {
                              value /= 1000000
                              value += 'jt';
                            } 

                            return 'Rp.' + value
                        }
                    }, ticksStyle)
                }],
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    },
                    ticks: ticksStyle
                }]
            }
        }
    })

    var rmChartCanvas = $('#rmChart').get(0).getContext('2d')
    var rmData = {
        labels: [
          'pengeluaran',
          'Pemasukan',
          'Saldo akhir',
          
        ],
        datasets: [
          {
            data: [
              <?php echo json_encode($keluar)?>,
              <?php echo json_encode($masuk)?>,
              <?php echo json_encode($saldo)?>,
            ],
            backgroundColor: ['#f56954', '#28dc54','#00c0ef']
          }
        ]
      }
      var rmOptions = {
        legend: {
          display: false
        }
      }
      // Create rm or douhnut chart
      // You can switch between rm and douhnut using the method below.
      // eslint-disable-next-line no-unused-vars
      var rmChart = new Chart(rmChartCanvas, {
        type: 'doughnut',
        data: rmData,
        options: rmOptions
    })
    
    var $ksChart = $('#ks-chart')
        // eslint-disable-next-line no-unused-vars
    var ksChart = new Chart($ksChart, {
        type: 'bar',
        data: {
            labels: ['JAN','FEB','MAR','APR','MAY','JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
            datasets: [{
                    backgroundColor: '#007bff',
                    borderColor: '#007bff',
                    data: [
                      <?php echo json_encode($smasuk_jan)?>,
                      <?php echo json_encode($smasuk_feb)?>,
                      <?php echo json_encode($smasuk_mar)?>,
                      <?php echo json_encode($smasuk_apr)?>,
                      <?php echo json_encode($smasuk_may)?>,
                      <?php echo json_encode($smasuk_jun)?>,
                      <?php echo json_encode($smasuk_jul)?>,
                      <?php echo json_encode($smasuk_ags)?>,
                      <?php echo json_encode($smasuk_sep)?>,
                      <?php echo json_encode($smasuk_okt)?>,
                      <?php echo json_encode($smasuk_nov)?>,
                      <?php echo json_encode($smasuk_des)?>,
                    ]
                },
                {
                    backgroundColor: '#ced4da',
                    borderColor: '#ced4da',
                    data: [
                      <?php echo json_encode($skeluar_jan)?>,
                      <?php echo json_encode($skeluar_feb)?>,
                      <?php echo json_encode($skeluar_mar)?>,
                      <?php echo json_encode($skeluar_apr)?>,
                      <?php echo json_encode($skeluar_may)?>,
                      <?php echo json_encode($skeluar_jun)?>,
                      <?php echo json_encode($skeluar_jul)?>,
                      <?php echo json_encode($skeluar_ags)?>,
                      <?php echo json_encode($skeluar_sep)?>,
                      <?php echo json_encode($skeluar_okt)?>,
                      <?php echo json_encode($skeluar_nov)?>,
                      <?php echo json_encode($skeluar_des)?>,
                    ]
                }
                
            ]
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                mode: mode,
                intersect: intersect
            },
            hover: {
                mode: mode,
                intersect: intersect
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    // display: false,
                    gridLines: {
                        display: true,
                        lineWidth: '4px',
                        color: 'rgba(0, 0, 0, .2)',
                        zeroLineColor: 'transparent'
                    },
                    ticks: $.extend({
                        beginAtZero: true,

                        // Include a dollar sign in the ticks
                        callback: function(value) {
                            if (value <= 999000) {
                                value /= 1000
                                value += 'k';
                            }else if(value > 999000) {
                              value /= 1000000
                              value += 'jt';
                            } 

                            return 'Rp.' + value
                        }
                    }, ticksStyle)
                }],
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    },
                    ticks: ticksStyle
                }]
            }
        }
    }) 

    var rsChartCanvas = $('#rsChart').get(0).getContext('2d')
    var rsData = {
        labels: [
          'pengeluaran',
          'Pemasukan',
          'Saldo akhir',
          
        ],
        datasets: [
          {
            data: [<?php echo json_encode($skeluar)?>,<?php echo json_encode($smasuk)?>,<?php echo json_encode($ssaldo)?>],
            backgroundColor: ['#f56954', '#28dc54','#00c0ef']
          }
        ]
      }
      var rsOptions = {
        legend: {
          display: false
        }
      }
      // Create rs or douhnut chart
      // You can switch between rs and douhnut using the method below.
      // eslint-disable-next-line no-unused-vars
      var rsChart = new Chart(rsChartCanvas, {
        type: 'doughnut',
        data: rsData,
        options: rsOptions
    })

})
</script>