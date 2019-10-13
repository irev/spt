			<?php 
				$no=1; 
        		$Total=0;
        		foreach ($spt_pengikut as $pengikut) { 
        				$nm_diperintah = $pengikut["nm_diperintah"];
        				$nip_diperintah = $pengikut["nip_diperintah"];
        				$pangkat_diperintah = $pengikut["pangkat_diperintah"];
        				$golongan_diperintah = $pengikut["golongan_diperintah"];
        				$cs = (count($spt_pengikut) >= 1 ) ? ", Cs" : "";
        				$maksud = $pengikut["maksud"];     		
        				$tujuan = $pengikut["tujuan"];     		
        				$kec 	= $pengikut["kec"];
        				$tahun  = $pengikut["tahun"];    		
        				$tgl_berangkat 	= $pengikut["tgl_berangkat"];     		
        				$no_sppd 	= $pengikut["no_sppd"];     		
        				$tgl_sppd 	= $pengikut["ttd_sppd_tgl"];

        				///ANGARAN KEGIATAN 
        				$REKENING = $pengikut["rekening"];
                        $KEGIATAN =$pengikut["kegiatan"];
        				$KPA 			= $pengikut["kpa"];
        				$jabKPA 		= $pengikut["jabkpa"];
        				$nipKPA 		= $pengikut["nipkpa"];
        				$PPTK 			= $pengikut["pptk"];
        				$jabPPTK 		= $pengikut["jabpptk"];
        				$nipPPTK 		= $pengikut["nippptk"];
        				$BENDAHARA 		= $pengikut["bendahara"];
        				$jabBENDAHARA 	= $pengikut["jabbendahara"];
        				$nipBENDAHARA 	= $pengikut["nipbendahara"];


        				$hari_perjalanan = JUMLAHHARI($pengikut["tgl_berangkat"], $pengikut["tgl_kembali"]);
                		 //// TENTUKAN WILAYAH PERJALANAN DINAS
                		$wil = $pengikut["wilayah"];
                		$uang_harian =0;
                		switch ($wil) {
                			case '1': // Wilayah 1 
                				$uang_harian = $pengikut["wil1"];
                				break;
                			case '2': // Wilayah 2 
                				$uang_harian = $pengikut["wil2"];
                				break;
                			case '3': // Wilayah 3 
                				$uang_harian = $pengikut["wil3"];
                				break;
                			case '4': // Wilayah 4 
                				$uang_harian = $pengikut["harian_luar"];
                				break;
                			default:
                				$uang_harian = 0;
                				break;
                		}
                		$subtotal = (intval($uang_harian) * intval($hari_perjalanan)); //SUBTOTAL
						$Total += $subtotal; //SUM TOTAL
        		}
        	?>	


