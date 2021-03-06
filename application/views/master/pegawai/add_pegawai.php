<?php 
if($TOKEN==='add' && !is_numeric($ID) ||  $ID=== null){
	$addID          = "";
	$addNama        = "";
	$addNip         = "";
	$addJabatan     = "";
	$addGolongan    = "";
	$addGolongan_id = "";
	$addTahun       = "";
	$addeselon      ="";
	$JUDUL_FORM  = "<i class='fa fa-user'></i> Tambah Pegawai <small>Tambah Master Pegawai</small>";
}else{
	$addID          = $pegawai->id_peg;
	$addNama        = $pegawai->nama;
	$addNip         = $pegawai->nip;
	$addJabatan     = $pegawai->jabatan;
	$addGolongan    = $pegawai->golongan;
	$addGolongan_id = $pegawai->golongan_id;
	$addTahun       = $pegawai->tahun;
	$addeselon      = $pegawai->eselon;
	$JUDUL_FORM  = "<i class='fa fa-user'></i> Ubah Pegawai <small>Ubah Infomasi Pegawai</small>";

}


?>


<h3 class="header smaller lighter blue"><?= $JUDUL_FORM ?></h3>
<?= $this->session->flashdata('msg') ?>
<form class="form-horizontal" role="form" action="<?php form_open ( base_url('master/pegawai/add') ) ?>" method="post" enctype="multipart/form-data">
								<?php if($addID != ""){ ?>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="id_peg" > ID</label>

										<div class="col-sm-9">
											<input type="text" id="id_peg" placeholder="ID" class="col-xs-10 col-sm-5" name="id_peg" value="<?= $addID ?>" readonly>
										</div>
									</div>
								<?php } ?>	
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="nama" > Nama*</label>

										<div class="col-sm-9">
											<input type="text" id="nama" placeholder="Nama Pegawai" class="col-xs-10 col-sm-5" name="nama" value="<?= $addNama ?>">
											<small style="color: red;">&nbsp;&nbsp; Wajib disisi.</small>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="nip" > Nip</label>

										<div class="col-sm-9">
											<input type="text" id="nip" placeholder="Nip" class="col-xs-10 col-sm-5" name="nip" value="<?= $addNip ?>">
										<small style="color: blue;">&nbsp;&nbsp; *Untuk PTT dan THL di kosongkan.</small>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="eselon"> Eselon*</label>

										<div class="col-sm-9">	
											<select id="form-field-1" placeholder="eselon" class="col-xs-10 col-sm-5" name="eselon">
												<option value="<?= $addeselon ?>"><?= $addeselon ?></option>
												<?php foreach ($eselon as $jab) {
													echo '<option value="'.$jab['id_eselon'].'">'.$jab['eselon'].'</option>';
												} ?>
												
											</select>				
											<small style="color: blue;">&nbsp;&nbsp; *Untuk PTT dan THL tetap  diisi sesuai dengan status pegawai.</small>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="jabatan"> Jabatan*</label>

										<div class="col-sm-9">	
											<select id="form-field-1" placeholder="Jabatan" class="col-xs-10 col-sm-5" name="jabatan">
												<option value="<?= $addJabatan ?>"><?= $addJabatan ?></option>
												<?php foreach ($jabatan as $jab) {
													echo '<option value="'.$jab['nama_jabatan'].'">'.$jab['nama_jabatan'].'</option>';
												} ?>
												
											</select>				
											<small style="color: red;">&nbsp;&nbsp; Wajib disisi.</small>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="golongan"> Golongan*</label>

										<div class="col-sm-9">
											<select id="golongan" placeholder="Golongan" class="col-xs-10 col-sm-5" name="golongan">
												<option value="<?= $addGolongan_id ?>"><?= $addGolongan ?></option>
												<?php foreach ($golongan as $gol) {
														echo '<option value="'.$gol['id_gol'].'">'.$gol['golongan'].' - '.$gol['pangkat'].'</option>';
												} ?>
												
											</select>
											<input type="text" id="nm_gol" name="nm_gol" value="<?= $addGolongan ?>" style="display: none;">
											<small style="color: blue;">&nbsp;&nbsp; *Untuk PTT dan THL tetap  diisi sesuai dengan status pegawai.</small>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun*</label>

										<div class="col-sm-9">
											<select id="tahun" name="tahun" class="col-xs-10 col-sm-5">
												<option value="<?= $addTahun ?>"><?= $addTahun ?></option>
												<option value=""><?= date('Y') ?></option>
												<?php 
												for ($i=2018; $i <= 2030; $i++) { 
													if($i == date('Y')){
														echo '<option value="'.$i.'" selected>'.$i.'</option>';
													}else{
														echo '<option value="'.$i.'">'.$i.'</option>';
													}
													
												}

												 ?> 
											</select>
											<small style="color: red;">&nbsp;&nbsp; Wajib disisi.</small>
										</div>
									</div>

									<p><?php echo anchor('master/pegawai/add', 'Try it again!'); ?></p>
									<div class="text-center" style="color: red;">
										<?php  echo  validation_errors ();  ?>
									</div>

<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<a class="btn btn-default" type="button" href="<?= base_url('master/pegawai') ?>">
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
											<a class="btn btn-danger" type="button" href="<?= base_url('master/pegawai') ?>">
												<i class="ace-icon fa fa-times bigger-110"></i>
												Batal
											</a>
										</div>
									</div>									
</form>




<script type="text/javascript">
	//setTimeout(function(){ 
		//$( ".alert" ).hide( "slow" );
		$(".alert").slideUp(500);
		//window.location = "<?= base_url('master/jabatan/') ?>";
	//}, 3000);
	//$("#golongan").change(function(){
	//	var selectedText = $("#golongan option:selected").html();
		//console.log(selectedText);
	//	$("#nm_gol").val(selectedText);
	//});
</script>

<?= $TOKEN ?><br>	
<?= $ID ?>