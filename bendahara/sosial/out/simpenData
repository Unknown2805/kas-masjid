<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h5>
		<i class="icon fas fa-info"></i> Total Pengeluaran Sosial</h5>
	<?php
    $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_sosial where jenis='Keluar'");
    while ($data= $sql->fetch_assoc()) {
  ?>
	<h2>
		<?php echo rupiah($data['tot_keluar']); ?>
	</h2>
	<?php
    }
  ?>
</div>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Kas Sosial Keluar</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=o_add_ks" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Uraian</th>
						<th>Jumlah</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
              $sql = $koneksi->query("select * from kas_sosial where jenis='Keluar' order by tgl_ks desc");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php  $tgl = $data['tgl_ks']; echo date("d/M/Y", strtotime($tgl))?>
						</td>
						<td>
							<?php echo $data['uraian_ks']; ?>
						</td>
						<td align="right">
							<?php echo rupiah($data['keluar']); ?>
						</td>
						<td>
							<a href="?page=o_edit_ks&kode=<?php echo $data['id_ks']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=o_del_ks&kode=<?php echo $data['id_ks']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
								</>
						</td>
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->