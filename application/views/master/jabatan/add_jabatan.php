<?php 
if($TOKEN==='add' && !is_numeric($ID) ||  $ID=== null){
	$addId       = "";
	$addNama 	 = "";
	$addNip      = "";
	$addJabatan  = "";
	$addGolongan = "";
	$uang_harian_jabatan ="";
	$nm_jabatan ="";
	$JUDUL_FORM  = "<i class='fa fa-black-tie'></i> Tambah Jabatan <small>Tambah Master Jabatan</small>";
}else{
	$addId       = $jabatan->id_jab;
	$addNama     = $jabatan->nama_jabatan;
	$addNip      = $jabatan->nama_jabatan;
	$addJabatan  = $jabatan->nama_jabatan;
	$addGolongan = $jabatan->nama_jabatan;
	$uang_harian_jabatan =$jabatan->uang_harian;
	$nm_jabatan  = $jabatan->eselon;
	$JUDUL_FORM  = "<i class='fa fa-black-tie'></i> Ubah Jabatan <small>Ubah Infomasi Jabatan</small>";
}


?>


<h3 class="header smaller lighter blue"><?= $JUDUL_FORM ?></h3>
<?= $this->session->flashdata('msg') ?>
<form class="form-horizontal" role="form" id="myform" onsubmit="UnMask()" action="<?php form_open (base_url('master/jabatan/add') ) ?>" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="id_jabatan" > Id Jabatan</label>

										<div class="col-sm-9">
											<input type="text" id="id_jabatan" placeholder="ID" class="col-xs-10 col-sm-5" name="id_jabatan" value="<?= $addId ?>" readonly>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="nama_jabatan" > Nama Jabatan</label>

										<div class="col-sm-9">
											<input type="text" id="nama_jabatan" placeholder="Nama Jabatan" class="col-xs-10 col-sm-5" name="nama_jabatan" value="<?= $addNama ?>">
										</div>
									</div>
<h3 class="header smaller lighter blue"><i class='fa fa-money'></i> Uang Harian</h3>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="nm_jabatan" > Jabatan/Eselon</label>
										<div class="col-sm-9">
											<input type="text" id="nm_jabatan" placeholder="Rupiah" class="col-xs-10 col-sm-5 pitih" name="nm_jabatan" value="<?= $nm_jabatan ?>">
											<input class="nominal " name="nominal" style="text-align: right; display: none;">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="uang_harian_jabatan" > Uang Saku OH (Rp)</label>
										<div class="col-sm-9">
											<input type="text" id="uang_harian_jabatan" placeholder="Rupiah" class="col-xs-10 col-sm-5 pitih" name="uang_harian_jabatan" value="<?= $uang_harian_jabatan ?>">
											<input class="nominal " name="nominal" style="text-align: right; display: none;">
										</div>
									</div>
									<div class="text-center" style="color: red;">
										<?php  echo  validation_errors ();  ?>
									</div>

								<?php 
								//	echo $ang = str_replace('.', '', '10.000.000.000');
								//	echo '<br>'; 
								//	echo number_format($ang,2,'.','');
								?>	

<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<a class="btn btn-default" type="button" href="<?= base_url('master/jabatan') ?>">
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
											<a class="btn btn-danger" type="button" href="<?= base_url('master/jabatan') ?>">
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
		$(".alert").slideUp(500);
		//window.location = "<?= base_url('master/jabatan/') ?>";
	}, 3000);
</script>