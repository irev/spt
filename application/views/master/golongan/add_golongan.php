<?php 
if($TOKEN==='add' && !is_numeric($ID) ||  $ID=== null){
	$addId       = "";
	$addNama 	 = "";
	$addNip      = "";
	$addgolongan  = "";
	$addGolongan = "";
	$uang_harian_golongan ="";
	$nm_golongan ="";
	$grup ="";
	$JUDUL_FORM  = "<i class='fa fa-black-tie'></i> Tambah Pangkat/Golongan <small>Tambah Master Pangkat/Golongan</small>";
}else{
	$addId                = $golongan->id_jab;
	$addNama              = $golongan->nama_golongan;
	$addNip               = $golongan->nama_golongan;
	$addgolongan          = $golongan->nama_golongan;
	$addGolongan          = $golongan->nama_golongan;
	$uang_harian_golongan =$golongan->uang_harian;
	$nm_golongan          = $golongan->eselon;
	$grup 				  = $golongan->grup;
	$JUDUL_FORM  = "<i class='fa fa-black-tie'></i> Ubah Pangkat/Golongan <small>Ubah Infomasi Pangkat/Golongan</small>";
}


?>


<h3 class="header smaller lighter blue"><?= $JUDUL_FORM ?></h3>
<?= $this->session->flashdata('msg') ?>
<?php 

$result = array();
foreach ($golongan as $element) {
    $result[$element['grup']][] = $element;
}
echo json_encode($result);
print_r($result);

 ?>
 <div class="row">
 	<form class="form-horizontal" role="form" id="myform" onsubmit="UnMask()" action="<?php form_open (base_url('master/jabatan/add') ) ?>" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="id_jabatan" > Id golongan</label>

										<div class="col-sm-9">
											<input type="text" id="id_golongan" placeholder="ID" class="col-xs-10 col-sm-5" name="id_golongan" value="<?= $addId ?>" readonly>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="nama_golongan" > Nama golongan</label>

										<div class="col-sm-9">
											<input type="text" id="nama_golongan" placeholder="Nama golongan" class="col-xs-10 col-sm-5" name="nama_golongan" value="<?= $addNama ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="nama_golongan" > Kelompok</label>

										<div class="col-sm-9">
											<select id="grup_golongan" placeholder="kelompok golongan" class="col-xs-10 col-sm-5" name="grup_golongan" value="<?= $grup ?>">
<?php
$result = array();
$index =0;
foreach ($golongan as $element) {
    $element['grup'] = $element;
}
											$grup ='x';
											foreach ($element as $g) {
												echo "<option value='{$d["golongan"]}' $selected >{$d["golongan"]}</option>";
												if ( $g["grup"] != $grup ) {
													if ( $grup ) {
													      echo "</optgroup>";
													    }
													echo "<optgroup label='ESELON {$g["grup"]}'>";
    												$grup = $g["grup"];
												}
												echo "</optgroup>";
											}
/*
$optgroup = 'x';
foreach ( $golongan as $d ) {
  $selected = '';
  if ( $d["grup"] == $grup ) {
    $selected = "selected='selected'";
  }
  if ( $d["grup"] != $optgroup ) {
    if ( $optgroup ) {
      echo "</optgroup>";
    }
    echo "<optgroup label='{$d["grup"]}'>";
    $optgroup = $d["grup"];
  }
  echo "<option value='{$d["golongan"]}' $selected >{$d["golongan"]}</option>";
}
echo "</optgroup>";
*/
?>
												<?php /*
												$grup = 'x';
												$show = false;
												foreach ($golongan as $gol) { 
													
													if ($grup != $gol['grup']) {
													   echo '<optgroup label="# ESELON '.ucfirst($gol['grup']).'">';	
													   echo '</optgroup>'; 
													   	$grup = $gol['grup'];
													   	$show = true;
													} 
													if($show == true){
														$grup = $gol['grup'];
														echo '<option value="'.$gol['id_gol'].'">'.htmlspecialchars($gol['pangkat'].' '.$gol['golongan']).'</option>';	
													   
													}else{
														echo '<optgroup label="# ESELON '.ucfirst($gol['grup']).'">';	
													   	echo '</optgroup>';
													}

													 //echo '<option value="'.$gol['id_gol'].'">'.htmlspecialchars($gol['pangkat'].' '.$gol['golongan']).'</option>';  	
													   	 //echo '<option value="'.$gol['id_gol'].'">'.htmlspecialchars($gol['pangkat'].' '.$gol['golongan']).'</option>';
													//if ($grup == $gol['grup']) {
													//			   echo '<option value="'.$gol['id_gol'].'">'.htmlspecialchars($gol['pangkat'].' '.$gol['golongan']).'</option>';	
													//}
														/*
														   if ($grup != '') { 	

															   	
																   echo '<option value="'.$gol['id_gol'].'">'.htmlspecialchars($gol['pangkat'].' '.$gol['golongan']).'</option>';
																 echo '</optgroup>';    
															}
														
													
													
													
												}
												*/
												?>			
											</select>
											
										</div>
									</div>

<h3 class="header smaller lighter blue"><i class='fa fa-money'></i> Uang Harian</h3>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="nm_golongan" > Golongan</label>
										<div class="col-sm-9">
											<input type="text" id="nm_golongan" placeholder="Rupiah" class="col-xs-10 col-sm-5 pitih" name="nm_golongan" value="<?= $nm_golongan ?>">
											<input class="nominal " name="nominal" style="text-align: right; display: none;">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="uang_harian_golongan" > Uang Saku OH (Rp)</label>
										<div class="col-sm-9">
											<input type="text" id="uang_harian_golongan" placeholder="Rupiah" class="col-xs-10 col-sm-5 pitih" name="uang_harian_golongan" value="<?= $uang_harian_golongan ?>">
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
											<a class="btn btn-default" type="button" href="<?= base_url('master/golongan') ?>">
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
											<a class="btn btn-danger" type="button" href="<?= base_url('master/golongan') ?>">
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
		//window.location = "<?= base_url('master/golongan/') ?>";
	}, 3000);
</script>
</div>