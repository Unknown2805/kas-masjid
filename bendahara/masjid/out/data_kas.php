<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h5>
		<i class="icon fas fa-info"></i> Total Pengeluaran Masjid
	</h5>
	<?php
	$sql = $koneksi->query("SELECT SUM(Keluar) as tot_Keluar  from kas_masjid where jenis='Keluar'");
	while ($data = $sql->fetch_assoc()) {
	?>
		<h2>
		<?php echo rupiah($data['tot_Keluar']);
	} ?>
		</h2>

</div>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Kas Masjid Keluar
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div class="row">
				<div class="col-8">
					<div>
						<a href="?page=o_add_km" class="btn btn-primary">
							<i class="fa fa-edit"></i> Tambah Data</a>
					</div>
				</div>

				<div class="col-4 float-right">

					<form method="post">
						<div class="input-group">
							<div id="search-autocomplete" class="form-outline" style="margin-right:5px">
								<!-- <label class="form-label" for="form1">Search</label> -->
								<input type="text" name="search" id="form1" class="form-control" />
							</div>
							<button type="submit" name="submit" href="http://localhost/kas-masjid/?page=o_data_km" class="btn btn-primary">
								<i class="fas fa-search"></i>
							</button>
						</div>

					</form>

				</div>
			</div>

			<br>

			<table id="example1" class="table table-hover">

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



					if (isset($_POST["submit"])) {
						$srch = $_POST["search"];
						$no = 1;
						$sql = $koneksi->query("select * from kas_masjid where uraian_km = '$srch'");


						if ($data = $sql->fetch_assoc()) {
							$sql = $koneksi->query("select * from kas_masjid where uraian_km = '$srch'");

							while ($data = $sql->fetch_assoc()) {
					?>



								<tr>

									<td>
										<?php echo $no++; ?>
									</td>
									<td>
										<?php $tgl = $data['tgl_km'];
										echo date("d/M/Y", strtotime($tgl)) ?>
									</td>
									<td>
										<?php echo $data['uraian_km']; ?>
									</td>
									<td align="right">
										<?php echo rupiah($data['keluar']); ?>
									</td>
									<td>
										<a href="?page=o_edit_ks&kode=<?php echo $data['id_ks']; ?>" title="Ubah" class="btn btn-success btn-sm">
											edit
										</a>
										<a href="?page=o_del_ks&kode=<?php echo $data['id_ks']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn shadow btn-outline-danger btn-sm">
											delete
										</a>
									</td>
								</tr>


							<?php
							}
						} else {
							$sql = $koneksi->query("select * from kas_masjid where jenis='Keluar' order by tgl_km desc");
							$no = 1;
							while ($data = $sql->fetch_assoc()) {
							?>
								<tr>

									<td>
										<?php echo $no++; ?>
									</td>
									<td>
										<?php $tgl = $data['tgl_km'];
										echo date("d/M/Y", strtotime($tgl)) ?>
									</td>
									<td>
										<?php echo $data['uraian_km']; ?>
									</td>
									<td align="right">
										<?php echo rupiah($data['keluar']); ?>
									</td>
									<td>
										<a href="?page=o_edit_km&kode=<?php echo $data['id_km']; ?>" title="Ubah" class="btn shadow  btn-outline-success btn-sm">
											edit
										</a>
										<a href="?page=o_del_km&kode=<?php echo $data['id_km']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn shadow  btn-outline-danger btn-sm">
											delete
										</a>
									</td>
								</tr>


							<?php
							}
						}
					} else {
						$sql = $koneksi->query("select * from kas_masjid where jenis='Keluar' order by tgl_km desc");
						$no = 1;
						while ($data = $sql->fetch_assoc()) {
							?>
							<tr>

								<td>
									<?php echo $no++; ?>
								</td>
								<td>
									<?php $tgl = $data['tgl_km'];
									echo date("d/M/Y", strtotime($tgl)) ?>
								</td>
								<td>
									<?php echo $data['uraian_km']; ?>
								</td>
								<td align="right">
									<?php echo rupiah($data['keluar']); ?>
								</td>
								<td>
									<a href="?page=o_edit_km&kode=<?php echo $data['id_km']; ?>" title="Ubah" class="btn shadow  btn-outline-success btn-sm">
										edit
									</a>
									<a href="?page=o_del_km&kode=<?php echo $data['id_km']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn shadow  btn-outline-danger btn-sm">
										delete
									</a>
								</td>
							</tr>


					<?php
						}
					}


					?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- /.card-body -->