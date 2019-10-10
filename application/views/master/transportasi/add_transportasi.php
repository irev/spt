<?php 
if($TOKEN==='add' && !is_numeric($ID) ||  $ID=== null){
	$addId    =  $this->input->post('ID');
	$addNama  =  $this->input->post('nama');
	$addNomor =  $this->input->post('nomor');
	$addJenis =  $this->input->post('jenis');
	$addRoda  =  $this->input->post('roda');
	$addCc    =  $this->input->post('cc');
	$addWil1  =  $this->input->post('wil1');
	$addWil2  =  $this->input->post('wil2');
	$addWil3  =  $this->input->post('wil3');

	$JUDUL_FORM = "<i class='fa fa-car'></i> Tambah Transportasi <small>Tambah Master Transportasi</small>";
}else{
	$addId    = $transportasi->id_tran;
	$addNama  = $transportasi->nama;
	$addNomor = $transportasi->nomor;
	$addJenis = $transportasi->jenis;
	$addRoda  = $transportasi->roda;
	$addCc    = $transportasi->cc;
	$addWil1  = $transportasi->wil1;
	$addWil2  = $transportasi->wil2;
	$addWil3  = $transportasi->wil3;
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

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="cc" > Volume (CC)*</label>

										<div class="col-sm-9">
											<input type="text" id="cc" placeholder="Volume (CC)*" class="col-xs-10 col-sm-5" name="cc" value="<?= $addCc ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="wil2" > Wilayah 1</label>

										<div class="col-sm-9">
											<input type="text" id="wil2" placeholder="Wilayah 1" class="col-xs-10 col-sm-5" name="wil1" value="<?= $addWil1 ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="wil2" > Wilayah 2</label>

										<div class="col-sm-9">
											<input type="text" id="wil2" placeholder="Wilayah 2" class="col-xs-10 col-sm-5" name="wil2" value="<?= $addWil2 ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="wil3" > Wilayah 3</label>

										<div class="col-sm-9">
											<input type="text" id="wil3" placeholder="Wilayah 3" class="col-xs-10 col-sm-5" name="wil3" value="<?= $addWil3 ?>">
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