<script type="text/javascript">
function close_window() {
  if (confirm("Close Window?")) {
    close();
  }
}
function openWindow( url ){
  window.open(url, "_blank", "fullscreen=1, toolbar=yes,scrollbars=yes,resizable=yes top=5,left=5,width=1300,height=700");
}
</script>
						<div class="row">
							<div class="col-xs-12">		
								<!-- PAGE CONTENT BEGINS -->
								<button class="btn btn-xs btn-primary" onclick="openWindow('<?= base_url('spt/cetak_spt_dalam/').'/'.$spt_dalam->id_spt ?>')">
									<i class="fa fa-print"></i> 
								Cetak SPD</button>
								<button class="btn btn-xs btn-success" onclick="openWindow('<?= base_url('spt/PrintKwitansiNominatif/').'/'.$spt_dalam->id_spt ?>')">
									<i class="fa fa-print"></i> 
								Cetak Nominatif</button>
								<button class="btn btn-xs btn-danger" onclick="openWindow('<?= base_url('spt/print_kwitansi/').'/'.$spt_dalam->id_spt ?>')">
									<i class="fa fa-print"></i> 
								Cetak BBM</button>
								<div class="space"></div>
								<div class="row">
									<div class="col-sm-12">
										<div class="tabbable">
											<ul class="nav nav-tabs" id="myTab">
												<li class="active">
													<a data-toggle="tab" href="#homes">
														<i class="green ace-icon fa fa-file bigger-120"></i>
														SPT
													</a>
												</li>
												<li >
													<a data-toggle="tab" href="#home">
														<i class="yellow ace-icon fa fa-file bigger-120"></i>
														SPPD
													</a>
												</li>

												<li>
													<a data-toggle="tab" href="#nominatif">
														Nominatif
														<span class="badge badge-danger"><?= count($spt_pengikut) ?></span>
													</a>
												</li>
												<li>
													<a data-toggle="tab" href="#bbm">
														BBM
														<span class="badge badge-danger">4</span>
													</a>
												</li>


												<li class="dropdown">
													<a data-toggle="dropdown" class="dropdown-toggle" href="#">
														Dropdown &nbsp;
														<i class="ace-icon fa fa-caret-down bigger-110 width-auto"></i>
													</a>

													<ul class="dropdown-menu dropdown-info">
														<li>
															<a data-toggle="tab" href="#dropdown1">@fat</a>
														</li>

														<li>
															<a data-toggle="tab" href="#dropdown2">@mdo</a>
														</li>
													</ul>
												</li>
											</ul>

											<div class="tab-content">
												<div id="homes" class="tab-pane fade in active">
													<div class="col-sm-12">
														<b style="font-size: 22px">SPT <?= $spt_dalam->no_spt ?></b><br>
														<i><?= $spt_dalam->ttd_tempat ?> - <?= $spt_dalam->tujuan ?></i>
													</div>
													

													<div class="profile-user-info profile-user-info-striped">
														<div class="profile-info-row">
															<div class="profile-info-name"> Pejabat Pemberi Perintah </div>
															<div class="profile-info-value">
																<span class="editable" id="username"><b><?= $spt_dalam->ttd_nama ?></b><br><?= $spt_dalam->ttd_nip ?></span>
															</div>
														</div>
														<div class="profile-info-row">
															<div class="profile-info-name">  </div>
															<div class="profile-info-value">
																<span class="editable" id="username"></span>
															</div>
														</div>
														<div class="profile-info-row">
															<div class="profile-info-name"> Pegawai </div>
															<div class="profile-info-value">
																<span class="editable" id="username"><b><?= $spt_dalam->nama .'</b><br>'.$spt_dalam->nip?> </span>
															</div>
														</div>
														<div class="profile-info-row">
															<div class="profile-info-name"> Pangkat dan Golongan </div>
															<div class="profile-info-value">
																<span class="editable" id="username"><?= $spt_dalam->pangkat ?> </span>
															</div>
														</div>

														<div class="profile-info-row">
															<div class="profile-info-name"> Jabatan / Instansi </div>

															<div class="profile-info-value">
																<span class="editable" id="country"><?= $spt_dalam->jabatan ?></span> ke
																
															</div>
														</div>

														<div class="profile-info-row">
															<div class="profile-info-name"> Maksud Perjalanan Dinas </div>

															<div class="profile-info-value">
																<span class="editable" id="age"><?= $spt_dalam->maksud ?></span>
															</div>
														</div>

														<div class="profile-info-row">
															<div class="profile-info-name"> Dasar Surat Perintah </div>

															<div class="profile-info-value">
																<span class="editable" id="signup"><?= $spt_dalam->beban ?></span>
															</div>
														</div>

														<div class="profile-info-row">
															<div class="profile-info-name"> Tempat Berangkat </div>

															<div class="profile-info-value">
																<i class="fa fa-map-marker light-green bigger-110"></i>
																<span class="editable" id="login"><?= $spt_dalam->ttd_tempat ?></span>
															</div>
														</div>

														<div class="profile-info-row">
															<div class="profile-info-name"> Tempat Tujuan </div>

															<div class="profile-info-value">
																<i class="fa fa-map-marker light-red bigger-110"></i>
																<span class="editable" id="about"><?= $spt_dalam->tujuan ?></span>
															</div>
														</div>
														<div class="profile-info-row">
															<div class="profile-info-name"> Tanggal Berangkat </div>

															<div class="profile-info-value">
																<span class="editable" id="about"><?= LONGE_DATE_INDONESIA($spt_dalam->tgl_berangkat) ?></span>
															</div>
														</div>
														<div class="profile-info-row">
															<div class="profile-info-name"> Tanggal Kembali </div>

															<div class="profile-info-value">
																<span class="editable" id="about"><?= LONGE_DATE_INDONESIA($spt_dalam->tgl_kembali) ?></span>
															</div>
														</div>
													</div>

												</div>
												<div id="home" class="tab-pane fade in">
													<div class="col-sm-12">
														<b style="font-size: 22px">SPPD <?= $spt_dalam->no_sppd ?></b><br>
														<i><?= $spt_dalam->ttd_tempat ?> - <?= $spt_dalam->tujuan ?></i>
													</div>
													<div class="profile-user-info profile-user-info-striped">
														<div class="profile-info-row">
															<div class="profile-info-name"> Pejabat Pemberi Perintah </div>
															<div class="profile-info-value">
																<span class="editable" id="username"><b><?= $spt_dalam->ttd_nama ?></b><br><?= $spt_dalam->ttd_nip ?></span>
															</div>
														</div>
														<div class="profile-info-row">
															<div class="profile-info-name">  </div>
															<div class="profile-info-value">
																<span class="editable" id="username"></span>
															</div>
														</div>
														<div class="profile-info-row">
															<div class="profile-info-name"> Pegawai </div>
															<div class="profile-info-value">
																<span class="editable" id="username"><b><?= $spt_dalam->nama .'</b><br>'.$spt_dalam->nip?> </span>
															</div>
														</div>
														<div class="profile-info-row">
															<div class="profile-info-name"> Pangkat dan Golongan </div>
															<div class="profile-info-value">
																<span class="editable" id="username"><?= $spt_dalam->pangkat ?> </span>
															</div>
														</div>

														<div class="profile-info-row">
															<div class="profile-info-name"> Jabatan / Instansi </div>

															<div class="profile-info-value">
																<span class="editable" id="country"><?= $spt_dalam->jabatan ?></span> ke
																
															</div>
														</div>

														<div class="profile-info-row">
															<div class="profile-info-name"> Maksud Perjalanan Dinas </div>

															<div class="profile-info-value">
																<span class="editable" id="age"><?= $spt_dalam->maksud ?></span>
															</div>
														</div>

														<div class="profile-info-row">
															<div class="profile-info-name"> Dasar Surat Perintah </div>

															<div class="profile-info-value">
																<span class="editable" id="signup">2010/06/20</span>
															</div>
														</div>

														<div class="profile-info-row">
															<div class="profile-info-name"> Tempat Berangkat </div>

															<div class="profile-info-value">
																<i class="fa fa-map-marker light-green bigger-110"></i>
																<span class="editable" id="login"><?= $spt_dalam->ttd_tempat ?></span>
															</div>
														</div>

														<div class="profile-info-row">
															<div class="profile-info-name"> Tempat Tujuan </div>

															<div class="profile-info-value">
																<i class="fa fa-map-marker light-red bigger-110"></i>
																<span class="editable" id="about"><?= $spt_dalam->tujuan ?></span>
															</div>
														</div>
														<div class="profile-info-row">
															<div class="profile-info-name"> Tanggal Berangkat </div>

															<div class="profile-info-value">
																<span class="editable" id="about"><?= LONGE_DATE_INDONESIA($spt_dalam->tgl_berangkat) ?></span>
															</div>
														</div>
														<div class="profile-info-row">
															<div class="profile-info-name"> Tanggal Kembali </div>

															<div class="profile-info-value">
																<span class="editable" id="about"><?= LONGE_DATE_INDONESIA($spt_dalam->tgl_kembali) ?></span>
															</div>
														</div>
													</div>
												</div>

												<div id="nominatif" class="tab-pane fade">
													
