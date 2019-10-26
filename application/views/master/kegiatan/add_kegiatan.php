<?php 
if($TOKEN==='add' && !is_numeric($ID) ||  $ID=== null){
	$addId        =  $this->input->post('id');
	$addNama      =  $this->input->post('nama');
	$addNomor     =  $this->input->post('nomor');
	$addpagu      =  $this->input->post('pagu');
	$adddinas      =  $this->input->post('dinas');
	$addpptk      =  $this->input->post('pptk');
	$addkpa       =  $this->input->post('kpa');
	$addbendahara =  $this->input->post('bendahara');
	$addtahun =  $this->input->post('tahun');
	$JUDUL_FORM = "<i class='fa fa-box'></i> Tambah Kegiatan <small>Tambah Master Kegiatan</small>";
}else{
	$addId        = $kegiatan->id_kegiatan;
	$addNama      = $kegiatan->kegiatan;
	$addNomor     = $kegiatan->rekening;
	$addpagu      = $kegiatan->pagu;
	$adddinas     = $kegiatan->dinas;
	$addpptk      = $kegiatan->pptk;
	$addkpa       = $kegiatan->kpa;
	$addbendahara = $kegiatan->bendahara;
	$addtahun     = $kegiatan->tahun;
	$JUDUL_FORM = "<i class='fa fa-box'></i> Ubah Kegiatan <small>Ubah Infomasi Kegiatan</small>";
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
										<label class="col-sm-3 control-label no-padding-right" for="Nomor" > Rekening*</label>
										<span class="col-xs-10 col-sm-5" style="color: blue;"><b>[00.00]=</b>Program  <b>[00.00.00.00.00]</b>=Kegiatan</span>
										<div class="col-sm-9">

											<input  id="rekening_kegiatan" type="text" id="nomor" placeholder="Rekening Kegiatan 01.03.05.02.02.15.01" class="col-xs-10 col-sm-5" name="nomor" value="<?= $addNomor ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="nama" > Kegiatan*</label>

										<div class="col-sm-9">
											<!--input type="text" id="nama" placeholder="Nama Kegiatan" class="col-xs-10 col-sm-5" name="nama" value="<?= $addNama ?>"-->
											<textarea  id="nama" placeholder="Nama Kegiatan" class="col-xs-10 col-sm-5" name="nama"><?= $addNama ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="dinas" > Perjalanan Dinas*</label>

										<div class="col-sm-9">
											<select id="dinas" class="col-xs-10 col-sm-5" name="dinas">
												<option value="<?= $adddinas ?>"><?= $adddinas ?></option>
												<option value="Dalam">Dalam</option>
												<option value="Luar">Luar</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="pagu" > Pagu*</label>

										<div class="col-sm-9">
											<input type="text" id="pagu" placeholder="Pagu Kegiatan" class="col-xs-10 col-sm-5" name="pagu" value="<?= $addpagu ?>">
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="kpa" > KPA*</label>

										<div class="col-sm-9">
											<select id="kpa" class="col-xs-10 col-sm-5" name="kpa">
												<option value="<?= $addkpa ?>"><?= $this->m_master->getpegawaiById($addkpa)->nama ?></option>
												<?php foreach ($pegawai as $peg) {
													echo '<option value="'.$peg['id_peg'].'">'.$peg['nama'].'</option>';
												} ?>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="bendahara" > Bendahara*</label>
										<div class="col-sm-9">
											<select id="bendahara" placeholder="bendahara Transportasi" class="col-xs-10 col-sm-5" name="bendahara">
												<option value="<?= $addbendahara ?>"><?= $this->m_master->getpegawaiById($addbendahara)->nama ?></option>
												<?php foreach ($pegawai as $peg) {
													echo '<option value="'.$peg['id_peg'].'">'.$peg['nama'].'</option>';
												} ?>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="pptk" > PPTK</label>

										<div class="col-sm-9">
											<select id="pptk" placeholder="pptk Transportasi" class="col-xs-10 col-sm-5" name="pptk">
												<option value="<?= $addpptk ?>"><?= $this->m_master->getpegawaiById($addpptk)->nama ?></option>
												<?php foreach ($pegawai as $peg) {
													echo '<option value="'.$peg['id_peg'].'">'.$peg['nama'].'</option>';
												} ?>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="tahun" > Tahun</label>

										<div class="col-sm-9">
											<select id="tahun" placeholder="tahun anggaran" class="col-xs-10 col-sm-5" name="tahun">
												<option value="<?= $addtahun ?>"><?= $addtahun ?></option>
												
												<?php for ($i=2018; $i < 2030 ; $i++) { 											
													echo '<option value="'.$i.'">'.$i.'</option>';
												} ?>
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





<div class="clearfix form-actions">
	<?php 
	echo validation_errors('<div class="col-md-3"></div><div class="text-left col-md-9" style="color: red;"><i class="fa fa-times"></i> ', '</div>'); 
	if(validation_errors()){
		echo '<div class="col-md-12"><a class="btn btn-warning col-sm-12" type="button" href="'.base_url("master/kegiatan/add").'">
														<i class="ace-icon fa fa-pencile"></i>
														Coba Lagi
													</a></div>';
	}else{
	?>
										<div class="col-md-offset-3 col-md-9">
											<a class="btn btn-default" type="button" href="<?= base_url('master/kegiatan') ?>">
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