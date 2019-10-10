<?php 
//print_r($client);

foreach ($client as $c ) {
	$nama = $c['nama'];
	$username = $c['user'];
	$kota = $c['kota'];
	$alamat = $c['alamat'];
	$hp = $c['hp'];
	$email = $c['email'];
	$status = $c['status'];
	$date_c = $c['date_c'];
	$date_upd = $c['date_upd'];
}
?>


<div class="space-12"></div>
<h3 class="text-center">DAFTAR PERUSAHAAN</h3>
<div class="space-12"></div>

<div  class="row">
<?php 
$no=1;
//print_r($perusahaan_client);
foreach ($perusahaan_client as $p ) {
 ?>
<div class="col-xs-12 col-sm-6">
<div class="widget-box collapsed">
	<div class="widget-header">
		<h4 class="widget-title"><?= $p['perusahaan'] ?></h4>
		<div class="widget-toolbar">
			<a href="#" data-action="collapse">
				<i class="ace-icon fa fa-chevron-up"></i>
			</a>

			<!--a href="#" data-action="close">
			<i class="ace-icon fa fa-times"></i>
			</a-->
		</div>
	</div>
<div class="widget-body">
<div class="widget-main">	
<!--div class=" label label-success label-xlg arrowed-in arrowed-in-right" style="height: 30pt; width: 97.5%;">
													<div class="inline position-relative">
														<?= $no ?>
														<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
															<i class="ace-icon fa fa-circle light-green"></i>
															&nbsp;
															<span class="white" style="font-size: 20pt;"><?= $p['perusahaan'] ?></span>
														</a>
													</div>
												</div-->
											
											


											<div class="profile-user-info profile-user-info-striped" >
												<div class="profile-info-row">
													<div class="profile-info-name"> Tipe </div>

													<div class="profile-info-value">
														<span class="editable" id="username"><?= $p['jenis'] ?></span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Tipe </div>

													<div class="profile-info-value">
														<span class="editable" id="username"><b><?= $p['direktur'] ?></b></span>
													</div>
												</div>

												<div class="profile-info-row">
													
													<div class="profile-info-name"> Alamat </div>

													<div class="profile-info-value">
														<i class="fa fa-map-marker light-orange bigger-110"></i>
														<span class="editable" id="age"><?= $p['alamat'] ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Kontak </div>

													<div class="profile-info-value">
														<span class="editable" id="login"><?= $p['kontak'] ?></span>
													</div>
												</div>
		
												<div class="profile-info-row">
													<div class="profile-info-name"> NPWP </div>

													<div class="profile-info-value">
														<span class="editable" id="signup"><?= $p['npwp'] ?></span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> BANK </div>

													<div class="profile-info-value">
														<span class="editable" id="about"><?= $p['bank'] ?></span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Rekening </div>

													<div class="profile-info-value">
														<span class="editable" id="signup"><?= $p['rekening'] ?></span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Dibuat Pada </div>

													<div class="profile-info-value">
														<span class="editable" id="signup"><?= $p['date_c'] ?></span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Diubah Pada </div>

													<div class="profile-info-value">
														<span class="editable" id="signup"><?= $p['date_upd'] ?></span>
													</div>
												</div>

											</div>

									
<div class="space-10"></div>
											<div class="center">
												<a href="<?= base_url('perusahaan/paket').'/'. $p['id_perusahaan'] ?>" type="button" class="btn btn-sm btn-primary btn-white btn-round btn-perusahaan" id-perusahaan=" <?= $p['id_perusahaan'] ?>">
													<i class="ace-icon fa fa-file bigger-150 middle green"></i>
													<span class="bigger-110">DAFTAR PAKET</span>

													<i class="icon-on-right ace-icon fa fa-arrow-right"></i>
												</a>
												<a href="<?= base_url('perusahaan/kontrak').'/'. $p['id_perusahaan'] ?>" type="button" class="btn btn-sm btn-primary btn-white btn-round btn-perusahaan" id-perusahaan=" <?= $p['id_perusahaan'] ?>">
													<i class="ace-icon fa fa-file bigger-150 middle green"></i>
													<span class="bigger-110">DAFTAR KONTRAK</span>

													<i class="icon-on-right ace-icon fa fa-arrow-right"></i>
												</a>
												
												<a href="<?= base_url('perusahaan/bap').'/'. $p['id_perusahaan'] ?>" type="button" class="btn btn-sm btn-primary btn-white btn-round">
													<i class="ace-icon fa fa-file bigger-150 middle orange2"></i>
													<span class="bigger-110">DAFTAR BAP</span>

													<i class="icon-on-right ace-icon fa fa-arrow-right"></i>
												</a>
											</div>
</div>		
</div>		
</div>		
</div>		

<?php 
$no++;
} 
?>


<?php 
 print_r($this->session->all_userdata());
?>

</div>	