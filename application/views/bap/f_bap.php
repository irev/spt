
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<h4 class="lighter">
									<i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
									<a href="#modal-wizard" data-toggle="modal" class="pink"> INPUT DATA BAP </a> <?= $this->session->userdata('username'); ?>
								</h4>

								<div class="hr hr-18 hr-double dotted"></div>

								<div class="widget-box">
									<div class="widget-header widget-header-blue widget-header-flat">
										<h4 class="widget-title lighter">INPUT BERITA ACARA PEMBAYARAN</h4>

										<div class="widget-toolbar">
											<label>
												<small class="green">
													<b>Validation</b>
												</small>

												<input id="skip-validation" type="checkbox" class="ace ace-switch ace-switch-4" checked />
												<span class="lbl middle"></span>
											</label>
										</div>
									</div>

									<div class="widget-body">
										<div class="widget-main">
											<div id="fuelux-wizard-container">
												<div>
													<ul class="steps">
														<li data-step="1" class="active">
															<span class="step">1</span>
															<span class="title">PERUSAHAAN</span>
														</li>

														<li data-step="2">
															<span class="step">2</span>
															<span class="title">KONTRAK</span>
														</li>

														<li data-step="3">
															<span class="step">3</span>
															<span class="title">BAP</span>
														</li>

														<li data-step="4">
															<span class="step">4</span>
															<span class="title">REALISASI</span>
														</li>
														<li data-step="5">
															<span class="step">5</span>
															<span class="title">SELESAI</span>
														</li>
													</ul>
												</div>

												<hr />

												<div class="step-content pos-rel">
													<div class="step-pane active" data-step="1">
														

											
<!-- FORM VALIDATION PERUSAHAAN step 1-->
														<form class="form-horizontal" id="validation-form-perusahaan" method="get">
															<h3 class="lighter block green">PERUSAHAAN</h3>
																		<div class="hr hr-dotted"></div>
																		
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="perusahaan">Nama Perusahaan</label>

																			<div class="col-xs-12 col-sm-9">
																				<select id="perusahaan" name="perusahaan" class="select2 col-xs-12 col-sm-9" data-placeholder="Pilih Perusahaan...">
																					<option value="">&nbsp;</option>
																					<?php
																					//echo $this->session->userdata('idclient');
																					foreach ($perusahaan as $per) {
																						echo "<option value='".$per['id_perusahaan']."'>".$per['perusahaan']."</option>";
																					}
																					?>
																				</select>
																			</div>
																		</div>

																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="NAMA_PERUSAHAAN">NAMA PERUSAHAAN:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input type="text" name="NAMA_PERUSAHAAN" id="NAMA_PERUSAHAAN" class="col-xs-12 col-sm-6" />
																				</div>
																			</div>
																		</div>

																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="JENIS_PERUSAHAAN">JENIS:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<select class="col-xs-12 col-sm-4" id="JENIS_PERUSAHAAN" name="JENIS_PERUSAHAAN">
																						<option value="">----PT----/----CV------</option>
																						<option value="PT">PERSEROAN TERBATAS (PT)</option>
																						<option value="CV">COMMANDITAIRE VENNOOTSCHAP (CV)</option>

																					</select>
																				</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="NAMA_ALAMAT_PERUSAHAAN">ALAMAT PERUSAHAAN:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<textarea type="text" name="NAMA_ALAMAT_PERUSAHAAN" id="NAMA_ALAMAT_PERUSAHAAN" class="col-xs-12 col-sm-6" ></textarea>
																				</div>
																			</div>
																		</div>
																		<div class="hr hr-dotted"></div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="NPWP_PERUSAHAAN">NPWP PERUSAHAAN:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input type="text" name="NPWP_PERUSAHAAN" id="NPWP_PERUSAHAAN" class="col-xs-12 col-sm-6" />
																				</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="BANK">BANK:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input type="text" name="BANK" id="BANK" class="col-xs-12 col-sm-6" />
																				</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="REKENING_PERUSAHAAN">NOMOR REKENING BANK:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input type="text" name="REKENING_PERUSAHAAN" id="REKENING_PERUSAHAAN" class="col-xs-12 col-sm-6" />
																				</div>
																			</div>
																		</div>


																		<div class="hr hr-dotted"></div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="PIMPINAN">PIMPINAN</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<select class="input-medium" id="PIMPINAN" name="PIMPINAN">
																						<option value="">------------------</option>
																						<option value="Direktur">Direktur (Pria)</option>
																						<option value="Direktris">Direktris (Wanita)</option>
																						<option value="Kepala Cabang">Kepala Cabang</option>
																						<option value="Manager">Manager</option>
																					</select>
																				</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="NAMA_PIMPINAN_PERUSAHAAN">NAMA PIMPINAN:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input type="text" name="NAMA_PIMPINAN_PERUSAHAAN" id="NAMA_PIMPINAN_PERUSAHAAN" class="col-xs-12 col-sm-6" />
																				</div>
																			</div>
																		</div>

																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="NAMA_ALAMAT_PIMPINAN">ALAMAT PIMPINAN:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<textarea type="text" name="NAMA_ALAMAT_PIMPINAN" id="NAMA_ALAMAT_PIMPINAN" class="col-xs-12 col-sm-6" ></textarea>
																				</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="KONTAK">KONTAK:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input type="text" name="KONTAK" id="KONTAK" class="col-xs-12 col-sm-6" />
																				</div>
																			</div>
																		</div>
																		<div class="hr hr-dotted"></div>
															</form>
																		
												</div>
