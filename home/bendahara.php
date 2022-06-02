<?php
  $data_nama = $_SESSION["ses_nama"];
  $data_level = $_SESSION["ses_level"];

  $sql = $koneksi->query("SELECT COUNT(id_pengguna) as pengguna from tb_pengguna");
    while ($data= $sql->fetch_assoc()) {
      $jml=$data['pengguna'];
  }
?>

<?php

 $sql = $koneksi->query("SELECT MONTHNAME(tgl_ks) as bln_masuk_ks, SUM(masuk) as pemasukan_ks from kas_sosial where jenis='Masuk' and month(CURDATE()) GROUP BY bln_masuk_ks");
 foreach ($sql as $data) {
   $blnmskks[] = $data['bln_masuk_ks'];
   $masukks[] = $data['pemasukan_ks'];
   
 }
 $sql = $koneksi->query("SELECT MONTHNAME(tgl_ks) as bln_keluar_ks, SUM(keluar) as pengeluaran_ks from kas_sosial where jenis='Keluar' GROUP BY bln_keluar_ks");
 foreach ($sql as $data) {
   $blnklrks[] = $data['bln_keluar_ks'];
   $keluarks[] = $data['pengeluaran_ks'];
   
 }
 
?>

<!-- bar chart kas pemasukan masjid -->
<?php
  require 'vendor/autoload.php';
  use  Carbon\Carbon;
  $this_year = Carbon::now()->format('Y');
        $result_km = $koneksi->query("SELECT * from kas_masjid where tgl_km like '%{$this_year}%'");
        $data_km=[];
        $dataaa_km=[];
        while($row = $result_km -> fetch_array(MYSQLI_ASSOC)){
            $dataaa_km["masuk"]=$row["masuk"]; 
            $dataaa_km["keluar"]=$row["keluar"]; 
            $dataaa_km["tgl_km"]=$row["tgl_km"];
            $data_km[]=$dataaa_km;
            
          }

          // var_dump($data);
          for($i=1;$i<=12;$i++){
            $data_month_masuk_km[$i]=0;
            $data_mont_keluar_km[$i]=0;
          }
          $data_fix=[];
          foreach ($data_km as $m){
            $month_km = explode('-',Carbon::parse($m["tgl_km"])->format('Y-m-d'))[1];
            $data_month_masuk_km[(int)$month_km]+=$m['masuk'];
            $data_mont_keluar_km[(int) $month_km]=$m['keluar'];
        
          }
      
        $result_ks = $koneksi->query("SELECT * from kas_sosial where tgl_ks like '%{$this_year}%'");
        $data_ks=[];
        $dataaa_ks=[];
        while($row = $result_ks -> fetch_array(MYSQLI_ASSOC)){
            $dataaa_ks["masuk"]=$row["masuk"]; 
            $dataaa_ks["keluar"]=$row["keluar"]; 
            $dataaa_ks["tgl_ks"]=$row["tgl_ks"];
            $data_ks[]=$dataaa_ks;
            
          }
  
          // var_dump($data);
          for($i=1;$i<=12;$i++){
            $data_month_masuk_ks[$i]=0;
            $data_mont_keluar_ks[$i]=0;
          }
          $data_fix=[];
          foreach ($data_ks as $s){
            $month_ks = explode('-',Carbon::parse($s["tgl_ks"])->format('Y-m-d'))[1];
            $data_month_masuk_ks[(int)$month_ks]+=$s['masuk'];
            $data_mont_keluar_ks[(int) $month_ks]=$s['keluar'];
   
          }
        
 
?>

<!-- bar chart kas pengeluaran masjid -->
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

