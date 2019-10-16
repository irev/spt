<style type="text/css">


</style>

<?php 

$addNULL                 =""; //default NULL
$hide 					 = 'hide'; //Default Hide
$display				 = 'style="display: none;"'; //Default Hide
$cek 					 = $this->input->get('p');
$tempat 				 = "Simpang Empat";
$msg					 ="";
if($TOKEN==='add' && $cek != '1' && !is_numeric($ID) &&  $ID=== null ){
	$modul 					 = 1;
	$LINK 					 = 'spt/dalam/add?p='.$modul;
	$addid_spt           ="";
	$addno_spt           ="";
	$addno_sppd          ="";
	$addnama             ="";
	$addnip              ="";
	$addpangkat          ="";
	$addgolongan         ="";
	$addjabatan          ="";
	$addmaksud           ="";
	$addtransportasi     ="";
	$addtransnomor  	 ="";
	$addtujuan           ="";
	$addtgl_berangkat    ="";
	$addtgl_kembali      ="";
	$addsumber_dana;

	/////////////////// SPT  	
	$addttd_tempat       ="";
	$addttd_tgl          ="";
	$addttd_jabatan      ="";
	$addttd_nama         ="";
	$addttd_gol          ="";
	$addttd_nip          ="";
	//////////////////// SPPD
	$addttd_sppd_tempat  ="";
	$addttd_sppd_tgl     ="";
	$addttd_sppd_jabatan ="";
	$addttd_sppd_nama    ="";
	$addttd_sppd_gol     ="";
	$addttd_sppd_nip     ="";
	$addbeban            ="";
	$addanggaran         ="";
	$addkegiatan         ="";

	$addjarak            = "";
	$addwilayah          = "";
	$addperjalanan       = "";

	$JUDUL_FORM  = "<i class='fa fa-file'></i> Buat Surat Perintah Tugas <small>Tambah data Surat Perintah Tugas</small>";
}elseif($this->input->get('p') == '1') {
	$hide = 'btn btn-xs btn-primary';
	$post = $this->input->post();
	$modul 					 = 1;
	$LINK 					 = 'spt/dalam/add?p='.$modul;
	$addid_spt               = '';//$post['id_spt'];
	$addno_spt               = $post['nomor_spt'];
	$addno_sppd              = $post['nomor_sppd'];
	$addnama                 = $post['nama'];
	$addnip                  = $post['nip'];
	//$addpangkat              = $post['pangkat'];
	$addgolongan             = $post['golongan'];
	$addjabatan              = $post['jabatan'];
	$addmaksud               = $post['maksud'];
	$addtransportasi         = $post['transpor'];
	$addtransnomor           = $post['tran_nama'];
	$addtujuan               = $post['tujuan'];
	$addtgl_berangkat        = $post['berangkat'];
	$addtgl_kembali          = $post['kembali'];
	$addsumber_dana;
	/////////////////// SPT  	
	$addttd_tempat           = $tempat;
	$addttd_tgl              = $post['tanggal_spt'];
	$addttd_jabatan          = $post['ttd_jabatan'];
	$addttd_nama             = $post['ttd_nama'];
	$addttd_gol              = $post['ttd_golongan'];
	$addttd_nip 			 = $post['ttd_nip'];
	//////////////////// SPPD
	$addttd_sppd_tempat      = $tempat;
	$addttd_sppd_tgl         = $post['tanggal_sppd'];
	$addttd_sppd_jabatan     = $post['ttd_sppd_jabatan'];
	$addttd_sppd_nama        = $post['ttd_sppd_nama'];
	$addttd_sppd_gol         = $post['ttd_sppd_golongan'];
	$addttd_sppd_nip         = $post['ttd_sppd_nip'];
	$addbeban                = $post['pilih_beban'];
	$addanggaran             = $post['pasal_anggaran'];
	$addkegiatan             = $post['kegiatan'];

	$cek =  "p=1";
	$JUDUL_FORM  = "<i class='fa fa-file'></i> Buat Surat Perintah Tugas <small>Tambah data Surat Perintah Tugas</small>";
	/////
	/////input pendukung tambahan
	$addjarak      = $post['jarak'];
	$addwilayah    = $post['wilayah'];
	$addperjalanan = $post['perjalanan'];

}elseif($this->input->get('p') == '3') {
	$hide = 'btn btn-xs btn-primary';
	$post = $this->input->post();
	$modul 					 = 3;
	$LINK 					 = 'spt/dalam/edit/?p='.$modul;
	$addid_spt               = $post['id_spt'];
	$addno_spt               = $post['nomor_spt'];
	$addno_sppd              = $post['nomor_sppd'];
	$addnama                 = $post['nama'];
	$addnip                  = $post['nip'];
	//$addpangkat              = $post['pangkat'];
	$addgolongan             = $post['golongan'];
	$addjabatan              = $post['jabatan'];
	$addmaksud               = $post['maksud'];
	$addtransportasi         = $post['transpor'];
	$addtransportasinama     = $post['tran_nama'];
	$addtujuan               = $post['tujuan'];
	$addtgl_berangkat        = $post['berangkat'];
	$addtgl_kembali          = $post['kembali'];
	$addsumber_dana;
	/////////////////// SPT  	
	$addttd_tempat           = $tempat;
	$addttd_tgl              = $post['tanggal_spt'];
	$addttd_jabatan          = $post['ttd_jabatan'];
	$addttd_nama             = $post['ttd_nama'];
	$addttd_gol              = $post['ttd_golongan'];
	$addttd_nip 			 = $post['ttd_nip'];
	//////////////////// SPPD
	$addttd_sppd_tempat      = $tempat;
	$addttd_sppd_tgl         = $post['tanggal_sppd'];
	$addttd_sppd_jabatan     = $post['ttd_sppd_jabatan'];
	$addttd_sppd_nama        = $post['ttd_sppd_nama'];
	$addttd_sppd_gol         = $post['ttd_sppd_golongan'];
	$addttd_sppd_nip         = $post['ttd_sppd_nip'];
	$addbeban                = $post['pilih_beban'];
	$addanggaran             = $post['pasal_anggaran'];
	$addkegiatan             = $post['pilih_kegiatan'];

	$cek =  "p=1";
	$JUDUL_FORM  = "<i class='fa fa-file'></i> Buat Surat Perintah Tugas <small>Tambah data Surat Perintah Tugas</small>";
	/////
	/////input pendukung tambahan
	$addjarak      = $post['jarak'];
	$addwilayah    = $post['wilayah'];
	$addperjalanan = $post['perjalanan'];

}elseif($TOKEN ==='edit' && $this->input->get('p') == '2'){
	$cek = $this->input->get('p').'else';
	$modul 					 = 2;
	$LINK 					 = 'spt/dalam/edit/'.$spt_dalam->id_spt.'?p='.$modul;
	$addid_spt               = $spt_dalam->id_spt;
	$addno_spt               = $spt_dalam->no_spt;
	$addno_sppd              = $spt_dalam->no_sppd;
	$addnama                 = $spt_dalam->nama;
	$addnip                  = $spt_dalam->nip;
	$addpangkat              = $spt_dalam->pangkat;
	$addgolongan             = $spt_dalam->golongan;
	$addjabatan              = $spt_dalam->jabatan;
	$addmaksud               = $spt_dalam->maksud;
	$addtransportasi         = $spt_dalam->transportasi;
	$addtransnomor           = $this->m_dalam->get_data('m_trasportsasi','nama','nomor',$addtransportasi);

	$addtujuan               = $spt_dalam->tujuan;
	$addjarak 				 = $this->m_dalam->get_data('m_tujuan','jarak','tujuan',$addtujuan);
	$addwilayah				 = $this->m_dalam->get_data('m_tujuan','wilayah','tujuan',$addtujuan);
	$addperjalanan			 = $this->m_dalam->get_data('m_tujuan','perjalanan','tujuan',$addtujuan);

	$addtgl_berangkat        = $spt_dalam->tgl_berangkat;
	$addtgl_kembali          = $spt_dalam->tgl_kembali;
	$addsumber_dana;
	/////////////////// SPT  	
	$addttd_tempat           = $spt_dalam->ttd_tempat;
	$addttd_tgl              = $spt_dalam->ttd_tgl;
	$addttd_jabatan          = $spt_dalam->ttd_jabatan;
	$addttd_nama             = $spt_dalam->ttd_nama;
	$addttd_gol              = $spt_dalam->ttd_gol;
	$addttd_nip  			 = $spt_dalam->ttd_nip;
	//////////////////// SPPD
	$addttd_sppd_tempat      = $spt_dalam->ttd_sppd_tempat;
	$addttd_sppd_tgl         = $spt_dalam->ttd_sppd_tgl;
	$addttd_sppd_jabatan     = $spt_dalam->ttd_sppd_jabatan;
	$addttd_sppd_nama        = $spt_dalam->ttd_sppd_nama;
	$addttd_sppd_gol         = $spt_dalam->ttd_sppd_gol;
	$addttd_sppd_nip         = $spt_dalam->ttd_sppd_nip;
	///////////////////////////
	$addbeban                = $spt_dalam->beban;
	$addanggaran             = $spt_dalam->anggaran;
	$addkegiatan             = $spt_dalam->kegiatan_id;
	$JUDUL_FORM  = "<i class='fa fa-file'></i> Ubah Surat Perintah Tugas <small>Ubah data Surat Perintah Tugas</small>";
}
?>