<!--
////////////// 
STEP PERUSAHAAN
///////////
-->

								<div class="step-pane" data-step="2">
<!----TABEL KONTRAK---->
															<div class="alert alert-danger">
																<button type="button" class="close" data-dismiss="alert">
																	<i class="ace-icon fa fa-times"></i>
																</button>

																<strong>
																	<i class="ace-icon fa fa-times"></i>
																	Oh snap!
																</strong>

																Disini jika data kontrak >= 1 ada/lebih, maka tampilkan tabel hiden form .
																<br>
															</div>
									<div class="col-xs-12">
																<div class="table-header">

																	KONTRAK
																</div>
																<table class="table  table-bordered table-hover">
																	<thead class="">
																	<tr>
																		<th>KONTRAK</th>
																		<th>NOMOR</th>
																		<th>NILAI (Rp)</th>
																		<th>TANGGAL KONTRAK</th>
																		<th>TANGGAL BERAKHIR</th>
																		<th>HARI</th>
																	</tr>
																	</thead>
																	<tbody>
																		<tr>
																			<td>KONTRAK</td>
																			<td>602/213/KONTRAK/BM/DPUPR/2019</td>
																			<td>142224500</td>
																			<td>3 AGUSTUS 2019</td>
																			<td>9 DESEMBER 2019</td>
																			<td>4</td>
																		</tr>
																		<tr>
																			<td>KONTRAK ADD I</td>
																			<td>602/312/ADDI/DPUPR/2019</td>
																			<td>142224500</td>
																			<td>9 AGUSTUS 2019</td>
																			<td>9 DESEMBER 2019</td>
																			<td>120</td>
																		</tr>
																	</tbody>
																</table>
																<button>+ KONTRAK ADDENDUM</button>
															</div>
<!----TABEL KONTRAK END---->	

									<form class="form-horizontal" id="validation-form-kontrak" method="get">
														<h3 class="lighter block green">KONTRAK</h3>
																		<div class="hr hr-dotted"></div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="KONTRAK">KONTRAK</label>

																			<div class="col-xs-12 col-sm-9">
																				<select id="KONTRAK" name="KONTRAK" class="select2 col-xs-12 col-sm-6" data-placeholder="Pilih Judul Kontrak...">
																					<option value="">&nbsp;</option>
																					
																					<option value="KONTRAK">KONTRAK</option>
																					<option value="KONTRAK ADD I">KONTRAK ADD I</option>
																					<option value="KONTRAK ADD II">KONTRAK ADD II</option>
																					<option value="KONTRAK ADD III">KONTRAK ADD III</option>
																					<option value="KONTRAK ADD IV">KONTRAK ADD IV</option>
																					<option value="KONTRAK ADD V">KONTRAK ADD V</option>
																					<option value="KONTRAK ADD VI">KONTRAK ADD VI</option>
																					
																				</select>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="NOMOR_KONTRAK">NOMOR KONTRAK:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input type="text" placeholder="contoh: 602/001/KONTRAK/BM/DPUPR/2019" name="NOMOR_KONTRAK" id="NOMOR_KONTRAK" class="col-xs-12 col-sm-6" />
																				</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="NILAI_KONTRAK">NILAI (Rp):</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input type="number" placeholder=" Nilai belum support bilangan berkoma" name="NILAI_KONTRAK" id="NILAI_KONTRAK" class="col-xs-12 col-sm-6" />
																					<span class="help-inline col-xs-12 col-sm-7">
																						<span class="middle blue NILAI_KONTRAK_FORMAT" id="NILAI_KONTRAK_FORMAT"></span></strong>
																					</span>
																				</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="TGL_MULAI_KONTRAK">TANGGAL MULAI:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input type="date" name="TGL_MULAI_KONTRAK" id="TGL_MULAI_KONTRAK" class="TANGGAL col-xs-12 col-sm-4" />
																				</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="TGL_AKHIR_KONTRAK">TANGGAL AKHIR:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input type="date" name="TGL_AKHIR_KONTRAK" id="TGL_AKHIR_KONTRAK" class="col-xs-12 col-sm-4" />
																				</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="HARI_PEKERJAAN">LAMA PEKERJAAN (HARI):</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input type="number" max="360" name="HARI_PEKERJAAN" id="HARI_PEKERJAAN" class="col-xs-6 col-sm-1" />
																					<span class="middle"> Hari Kelender</span>
																				</div>
																				
																			</div>
																		</div>

																		




																		<!--div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="perusahaan">Nama Perusahaan</label>

																			<div class="col-xs-12 col-sm-9">
																				<select id="perusahaan" name="perusahaan" class="select2 col-xs-12 col-sm-6" data-placeholder="Pilih Perusahaan...">
																					<option value="">&nbsp;</option>
																					<?php
																					//echo $this->session->userdata('idclient');
																					foreach ($kontrak as $per) {
																						echo "<option value='".$per['id_kontrak']."'>".$per['nomor_kontrak']."</option>";
																					}
																					?>
																				</select>
																			</div>
																		</div-->
									</form>			
						</div>
<!--
////////////// 
STEP KONTRAK END
///////////
-->						

													<div class="step-pane" data-step="3">
														<div class="center">
															<h3 class="blue lighter">DATA BERITA ACARA PEMBAYARAN</h3>
														</div>	
