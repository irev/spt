<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script type="text/javascript">
	setTimeout(function(){
   window.location.reload(1);
}, 500000);
</script>

<div class="row">
	<div class="alert alert-block alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>
									<i class="ace-icon fa fa-check green"></i>
									SELAMAT DATANG
									<strong class="green">
										APLIKASI SPD DPUPR PASBAR <?= $this->session->userdata("TA") ?>
										<small>(v1.0)</small>
									</strong>, source code tersedia di 
	 <a href="https://github.com/irev/spt">github</a> devlop by Meedun. Untuk Petunjuk pemakaian silahkan klik <a href="<?= base_url("about?panduan") ?>">Panduan disisni </a>.
								</div>
									<div class="space-6"></div>

									<div class="col-sm-12 infobox-container">
										<div class="infobox infobox-green">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-users"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?= $jumlah_pegawai ?></span>
												<div class="infobox-content">PEGAWAI</div>
											</div>
										</div>

										<div class="infobox infobox-blue">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-envelope-o"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?= $jumlah_spd_dalam ?></span>
												<div class="infobox-content">SPD DALAM DAERAH</div>
											</div>
										</div>

										<div class="infobox infobox-pink">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-envelope"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?= $jumlah_spd_luar ?></span>
												<div class="infobox-content">SPD LUAR DAERAH</div>
											</div>
										</div>

										<div class="infobox infobox-red">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-car"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?= $jumlah_kendraan ?></span>
												<div class="infobox-content">KENDRAAN</div>
											</div>
										</div>

										<div class="infobox infobox-orange2">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-map-marker"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?= $jumlah_tujuan ?></span>
												<div class="infobox-content">TUJUAN</div>
											</div>
										</div>
										<div class="infobox infobox-blue2">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-tachometer"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?= $jumlah_kegiatan ?></span>
												<div class="infobox-content">KEGIATAN</div>
											</div>
										</div>
										<div class="space-6"></div>
									</div>

									
</div>
<!--/////////////PLUGIN END ROW ///////////////-->
<div class="row">
	<div class="col-md-12">
		<h3 class="header smaller lighter blue"><i class="fa fa-list"></i> SURAT PERJALANAN DINAS <small>Pilih menu dibawah ini, SPD apa yang akan di buat.</small> </h3>
		<a href="<?= base_url("spt/dalam") ?>" class="btn btn-app btn-success " style="width: 45% !important">
			<i class="ace-icon fa fa-map bigger-230"></i> <i class="ace-icon fa fa-sign-in bigger-230"></i>
				<small>Dinas Dalam Daerah</small>
			<!--span class="badge badge-warning badge-left">12</span-->
		</a>
		<a href="<?= base_url("spt/luar") ?>" class="btn btn-app btn-danger " style="width: 45% !important">
			<i class="ace-icon fa fa-map-o bigger-230"></i>
			<i class="ace-icon fa fa-sign-out bigger-230"></i>
				<small>Dinas Ke Luar Daerah</small>
			<!--span class="badge badge-warning badge-left">12</span-->
		</a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<h3 class="header smaller lighter blue"><i class="fa fa-list"></i> MASTER DATA <small>Merupakan data referensi untuk kelengkapan pengisian surat perintah.</small></h3>
		<a href="<?= base_url("master/jabatan") ?>" class="btn btn-app btn-primary " style="width: 150px !important">
			<i class="ace-icon fa fa-black-tie bigger-230"></i>
				<small>Jabatan</small>
			<!--span class="badge badge-warning badge-left">12</span-->
		</a>
		<a href="<?= base_url("master/pegawai") ?>" class="btn btn-app btn-primary " style="width: 150px !important">
			<i class="ace-icon fa fa-users bigger-230"></i>
				<small>Pegawai</small>
			<!--span class="badge badge-warning badge-left">12</span-->
		</a>
		<a href="<?= base_url("master/transportasi") ?>" class="btn btn-app btn-primary " style="width: 150px !important">
			<i class="ace-icon fa fa-car bigger-230"></i>
				<small>Transportasi</small>
			<!--span class="badge badge-warning badge-left">12</span-->
		</a>
		<a href="<?= base_url("master/tujuan") ?>" class="btn btn-app btn-primary " style="width: 150px !important">
			<i class="ace-icon fa fa-map-marker bigger-230"></i>
				<small>Tujuan / Kota</small>
			<!--span class="badge badge-warning badge-left">12</span-->
		</a>											
		<a href="<?= base_url("master/kegiatan") ?>" class="btn btn-app btn-primary " style="width: 150px !important">
			<i class="ace-icon fa fa-tachometer bigger-230"></i>
				<small>KEGIATAN</small>
			<!--span class="badge badge-warning badge-left">12</span-->
		</a>
		<a href="<?= base_url("master/eselon") ?>" class="btn btn-app btn-primary " style="width: 150px !important">
			<i class="ace-icon fa fa-pencil-square-o bigger-230"></i>
				<small>ESELON</small>
			<!--span class="badge badge-warning badge-left">12</span-->
		</a>
		<a href="<?= base_url("master/golongan") ?>" class="btn btn-app btn-primary " style="width: 150px !important">
			<i class="ace-icon fa fa-pencil-square-o bigger-230"></i>
				<small>GOLONGAN</small>
			<!--span class="badge badge-warning badge-left">12</span-->
		</a>
	</div>
</div>


<!--div class="col-md-12">
	<a class="btn btn-lg btn-success" href="master/jabatan" >
		<i class="ace-icon fa fa-black-tie"></i>
		Jabatan
	</a>
	<a class="btn btn-lg btn-primary" href="master/pegawai" >
		<i class="ace-icon fa fa-user"></i>
		Pegawai
	</a>
	<a class="btn btn-lg btn-warning" href="master/transportasi" >
		<i class="ace-icon fa fa-car"></i>
		Transportasi
	</a>
	<a class="btn btn-lg btn-danger" href="master/tujuan" >
		<i class="ace-icon fa fa-map-marker"></i>
		Tujuan / Kota
	</a>
</div-->

