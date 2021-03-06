<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html>
<head>
	<title>Data Anggota Himakom</title>
	<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet"> 
	<script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/crud.js'); ?>"></script>
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h1>Dashboard <small>Data Anggota Himakom</small></h1>
		</div>

		<div class="btn-group">
			<a href="<?php echo site_url('anggota/edit_profile');?>" class="button btn btn-default">Ubah Data Pribadi</a>
			<a href="<?php echo site_url('anggota/change_password');?>" class="button btn btn-default">Ganti Password</a>
			<a href="#" class="button btn btn-default">Tambah Riwayat Pendidikan</a>
			<a href="#" class="button btn btn-default">Lihat Kegiatan</a>
			<a href="<?php echo site_url('anggota/logout') ;?>" class="button btn btn-default">Logout</a>
		</div>

		<hr>
		<!--Start Row -->
		<div class="row">
			<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title text-center">Data Pribadi</h3>
					</div>
					<div class="panel-body">
						<table class="table table-hover">
							<thead>
								<tr>
									<th width="30%"></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>NIM</td>
									<td><strong><?php echo $anggota->NIM ;?></strong></td>
								</tr>
								<tr>
									<td>Nama Lengkap</td>
									<td><strong><?php echo $anggota->NAMA_LENGKAP ;?></strong></td>
								</tr>
								<tr>
									<td>Nama Panggilan</td>
									<td><strong><?php echo $anggota->NAMA_PANGGILAN ;?></strong></td>
								</tr>
								<tr>
									<td>Nama Bagus</td>
									<td><strong><?php echo $anggota->NAMA_BAGUS ;?></strong></td>
								</tr>
								
								<tr>
									<td>Kelas</td>
									<td><strong><?php echo $anggota->NAMA_KELAS." ".$anggota->ID_PS ;?></strong></td>
								</tr>
								<tr>
									<td>Tempat, Tanggal Lahir</td>
									<td><strong><?php echo $anggota->TEMPAT_LAHIR.", ".date_format(date_create($anggota->TANGGAL_LAHIR), 'd F Y') ;?></strong></td>

								</tr>
								
								<tr>
									<td>Alamat Asal</td>
									<td><strong><?php echo $anggota->ALAMAT_ASAL ;?></strong></td>
								</tr>
								<tr>
									<td>Alamat Sekarang</td>
									<td><strong><?php echo $anggota->ALAMAT_SEKARANG ;?></strong></td>
								</tr>	
							</tbody>
						</table>
					</div>
					<div class="panel-footer">
						<button class="btn btn-default">Ubah Data Pribadi</button>
					</div>
				</div> <!--End Panel data pribadi -->
			</div> <!-- End Col Data Pribadi -->
			
			<div class="col-md-5">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title text-center">Kontak</h3>
					</div>
					<div class="panel-body">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th class="text-center">Detil Kontak</th>
								</tr>
							</thead>
							<tbody id="tableBodyKontak">
							<?php foreach ($kontak as $row) : ?>
								<tr>
									<td><?=$row->DETIL_KONTAK?></td>
								</tr>
							<?php endforeach ;?>								
							</tbody>
						</table>
						
					</div>

					<div class="panel-footer">
						<button type="button" class="btn btn-default" id="btnAddContact">Tambah Kontak</button>
					</div>
				</div> <!--End Panel Kontak -->
			</div> <!-- End Col Kontak -->	
		</div> <!-- End Row -->

		<!-- Row for Riwayat -->
		<div class="row">
			<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title text-center">Riwayat Pendidikan</h3>
					</div>
					<div class="panel-body">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Jenjang Pendidikan</th>
									<th>Nama Institusi</th>
									<th>Tahun Masuk - Tahun Lulus</th>
									<th>Bidang Pendidikan</th>
									<th></th>
									<th></th>
								</tr>
							</thead>

							<tbody id="tableBodyRiwayatPendidikan">
							<?php foreach ($riwayat_pendidikan as $row) :?>
								<tr>
									<td><?php echo $row->JENJANG_PENDIDIKAN; ?></td>
									<td><?php echo $row->NAMA_INSTITUSI_PENDIDIKAN; ?></td>
									<td><?php echo $row->TAHUN_MASUK_PENDIDIKAN." - ".$row->TAHUN_LULUS_PENDIDIKAN; ?></td>
									<td><?php echo $row->BIDANG_PENDIDIKAN; ?></td>
									<td><a href="<?php echo site_url('anggota/update_riwayat_pendidikan'.'/'.$row->NO_URUT_PENDIDIKAN); ?>" class="btn btn-sm btn-info">edit</a></td>
									<td><a href="<?php echo site_url('anggota/delete_riwayat_pendidikan'.'/'.$row->NO_URUT_PENDIDIKAN); ?>" class="btn btn-sm btn-danger">delete</a></td>
								</tr>
							<?php endforeach ; ?>
							</tbody>
						</table>
					</div>
					<div class="panel-footer">
						<a href="<?php echo site_url('anggota/add_riwayat_pendidikan');?>" class="button btn btn-default">Tambah Riwayat</a>
					</div>
				</div>
			</div>
		</div> <!-- end row of riwayat -->


		<!-- Riwayat Organisasi -->
		<div class="row">
			<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title text-center">Riwayat Organisasi</h3>
					</div>
					<div class="panel-body">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Nama Organisasi</th>
									<th>Jabatan</th>
									<th>Tahun Mulai - Tahun Selesai</th>
									<th>Organisasi Kemahasiswaan</th>
									<th></th>
									<th></th>
								</tr>
							</thead>

							<tbody id="tableBodyRiwayatOrganisasi">
							<?php foreach ($riwayat_org as $row) :?>
								<tr>
									<td><?php echo $row->NAMA_ORG; ?></td>
									<td><?php echo $row->JABATAN_ORG; ?></td>
									<td><?php echo $row->TAHUN_MULAI_ORG." - ".$row->TAHUN_SELESAI_ORG; ?></td>
									<td><?php echo $row->ORG_KEMAHASISWAAN; ?></td>
									<td><a href="<?php echo site_url('anggota/update_riwayat_org'.'/'.$row->NO_URUT_ORG); ?>" class="btn btn-sm btn-info">edit</a></td>
									<td><a href="<?php echo site_url('anggota/delete_riwayat_org'.'/'.$row->NO_URUT_ORG); ?>" class="btn btn-sm btn-danger">delete</a></td>
								</tr>
							<?php endforeach ; ?>
							</tbody>
						</table>
					</div>
					<div class="panel-footer">
						<a href="<?php echo site_url('anggota/add_riwayat_org');?>" class="button btn btn-default">Tambah Riwayat</a>
					</div>
				</div>
			</div>
		</div> <!-- end row of riwayat organisasi-->


		<!-- Riwayat Prestasi -->
		<div class="row">
			<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title text-center">Riwayat Prestasi</h3>
					</div>
					<div class="panel-body">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Tingkat Prestasi</th>
									<th>Nama Prestasi</th>
									<th>Pencapaian Prestasi</th>
									<th>Lembaga Prestasi</th>
									<th>Tahun Prestasi</th>
									<th>Jenis Prestasi</th>
									<th></th>
									<th></th>
								</tr>
							</thead>

							<tbody id="tableBodyRiwayatPrestasi">
							<?php foreach($riwayat_prestasi as $row) : ?>
								<tr>
									<td><?php echo $row->ID_TINGKAT_PRESTASI; ?></td>
									<td><?php echo $row->NAMA_PRESTASI; ?></td>
									<td><?php echo $row->PENCAPAIAN_PRESTASI; ?></td>
									<td><?php echo $row->LEMBAGA_PRESTASI; ?></td>
									<td><?php echo $row->TAHUN_PRESTASI; ?></td>
									<td><?php echo $row->JENIS_PRESTASI; ?></td>
									<td><a href="<?php echo site_url('anggota/update_riwayat_prestasi'.'/'.$row->NO_URUT_PRESTASI); ?>" class="btn btn-sm btn-info">edit</a></td>
									<td><a href="<?php echo site_url('anggota/delete_riwayat_prestasi'.'/'.$row->NO_URUT_PRESTASI); ?>" class="btn btn-sm btn-danger">delete</a></td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					<div class="panel-footer">
						<a href="<?php echo site_url('anggota/add_riwayat_prestasi');?>" class="button btn btn-default">Tambah Riwayat</a>
					</div>
				</div>
			</div>
		</div> <!-- end row of riwayat organisasi-->


		<!-- Riwayat Kepanitiaan -->
		<div class="row">
			<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title text-center">Riwayat Kepanitiaan</h3>
					</div>
					<div class="panel-body">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Nama Kegiatan</th>
									<th>Nama Organisasi</th>
									<th>Jabatan</th>
									<th>Tahun Kepanitiaan</th>
									<th>Kepanitiaan Kemahasiswaan</th>
									<th></th>
									<th></th>
								</tr>
							</thead>

							<tbody id="tableBodyRiwayatKepanitiaan">
							<?php foreach($riwayat_kepanitiaan as $row) : ?>
								<tr>
									<td><?php echo $row->NAMA_KEGIATAN_KEPANITIAAN; ?></td>
									<td><?php echo $row->NAMA_ORG_KEPANITIAAN; ?> </td>
									<td><?php echo $row->JABATAN_KEPANITIAAN; ?> </td>
									<td><?php echo $row->TAHUN_KEPANITIAAN; ?> </td>
									<td><?php echo $row->KEPANITIAAN_KEMAHASISWAAN; ?> </td>
									<td><a href="<?php echo site_url('anggota/update_riwayat_kepanitiaan'.'/'.$row->NO_URUT_KEPANITIAAN); ?>" class="btn btn-sm btn-info">edit</a></td>
									<td><a href="<?php echo site_url('anggota/delete_riwayat_kepanitiaan'.'/'.$row->NO_URUT_KEPANITIAAN); ?>" class="btn btn-sm btn-danger">delete</a></td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					<div class="panel-footer">
						<a href="<?php echo site_url('anggota/add_riwayat_kepanitiaan');?>" class="button btn btn-default">Tambah Riwayat</a>
					</div>
				</div>
			</div>
		</div> <!-- end row of riwayat kepanitiaan-->

		<!-- Riwayat Pelatihan-->
		<div class="row">
			<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title text-center">Riwayat Pelatihan</h3>
					</div>
					<div class="panel-body">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Nama Pelatihan</th>
									<th>Nama Penyelenggara</th>
									<th>Tahun Pelatihan</th>
									<th>Pelatihan Kemahasiswaan</th>
									<th></th>
									<th></th>
								</tr>
							</thead>

							<tbody id="tableBodyRiwayatPelatihan">
							<?php foreach($riwayat_pelatihan as $row) : ?>
								<tr> 
									<td><?php echo $row->NAMA_PELATIHAN; ?></td>
									<td><?php echo $row->NAMA_PENYELENGGARA_PELATIHAN; ?></td>
									<td><?php echo $row->TAHUN_PELATIHAN; ?></td>
									<td><?php echo $row->PELATIHAN_KEMAHASISWAAN; ?></td>
									<td><a href="<?php echo site_url('anggota/update_riwayat_pelatihan'.'/'.$row->NO_URUT_PELATIHAN); ?>" class="btn btn-sm btn-info">edit</a></td>
									<td><a href="<?php echo site_url('anggota/delete_riwayat_pelatihan'.'/'.$row->NO_URUT_PELATIHAN); ?>" class="btn btn-sm btn-danger">delete</a></td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					<div class="panel-footer">
						<a href="<?php echo site_url('anggota/add_riwayat_pelatihan');?>" class="button btn btn-default">Tambah Riwayat</a>
					</div>
				</div>
			</div>
		</div> <!-- end row of riwayat Pelatihan-->

		<!-- Riwayat PKM-->
		<div class="row">
			<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title text-center">Riwayat PKM</h3>
					</div>
					<div class="panel-body">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Nama PKM</th>
									<th>Nama Penyelenggara</th>
									<th>Tahun PKM</th>
									<th>PKM Kemahasiswaan</th>
									<th></th>
									<th></th>
								</tr>
							</thead>

							<tbody id="tableBodyRiwayatPKM">
							<?php foreach($riwayat_pkm as $row) : ?>
								<tr> 
									<td><?php echo $row->NAMA_PKM; ?></td>
									<td><?php echo $row->NAMA_PENYELENGGARA_PKM; ?></td>
									<td><?php echo $row->TAHUN_PKM; ?></td>
									<td><?php echo $row->PKM_KEMAHASISWAAN; ?></td>
									<td><a href="<?php echo site_url('anggota/update_riwayat_pkm'.'/'.$row->NO_URUT_PKM); ?>" class="btn btn-sm btn-info">edit</a></td>
									<td><a href="<?php echo site_url('anggota/delete_riwayat_pkm'.'/'.$row->NO_URUT_PKM); ?>" class="btn btn-sm btn-danger">delete</a></td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					<div class="panel-footer">
						<a href="<?php echo site_url('anggota/add_riwayat_pkm');?>" class="button btn btn-default">Tambah Riwayat</a>
					</div>
				</div>
			</div>
		</div> <!-- end row of riwayat kepanitiaan-->
		
	</div>
	
</body>
</html>