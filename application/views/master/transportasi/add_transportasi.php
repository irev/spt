<?php 
if($TOKEN==='add' && !is_numeric($ID) ||  $ID=== null){
	$addId      =  $this->input->post('ID');
	$addNama    =  $this->input->post('nama');
	$addNomor   =  $this->input->post('nomor');
	$addbahanbakar   =  $this->input->post('bahan_bakar');
	$addJenis   =  $this->input->post('jenis');
	$addRoda    =  $this->input->post('roda');
	$addCc      =  $this->input->post('cc');
	$addWil1    =  $this->input->post('wil1');
	$addWil2    =  $this->input->post('wil2');
	$addWil3    =  $this->input->post('wil3');
	$addbbmwil1 = $this->input->post('addbbmwil1');
	$addbbmwil2 = $this->input->post('addbbmwil2');
	$addbbmwil3 = $this->input->post('addbbmwil3');
	$addbbmwil4 = $this->input->post('addbbmwil4');

	$JUDUL_FORM = "<i class='fa fa-car'></i> Tambah Transportasi <small>Tambah Master Transportasi</small>";
}else{
	$addId      = $transportasi->id_tran;
	$addNama    = $transportasi->nama;
	$addNomor   = $transportasi->nomor;
	$addbahanbakar = $transportasi->bahan_bakar;
	$addJenis   = $transportasi->jenis;
	$addRoda    = $transportasi->roda;
	$addCc      = $transportasi->cc;
	$addWil1    = $transportasi->wil1;
	$addWil2    = $transportasi->wil2;
	$addWil3    = $transportasi->wil3;
	$addbbmwil1 = $transportasi->liter1;
	$addbbmwil2 = $transportasi->liter1;
	$addbbmwil3 = $transportasi->liter1;
	$addbbmwil4 = $transportasi->bbm_luar;
	$JUDUL_FORM = "<i class='fa fa-car'></i> Ubah Transportasi <small>Ubah Infomasi Transportasi</small>";
}
//print_r($transportasi);

?>