<h3 class="header smaller lighter blue"><?= $JUDUL_FORM. uniqid() ?></h3>
<?= $this->session->flashdata('msg') ?>	
<div class="text-center" style="color: red;">

									<?php 
									echo  validation_errors ('<div class="alert alert-danger">
											<button type="button" class="close" data-dismiss="alert">
												<i class="ace-icon fa fa-times"></i>
											</button>

											<strong>
												<i class="ace-icon fa fa-times"></i>
												Oh snap!
											</strong>',
											'<br>
										   </div>');  ?>
									</div>

<!--?= $this->session->flashdata('msg'). $cek ?-->
<form class="form-horizontal" role="form" action="<?= base_url($LINK) ?>" method="post" enctype="multipart/form-data">

<div class="col-md-6">	
<h3 class="header smaller lighter blue"><i class="fa fa-user"></i> MEMERINTAHKAN</h3>	
								<?php if($addid_spt != ""){ ?>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="id_spt" > ID</label>

										<div class="col-sm-9">
											<input type="text" id="id_spt" placeholder="ID" class="col-xs-10 col-sm-5 " name="id_spt" value="<?= $addid_spt ?>" readonly>
										</div>
									</div>
								<?php } ?>
								<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="pilih_pegawai"> Pilih Pegawai*</label>

										<div class="col-sm-9">
											<?php
												$btns = ($addnama=="")? "btn-danger" : "btn-primary";
											?>
											<a href="#" class="btn_show_input btn btn-xs <?= $btns ?>" $display data-id="pilih_pegawai">
												<?php 
													echo $_perintah = ($addnama=="") ? "Pilih Pegawai !" : $addnama ;
												 ?>
											</a>	
											<select style="display:none;" id="pilih_pegawai" placeholder="pilih_pegawai" class="col-xs-10 col-sm-5 " name="perintah_untuk">
												<option value="<?= $addNULL ?>"><?= $addNULL ?></option>
												<?php foreach ($pegawai as $peg) {
													echo '<option value="'.$peg['id_peg'].'">'.$peg['nama'].' ▶ '.$peg['nip'].' ▶ '.$peg['jabatan'].' ▶ '.$peg['golongan'].'</option>';
												} ?>
												
											</select>				

										</div>
									</div>	
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="nama" > 1. Nama*</label>

										<div class="col-sm-9">
											<input readonly type="text" id="nama" placeholder="Nama Pegawai" class="col-xs-10 col-sm-5 col-md-10 meedun-input" name="nama" value="<?= $addnama ?>">
										    <div class="bar"></div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="nip" > 2. Nip</label>

										<div class="col-sm-9">
											<input readonly type="text" id="nip" placeholder="Nip" class="col-xs-10 col-sm-5 col-md-10 meedun-input" name="nip" value="<?= $addnip ?>">
											 <div class="bar"></div>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="jabatan"> 3. Jabatan*</label>

										<div class="col-sm-9">
											<input readonly type="text" id="jabatan" placeholder="jabatan" class="col-xs-10 col-sm-5 col-md-10 meedun-input" name="jabatan" value="<?= $addjabatan ?>">	
											<div class="bar"></div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="golongan"> 4. Golongan*</label>

										<div class="col-sm-9">
											<input readonly type="text" id="golongan" placeholder="golongan" class="col-xs-10 col-sm-5 col-md-10 meedun-input" name="golongan" value="<?= $addgolongan ?>">	
											<div class="bar"></div>
										</div>
									</div>
									
									<!--div class="form-group">
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
										</div>
									</div-->
</div>
<div class="col-md-6">	
<h3 class="header smaller lighter blue"><i class="fa fa-bullhorn"></i> PRIHAL SURAT PERINTAH</h3>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="maksud"> 5.	Maksud Melaksanakan Tugas*</label>

										<div class="col-sm-9">
											<textarea id="maksud" placeholder="Maksud Melaksanakan Tugas" class="col-xs-10 col-sm-5 col-md-12 meedun-input" name="maksud" ><?= $addmaksud ?></textarea>	
											
										</div>
									</div>
</div>										
<div class="col-md-6">
<h3 class="header smaller lighter blue"><i class="fa fa-car"></i> TRANSPORTASI</h3>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="pilih_transportasi"> Pilih Transportasi*</label>

										<div class="col-sm-9">
											<?php
												$btns = ($addtransportasi=="")? "btn-danger" : "btn-primary";
											?>	
											<span class="btn_show_input btn btn-xs <?= $btns ?>" $display data-id="pilih_transportasi">
													<?= $_transport = ($addtransportasi=="") ? "Pilih Transportasi" : $addtransportasi ?>
											</span>
										
											<select style="display:none;" id="pilih_transportasi" placeholder="pilih_transportasi" class="col-xs-10 col-sm-5 col-md-6" name="pilih_transportasi">
												<option value="<?= $addNULL ?>"><?= $addNULL ?></option>
												<?php foreach ($transportasi as $tran) {
													echo '<option value="'.$tran['id_tran'].'">'.$tran['nama'].' ▶ '.$tran['nomor'].' ▶ '.$tran['jenis'].' ▶ '.$tran['roda'].'</option>';
												} ?>
												
											</select>				

										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="transpor"> 6.	Nomor Polisi*</label>

										<div class="col-sm-9">
											<input readonly type="text" id="transpor" placeholder="Transportasi" class="col-xs-10 col-sm-5 col-md-10 meedun-input" name="transpor" value="<?= $addtransportasi ?>">	
											<div class="bar"></div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="tran_nama"> 6.	Nama Kendraan*</label>

										<div class="col-sm-9">
											<input readonly type="text" id="tran_nama" placeholder="Transportasi" class="col-xs-10 col-sm-5 col-md-10 meedun-input" name="tran_nama" value="<?= $addtransnomor ?>">	
											<div class="bar"></div>
										</div>
									</div>
</div>
<div class="col-md-6">									
<h3 class="header smaller lighter blue"><i class="fa fa-map-marker"></i> TUJUAN</h3>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="pilih_tujuan"> Pilih Tujuan*</label>

										<div class="col-sm-9">
											<?php
												$btns = ($addtujuan=="")? "btn-danger" : "btn-primary";
											?>
											<span class="btn_show_input btn btn-xs <?= $btns ?>" $display data-id="pilih_tujuan">
												<?php 
													echo $_tujuan = ($addtujuan=="") ? "Pilih Tujuan" : $addtujuan ;
												 ?>
											</span>	
											<select style="display:none;" id="pilih_tujuan" placeholder="pilih_tujuan" class="col-xs-10 col-sm-5 col-md-6 meedun-input" name="pilih_tujuan">
												<option value="<?= $addNULL ?>"><?= $addNULL ?></option>
												<?php foreach ($tujuan as $ke) {
													echo '<option value="'.$ke['id_tujuan'].'">'.$ke['tujuan'].' ▶ '.$ke['jarak'].' ▶ '.$ke['wilayah'].' ▶ '.$tran['perjalanan'].'</option>';
												} ?>
												
											</select>				

										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="tujuan"> 7.	Tujuan*</label>

										<div class="col-sm-9">
											<input readonly type="text" id="tujuan" placeholder="Tujuan" class="col-xs-10 col-sm-5 col-md-10 meedun-input" name="tujuan" value="<?= $addtujuan ?>">	
											<div class="bar"></div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="jarak"> 7.	Jarak*</label>

										<div class="col-sm-9">
											<input readonly type="text" id="jarak" placeholder="Jarak" class="col-xs-10 col-sm-5 col-md-10 meedun-input" name="jarak" value="<?= $addjarak ?>"><span style="position: absolute;">KM</span>
											<div class="bar"></div>&nbsp;
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="wilayah"> 7.	Wilayah*</label>

										<div class="col-sm-9">
											<input readonly type="text" id="wilayah" placeholder="Wilayah" class="col-xs-10 col-sm-5 col-md-10 meedun-input" name="wilayah" value="<?= $addwilayah ?>">	
											<div class="bar"></div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="perjalanan"> 7.	Perjalanan*</label>

										<div class="col-sm-9">
											<input readonly type="text" id="perjalanan" placeholder="Perjalanan" class="col-xs-10 col-sm-5 col-md-10 meedun-input" name="perjalanan" value="<?= $addperjalanan ?>">	
											<div class="bar"></div>
										</div>
									</div>
</div>
<div class="col-md-6">
<h3 class="header smaller lighter blue"><i class="fa fa-clock-o"></i> TANGGAL BERANGKAT dan KEMBALI</h3>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="berangkat"> 8.	Berangkat*</label>
										<div class="col-xs-12 col-sm-2 col-md-9">
											<input  type="date" id="berangkat" placeholder="Perjalanan" class="col-xs-10 col-sm-12 meedun-input" name="berangkat" value="<?= $addtgl_berangkat ?>">
										</div>
										
									</div>
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="berangkat"> 9. kembali*</label>
											<div class="col-xs-12 col-sm-2 col-md-9">	
											<input  type="date" id="kembali" placeholder="Kembali" class="col-xs-10 col-sm-12 col-md-12 meedun-input" name="kembali" value="<?= $addtgl_kembali ?>">	
											</div>
										</div>
									
</div>
<div class="col-md-6">
<h3 class="header smaller lighter blue"><i class="fa fa-money"></i> SUMBER DANA</h3>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 10. Anggaran Belanja Langsung Tahun*</label>

										<div class="col-sm-9">

											<select id="tahun" name="tahun" class="col-xs-10 col-sm-5 col-md-10 meedun-input">
												<option value="<?= $addNULL ?>"><?= $addNULL ?></option>
												<option value=""><?= date('Y') ?></option>
												<?php 
												for ($i=2018; $i <= 2050; $i++) { 
													if($i == date('Y')){
														echo '<option value="'.$i.'" selected>'.$i.'</option>';
													}else{
														echo '<option value="'.$i.'">'.$i.'</option>';
													}
													
												}

												 ?> 
											</select>

										</div>
									</div>
</div>									
<div class="row">
<div class="col-md-12">									
<h3 class="header smaller lighter blue"><i class="fa fa-money"></i> TANDA TANGAN SPT & SPPD</h3>
			<div class="col-sm-6">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="nomor_spt" > Nomor SPT*</label>

										<div class="col-sm-9">
											<input  type="text" id="nomor_spt" placeholder="090/xxxx/SPT/DPUPR/2019" class="col-xs-10 col-sm-5 col-md-12 meedun-input" name="nomor_spt" value="<?= $addno_spt ?>">
											<div class="bar"></div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="tempat_spt" > Tempat TTD SPT*</label>

										<div class="col-sm-9">
											<select id="tempat_spt" placeholder="tempat_spt" class="col-xs-10 col-sm-5 col-md-12 meedun-input" name="tempat_spt">
												<option value="Simpang Empat">Simpang Empat</option>
												<option value="Simpang Empat">Simpang Empat</option>
											</select>
											<!--input  type="date" id="tempat_spt" placeholder="tempat_spt" class="col-xs-10 col-sm-5 col-md-12 meedun-input" name="tempat_spt" value="<?= $tempat ?>">
											<div class="bar"></div-->
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="tanggal_spt" > Tanggal SPT*</label>

										<div class="col-sm-9">
											<input  type="date" id="tanggal_spt" placeholder="tanggal_spt" class="col-xs-10 col-sm-5 col-md-12 meedun-input" name="tanggal_spt" value="<?= $addttd_tgl ?>">
											<div class="bar"></div>
										</div>
									</div>
			<p class="red">Penanda Tangan SPT</p>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="pilih_pegawai_spt"> Pilih Pegawai*</label>
										<div class="col-sm-9">
											<?php
												$btns = ($addttd_nama=="")? "btn-danger" : "btn-primary";
											?>
										<span class="btn_show_input btn btn-xs <?= $btns ?>" $display data-id="pilih_pegawai_spt">
											<?= $retVal = ($addttd_nama == "") ? "Tanda Tangan SPT ?" : $addttd_nama; ?>
										</span>	
											<select <?= $display ?> id="pilih_pegawai_spt" placeholder="Pilih Penanda Tangan SPT" class="col-xs-10 col-sm-5 col-md-12" name="pilih_pegawai">
												<option value="<?= $addNULL ?>"><?= $addNULL ?></option>
												<?php foreach ($pegawai as $peg) {
													echo '<option value="'.$peg['id_peg'].'">'.$peg['nama'].' ▶ '.$peg['nip'].' ▶ '.$peg['jabatan'].' ▶ '.$peg['golongan'].'</option>';
												} ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="ttd_nama" > 1. Nama*</label>

										<div class="col-sm-9">
											<input readonly type="text" id="ttd_nama" placeholder="nama tdd spt" class="col-xs-10 col-sm-5 col-md-12 meedun-input" name="ttd_nama" value="<?= $addttd_nama ?>">
											<div class="bar"></div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="ttd_nip" > 2. Nip</label>

										<div class="col-sm-9">
											<input readonly type="text" id="ttd_nip" placeholder="nip ttd spt" class="col-xs-10 col-sm-5 col-md-12 meedun-input" name="ttd_nip" value="<?= $addttd_nip ?>">
											<div class="bar"></div>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="ttd_jabatan"> 3. Jabatan*</label>

										<div class="col-sm-9">
											<input readonly type="text" id="ttd_jabatan" placeholder="jabatan ttd spt" class="col-xs-10 col-sm-5 col-md-12 meedun-input" name="ttd_jabatan" value="<?= $addttd_jabatan ?>">	
											<div class="bar"></div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="ttd_golongan"> 4. Golongan*</label>

										<div class="col-sm-9">
											<input readonly type="text" id="ttd_golongan" placeholder="golongan ttd spt" class="col-xs-10 col-sm-5 col-md-12 meedun-input" name="ttd_golongan" value="<?= $addttd_gol ?>">	
											<div class="bar"></div>
										</div>
									</div>
					</div>
					<div class="col-sm-6">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="nomor_sppd" > Nomor SPPD*</label>

										<div class="col-sm-9">
											<input  type="text" id="nomor_sppd" placeholder="900/xxxx/SPPD/DPUPR/2019" class="col-xs-10 col-sm-5 col-md-12 meedun-input" name="nomor_sppd" value="<?= $addno_sppd ?>">
											<div class="bar"></div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="tempat_sppd" >Tempat TTD SPPD*</label>

										<div class="col-sm-9">
											<select id="tempat_sppd" placeholder="tempat_sppd" class="col-xs-10 col-sm-5 col-md-12 meedun-input" name="tempat_sppd">
												<option value="Simpang Empat">Simpang Empat</option>
												<option value="Simpang Empat">Simpang Empat</option>
												<option></option>
											</select>

											<!--input  type="date" id="tempat_sppd" placeholder="tempat_sppd" class="col-xs-10 col-sm-5 col-md-12 meedun-input" name="tempat_sppd" value="<?= $tempat ?>">
											<div class="bar"></div-->
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="tanggal_sppd" > Tanggal SPPD*</label>

										<div class="col-sm-9">
											<input  type="date" id="tanggal_sppd" placeholder="tanggal_sppd" class="col-xs-10 col-sm-5 col-md-12 meedun-input" name="tanggal_sppd" value="<?= $addttd_sppd_tgl ?>">
											<div class="bar"></div>
										</div>
									</div>
									
						<p class="red">Penanda Tangan SPPD</p>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="pilih_pegawai"> Pilih Pegawai*</label>
										<div class="col-sm-9">
											<?php
												$btns = ($addttd_sppd_nama=="")? "btn-danger" : "btn-primary";
											?>
											<span class="btn_show_input btn btn-xs <?= $btns ?>" $display data-id="pilih_pegawai_sppd">
												<?= $retVal = ($addttd_sppd_nama == "") ? "Tanda Tangan SPPD ?" : $addttd_sppd_nama; ?>
											</span>
											<select <?= $display ?>id="pilih_pegawai_sppd" placeholder="pilih_pegawai_sppd" class="col-xs-10 col-sm-5 col-md-12" name="pilih_pegawai">
												<option value="<?= $addNULL ?>"><?= $addNULL ?></option>
												<?php foreach ($pegawai as $peg) {
													echo '<option value="'.$peg['id_peg'].'">'.$peg['nama'].' ▶ '.$peg['nip'].' ▶ '.$peg['jabatan'].' ▶ '.$peg['golongan'].'</option>';
												} ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="ttd_sppd_nama" > 1. Nama*</label>

										<div class="col-sm-9">
											<input readonly type="text" id="ttd_sppd_nama" placeholder="Nama Pegawai" class="col-xs-10 col-sm-5 col-md-12 meedun-input" name="ttd_sppd_nama" value="<?= $addttd_sppd_nama ?>">
											<div class="bar"></div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="ttd_sppd_nip" > 2. Nip</label>

										<div class="col-sm-9">
											<input readonly type="text" id="ttd_sppd_nip" placeholder="Nip" class="col-xs-10 col-sm-5 col-md-12 meedun-input" name="ttd_sppd_nip" value="<?= $addttd_sppd_nip ?>">
											<div class="bar"></div>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="ttd_sppd_jabatan"> 3. Jabatan*</label>

										<div class="col-sm-9">
											<input readonly type="text" id="ttd_sppd_jabatan" placeholder="jabatan" class="col-xs-10 col-sm-5 col-md-12 meedun-input" name="ttd_sppd_jabatan" value="<?= $addttd_sppd_jabatan ?>">	
											<div class="bar"></div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="ttd_sppd_golongan"> 4. Golongan*</label>

										<div class="col-sm-9">
											<input readonly type="text" id="ttd_sppd_golongan" placeholder="golongan" class="col-xs-10 col-sm-5 col-md-12 meedun-input" name="ttd_sppd_golongan" value="<?= $addttd_sppd_gol ?>">	
											<div class="bar"></div>
										</div>
									</div>
					</div>
				</div>
			</div>
	
<h3 class="header smaller lighter blue"><i class="fa fa-info"></i> Perhitungan Mengadakan Pekerjaan<p class="red">SPPD No.7</p></h3>
					
									<div class="form-group">
										
										<label class="col-sm-3 control-label no-padding-right" for="pilih_beban">Atas Beban*</label>
										<div class="col-sm-9">
												<?php 
													$btns = ($addanggaran=="" or $addanggaran==0)? "btn-danger" : "btn-primary";
													$anga = ($addanggaran=="" or $addanggaran==0)? "":$this->m_master->anggaran($addanggaran);		
															
												 ?>
											<span class="btn_show_input btn btn-xs <?= $btns ?>" $display data-id="pilih_beban">
												<?php 
												 		echo $btnAng = ($addanggaran == "" or $addanggaran==0) ? "ANGGARAN DPA/DPPA  ?" : $anga->kode." ".$anga->ket." ".$anga->tahun;
												 ?>
											
											</span>
											<select <?= $display ?>id="pilih_beban" placeholder="pilih_beban" class="col-xs-10 col-sm-5 col-md-10 meedun-input" name="pilih_beban">
												<?php if(is_object($spt_dalam)): ?>
												<option value="<?= $addanggaran ?>"><?= $btnAng ?></option>
												<?php endif ?>
												<?php if(!is_object($spt_dalam)): ?>
												<option value="<?= $addanggaran ?>"><?= $addanggaran  ?></option>
												<?php endif ?>
												<?php foreach ($anggaran as $ang) {
													echo '<option value="'.$ang['id_anggaran'].'">'.$ang['kode'].' ▶ '.$ang['ket'].' '.$ang['tahun'].'</option>';
												} ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										
										<label class="col-sm-3 control-label no-padding-right" for="pilih_kegiatan">Pada Kegiatan*</label>
										<div class="col-sm-9">
												<?php 
													$btns = ($addkegiatan=="" or $addkegiatan==0)? "btn-danger" : "btn-primary";
													$keg = ($addkegiatan=="" or $addkegiatan==0)? "":$this->m_master->kegiatan($addkegiatan);		
												 ?>
											<span class="btn_show_input btn btn-xs <?= $btns ?>" $display data-id="pilih_kegiatan">
												<?php 
												 		echo $btnKeg = ($addkegiatan=="" or $addkegiatan==0) ? "Pada Kegiatan ?" : $keg->rekening." ".$keg->kegiatan." ".$keg->tahun;
												 ?>
											
											</span>
											<select <?= $display ?>id="pilih_kegiatan" placeholder="pilih_kegiatan" class="col-xs-10 col-sm-5 col-md-10 meedun-input" name="kegiatan">
												<?php if(is_object($spt_dalam)): ?>
												<option value="<?= $spt_dalam->kegiatan_id ?>"><?= $btnKeg ?></option>
												<?php endif ?>
												<?php if(!is_object($spt_dalam)): ?>
												<option value="<?= $addkegiatan ?>"><?= $addkegiatan ?></option>
												<?php endif ?>
												<?php foreach ($kegiatan as $keg) {
													echo '<option value="'.$keg['id_kegiatan'].'">'.$keg['rekening'].' ▶ '.$keg['kegiatan'].'</option>';
												} ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="pasal_anggaran">Pasal Anggaran*</label>

										<div class="col-sm-9">
											<textarea id="pasal_anggaran" placeholder="Pasal Anggaran" class="col-xs-10 col-sm-5 col-md-10 meedun-input" name="pasal_anggaran"></textarea>
											<!--input type="text" id="pasal_anggaran" placeholder="Pasal Anggaran" class="col-xs-10 col-sm-5 meedun-input" name="pasal_anggaran" value="<?= $addttd_sppd_gol ?>">	
											<div class="bar"></div-->
										</div>
									</div>

			


						
<?php if($addid_spt != ""){ ?>									
<h3 class="header smaller lighter blue"><i class="fa fa-users"></i> 11. PENGIKUT</h3>
									<div class="row">
										<div class="col-xs-12 col-md-12 ">
											<a href="<?= base_url('spt/dalam/pengikut/').'/'.$addid_spt ?>" class="btn btn-xs btn-warning"><i class="fa fa-users"></i> + PENGIKUT</a>
										<table class="table table-">
											<thead>
												<tr>
													<th>No</th>
													<th>Nama</th>
													<th>Nip</th>
													<th>Pangkat/Gol</th>
													<th>Jabatan</th>
												</tr>
											</thead>
											<tbody>
												<?php 
												if(count($spt_pengikut) > 0){
												$no =1;
													foreach ($spt_pengikut as $peng) {
														echo '<tr>';
														echo '<td>'.$no.'</td>';
														echo '<td>'.$peng['nama_pengikut'].'</td>';
														echo '<td>'.$peng['nip_pengikut'].'</td>';
														echo '<td>'.$peng['pangkat'].' '.$peng['golongan'].'</td>';
														echo '<td>'.$peng['jabatan_pengikut'].'</td>';
														echo '</tr>';
														$no++; 
													}
												}else{
													echo'<tr>
														<td>1</td>
														<td style="text-align: left;">-</td>
														<td >-</td>
														<td>-</td>
														<td>-</td>
														</tr>';
												}
												?>
											</tbody>
										</table>
										</div>
									</div>

<?php } ?>
<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<a class="btn btn-default" type="button" href="<?= base_url('spt/dalam') ?>">
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
											<a class="btn btn-danger" type="button" href="<?= base_url('spt/dalam') ?>">
												<i class="ace-icon fa fa-times bigger-110"></i>
												Batal
											</a>
										</div>
									</div>									
</form>

<button class="btn btn-primary hide" id="gritter-center">Center</button>


<script type="text/javascript">
	setTimeout(function(){ 
		//$( ".alert" ).hide( "slow" );
		$(".alert-x").slideUp(500);
		//window.location = "<?= base_url('spt/dalam') ?>";
	}, 3000);
</script>

<?= $TOKEN ?><br>	
<?= $ID ?><br>
<?= $this->input->get('p') ?><br>
<!--?= $this->db->last_query() ?><br-->