<!-- FORM VALIDATION BAP step 3-->

															<form class="form-horizontal" id="validation-form-bap" method="post">
															<h3 class="lighter block green">Masukkan Data BAP</h3>
															<div class="hr hr-dotted"></div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="BAP_JUDUL">JENIS PEMBAYARAN:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<select placeholder="JENIS PAP " name="JENIS_BAP" id="JENIS_BAP" class="col-xs-12 col-sm-6">
																						<optgroup>#</optgroup>
																							<option></option>
																							<option value="0">Uang Muka Kerja</option>
																						
																						<optgroup>#</optgroup>
																							<option value="1">Termyn</option>	
																							<option value="2">Termyn Terakhir</option>	    
																						
																					</select>
																					
																				</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="BAP_JUDUL">JUDUL BAP:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input type="text" placeholder="contoh: MC 01 dan MC 02 " name="BAP_JUDUL" id="BAP_JUDUL" class="col-xs-12 col-sm-6" />
																				</div>
																			</div>
																		</div>

																		<div class="space-2"></div>

																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="BAP_PROGRES">PROGRES %:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input type="number" min="0" max="100" placeholder="1-100" name="BAP_PROGRES" id="BAP_PROGRES" class="col-xs-2 col-sm-1" />
																					<span class="help-inline col-xs-12 col-sm-7">
																						<span class="middle">%</span>
																					</span>
																				</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="BAP_NOMOR">NOMOR BAP:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input type="text" placeholder="contoh: 601/001/MC-BM/DPUPR/2019" name="BAP_NOMOR" id="BAP_NOMOR" class="col-xs-12 col-sm-6" />
																				</div>
																			</div>
																		</div>
															<h3 class="lighter block green">DATA PEJABAT BAP</h3>
															<div class="hr hr-dotted"></div>
															<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="BAP_PEJABAT">Grup Pejabat</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<span class="blue">Salin dari </span>
																				<select id="BAP_PEJABAT" name="BAP_PEJABAT" class="select2 col-xs-12 col-sm-9" data-placeholder="Pilih Grup Pejabat...">
																					<option value="">&nbsp;</option>
																					<?php
																					//echo $this->session->userdata('idclient');
																					/*
																					foreach ($perusahaan as $per) {
																						echo "<option value='".$per['id_perusahaan']."'>".$per['perusahaan']."</option>";
																					}
																					*/
																					?>
																				</select>

																			</div>
																			</div>
																		</div>
																		<div class="hr hr-dotted"></div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="BAP_PJ_PA">PA (KADIS):</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input type="text" placeholder="contoh: NAMA KADIS, MT" name="BAP_PJ_PA" id="BAP_PJ_PA" class="col-xs-12 col-sm-6" />
																				</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="BAP_PJ_NIP_PA">NIP PA:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input type="text" placeholder="contoh: 19883008 202003 1 009" name="BAP_PJ_NIP_PA" id="BAP_PJ_NIP_PA" class="NIP col-xs-12 col-sm-4" />
																				</div>
																			</div>
																		</div>
																	<div class="space-2"></div>
																	<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="BAP_PJ_KPA">KPA (KABID):</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input type="text" placeholder="contoh: NAMA KPA, ST" name="BAP_PJ_KPA" id="BAP_PJ_KPA" class="col-xs-12 col-sm-6" />
																				</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="BAP_PJ_NIP_KPA">NIP KPA:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input type="text" placeholder="contoh: 19883008 202003 1 009" name="BAP_PJ_NIP_KPA" id="BAP_PJ_NIP_KPA" class="NIP col-xs-12 col-sm-4" />
																				</div>
																			</div>
																		</div>
																	<div class="space-2"></div>
																	<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="BAP_PJ_PPTK">PPTK:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input type="text" placeholder="contoh: NAMA PPTK, ST" name="BAP_PJ_PPTK" id="BAP_PJ_PPTK" class="col-xs-12 col-sm-6" />
																				</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="BAP_PJ_NIP_PPTK">NIP PPTK:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input type="text" placeholder="contoh: 19883008 202003 1 009" name="BAP_PJ_NIP_PPTK" id="BAP_PJ_NIP_PPTK" class=" NIP col-xs-12 col-sm-4" />
																				</div>
																			</div>
																		</div>
																	<div class="space-2"></div>
																	<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="BAP_PJ_PENGAWAS">PENGAWAS:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input type="text" placeholder="contoh: NAMA PENGAWAS, Amd" name="BAP_PJ_PENGAWAS" id="BAP_PJ_PENGAWAS" class="col-xs-12 col-sm-6" />
																				</div>
																			</div>
																		</div>

																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="BAP_PJ_NIP_PENGAWAS">NIP PENGAWAS:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input type="text" placeholder="contoh: 19883008 202003 1 009" name="BAP_PJ_NIP_PENGAWAS" id="BAP_PJ_NIP_PENGAWAS" class=" NIP col-xs-12 col-sm-4" />
																				</div>
																			</div>
																		</div>
																	<div class="space-2"></div>
																	
															</form>	

<!-- FORM VALIDATION BAP step 3 END-->
														
													</div>

													<div class="step-pane" data-step="4">
<!-- FORM VALIDATION BAP step 4-->
														<div class="center">
															<h3 class="green">REALISASI!</h3>
															hitung realisaasi!
														</div>
