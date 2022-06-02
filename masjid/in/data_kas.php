<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h5>
		<i class="icon fas fa-info"></i> Total Pemasukan Masjid
	</h5>
	<?php
	$sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk'");
	while ($data = $sql->fetch_assoc()) {
	?>
		<h2>
		<?php echo rupiah($data['tot_masuk']);
	} ?>
		</h2>

</div>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Kas Masjid Masuk
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div class="row">
				<div class="col-8">
					<div>
						<a href="?page=i_add_km" class="btn btn-primary">
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
							<button type="submit" name="submit" href="http://localhost/kas-masjid/data_km.php" class="btn btn-primary">
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
						$sql = $koneksi->query("select * from kas_masjid where uraian_km LIKE '%$srch%' AND jenis='Masuk' OR tgl_km LIKE '%$srch%' AND jenis='Masuk'");


						if ($data = $sql->fetch_assoc()) {
							$sql = $koneksi->query("select * from kas_masjid where uraian_km LIKE '%$srch%' AND jenis='Masuk' OR tgl_km LIKE '%$srch%' AND jenis='Masuk'");

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
										<?php echo rupiah($data['masuk']); ?>
									</td>
									<td>
										<a href="?page=i_edit_km&kode=<?php echo $data['id_km']; ?>" title="Ubah" class="btn shadow  btn-outline-success btn-sm">
											edit
										</a>
										<a href="?page=i_del_km&kode=<?php echo $data['id_km']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn shadow  btn-outline-danger btn-sm">
											delete
										</a>
									</td>
								</tr>


							<?php
							}
						} else {
							$sql = $koneksi->query("select * from kas_masjid where jenis='Masuk'");
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
										<?php echo rupiah($data['masuk']); ?>
									</td>
									<td>
										<a href="?page=i_edit_km&kode=<?php echo $data['id_km']; ?>" title="Ubah" class="btn shadow  btn-outline-success btn-sm">
											edit
										</a>
										<a href="?page=i_del_km&kode=<?php echo $data['id_km']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn shadow  btn-outline-danger btn-sm">
											delete
										</a>
									</td>
								</tr>


					<?php
							}
						}
					} else {
						$sql = $koneksi->query("select * from kas_masjid where jenis='Masuk'");
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
									<?php echo rupiah($data['masuk']); ?>
								</td>
								<td>
									<a href="?page=i_edit_km&kode=<?php echo $data['id_km']; ?>" title="Ubah" class="btn shadow  btn-outline-success btn-sm">
										edit
									</a>
									<a href="?page=i_del_km&kode=<?php echo $data['id_km']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn shadow  btn-outline-danger btn-sm">
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