<div class="row" style="width: 100%;">
</div>

<div class="row">
    <div style="padding-top: 0px;"  class="no-print"></div>
    <table border="0">

        <tr>
            <td></td>
            <td style="text-align:right;">Kode Rekening :  M.A. 1.03 . 1.03.01. <?= $REKENING ?> . 01</td>
        </tr>

        <tr>
            <td colspan="2" style="text-align: justify;">
            	<p>
                Sudah terima dari <strike>Pengguna Anggaran Dinas Pekerjaan Umum Dan Penataan Ruang Kabupaten Pasaman Barat</strike> uang Sejumlah Rp. <?= $Total ?>,- (<?= angka_terbilang($Total) ?>) sebab dari pembayaran lunas pada <?= $nm_diperintah ?><?= $cs ?>  Biaya Perjalanan Dinas Dalam Rangka <?= $maksud ?> ke <?= $tujuan ?> Kec. <?= $kec ?> Tanggal <?= LONGE_DATE_INDONESIA($tgl_berangkat) ?> pada Kegiatan <?= $KEGIATAN ?> berdasarkan SPPD Nomor : <?= $no_sppd ?>  tanggal   <?= LONGE_DATE_INDONESIA($tgl_sppd) ?>  dengan perincian sebagai berikut :
            	</p>
            </td>
        </tr>
    </table>

    <table border="1" class="table">
        <tr style="text-align: center !important;">
            <th rowspan="2" width="1%">No</th>
            <th rowspan="2" width="30%">Nama / NIP</th>
            <th rowspan="2" width="10%">Eselon/Golongan</th>
            <th colspan="2" width="20%">Uang Harian</th>
            <th rowspan="2" width="10%">Jumlah<br/>Diterima</th>
            <th rowspan="2" width="10%">Tanda Tangan</th>
        </tr>
        <tr>
            <th>Jumlah Hari</th>
            <th>Satuan</th>
        </tr>
        <tr>
        	<td>1</td>
        	<td>2</td>
        	<td>3</td>
        	<td>4</td>
        	<td>5</td>
        	<td>6=(4x5)</td>
        	<td>7</td>
        </tr>
        <tbody>
        	<?php 
        		$no=1; 
        		$Total=0;
        		foreach ($spt_pengikut as $pengikut) { 
        				$vnama = $pengikut["nama_pegawai"];
        				$vnip = ($pengikut["nip"]=="") ? $pengikut["pangkat"] : $pengikut["nip"] ;
        				$vgol = ($pengikut["pangkat"]==$pengikut["golongan"]) ? $pengikut["pangkat"] : $pengikut["pangkat"].' '.$pengikut["golongan"]

        		?>
            <tr>
                <td style="text-align: right;"><?= $no ?>.</td>
                <td><?= $vnama ?><br/><?= $vnip ?></td>
                <td><?= $vgol ?></td>
                <td><?php

                		//echo $pengikut["wilayah"]; 
                		 $hari_perjalanan = JUMLAHHARI($pengikut["tgl_berangkat"], $pengikut["tgl_kembali"]);
                		 echo $hari_perjalanan;

                ?></td>
                <td>
                	<?php 
                	    //// TENTUKAN WILAYAH PERJALANAN DINAS
                		$wil = $pengikut["wilayah"];
                		$uang_harian =0;
                		switch ($wil) {
                			case '1': // Wilayah 1 
                				$uang_harian = $pengikut["wil1"];
                				break;
                			case '2': // Wilayah 2 
                				$uang_harian = $pengikut["wil2"];
                				break;
                			case '3': // Wilayah 3 
                				$uang_harian = $pengikut["wil3"];
                				break;
                			case '4': // Wilayah 4 
                				$uang_harian = $pengikut["harian_luar"];
                				break;
                			default:
                				$uang_harian = 0;
                				break;
                		}
                		echo $uang_harian;
                	?>
                		
                </td>
                <td><?= $subtotal = (intval($uang_harian) * intval($hari_perjalanan)) ?></td>
                <td><?= $no ?>. <button class="btn btn-xs btn-success">YA</button></td>
                 <!--td></td-->
            </tr>
            <?php 
            	$no++; 
            	$Total += $subtotal;
        	} ?>
            <tfoot>
                <tr>
                    <th colspan="4">J U M L A H</th>
                    <th><?= $Total ?></th>
                    <th></th>
                    <th></th>
                    <!--td></td-->
                </tr>
            </tfoot>
        </tbody>
    </table>

    <table border="0">
        <tr>
            <td width="50%"></td>
            <td colspan="2" style="text-align: center;"><br>Simpang Empat,  ……………………….  <?=$tahun?></td>
        </tr>
        <tr style="text-align: center;">
            <td width="50%">Setuju Dibayar</td>
            <td width="50%"></td>
        </tr>
        <tr class="ttd-tr">
            <td>Kuasa Pengguna Anggaran</td>
            <td>Yang Menerima</td>
        </tr>
        <tr class="ttd-tr" >
            <td class="ttd"></td>
            <td class="ttd"></td>
        </tr>
        
        
        <tr class="ttd-tr">
            <th><u><?= $KPA ?></u></th>
            <th><u><?= $nm_diperintah ?></u></th>
        </tr>

        <tr class="ttd-tr">
            <td>NIP. <?= $nipKPA ?></td>
            <td>NIP. <?= $nip_diperintah ?></td>
        </tr>
        <tr class="ttd-tr">
            <td>Lunas tanggal</td>
            <td></td>
        </tr>
        <tr class="ttd-tr">
            <td>Bendahara Pengeluaran</td>
            <td>Pejabat Pelaksana Teknis Kegiatan</td>
        </tr>
        <tr class="ttd-tr" >
            <td class="ttd"></td>
            <td class="ttd"></td>
        </tr>
        <tr class="ttd-tr">
            <th><u><?= $BENDAHARA ?></u></th>
            <th><u><?= $PPTK ?></u></th>
        </tr>
        <tr class="ttd-tr">
            <td>NIP. <?= $nipBENDAHARA ?></td>
            <td>NIP. <?= $nipPPTK ?></td>
        </tr>
    </table>
    