<p><?php 
echo "TEST PAJAK PPN = ". MEEDUN_HITUNG_PPN(7485500,1,1);
echo "<br>TEST PAJAK PPH = ". MEEDUN_HITUNG_PPH(7485500,1,1);
echo "<br>TEST MEEDUN_HITUNG_BAP = ";
//print_r(MEEDUN_HITUNG_BAP(95,149710000,1));
 ?></p>

 <p><?php

		$DATA = [
			'JUDUL' => $this->input->post('BAP_JUDUL'),
			'JUDULS' => $this->input->post('BAP_JUDUL')
		];
$progress = $this->input->post('REALISASI_PROGRES');
$kontrak  = $this->input->post('REALISASI_NILAI_KONTRAK');
$nilai_bap_sebelumnya  = $this->input->post('REALISASI_BAP_LALU');
//print_r(MEEDUN_HITUNG_BAP(95,149710000,1));
if(!empty($progress)){
	//print_r(MEEDUN_HITUNG_BAP($progress,$kontrak,1));

	$bap =MEEDUN_HITUNG_BAP($progress,$kontrak,1,1,$nilai_bap_sebelumnya,$DATA, 1);
	$in_proses                 = $bap['progres'];
	$in_jenisPekerjaan         = $bap['jenisPekerjaan'];
	$in_NILAI_FISIK            = $bap['NILAI_FISIK'];
	$in_NILAI_PEKERJAAN_MC_INI = $bap['NILAI_PEKERJAAN_MC_INI'];
	$in_RETENSI                = $bap['RETENSI'];
	$in_PPH                    = $bap['PPH'];
	$in_PPN                    = $bap['PPN'];
	$in_PL                     = $bap['PL'];
	
	echo '<br>progres ='.$bap['progres'];
	echo '<br>jenisPekerjaan ='.$bap['jenisPekerjaan'];
	echo '<br>nilai_bap_sebelumnya ='.$nilai_bap_sebelumnya;
	echo '<br>NILAI_FISIK = '.$bap['NILAI_FISIK'];
	echo '<br>NILAI_PEKERJAAN_MC_INI = '.$bap['NILAI_PEKERJAAN_MC_INI'];

	echo '<br>RETENSI = '.$bap['RETENSI'];
	echo '<br>PPH = '.$bap['PPH'];
	echo '<br>PPN = '.$bap['PPN'];
	
	echo '<br>PL = '.$bap['PL'];

}

 ?></p>
 													<form class="form-horizontal" id="validation-form-realisasi" method="post">
															<h3 class="lighter block green">DATA REALISASI</h3>
															<div class="hr hr-dotted"></div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="REALISASI_NILAI_KONTRAK">*NILAI KONTRAK (Rp):</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input  value="164573000" type="number" placeholder=" Nilai belum support bilangan berkoma" name="REALISASI_NILAI_KONTRAK" id="REALISASI_NILAI_KONTRAK" class="col-xs-12 col-sm-6" />
																					<span class="help-inline col-xs-12 col-sm-7">
																						<span class="middle blue NILAI_KONTRAK_FORMAT" id="NILAI_KONTRAK_FORMAT"></span></strong>
																					</span>
																				</div>
																			</div>
																		</div>
																		<div class="space-2"></div>

																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="REALISASI_PROGRES">PROGRES %:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input  value="95" type="number" min="0" max="100" placeholder="1-100" name="REALISASI_PROGRES" id="REALISASI_PROGRES" class="col-xs-2 col-sm-1" />
																					<span class="help-inline col-xs-12 col-sm-7">
																						<span class="middle">%</span>
																						<input type="button" class="btn btn-primary pull-right" id="btn-proses-realisasi"name="proses" value="PROSES"/>
																					</span>
																				</div>
																			</div>
																		</div>

																	<div class="hr hr-dotted"></div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="REALISASI_BAP_LALU">Pembayaran s/d BAP Lalu:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input type="number" value="142224500" placeholder="1-100" name="REALISASI_BAP_LALU" id="REALISASI_BAP_LALU" class="col-xs-6 col-sm-4" />
																					<span class="help-inline col-xs-12 col-sm-7">
																						<span class="middle"># sum(semua realisasi) </span>
																					</span>
																				</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="REALISASI_BAP_BRUTO">Nilai Pekerjaan MC ini + PPN:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input readonly type="number" placeholder="Nilai Pekerjaan MC ini + PPN" name="REALISASI_BAP_BRUTO" id="REALISASI_BAP_BRUTO" class="col-xs-6 col-sm-4" />
																					<span class="help-inline col-xs-12 col-sm-7">
																						<span class="middle">#</span>
																					</span>
																				</div>
																			</div>
																		</div>
																		<div class="hr hr-dotted"></div>
																		<h4 class="lighter block green">POTONGAN</h4>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="REALISASI_BAP_MC_LALU">Sertifikat MC Lalu:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input readonly type="number" placeholder="Sertifikat MC Lalu" name="REALISASI_BAP_MC_LALU" id="REALISASI_BAP_MC_LALU" class="col-xs-6 col-sm-4" />
																					<span class="help-inline col-xs-12 col-sm-7">
																						<span class="middle">#</span>
																					</span>
																				</div>
																			</div>
																		</div>
																		
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="REALISASI_BAP_UMK">Pengembalian Uang Muka:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input readonly type="number"  placeholder="Pengembalian Uang Muka" name="REALISASI_BAP_UMK" id="REALISASI_BAP_UMK" class="col-xs-6 col-sm-4" />
																					<span class="help-inline col-xs-12 col-sm-7">
																						<span class="middle">#</span>
																					</span>
																				</div>
																			</div>
																		</div>

																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="REALISASI_RETENSI">Retensi:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input readonly type="number" placeholder="Retensi" name="REALISASI_RETENSI" id="REALISASI_RETENSI" class="col-xs-6 col-sm-4" />
																					<span class="help-inline col-xs-12 col-sm-7">
																						<span class="middle">#</span>
																					</span>
																				</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="REALISASI_RETENSI">Jumlah Potongan:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<p style="font-size: 19px;" class="blue REALISASI_JUMLAH_POTONGAN col-xs-6 col-sm-4"></p>
																					<span class="help-inline col-xs-12 col-sm-7">
																						<span class="middle">#</span>
																					</span>
																				</div>
																			</div>
																		</div>
																		

																		<div class="hr hr-dotted"></div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="REALISASI_JUMLAH_POTONGAN">Jumlah Potongan:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input readonly type="number" placeholder="Jumlah Potongan" name="REALISASI_JUMLAH_POTONGAN" id="REALISASI_JUMLAH_POTONGAN" class="col-xs-6 col-sm-4" />
																					<span class="help-inline col-xs-12 col-sm-7">
																						<span class="middle">#</span>
																					</span>
																				</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="REALISASI_BAP_INI">Pembayaran s/d BAP ini:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input readonly type="number" placeholder="Pembayaran s/d BAP ini" name="REALISASI_BAP_INI" id="REALISASI_BAP_INI" class="col-xs-6 col-sm-4" />
																					<span class="help-inline col-xs-12 col-sm-7">
																						<span class="middle">#</span>
																					</span>
																				</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="REALISASI_SISA_DANA">Sisa Dana Kontrak:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input readonly type="number" placeholder="Sisa Dana Kontrak" name="REALISASI_SISA_DANA" id="REALISASI_SISA_DANA" class="col-xs-6 col-sm-4" />
																					<span class="help-inline col-xs-12 col-sm-7">
																						<span class="middle">#</span>
																					</span>
																				</div>
																			</div>
																		</div>



													<div class="hr hr-dotted"></div>
													<h4 class="lighter block green">RINCIAN PAJAK</h4>

																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="REALISASI_PPN">PPN:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input readonly type="number" placeholder="Sisa Dana Kontrak" name="REALISASI_PPN" id="REALISASI_PPN" class="col-xs-6 col-sm-4" />
																					<span class="help-inline col-xs-12 col-sm-7">
																						<span class="middle">#</span>
																					</span>
																				</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="REALISASI_PPH">PPH:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input readonly type="number" placeholder="Sisa Dana Kontrak" name="REALISASI_PPH" id="REALISASI_PPH" class="col-xs-6 col-sm-4" />
																					<span class="help-inline col-xs-12 col-sm-7">
																						<span class="middle">#</span>
																					</span>
																				</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="REALISASI_JUMLAH_POTONGAN">TOTAL PAJAK:</label>

																			<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																					<input readonly type="number" placeholder="Sisa Dana Kontrak" name="REALISASI_JUMLAH_POTONGAN" id="REALISASI_JUMLAH_POTONGAN" class="col-xs-6 col-sm-4" />
																					<span class="help-inline col-xs-12 col-sm-7">
																						<span class="middle">#</span>
																					</span>
																				</div>
																			</div>
																		</div>

																		<input type="submit" name="proses" value="proses"/>

													</form>				
																		<input type="button" class="btn btn-primary" id="btn-proses-realisasi"name="proses" value="proses"/>	
																			

 <!-- FORM VALIDATION BAP step 4 END-->
													</div>
													<div class="step-pane" data-step="5">
