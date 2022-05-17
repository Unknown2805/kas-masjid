<?php
include "../inc/koneksi.php";

//FUNGSI RUPIAH
include "../inc/rupiah.php";
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

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Laporan Kas Masjid</title>
</head>
<body>
<center>
<h2>Laporan Rekapitulasi Kas Masjid</h2>
<h3>Masjid Darul 'Ilmi Universitas Muria Kudus</h3>
<p>________________________________________________________________________</p>

  <table border="1" cellspacing="0">
    <thead>
      <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Uraian</th>
            <th>Pemasukan</th>
            <th>Pengeluaran</th>
      </tr>
    </thead>
    <tbody>
        <?php

            $no=1;
            $sql_tampil = "select * from kas_masjid order by tgl_km asc";
            $query_tampil = mysqli_query($koneksi, $sql_tampil);
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
        ?>
         <tr>
            <td><?php echo $no; ?></td>
            <td><?php  $tgl = $data['tgl_km']; echo date("d/M/Y", strtotime($tgl))?></td> 
            <td><?php echo $data['uraian_km']; ?></td>
            <td align="right"><?php echo rupiah($data['masuk']); ?></td>  
            <td align="right"><?php echo rupiah($data['keluar']); ?></td>   
        </tr>
        <?php
            $no++;
            }
        ?>
    </tbody>
    <tr>
        <td colspan="3">Total Pemasukan</td>
        <td colspan="2"><?php echo rupiah($masuk); ?></td>
    </tr>
    <tr>
        <td colspan="4">Total Pengeluaran</td>
        <td><?php echo rupiah($keluar); ?></td>
    </tr>
    <tr>
        <td colspan="3">Saldo Kas Masjid</td>
        <td colspan="2"><?php echo rupiah($saldo); ?></td>
    </tr>
  </table>
</center>

<script>
    window.print();
</script>
</body>
</html>