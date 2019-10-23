<?php 
$TOKEN = $this->uri->segment(2);
$ID = $this->uri->segment(3);
if($TOKEN==='add' && !is_numeric($ID) ||  $ID=== null){
	$addId    = $this->m_anggaran->maxID();
	$adddinas = "Dinas Pekerjaan Umum Dan Penataan Ruang Kabupaten Pasaman Barat";
	$addKuasa = "Pengguna Anggaran";
	$addKode  = "";
	$addtgl	  = "";
	$addtahun = date('Y');
	$JUDUL_FORM  = "<i class='fa fa-black-tie'></i> Tambah Anggaran <small>Tambah Master Anggaran</small>";
}else{
	$addId    = $anggaran->id_anggaran;
	$addKuasa = $anggaran->kuasa;
	$adddinas = $anggaran->ket;
	$addKode  = $anggaran->kode;
	$addtahun = $anggaran->tahun;
	$addtgl   = $anggaran->tgl_ang;

	$JUDUL_FORM  = "<i class='fa fa-black-tie'></i> Ubah Anggaran <small>Ubah Infomasi Anggaran</small>";
}
?>


<h3 class="header smaller lighter blue"><?= $JUDUL_FORM ?></h3>
<?= $this->session->flashdata('msg') ?>
<?php 
//print_r($anggaran);
 ?>
<div class="alert alert-info">
											<button type="button" class="close" data-dismiss="alert">
												<i class="ace-icon fa fa-times"></i>
											</button>
											<strong>
												<i class="ace-icon fa fa-times"></i>
												Data Anggaran
											</strong>
										
											<br>
									</div>
<form class="form-horizontal" role="form" id="myform" action="<?php form_open (base_url('anggaran/add') ) ?>" method="post" enctype="multipart/form-data">

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="id_anggaran" > Id Anggaran</label>

										<div class="col-sm-9">
											<input type="text" id="id_anggaran" placeholder="ID" class="col-xs-10 col-sm-5" name="id_anggaran" value="<?= $addId ?>" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="dinas" > Dinas</label>

										<div class="col-sm-9">
											<textarea type="text" id="dinas" placeholder="Dinas Pekerjaan Umum Dan Penataan Ruang Kabupaten Pasaman Barat" class="col-xs-10 col-sm-5" name="dinas" value=""><?= $adddinas ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="kuasa" > Kuasa Anggaran</label>

										<div class="col-sm-9">
											<input type="text" id="kuasa" placeholder="Pengguna Anggaran" class="col-xs-10 col-sm-5" name="kuasa" value="<?= $addKuasa ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="kode" > Kode</label>

										<div class="col-sm-9">
											<select id="kode" placeholder="kodee Anggaran" class="col-xs-10 col-sm-5" name="kode">
												<option value="DPA">DPA</option>
												<option value="DPPA">DPPA</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="tgl_ang" > Tanggal Anggaran</label>

										<div class="col-sm-9">
											<input type="date" id="tgl_ang" placeholder="Tanggal Anggaran" class="col-xs-10 col-sm-5" name="tgl_ang" value="<?= $addtgl ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="tahun" > Tanggal Anggaran</label>

										<div class="col-sm-9">
											<input type="number" maxlength="4" id="tahun" placeholder="Tahun Anggaran" class="col-xs-10 col-sm-5" name="tahun" value="<?= $addtahun ?>">
										</div>
									</div>
									
									<div class="text-center" style="color: red;">
										<?php  echo  validation_errors ();  ?>
									</div>

<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<a class="btn btn-default" type="button" href="<?= base_url('anggaran') ?>">
												<i class="ace-icon fa fa-angle-double-left"></i>
												Kembali
											</a>
											&nbsp; &nbsp; &nbsp;
											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Simpan
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
											&nbsp; &nbsp; &nbsp;
											<a class="btn btn-danger" type="button" href="<?= base_url('anggaran') ?>">
												<i class="ace-icon fa fa-times bigger-110"></i>
												Batal
											</a>
										</div>
									</div>									
</form>
<?= $TOKEN ?><br>	
<?= $ID ?>

<script type="text/javascript">
	setTimeout(function(){ 
		//$( ".alert" ).hide( "slow" );
		$(".alerts").slideUp(500);
		//window.location = "<?= base_url('master/eselon/') ?>";
	}, 3000);
</script>