<!-- FORM VALIDATION BAP step 4-->
														<div class="center">
															<h3 class="green">RINGKASAN BAP!</h3>
															Mohon diperiksa dengan teliti, sebelum lanjutkan menyimpan!<br>
														</div>
														<div class="row">
																					
															<div class="col-xs-12 col-md-5">
																<div class="table-header">
<!----TABEL BAP---->
																	BERITA ACARA PEMBAYARAN
																</div>
																<table class="table  table-bordered table-hover">
																	<thead class="hide">
																	<tr>
																		<th>NOMOR</th>
																		<th>JUDUL</th>
																		<th>PROGRES</th>
																		<th>4</th>
																		<th>5</th>
																	</tr>
																	</thead>
																	<tbody>
																		<tr>
																			<td>JUDUL</td>
																			<td class="JUDUL">MC 01 dan MC 02</td>
																		</tr>
																		<tr>
																			<td>PROGRES</td>
																			<td><span class="progres"></span> %</td>
																		</tr>
																		<tr>
																			<td></td>
																			<td></td>
																		</tr>
																		<tr>
																			<td>URUSAN</td>
																			<td>URUSAN WAJIB PEKERJAAN UMUM DAN PENATAAN RUANG</td>
																		</tr>
																		<tr>
																			<td>ORGANISASI</td>
																			<td>DINAS PEKERJAAN UMUM DAN PENATAAN RUANG</td>
																		</tr>
																		<tr>
																			<td>PROGRAM</td>
																			<td>PEMBANGUNAN JALAN DAN JEMBATAN</td>
																		</tr>
																		<tr>
																			<td>KEGIATAN</td>
																			<td>PEMBANGUNAN JALAN</td>
																		</tr>
																		<tr>
																			<td>PEKERJAAN</td>
																			<td>Peningkatan Jalan Bunga Tanjung-Balai Baru (Lanjutan)</td>
																		</tr>
																		<tr>
																			<td>OBJEK BELANJA</td>
																			<td>BELANJA MODAL JALAN, IRIGASI DAN JARINGAN - PENGADAAN JALAN KABUPATEN/KOTA</td>
																		</tr>
																		<tr>
																			<td>KODE REKENING</td>
																			<td>1.03.1.03.01.01.15.03.5.2.3.59.03</td>
																		</tr>
																		<tr>
																			<td>TANGGAL DPA</td>
																			<td>30 Desember 2017</td>
																		</tr>
																		<tr>
																			<td>LOKASI</td>
																			<td>KECAMATAN SUNGAI BEREMAS</td>
																		</tr>
																		<tr>
																			<td>TAHUN</td>
																			<td>2018</td>
																		</tr>
																		<tr>
																			<td>SUMBER DANA</td>
																			<td>DAU</td>
																		</tr>
																	</tbody>
																</table>
															</div>