</div>
												</div>

												<div id="bbm" class="tab-pane fade">

													bbm bbm
<div class="page">
	<div>
	<center><b><u style="letter-spacing: 8px;">KWITANSI</u></b></center>
	<div class="nomor-kwitansi">No. : KWT/ /GU- /DPUPR/2018</div>
	<div class="nomor-kwitansi" style="text-align: right;">No. : KWT/ /GU- /DPUPR/2018</div>
	<div class="nomor-kwitansi"></div>
	<div class="nomor-kwitansi" style="text-align: right;">No. REK. 1.03.1.03.01.01.03.5.2.2.01.06</div>
	<span>Sudah terima dari : </span><div class="col-kanan">PENGGUNA ANGGARAN DINAS PEKERJAAN UMUM DAN PENATAAN RUANG KAB. PASAMAN BARAT TAHUN ANGGARAN 2018</div>
	<span>Uang Sejumlah Rp.</span>
	<div id="nominal-angka"> 
		<p>30.000.000</p>
	</div>
			<span></span>
	<div id="terbilang"> 
		<p>
			<i>
				Tiga puluh juta
				Tiga puluh juta
				Tiga puluh juta
				Tiga puluh juta
				Tiga puluh juta
				Tiga puluh juta
				Tiga puluh juta
			</i>
		</p>
	</div>
	<span></span><div class="col-kanan" style="text-align: justify;">RUANG KAB. PASAMAN BARAT TAHUN ANGGARAN 2018
