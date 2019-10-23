<?php 
if($TOKEN==='add' && !is_numeric($ID) ||  $ID=== null){
	$addid_tujuan  = "";
	$addtujuan     = "";
	$addjarak      = "";
	$addwilayah    = ""; 
	$addperjalanan = ""; 
	$addkec        = "";
	$addkab        = "";
	$addprov       = "";
	$addbbm        = "";
	$JUDUL_FORM  = "<i class='fa fa-user'></i> Tambah Pegawai <small>Tambah Master Pegawai</small>";
}else{
	$addid_tujuan  = $tujuan->id_tujuan;
	$addtujuan     = $tujuan->tujuan; 
	$addjarak      = $tujuan->jarak; 
	$addwilayah    = $tujuan->wilayah; 
	$addperjalanan = $tujuan->perjalanan; 
	$addkec        = $tujuan->kec;
	$addkab        = $tujuan->kab;
	$addprov       = $tujuan->prov;
	$addbbm        = $tujuan->bbm;
	$JUDUL_FORM  = "<i class='fa fa-user'></i> Ubah Pegawai <small>Ubah Infomasi Pegawai</small>";

}


?>


<h3 class="header smaller lighter blue"><?= $JUDUL_FORM ?></h3>
<?= $this->session->flashdata('msg') ?>
<form class="form-horizontal" role="form" action="<?php form_open ( base_url('master/pegawai/add') ) ?>" method="post" enctype="multipart/form-data">
								<?php if($addid_tujuan != ""){ ?>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="id_tuj" > ID</label>

										<div class="col-sm-9">
											<input type="text" id="id_tuj" placeholder="ID" class="col-xs-10 col-sm-5" name="id_tuj" value="<?= $addid_tujuan ?>" readonly>
										</div>
									</div>
								<?php } ?>	
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="tujuan" > Nama Kota/Desa *</label>

										<div class="col-sm-9">
											<input type="text" id="tujuan" placeholder="Nama Tujuan" class="col-xs-10 col-sm-5" name="tujuan" value="<?= $addtujuan ?>">
											<small style="color: red;">&nbsp;&nbsp; Wajib disisi.</small>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="prov"> Provinsi*</label>

										<div class="col-sm-9">	
											<select id="form-prov" placeholder="prov" class="col-xs-10 col-sm-5" name="prov">
												<option value="<?= $addprov ?>"><?= $addprov ?></option>
												<?php foreach ($provinsi as $prov) {
													echo '<option value="'.$prov['idprov'].'">'.$prov['idprov'].') '.$prov['provinsi'].'</option>';
												} ?>
												
											</select>
											<input type="text" name="prov_txt" style="display: none;">				
											<small style="color: blue;">&nbsp;&nbsp; *Pilih Provinsi.</small>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="kab"> Kabupaten*</label>

										<div class="col-sm-9">	
											<select id="form-kab" placeholder="kab" class="col-xs-10 col-sm-5" name="kab">
												<option value="<?= $addkab ?>"><?= $addkab ?></option>
												<!--?php foreach ($kabupaten as $jab) {
													echo '<option value="'.$jab['id_kab'].'">'.$jab['kab'].'</option>';
												} ?-->
												
											</select>
											<input type="text" name="kab_txt" style="display: none;">				
											<small style="color: blue;">&nbsp;&nbsp; *Pilih Kabupaten.</small>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="kec"> kecupaten*</label>

										<div class="col-sm-9">	
											<select id="form-kec" placeholder="kec" class="col-xs-10 col-sm-5" name="kec">
												<option value="<?= $addkec ?>"><?= $addkec ?></option>
											</select>
											<input type="text" name="kec_txt" style="display: none;">				
											<small style="color: blue;">&nbsp;&nbsp; *Pilih Kecamatan.</small>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="wilayah"> Wilayah*</label>
										<div class="col-sm-9">	
											<select id="form-field-1" placeholder="wilayah" class="col-xs-10 col-sm-5" name="wilayah">
												<option value="<?= $addwilayah ?>"><?= $addwilayah ?></option>					
												<option value="1">Wilayah I</option>					
												<option value="2">Wilayah II</option>					
												<option value="3">Wilayah III</option>					
												<option value="4">Luar Daerah</option>					
											</select>				
											<small style="color: red;">&nbsp;&nbsp; Wajib disisi.</small>
										</div>
									</div>

									<!--div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="jabatan"> BBM*</label>
										<div class="col-sm-9">	
											<input id="form-field-1" placeholder="BBM" class="col-xs-10 col-sm-5" name="jabatan">
											<small style="color: red;">&nbsp;&nbsp; Wajib disisi.</small>
										</div>
									</div-->

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="perjalanan"> Perjalanan*</label>

										<div class="col-sm-9">
											<select id="perjalanan" placeholder="perjalanan" class="col-xs-10 col-sm-5" name="perjalanan">
												<option value="<?= $addperjalanan ?>"><?= $addperjalanan ?></option>
												<option value="Dalam">Dalam Daerah</option>
												<option value="Luar">Luar Daerah</option>
											</select>
											<input type="text" id="nm_gol" name="nm_gol" value="<?= $addperjalanan ?>" style="display: none;">
											<small style="color: blue;">&nbsp;&nbsp; *Perjalanan (Dalam/Luar) Daerah.</small>
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

									<p><?php echo anchor('master/tujuan/add', 'Try it again!'); ?></p>
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
	



	$("#form-prov").on('change',function(){
		var url ='';
		var selectid  = $(this).val();
		$.ajax({
			url: '<?= base_url("master/listkab") ?>',
			type: 'POST',
			dataType: 'html',
			data: {id:selectid,key:null},
			success : function(data){
				var txt = $('#form-prov option:selected').text();
				var isi = txt.split(")");
				$('[name=prov_txt]').val(isi[1])
					$('#form-kab').html(data);
					$("#form-kab").show('400');
				}
		});
		
	});
	
	$("#form-kab").on('change',function(){
		var url ='';
		var selectid  = $(this).val();
		$.ajax({
			url: '<?= base_url("master/listkec") ?>',
			type: 'POST',
			dataType: 'html',
			data: {id:selectid,key:null},
			success : function(data){
				var txt = $('#form-kab option:selected').text();
				var isi = txt.split(")");
				$('[name=kab_txt]').val(isi[1]);
					$('#form-kec').html(data);
					$("#form-kec").show('400');
				}
		});
		
	});
	$("#form-kec").on('change',function(){
		var txt = $('#form-kec option:selected').text();
		var isi = txt.split(")");
		$('[name=kec_txt]').val(isi[1]);
	});
	$("#form-kab").hide();
	$("#form-kec").hide();
</script>

<?= $TOKEN ?><br>	
<?= $ID ?>