<!--TABEL BAP END-->
															<div class="col-xs-12 col-md-7">
																<div class="table-header">
<!----TABEL PERUSAHAAN---->
																	PERUSAHAAN
																</div>
																<table class="table  table-bordered">
																	<thead class="hide">
																	<tr>
																		<th>1</th>
																		<th>2</th>
																		<th>3</th>
																		<th>4</th>
																		
																	</tr>
																	</thead>
																	<tbody>
																		<tr>
																			<td>NAMA PERUSAHAAN</td>
																			<td>PT. MAJU SUKSES PASTI BISA</td>
																		</tr>
																		<tr>
																			<td>JENIS ( 1. Kecil, 2. Besar )</td>
																			<td>2</td>
																		</tr>
																		<tr>
																			<td>ALAMAT PERUSAHAAN</td>
																			<td>Jln. Kali Bata No. 21</td>
																		</tr>
																		<tr>
																			<td>NPWP PERUSAHAAN</td>
																			<td>3432.2342.423.34</td>
																		</tr>
																		<tr>
																			<td>BANK</td>
																			<td>Bank Nagari Cab Simpang Empat</td>
																		</tr>
																		<tr>
																			<td>NOMOR REKENING BANK</td>
																			<td>21231-12323-123</td>
																		</tr>
																		<tr>
																			<td></td>
																			<td></td>
																		</tr>
																		<tr>
																			<td>PIMPINAN</td>
																			<td>Direktur</td>
																		</tr>
																		<tr>
																			<td>NAMA PIMPINAN</td>
																			<td>Aditia Warman, ST</td>
																		</tr>
																		<tr>
																			<td>ALAMAT PIMPINAN</td>
																			<td>Jln.Sinamar maju jaya pasti bisa, padang 25000, kabu paten dilihulu</td>
																		</tr>
																	</tbody>
																</table>
															</div>
<!----TABEL PERUSAHAAN END---->									
															<div class="col-xs-12 col-md-7">
																<div class="table-header">
<!----TABEL KONTRAK---->
																	KONTRAK
																</div>
																<table class="table  table-bordered table-hover">
																	<thead class="">
																	<tr>
																		<th>KONTRAK</th>
																		<th>NOMOR</th>
																		<th>NILAI (Rp)</th>
																		<th>TANGGAL KONTRAK</th>
																		<th>TANGGAL BERAKHIR</th>
																		<th>HARI</th>
																	</tr>
																	</thead>
																	<tbody>
																		<tr>
																			<td>KONTRAK</td>
																			<td>602/213/KONTRAK/BM/DPUPR/2019</td>
																			<td>142224500</td>
																			<td>3 AGUSTUS 2019</td>
																			<td>9 DESEMBER 2019</td>
																			<td>4</td>
																		</tr>
																		<tr>
																			<td>KONTRAK ADD I</td>
																			<td>602/312/ADDI/DPUPR/2019</td>
																			<td>142224500</td>
																			<td>9 AGUSTUS 2019</td>
																			<td>9 DESEMBER 2019</td>
																			<td>120</td>
																		</tr>
																	</tbody>
																</table>
															</div>
<!----TABEL KONTRAK END---->	
															<div class="col-xs-12 col-md-12 hide">
																<div class="table-header">
<!--TABEL REALISAS -->																	
																	REALISASI
																</div>
																<table class="table  table-bordered table-hover">
																	<thead>
																	<tr>
																		<th>1</th>
																		<th>2</th>
																		<th>3</th>
																		<th>4</th>
																		<th>5</th>
																	</tr>
																	</thead>
																	<tbody>
																		<tr>
																			<td>1</td>
																			<td>2</td>
																			<td>3</td>
																			<td>4</td>
																			<td>5</td>
																		</tr>
																		<tr>
																			<td>1</td>
																			<td>2</td>
																			<td>3</td>
																			<td>4</td>
																			<td>5</td>
																		</tr>
																		<tr>
																			<td>1</td>
																			<td>2</td>
																			<td>3</td>
																			<td>4</td>
																			<td>5</td>
																		</tr>
																		<tr>
																			<td>1</td>
																			<td>2</td>
																			<td>3</td>
																			<td>4</td>
																			<td>5</td>
																		</tr>
																		<tr>
																			<td>1</td>
																			<td>2</td>
																			<td>3</td>
																			<td>4</td>
																			<td>5</td>
																		</tr>
																		<tr>
																			<td>1</td>
																			<td>2</td>
																			<td>3</td>
																			<td>4</td>
																			<td>5</td>
																		</tr>
																		<tr>
																			<td>1</td>
																			<td>2</td>
																			<td>3</td>
																			<td>4</td>
																			<td>5</td>
																		</tr>
																		<tr>
																			<td>1</td>
																			<td>2</td>
																			<td>3</td>
																			<td>4</td>
																			<td>5</td>
																		</tr>
																		<tr>
																			<td>1</td>
																			<td>2</td>
																			<td>3</td>
																			<td>4</td>
																			<td>5</td>
																		</tr>
																		<tr>
																			<td>1</td>
																			<td>2</td>
																			<td>3</td>
																			<td>4</td>
																			<td>5</td>
																		</tr>
																	</tbody>
																</table>
															</div>