<h3 class="header smaller lighter blue"><?= $JUDUL_FORM ?></h3>
<?= $this->session->flashdata('msg') ?>
<form class="form-horizontal" role="form" action="<?php form_open (base_url('master/transportasi/add') ) ?>" method="post" enctype="multipart/form-data">
									<?php if( $addId > 0){ ?>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="id" > Id</label>

										<div class="col-sm-9">
											<input type="text" id="id" placeholder="ID" class="col-xs-10 col-sm-5" name="id" value="<?= $addId ?>" readonly>
										</div>
									</div>
									<?php } ?>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="nama" > Nama*</label>

										<div class="col-sm-9">
											<input type="text" id="nama" placeholder="Nama Transportasi" class="col-xs-10 col-sm-5" name="nama" value="<?= $addNama ?>">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="Nomor" > Nomor*</label>

										<div class="col-sm-9">
											<input type="text" id="nomor" placeholder="Nomor Transportasi" class="col-xs-10 col-sm-5" name="nomor" value="<?= $addNomor ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="Nomor" > Bahan Bakar*</label>

										<div class="col-sm-9">
											<!--input type="text" id="bahan_bakar" placeholder="Bahan Bakar" class="col-xs-10 col-sm-5" name="bahan_bakar" value="<?= $addbahanbakar ?>"-->
											<select id="bahan_bakar" class="col-xs-10 col-sm-5" name="bahan_bakar">

												<option value="<?= $addbahanbakar ?>"><?= $addbahanbakar ?></option>
												<option value="Premium">Premium</option>
												<option value="Solar">Solar</option>
												<option value="Bio Solar">Bio Solar</option>
												<option value="Dexlite">Dexlite</option>
												<option value="Pertalite">Pertalite</option>
												<option value="Pertamax">Pertamax</option>
												<option value="Pertamax Turbo">Pertamax Turbo</option>
												<option value="Pertamina Dex">Pertamina Dex</option>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="nama" > Jenis*</label>
										<div class="col-sm-9">
											<select id="jenis" placeholder="Jenis Transportasi" class="col-xs-10 col-sm-5" name="jenis">
												<option value="<?= $addJenis ?>"><?= $addJenis ?></option>
												<option value="Darat">🚦🚗Transportasi Darat</option>
												<option value="Udara">⛅✈ Transportasi Udara</option>
												<option value="Laut">🌊🛶 Transportasi Laut</option>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="Roda" > Roda</label>

										<div class="col-sm-9">
											<select id="roda" placeholder="Roda Transportasi" class="col-xs-10 col-sm-5" name="roda">
												<option value="<?= $addRoda ?>"><?= $addRoda ?></option>
												<option value="0">Tidak Ada</option>
												<option value="2">🏍 Roda 2</i></option>
												<option value="4">🚗 Roda 4</option>
												<option value="10">🚌 Roda 10/ lebih</option>
											</select>
										</div>
									</div>

									<!--div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="cc" > Volume (CC)*</label>

										<div class="col-sm-9">
											<input type="text" id="cc" placeholder="Volume (CC)*" class="col-xs-10 col-sm-5" name="cc" value="<?= $addCc ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="wil2">Wilayah</label>
										<div class="col-sm-9">
											<input type="text" id="wil2" placeholder="Wilayah 1" class="col-xs-3 col-sm-3" name="wil1" value="<?= $addWil1 ?>">
										
											<input type="text" id="wil2" placeholder="Wilayah 2" class="col-xs-3 col-sm-3" name="wil2" value="<?= $addWil2 ?>">
										
											<input type="text" id="wil3" placeholder="Wilayah 3" class="col-xs-3 col-sm-3" name="wil3" value="<?= $addWil3 ?>">

											<input type="text" id="wil4" placeholder="Luar Daerah" class="col-xs-3 col-sm-3" name="wil4" value="<?= $addWilluar ?>">
										</div>
									</div-->
						<div class="row">
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="wil3" >BBM Liter </label>
										<div class="col-sm-9">
											<span class="col-xs-3 col-sm-3">Wil I</span>
											<span class="col-xs-3 col-sm-3">Wil II</span>
											<span class="col-xs-3 col-sm-3">Wil III</span>
											<span class="col-xs-3 col-sm-3">Luar</span>
											<input type="text" id="addbbmwil1" placeholder="Wilayah 1 (satu)" class="col-xs-3 col-sm-3" name="addbbmwil1" value="<?= $addbbmwil1 ?>">
											
											<input type="text" id="addbbmwil2" placeholder="Wilayah 2 (dua)" class="col-xs-3 col-sm-3" name="addbbmwil2" value="<?= $addbbmwil2 ?>">
											
											<input type="text" id="addbbmwil3" placeholder="Wilayah 3 (tiga)" class="col-xs-3 col-sm-3" name="addbbmwil3" value="<?= $addbbmwil3 ?>">
									
											<input type="text" id="addbbmwil4" placeholder="Luar Daerah" class="col-xs-3 col-sm-3" name="addbbmwil4" value="<?= $addbbmwil4 ?>">
										</div>
									</div>
						</div>




<div class="clearfix form-actions">
	<?php 
	echo validation_errors('<div class="col-md-3"></div><div class="text-left col-md-9" style="color: red;"><i class="fa fa-times"></i> ', '</div>'); 
	if(validation_errors()){
		echo '<div class="col-md-12"><a class="btn btn-warning col-sm-12" type="button" href="'.base_url("master/transportasi/add").'">
														<i class="ace-icon fa fa-pencile"></i>
														Coba Lagi
													</a></div>';
	}else{
	?>
										<div class="col-md-offset-3 col-md-9">
											<a class="btn btn-default" type="button" href="<?= base_url('master/transportasi') ?>">
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
											<a class="btn btn-danger" type="button" href="<?= base_url('master/transportasi') ?>">
												<i class="ace-icon fa fa-times bigger-110"></i>
												Batal
											</a>
										</div>
<?php } ?>										
									</div>									
</form>
<?= $TOKEN ?><br>	
<?= $ID ?>

<script type="text/javascript">
	setTimeout(function(){ 
		//$( ".alert" ).hide( "slow" );
		$(".alert").slideUp(500);
		//window.location = "<?= base_url('master/transportasi/') ?>";
	}, 3000);
</script>