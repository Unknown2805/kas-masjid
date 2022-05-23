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


<div class="row">
          <div class="col-lg-8 col-6">
            <div class="card">

              <div class="card-header border-0">
             
                  <h3 class="card-title">Pemasukan dan Pengeluaran kas Masjid</h3>
                  
              </div>

              <div class="card-body">
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="ali-chart" height="200"></canvas>
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
           
                  <h3 class="card-title">Rekap kas Masjid bulan ini</h3>
              </div>
              <div class="card-body">
               
                <!-- /.d-flex -->

                <div class="chart-responsive mb-4">
                      <canvas id="alisChart" height="210"></canvas>
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
                  <canvas id="deleps-chart" height="200"></canvas>
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
                  <h3 class="card-title">Rekap kas Sosial bulan ini</h3>   
              </div>

              <div class="card-body">
                
                <!-- /.d-flex -->

                <div class="chart-responsive mb-4">
                      <canvas id="delepsChart" height="210"></canvas>
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

    var $aliChart = $('#ali-chart')
        // eslint-disable-next-line no-unused-vars
    var aliChart = new Chart($aliChart, {
        type: 'bar',
        data: {
            labels: ['JAN','FEB','MAR','APR','MAY','JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
            datasets: [{
                    backgroundColor: '#007bff',
                    borderColor: '#007bff',
                    data: [1000, 2000, 3000, 4000, 4000, 4000, 4000, 4000, 4000,3000,2000,1000]
                },
                {
                    backgroundColor: '#ced4da',
                    borderColor: '#ced4da',
                    data: [800, 1800, 2800, 3800, 3800, 3800, 3800, 3800, 3800,2800,1800,800]
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
                            if (value >= 1000) {
                                value /= 1000
                                value += 'k'
                            }

                            return '$' + value
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

    var alisChartCanvas = $('#alisChart').get(0).getContext('2d')
    var alisData = {
        labels: [
          'pengeluaran',
          'Pemasukan',
          'Saldo akhir',
          
        ],
        datasets: [
          {
            data: [200,700,500],
            backgroundColor: ['#f56954', '#25be3b','#00c0ef']
          }
        ]
      }
      var alisOptions = {
        legend: {
          display: false
        }
      }
      // Create alis or douhnut chart
      // You can switch between alis and douhnut using the method below.
      // eslint-disable-next-line no-unused-vars
      var alisChart = new Chart(alisChartCanvas, {
        type: 'doughnut',
        data: alisData,
        options: alisOptions
    })
    
    var delepsChartCanvas = $('#delepsChart').get(0).getContext('2d')
    var delepsData = {
        labels: [
          'pengeluaran',
          'Pemasukan',
          'Saldo akhir',
          
        ],
        datasets: [
          {
            data: [200,700,500],
            backgroundColor: ['#f56954', '#25be3b','#00c0ef']
          }
        ]
      }
      var delepsOptions = {
        legend: {
          display: false
        }
      }
      // Create deleps or douhnut chart
      // You can switch between deleps and douhnut using the method below.
      // eslint-disable-next-line no-unused-vars
      var delepsChart = new Chart(delepsChartCanvas, {
        type: 'doughnut',
        data: delepsData,
        options: delepsOptions
    })

    var $delepsChart = $('#deleps-chart')
        // eslint-disable-next-line no-unused-vars
    var delepsChart = new Chart($delepsChart, {
        type: 'bar',
        data: {
            labels: ['JAN','FEB','MAR','APR','MAY','JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
            datasets: [{
                    backgroundColor: '#007bff',
                    borderColor: '#007bff',
                    data: [1000, 2000, 3000, 4000, 4000, 4000, 4000, 4000, 4000,3000,2000,1000]
                },
                {
                    backgroundColor: '#ced4da',
                    borderColor: '#ced4da',
                    data: [800, 1800, 2800, 3800, 3800, 3800, 3800, 3800, 3800,2800,1800,800]
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
                            if (value >= 1000) {
                                value /= 1000
                                value += 'k'
                            }

                            return '$' + value
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
})
</script>