<!--TABEL REALISAS END-->
<!--TABEL REALISAS END-->														
														<div class="col-xs-12 col-md-12">
															<div class="table-header">
															<!--TABEL REALISAS -->																	
																	REALISASI
																</div>
																<table class="table table-hover isi-bap">
																       <tbody><tr><td></td><td colspan="10">Perhitungan Pembayaran:</td></tr>
																       <tr><td width="5%"></td><td class="titik-dua">1.</td><td width="25%">Nilai Kontrak</td><td> </td><td></td><td class="titik-dua"></td><td class="titik-dua"></td><td></td><td class="titik-dua">=</td><td class="titik-dua">Rp</td><td></td></tr>
																       <tr><td width="5%"></td><td class="titik-dua"></td><td>Nilai Kontrak Add I</td><td> </td><td></td><td class="titik-dua"></td><td class="titik-dua"></td><td></td><td class="titik-dua">=</td><td class="titik-dua">Rp</td><td class="REALISASI_NILAI_KONTRAK">1.0000.0000.000</td></tr>
																       <tr><td width="5%"></td><td class="titik-dua"></td><td>Nilai Kontrak Add II</td><td> </td><td></td><td class="titik-dua"></td><td class="titik-dua"></td><td></td><td class="titik-dua">=</td><td class="titik-dua">Rp</td><td>1.0000.0000.000</td></tr>
																       <tr><td width="5%"></td><td class="titik-dua">2.</td><td>Pembayaran s/d BAP Lalu</td><td> </td><td></td><td class="titik-dua"></td><td class="titik-dua"></td><td></td><td class="titik-dua">=</td><td class="titik-dua">Rp</td><td>1.0000.0000.000</td></tr>
																       <tr><td width="5%"></td><td class="titik-dua">3.</td><td>Nilai Pekerjaan MC ini + PPN</td><td> </td><td></td><td class="titik-dua"></td><td class="titik-dua"></td><td></td><td class="titik-dua">=</td><td class="titik-dua">Rp</td><td class="REALISASI_BAP_BRUTO">1.0000.0000.000</td></tr>
																       <tr><td width="5%"></td><td class="titik-dua">4.</td><td>Potongan</td><td> </td><td></td><td class="titik-dua">:</td><td class="titik-dua"></td><td></td><td class="titik-dua"></td><td class="titik-dua"></td><td></td></tr>
																       <tr><td width="5%"></td><td class="titik-dua"></td><td>Sertifikat MC Lalu</td><td> </td><td></td><td class="titik-dua">:</td><td class="titik-dua">Rp</td><td class="REALISASI_BAP_LALU">1000.000.000.000</td><td class="titik-dua"></td><td class="titik-dua"></td><td></td></tr>
																       <tr><td width="5%"></td><td class="titik-dua"></td><td>Pengembalian Uang Muka</td><td> </td><td></td><td class="titik-dua">:</td><td class="titik-dua">Rp</td><td class="REALISASI_UMK">1000.000.000.000</td><td class="titik-dua"></td><td class="titik-dua"></td><td></td></tr>
																       <tr><td width="5%"></td><td class="titik-dua"></td><td style="border-bottom: 1px solid black !important;">Retensi</td><td style="border-bottom: 1px solid black !important;" class="ket_retensi">( 5% x Rp.  <span class="REALISASI_BAP_BRUTO">1000.000.000.000</span> )</td><td style="border-bottom: 1px solid black !important;"></td><td style="border-bottom: 1px solid black !important;" class="titik-dua">:</td><td class="titik-dua" style="border-bottom: 1px solid black !important;">Rp</td><td style="border-bottom: 1px solid black !important;" class="REALISASI_RETENSI">1000.000.000.000</td><td class="titik-dua"></td><td class="titik-dua"></td><td></td></tr>
																       <tr><td width="5%"></td><td class="titik-dua"></td><td>Jumlah potongan</td><td> </td><td></td><td class="titik-dua">:</td><td class="titik-dua">Rp</td><td class="REALISASI_JUMLAH_POTONGAN">1000.000.000.000</td><td class="titik-dua"></td><td class="titik-dua"></td><td></td></tr>
																       <tr><td width="5%"></td><td class="titik-dua">5.</td><td style="font-weight: bold; font-size: 12pt">Pembayaran BAP ini</td><td> </td><td></td><td class="titik-dua"></td><td class="titik-dua"></td><td></td><td class="titik-dua">=</td><td class="titik-dua">Rp</td><td class="REALISASI_PEMBAYARAN_BAP_INI" style="font-weight: bold; font-size: 12pt">1.0000.0000.000</td></tr>
																       <tr><td width="5%"></td><td class="titik-dua"></td><td></td><td></td><td>DANA DAK</td><td class="titik-dua">:</td><td class="titik-dua">Rp</td><td>1000.000.000.000</td><td class="titik-dua">=</td><td class="titik-dua">Rp</td><td>1.0000.0000.000</td></tr>
																       <tr><td width="5%"></td><td class="titik-dua"></td><td></td><td> </td><td>DANA DAU</td><td class="titik-dua">:</td><td class="titik-dua">Rp</td><td>1000.000.000.000</td><td class="titik-dua">=</td><td class="titik-dua">Rp</td><td>1.0000.0000.000</td></tr>
																       <tr><td width="5%"></td><td class="titik-dua">6.</td><td >Pembayaran s/d BAP ini</td><td> </td><td></td><td class="titik-dua"></td><td class="titik-dua"></td><td></td><td class="titik-dua">=</td><td class="titik-dua">Rp</td><td >1.0000.0000.000</td></tr>
																       <tr><td width="5%"></td><td class="titik-dua">7.</td><td>Sisa Dana Kontrak</td><td> </td><td></td><td class="titik-dua"></td><td class="titik-dua"></td><td></td><td class="titik-dua">=</td><td class="titik-dua">Rp</td><td class="REALISASI_SISA_DANA">1.0000.0000.000</td></tr>
																       <tr><td></td><td colspan="10">Rincian Pajak</td></tr>
																       <tr><td width="5%"></td><td colspan="2">&nbsp; 1. Dana Alokasi Khusus (DAK)</td><td> </td><td></td><td class="titik-dua">:</td><td class="titik-dua"></td><td></td><td class="titik-dua"></td><td class="titik-dua">=</td><td>1000.000.000.000</td></tr>
																       <tr><td width="5%"></td><td class="titik-dua"></td><td>a. Pajak Pertambahan Nilai PPN</td><td> </td><td></td><td class="titik-dua">:</td><td class="titik-dua">Rp</td><td>1000.000.000.000</td><td class="titik-dua"></td><td class="titik-dua"></td><td></td></tr>
																       <tr><td width="5%"></td><td class="titik-dua"></td><td>b. Pajak Penghasilan Pasal 4 (2)</td><td> </td><td></td><td class="titik-dua">:</td><td class="titik-dua">Rp</td><td>1000.000.000.000</td><td class="titik-dua"></td><td class="titik-dua"></td><td></td></tr>
																       <tr><td width="5%"></td><td colspan="2">&nbsp; 2. Dana Alokasi Umum (DAU)</td><td> </td><td></td><td class="titik-dua">:</td><td class="titik-dua"></td><td></td><td class="titik-dua"></td><td class="titik-dua">=</td><td>1000.000.000.000</td></tr>
																       <tr><td width="5%"></td><td class="titik-dua"></td><td>a. Pajak Pertambahan Nilai PPN</td><td> </td><td></td><td class="titik-dua">:</td><td class="titik-dua">Rp</td><td>1000.000.000.000</td><td class="titik-dua"></td><td class="titik-dua"></td><td></td></tr>
																       <tr><td width="5%"></td><td class="titik-dua"></td><td>b. Pajak Penghasilan Pasal 4 (2)</td><td> </td><td></td><td class="titik-dua">:</td><td class="titik-dua">Rp</td><td>1000.000.000.000</td><td class="titik-dua"></td><td class="titik-dua"></td><td></td></tr>
																       
																       <tr><td colspan="11">&nbsp;</td></tr>
																</tbody>
																</table>
																</div>	
