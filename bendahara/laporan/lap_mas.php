<div class="card card-secondary">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-file"></i> Laporan Kas Masjid</h3>
  </div>
  <form action="./report/kas_masjid_per.php" method="post" enctype="multipart/form-data" target="_blank">
    <div class="card-body">

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tanggal Awal</label>
        <div class="col-sm-4">
          <input type="date" class="form-control" id="tgl_1" name="tgl_1">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tanggal Akhir</label>
        <div class="col-sm-4">
          <input type="date" class="form-control" id="tgl_2" name="tgl_2">
        </div>
      </div>

    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-info" name="btnCetak" target="_blank">Cetak Periode</button>
      <a href="./report/kas_masjid_full.php" class="btn btn-primary" target="_blank">Cetak Semua</a>
    </div>
  </form>
</div>
