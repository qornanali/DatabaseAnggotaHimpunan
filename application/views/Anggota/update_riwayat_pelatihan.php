<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html>
<head>
	<title>Data Anggota Himakom</title>
	<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet"> 
	<script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js'); ?>"></script>
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h1>Update Riwayat Pelatihan<a href="<?php echo site_url('anggota');?>" class="btn btn-sm btn-success">Kembali ke Dashboard</a></h1>
		</div>
		<!--Start Row -->
		<div class="row">
			<div class="col-md-9 col-md-offset-1">
				<form class="form-horizontal" id="formRiwayatPelatihan" method="post">
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputNamaPelatihan">Nama Pelatihan</label>
						<div class="col-md-9">
							<input name="nama_pelatihan" class="form-control" id="inputNamaPelatihan" required="" type="text" placeholder="Nama Pelatihan" value="<?php echo $riwayat_pelatihan->NAMA_PELATIHAN; ?>" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputNamaPenyelenggara">Nama Penyelenggara</label>
						<div class="col-md-9">
							<input name="nama_penyelenggara_pelatihan" class="form-control" id="inputNamaPeyelenggara" required="" type="text" placeholder="Nama Penyelenggara" value="<?php echo $riwayat_pelatihan->NAMA_PENYELENGGARA_PELATIHAN; ?>" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputTahunPelatihan">Tahun Pelatihan</label>
						<div class="col-md-9">
							<input name="tahun_pelatihan" class="form-control" id="inputTahunPelatihan" required="" type="text" placeholder="Tahun Pelatihan" value="<?php echo $riwayat_pelatihan->TAHUN_PELATIHAN; ?>" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inpuPelatihanKemahasiswaan">Pelatihan Kemahasiswaan</label>
						<div class="col-md-9">
							<div class="radio">
								<label>
									<input id="radioPelatihanKemahasiswaan1" name="pelatihan_kemahasiswaan" required="" type="radio" value=1>
									Ya
								</label>
							</div>
							
							<div class="radio">
								<label>
									<input id="radioPelatihanKemahasiswaan0" name="pelatihan_kemahasiswaan" required="" type="radio" value=0>
									Tidak
								</label>
							</div>
							<br>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-6 col-md-offset-3">
							<?php echo form_submit('', 'Submit', array('class' => 'btn btn-primary')); ?>
						</div>
					</div>

				</form>
			</div>
		</div> <!-- End Row -->	
	</div>


	<script>
		var idRadio = "radioPelatihanKemahasiswaan" + "<?php echo $riwayat_pelatihan->PELATIHAN_KEMAHASISWAAN; ?>";
		$("#" + idRadio).prop("checked", true);
	</script>

</body>
</html>