<!--END ROW-->										</div>


														<div class="center">
															<button class="btn btn-primary print_bap"><i class="fa fa-print"></i> PRINT</button>
														</div>
													</div>
												</div>
											</div>

											<hr />
											<div class="wizard-actions">
												<button class="btn btn-prev">
													<i class="ace-icon fa fa-arrow-left"></i>
													Prev
												</button>

												<button class="btn btn-success btn-next" data-last="Finish">
													Next
													<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
												</button>
											</div>
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div>

								<div id="modal-wizard" class="modal">
									<div class="modal-dialog">
										<div class="modal-content">
											<div id="modal-wizard-container">
												<div class="modal-header">
													<ul class="steps">
														<li data-step="1" class="active">
															<span class="step">1</span>
															<span class="title">Validation states</span>
														</li>

														<li data-step="2">
															<span class="step">2</span>
															<span class="title">Alerts</span>
														</li>

														<li data-step="3">
															<span class="step">3</span>
															<span class="title">Payment Info</span>
														</li>

														<li data-step="4">
															<span class="step">4</span>
															<span class="title">SELESAI</span>
														</li>
													</ul>
												</div>

												<div class="modal-body step-content">
													<div class="step-pane active" data-step="1">
														<div class="center">
															<h4 class="blue">Step 1</h4>
														</div>
													</div>

													<div class="step-pane" data-step="2">
														<div class="center">
															<h4 class="blue">Step 2</h4>
														</div>
													</div>

													<div class="step-pane" data-step="3">
														<div class="center">
															<h4 class="blue">Step 3</h4>
														</div>
													</div>

													<div class="step-pane" data-step="4">
														<div class="center">
															<h4 class="blue">Step 4</h4>
														</div>
													</div>
												</div>
											</div>

											<div class="modal-footer wizard-actions">
												<button class="btn btn-sm btn-prev">
													<i class="ace-icon fa fa-arrow-left"></i>
													Prev
												</button>

												<button class="btn btn-success btn-sm btn-next" data-last="Finish">
													Next
													<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
												</button>

												<button class="btn btn-danger btn-sm pull-left" data-dismiss="modal">
													<i class="ace-icon fa fa-times"></i>
													Cancel
												</button>
											</div>
										</div>
									</div>
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->