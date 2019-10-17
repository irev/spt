<?php 
if($TOKEN==='add' && !is_numeric($ID) ||  $ID=== null){
	$addId              = $this->m_eselon->maxID();
	$addNama            = "";
	$addNip             = "";
	$addeselon          = "";
	$addGolongan        = "";
	$uang_harian_eselon ="";
	$nm_eselon          ="";
	$JUDUL_FORM  = "<i class='fa fa-black-tie'></i> Tambah eselon <small>Tambah Master eselon</small>";
}else{
	$addId              = $eselon->id_eselon;
	$addNama            = $eselon->eselon;
	//$addNip           = $eselon->nama_eselon;
	$addeselon          = $eselon->eselon;
	//$addGolongan      = $eselon->nama_eselon;
	$uang_harian_eselon = $eselon->rp_oh;
	$nm_eselon          = $eselon->eselon;
	$JUDUL_FORM  = "<i class='fa fa-black-tie'></i> Ubah eselon <small>Ubah Infomasi eselon</small>";
}
?>


<h3 class="header smaller lighter blue"><?= $JUDUL_FORM ?></h3>
<?= $this->session->flashdata('msg') ?>
<form class="form-horizontal" role="form" id="myform" onsubmit="UnMask()" action="<?php form_open (base_url('master/eselon/add') ) ?>" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="id_eselon" > Id eselon</label>

										<div class="col-sm-9">
											<input type="text" id="id_eselon" placeholder="ID" class="col-xs-10 col-sm-5" name="id_eselon" value="<?= $addId ?>" readonly>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="nama_eselon" > Nama eselon</label>

										<div class="col-sm-9">
											<input type="text" id="nama_eselon" placeholder="Nama eselon" class="col-xs-10 col-sm-5" name="nama_eselon" value="<?= $addNama ?>">
										</div>
									</div>
									<div class="alert alert-info">
											<button type="button" class="close" data-dismiss="alert">
												<i class="ace-icon fa fa-times"></i>
											</button>
											<strong>
												<i class="ace-icon fa fa-times"></i>
												Data eselon ( Eselon I, Eselon II, Eselon III, Eselon IV, Golongan I, dts..... THP, PTT )

											</strong>
										
											<br>
									</div>
<h3 class="header smaller lighter blue"><i class='fa fa-money'></i> Uang Harian</h3>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="uang_harian_eselon" > Uang Saku OH (Rp)</label>
										<div class="col-sm-9">
											<input type="text" id="uang_harian_eselon" placeholder="Rupiah" class="col-xs-10 col-sm-5 pitih" name="uang_harian_eselon" value="<?= $uang_harian_eselon ?>">
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
											<a class="btn btn-default" type="button" href="<?= base_url('master/eselon') ?>">
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
											<a class="btn btn-danger" type="button" href="<?= base_url('master/eselon') ?>">
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