<!-- bar chart kas pemasukan sosial -->
<?php
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_sosial where jenis='Masuk' and tgl_ks BETWEEN '2022-01-01' AND '2022-02-01'");
  while ($data= $sql->fetch_assoc()) {
    $smasuk_jan=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_sosial where jenis='Masuk' and tgl_ks BETWEEN '2022-02-01' AND '2022-03-01'");
  while ($data= $sql->fetch_assoc()) {
    $smasuk_feb=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_sosial where jenis='Masuk' and tgl_ks BETWEEN '2022-03-01' AND '2022-04-01'");
  while ($data= $sql->fetch_assoc()) {
    $smasuk_mar=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_sosial where jenis='Masuk' and tgl_ks BETWEEN '2022-04-01' AND '2022-05-01'");
  while ($data= $sql->fetch_assoc()) {
    $smasuk_apr=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_sosial where jenis='Masuk' and tgl_ks BETWEEN '2022-05-01' AND '2022-06-01'");
  while ($data= $sql->fetch_assoc()) {
    $smasuk_may=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_sosial where jenis='Masuk' and tgl_ks BETWEEN '2022-06-01' AND '2022-07-01'");
  while ($data= $sql->fetch_assoc()) {
    $smasuk_jun=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_sosial where jenis='Masuk' and tgl_ks BETWEEN '2022-07-01' AND '2022-08-01'");
  while ($data= $sql->fetch_assoc()) {
    $smasuk_jul=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_sosial where jenis='Masuk' and tgl_ks BETWEEN '2022-08-01' AND '2022-09-01'");
  while ($data= $sql->fetch_assoc()) {
    $smasuk_ags=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_sosial where jenis='Masuk' and tgl_ks BETWEEN '2022-09-01' AND '2022-10-01'");
  while ($data= $sql->fetch_assoc()) {
    $smasuk_sep=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_sosial where jenis='Masuk' and tgl_ks BETWEEN '2022-10-01' AND '2022-11-01'");
  while ($data= $sql->fetch_assoc()) {
    $smasuk_okt=$data['tot_masuk'];
  }$sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_sosial where jenis='Masuk' and tgl_ks BETWEEN '2022-11-01' AND '2022-12-01'");
  while ($data= $sql->fetch_assoc()) {
    $smasuk_nov=$data['tot_masuk'];
  }
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_sosial where jenis='Masuk' and tgl_ks BETWEEN '2022-12-01' AND '2022-01-01'");
  while ($data= $sql->fetch_assoc()) {
    $smasuk_des=$data['tot_masuk'];
  }
?>

<!-- bar chart kas pengeluaran sosial -->
<?php
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_sosial where jenis='Keluar' and tgl_ks BETWEEN '2022-01-01' AND '2022-02-01'");
  while ($data= $sql->fetch_assoc()) {
    $skeluar_jan=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_sosial where jenis='Keluar' and tgl_ks BETWEEN '2022-02-01' AND '2022-03-01'");
  while ($data= $sql->fetch_assoc()) {
    $skeluar_feb=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_sosial where jenis='Keluar' and tgl_ks BETWEEN '2022-03-01' AND '2022-04-01'");
  while ($data= $sql->fetch_assoc()) {
    $skeluar_mar=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_sosial where jenis='Keluar' and tgl_ks BETWEEN '2022-04-01' AND '2022-05-01'");
  while ($data= $sql->fetch_assoc()) {
    $skeluar_apr=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_sosial where jenis='Keluar' and tgl_ks BETWEEN '2022-05-01' AND '2022-06-01'");
  while ($data= $sql->fetch_assoc()) {
    $skeluar_may=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_sosial where jenis='Keluar' and tgl_ks BETWEEN '2022-06-01' AND '2022-07-01'");
  while ($data= $sql->fetch_assoc()) {
    $skeluar_jun=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_sosial where jenis='Keluar' and tgl_ks BETWEEN '2022-07-01' AND '2022-08-01'");
  while ($data= $sql->fetch_assoc()) {
    $skeluar_jul=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_sosial where jenis='Keluar' and tgl_ks BETWEEN '2022-08-01' AND '2022-09-01'");
  while ($data= $sql->fetch_assoc()) {
    $skeluar_ags=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_sosial where jenis='Keluar' and tgl_ks BETWEEN '2022-09-01' AND '2022-10-01'");
  while ($data= $sql->fetch_assoc()) {
    $skeluar_sep=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_sosial where jenis='Keluar' and tgl_ks BETWEEN '2022-10-01' AND '2022-11-01'");
  while ($data= $sql->fetch_assoc()) {
    $skeluar_okt=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_sosial where jenis='Keluar' and tgl_ks BETWEEN '2022-11-01' AND '2022-12-01'");
  while ($data= $sql->fetch_assoc()) {
    $skeluar_nov=$data['tot_keluar'];
  }
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_sosial where jenis='Keluar' and tgl_ks BETWEEN '2022-12-01' AND '2022-01-01'");
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
          

          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                  <h3 class="card-title">Rekap kas Masjid saat ini</h3>
                  <br/>
                  <h4 class="card-title d-flex">Saldo saat ini: <?php echo rupiah($saldo)?></h4>
              </div>
              <div class="card-body">           
                <!-- /.d-flex -->
                <div class="d-flex flex-cols justify-content-center">
                  <div class="row">
                    <div class="col-8 p-0 m-0">
                      <span>
                        <div class="chart-responsive">
                            <canvas id="rmChart" height="180"></canvas>
                        </div>
                      </span>
                    </div>
                    <div class="col-4">
                      <i class="fas fa-circle" style="color:#64dfdf;"></i>Pemasukan
                      <br/>
                      <i class="fas fa-circle" style="color:#168aad;"></i>Pengeluaran
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                  <h3 class="card-title">Rekap kas Sosial saat ini</h3>
                  <br/>
                  <h4 class="card-title d-flex">Saldo saat ini: <?php echo rupiah($ssaldo)?></h4>
              </div>
              <div class="card-body">           
                <!-- /.d-flex -->
                <div class="d-flex flex-cols justify-content-center">
                  <div class="row">
                    <div class="col-8 p-0 m-0">
                      <span>
                        <div class="chart-responsive">
                            <canvas id="rsChart" height="180"></canvas>
                        </div>
                      </span>
                    </div>
                    <div class="col-4">
                      <i class="fas fa-circle" style="color:#64dfdf;"></i> Pemasukan
                      <br/>
                      <i class="fas fa-circle" style="color:#168aad;"></i> Pengeluaran
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
</div>
<div class="row">
          <div class="col-lg-6">
            <div class="card">

              <div class="card-header border-0">
             
                  <h3 class="card-title">Pemasukan dan Pengeluaran kas Masjid</h3><br/>
                  
                  
              </div>

              <div class="card-body">
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="km-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                <span class="mr-2">
                    <i class="fas fa-circle" style="color:#64dfdf;"></i> Pemasukan
                  </span>

                  <span>
                    <i class="fas fa-circle" style="color:#168aad"></i> Pengeluaran
                  </span>
                </div>
              </div>

            </div>
          </div>

          <div class="col-lg-6">
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
                    <i class="fas fa-circle" style="color:#64dfdf;"></i> Pemasukan
                  </span>

                  <span>
                    <i class="fas fa-circle" style="color:#168aad"></i> Pengeluaran
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
    
    //ini bar chart kas masjid
    var $kmChart = $('#km-chart')
    var kmChart = new Chart($kmChart, {
        type: 'bar',
           data: {
            labels: ['JAN','FEB','MAR','APR','MAY','JUN','JUL','AGS','SEP','OKT','NOV','DES'],
           //cari bar yang double gt dah bro
           //double data set nya kak?
            datasets: [
                
              {
                    backgroundColor: '#64dfdf',
                    borderColor: '#64dfdf',
                    data: [<?php
                    foreach($data_month_masuk_km as $dm => $value){
                      echo $value.',';
                    }
                    ?>]
                },{
                    backgroundColor: '#168AAD',
                    borderColor: '#168AAD',
                    
                    data: [<?php
                    foreach($data_mont_keluar_km as $dm => $value){
                      echo $value.',';
                    }
                    ?>]
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
          'Pemasukan',
          'pengeluaran',
          
        ],
        datasets: [
          {
            data: [
              <?php echo json_encode($masuk)?>,
              <?php echo json_encode($keluar)?>,
            ],
            backgroundColor: ['#64dfdf', '#168aad']
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
    
    //ini bar chart kas sosial
    var $ksChart = $('#ks-chart')
    var ksChart = new Chart($ksChart, {
        type: 'bar',
        data: {
            labels: ['JAN','FEB','MAR','APR','MAY','JUN','JUL','AGS','SEP','OKT','NOV','DES'],
            datasets: [
                
              {
                    backgroundColor: '#64dfdf',
                    borderColor: '#64dfdf',
                    data: [<?php
                    foreach($data_month_masuk_ks as $ds => $value){
                      echo $value.',';
                    }
                    ?>]
                },{
                    backgroundColor: '#168AAD',
                    borderColor: '#168AAD',
                    
                    data: [<?php
                    foreach($data_mont_keluar_ks as $ds => $value){
                      echo $value.',';
                    }
                    ?>]
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
          'Pemasukan',
          'Pengeluaran', 
        ],
        datasets: [
          {
            data: [
              <?php echo json_encode($smasuk)?>,
              <?php echo json_encode($skeluar)?>,
            ],
            backgroundColor: ['#64dfdf', '#168aad']
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
</script>p