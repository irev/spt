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
<div id="user-profile-1" class="user-profile row">
<div class="col-xs-12 col-sm-3 center">	
<div class="space-4"></div>
<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
													<div class="inline position-relative">
														<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
															<i class="ace-icon fa fa-circle light-green"></i>
															&nbsp;
															<span class="white"><?= $nama ?></span>
														</a>

														<ul class="align-left dropdown-menu dropdown-caret dropdown-lighter">
															<li class="dropdown-header"> Change Status </li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-circle green"></i>
&nbsp;
																	<span class="green">Available</span>
																</a>
															</li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-circle red"></i>
&nbsp;
																	<span class="red">Busy</span>
																</a>
															</li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-circle grey"></i>
&nbsp;
																	<span class="grey">Invisible</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
<div class="space-4"></div>											
</div>
<div class="space-12"></div>

											<div class="profile-user-info profile-user-info-striped">
												<div class="profile-info-row">
													<div class="profile-info-name"> Username </div>

													<div class="profile-info-value">
														<span class="editable" id="username"><?= $username ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Kota </div>

													<div class="profile-info-value">
														<i class="fa fa-map-marker light-orange bigger-110"></i>
														<span class="editable" id="country"><?= $kota ?></span>
														<span class="editable" id="city"><?= $kota ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Alamat </div>

													<div class="profile-info-value">
														<span class="editable" id="age"><?= $alamat ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> HP </div>

													<div class="profile-info-value">
														<span class="editable" id="login"><?= $hp ?></span>
													</div>
												</div>
		
												<div class="profile-info-row">
													<div class="profile-info-name"> Email </div>

													<div class="profile-info-value">
														<span class="editable" id="signup"><?= $email ?></span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Satus </div>

													<div class="profile-info-value">
														<span class="editable" id="about"><?= $status ?></span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Joined </div>

													<div class="profile-info-value">
														<span class="editable" id="signup"><?= $date_c ?></span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Diubah Pada </div>

													<div class="profile-info-value">
														<span class="editable" id="signup"><?= $date_upd ?></span>
													</div>
												</div>

											</div>

											<div class="space-20"></div>
</div>											
											<div class="center">
												<button type="button" class="btn btn-sm btn-primary btn-white btn-round">
													<i class="ace-icon fa fa-user bigger-150 middle orange2"></i>
													<span class="bigger-110">EDIT PROFILE</span>

													<i class="icon-on-right ace-icon fa fa-arrow-right"></i>
												</button>
											</div>




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
<div class="width-80 label label-success label-xlg arrowed-in arrowed-in-right">
													<div class="inline position-relative">
														<?= $no ?>
														<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
															<i class="ace-icon fa fa-circle light-green"></i>
															&nbsp;
															<span class="white"><?= $p['perusahaan'] ?></span>
														</a>
													</div>
												</div>
											
											


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

									
<div class="space-20"></div>
											<div class="center">
												<a type="button" href="<?= base_url('Perusahaan/index').'/'.$p['id_perusahaan'] ?>" class="btn btn-sm btn-primary btn-white btn-round">
													<i class="ace-icon fa fa-file bigger-150 middle orange2"></i>
													<span class="bigger-110">EDIT PERUSAHAAN</span>

													<i class="icon-on-right ace-icon fa fa-arrow-right"></i>
												</a>
											</div>
</div>		

<?php 
$no++;
} 
?>

</div>	