Pembayaran Lunas Pada "Drs. H.RAF'AN,MM" atas Penggantian Biaya BBM Solar Untuk Kendaraan Dinas BA 8036 S Sebanyak  40 liter, Atas Perjalanan Dinas Ke Kec. Sungai Beremas Pada Tanggal  07 April  2018. Pada Kegiatan Rapat-Rapat Koordinasi dan Konsultasi.Seperti SPT,SPPD dan LHP Terlampir.</div>
<span></span><div class="col-kanan" style="text-align: center;">Dibebankan Pada {Anggaran Belanja Langsung Tahun  2018}</div>
<div style="width: 35%; display: inline-flex;">
<table class="border" width="100%">
	<tr><td>Diterima tgl………………………………………</td></tr>
	<tr><td>Dibayar tgl……………………………………….</td></tr>
	<tr><td>Dibukukan tgl……………………………………</td></tr>
	<tr><td>No.Folio Buku Kas………………………………</td></tr>
	<tr><td>Barang-barang yang dibeli ini telah diterima dalam		
 			keadaan baik dan telah dibukukan sebagai barang		
 			Inventaris/stock dalam daftar Inventaris/stock.<br>	
 			No……………………….	tgl……………….	
 			Oleh…………………………………………		</td></tr>
</table>

</div>
<div style="width: 64%; display: inline-flex;">
	<table class="noborder text-center" width="100%">
	<tr>
		<td colspan="2">Simpang Empat, ………………………………………2019</td>
	</tr>
	<tr><td width="50%"> </td><td width="50%">Yang terima,</td></tr>
	<tr><td>Kuasa Pengguna Anggaran</td><td></td></tr>
	<tr>
		<td><b class="sign-name">(HENNY FERNIZA, ST, MT )</b>Nip. 19811022 200604 2 007<br></td>
		<td><br><br>Nama terang : Drs. H. RAF'AN, MM<br>Alamat terang : Simpang Empat</td>
	</tr>
	<tr><td>Lunas tgl………………………………<b><br/>Bendahara Pengeluaran</b></td><td>Diketahui Oleh:</td></tr>
	<tr><td><br>
			<b class="sign-name">(HENNY FERNIZA, ST, MT )</b>
			Nip. 19811022 200604 2 007<br>
		</td>
		<td>
			 <b class="sign-name">( NASRIL, ST, MT )</b>
			 Nip. 19811022 200604 2 007<br>
		</td>
	</tr>
</table>

</div>
</div>
</div>
												</div>

												<div id="dropdown1" class="tab-pane fade">
													<p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade.</p>
												</div>

												<div id="dropdown2" class="tab-pane fade">
													<p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin.</p>
												</div>
											</div>
										</div>
									</div><!-- /.col -->
								</div><!-- /.row -->
								
							</div>	
						</div>		