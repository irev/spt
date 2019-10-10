<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row">
	<div class="col-md-12">
		<h3 class="header smaller lighter blue"><i class="fa fa-print"></i> SURAT SERINTAH TUGAS </h3>
		<a href="<?= base_url() ?>spt/print_dalam/<?= $ID ?>" class="btn btn-lg btn-success " style="width: 45% !important; height: width: 45% !important;">
			<i class="ace-icon fa fa-print fa-10x" style="font-size: 100px;"></i> 
				<small style="font-size: 38px;">Cetak SPT & SPPD</small>
			<!--span class="badge badge-warning badge-left">12</span-->
		</a>
		<a href="<?= base_url() ?>spt/print_kwitansi/<?= $ID ?>" class="btn btn-lg btn-danger " style="width: 45% !important">
		<i class="ace-icon fa fa-print fa-10x" style="font-size: 100px;"></i>
				<small style="font-size: 38px;">Cetak Kwitansi</small>
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

<?php 
//$this->view->load('theme/FOOTER');
$this->load->view('theme/FOOTER');
?>