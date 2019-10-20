	<?php
$no    = 1;
$Total = 0;
foreach ($spt_pengikut as $pengikut) {
    $nm_diperintah       = $pengikut["nm_diperintah"];
    $nip_diperintah      = $pengikut["nip_diperintah"];
    $pangkat_diperintah  = $pengikut["pangkat_diperintah"];
    $golongan_diperintah = $pengikut["golongan_diperintah"];
    $cs                  = (count($spt_pengikut) > 1 ) ? ", Cs" : "";
    $maksud              = $pengikut["maksud"];
    $tujuan              = $pengikut["tujuan"];
    $kec                 = $pengikut["kec"];
    $tahun               = $pengikut["tahun"];
    $tgl_berangkat       = $pengikut["tgl_berangkat"];
    $no_sppd             = $pengikut["no_sppd"];
    $tgl_sppd            = $pengikut["ttd_sppd_tgl"];

    ///ANGARAN KEGIATAN
    $REKENING     = $pengikut["rekening"];
    $KEGIATAN     = $pengikut["kegiatan"];
    $KPA          = $pengikut["kpa"];
    $jabKPA       = $pengikut["jabkpa"];
    $nipKPA       = $pengikut["nipkpa"];
    $PPTK         = $pengikut["pptk"];
    $jabPPTK      = $pengikut["jabpptk"];
    $nipPPTK      = $pengikut["nippptk"];
    $BENDAHARA    = $pengikut["bendahara"];
    $jabBENDAHARA = $pengikut["jabbendahara"];
    $nipBENDAHARA = $pengikut["nipbendahara"];
    $anggaran     = $pengikut["anggaran"];

    $hari_perjalanan = JUMLAHHARI($pengikut["tgl_berangkat"], $pengikut["tgl_kembali"]);
    //// TENTUKAN WILAYAH PERJALANAN DINAS
    $wil         = $pengikut["wilayah"];
    $uang_harian = 0;
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
function goToPage( url ){
 window.location.href = url;
}
</script>
						<div class="row">
							<div class="col-xs-12">
							<?php if (is_object($spt_dalam)) {?>
								<!-- PAGE CONTENT BEGINS -->
								<button class="btn btn-xs btn-primary" onclick="openWindow('<?=base_url('spt/cetak_spt_dalam/') . '/' . $spt_dalam->id_spt?>')">
									<i class="fa fa-print"></i>
								Cetak SPD</button>
							<?php }?>
							<?php if (count($spt_pengikut) > 0) {?>
								<button class="btn btn-xs btn-success" onclick="openWindow('<?=base_url('spt/PrintKwitansiNominatif/') . '/' . $spt_dalam->id_spt?>')">
									<i class="fa fa-print"></i>
								Cetak Nominatif</button>
							<?php }?>
							<?php if (is_object($spt_dalam)) {?>
								<button class="btn btn-xs btn-danger" onclick="openWindow('<?=base_url('spt/print_kwitansi/') . '/' . $spt_dalam->id_spt?>')">
									<i class="fa fa-print"></i>
								Cetak BBM</button>
							<?php }?>
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
														<span class="badge badge-danger"><?=count($spt_pengikut)?></span>
													</a>
												</li>
												<li>
													<a data-toggle="tab" href="#bbm">
														<i class="glyphicon glyphicon-tint"></i>
														BBM
														<span class="badge badge-danger"></span>
													</a>
												</li>


											</ul>

											<div class="tab-content">
												<div id="homes" class="tab-pane fade in active">
													<div class="col-sm-12">
														<b style="font-size: 22px">SPT <?=$spt_dalam->no_spt?></b><br>
														<i><?=$spt_dalam->ttd_tempat?> - <?=$spt_dalam->tujuan?></i>
													</div>


													<div class="profile-user-info profile-user-info-striped">
														<div class="profile-info-row">
															<div class="profile-info-name"> Pejabat Pemberi Perintah </div>
															<div class="profile-info-value">
																<span class="editable" id="username"><b><?=$spt_dalam->ttd_nama?></b><br><?=$spt_dalam->ttd_nip?></span>
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
																<span class="editable" id="username"><b><?=$spt_dalam->nama . '</b><br>' . $spt_dalam->nip?> </span>
															</div>
														</div>
														<div class="profile-info-row">
															<div class="profile-info-name"> Pangkat dan Golongan </div>
															<div class="profile-info-value">
																<span class="editable" id="username"><?=$spt_dalam->pangkat?> </span>
															</div>
														</div>

														<div class="profile-info-row">
															<div class="profile-info-name"> Jabatan / Instansi </div>

															<div class="profile-info-value">
																<span class="editable" id="country"><?=$spt_dalam->jabatan?></span> ke

															</div>
														</div>

														<div class="profile-info-row">
															<div class="profile-info-name"> Maksud Perjalanan Dinas </div>

															<div class="profile-info-value">
																<span class="editable" id="age"><?=$spt_dalam->maksud?></span>
															</div>
														</div>

														<div class="profile-info-row">
															<div class="profile-info-name"> Dasar Surat Perintah </div>

															<div class="profile-info-value">
																<span class="editable" id="signup"><?=$spt_dalam->beban?></span>
															</div>
														</div>

														<div class="profile-info-row">
															<div class="profile-info-name"> Tempat Berangkat </div>

															<div class="profile-info-value">
																<i class="fa fa-map-marker light-green bigger-110"></i>
																<span class="editable" id="login"><?=$spt_dalam->ttd_tempat?></span>
															</div>
														</div>

														<div class="profile-info-row">
															<div class="profile-info-name"> Tempat Tujuan </div>

															<div class="profile-info-value">
																<i class="fa fa-map-marker light-red bigger-110"></i>
																<span class="editable" id="about"><?=$spt_dalam->tujuan . " <i class='red'>(Wilayah " . $spt_dalam->wilayah . ")</i>"?></span>
															</div>
														</div>
														<div class="profile-info-row">
															<div class="profile-info-name"> Tanggal Berangkat </div>

															<div class="profile-info-value">
																<span class="editable" id="about"><?=LONGE_DATE_INDONESIA($spt_dalam->tgl_berangkat)?></span>
															</div>
														</div>
														<div class="profile-info-row">
															<div class="profile-info-name"> Tanggal Kembali </div>

															<div class="profile-info-value">
																<span class="editable" id="about"><?=LONGE_DATE_INDONESIA($spt_dalam->tgl_kembali)?></span>
															</div>
														</div>
														<div class="profile-info-row">
															<div class="profile-info-name"> #</div>

															<div class="profile-info-value">
																<span class="editable" id="about"><button class="btn btn-xs btn-danger" onclick="goToPage('<?=base_url("spt/dalam/edit/" . $spt_dalam->id_spt . "?p=2")?>')"><i class="fa fa-pencil"></i></button></span>
															</div>
														</div>
													</div>

												</div>
												<div id="home" class="tab-pane fade in">
													<div class="col-sm-12">
														<b style="font-size: 22px">SPPD <?=$spt_dalam->no_sppd?></b><br>
														<i><?=$spt_dalam->ttd_tempat?> - <?=$spt_dalam->tujuan?></i>
													</div>
													<div class="profile-user-info profile-user-info-striped">
														<div class="profile-info-row">
															<div class="profile-info-name"> Pejabat Pemberi Perintah </div>
															<div class="profile-info-value">
																<span class="editable" id="username"><b><?=$spt_dalam->ttd_nama?></b><br><?=$spt_dalam->ttd_nip?></span>
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
																<span class="editable" id="username"><b><?=$spt_dalam->nama . '</b><br>' . $spt_dalam->nip?> </span>
															</div>
														</div>
														<div class="profile-info-row">
															<div class="profile-info-name"> Pangkat dan Golongan </div>
															<div class="profile-info-value">
																<span class="editable" id="username"><?=$spt_dalam->pangkat?> </span>
															</div>
														</div>

														<div class="profile-info-row">
															<div class="profile-info-name"> Jabatan / Instansi </div>

															<div class="profile-info-value">
																<span class="editable" id="country"><?=$spt_dalam->jabatan?></span> ke

															</div>
														</div>

														<div class="profile-info-row">
															<div class="profile-info-name"> Maksud Perjalanan Dinas </div>

															<div class="profile-info-value">
																<span class="editable" id="age"><?=$spt_dalam->maksud?></span>
															</div>
														</div>

														<div class="profile-info-row">
															<div class="profile-info-name"> Dasar Surat Perintah </div>

															<div class="profile-info-value">
																<span class="editable" id="signup"><?=$spt_dalam->dasar_spt?></span>
															</div>
														</div>

														<div class="profile-info-row">
															<div class="profile-info-name"> Tempat Berangkat </div>

															<div class="profile-info-value">
																<i class="fa fa-map-marker light-green bigger-110"></i>
																<span class="editable" id="login"><?=$spt_dalam->ttd_tempat?></span>
															</div>
														</div>

														<div class="profile-info-row">
															<div class="profile-info-name"> Tempat Tujuan </div>

															<div class="profile-info-value">
																<i class="fa fa-map-marker light-red bigger-110"></i>
																<span class="editable" id="about"><?=$spt_dalam->tujuan . " <i class='red'>(Wilayah " . $spt_dalam->wilayah . ")</i>"?></span>
															</div>
														</div>
														<div class="profile-info-row">
															<div class="profile-info-name"> Tanggal Berangkat </div>

															<div class="profile-info-value">
																<span class="editable" id="about"><?=LONGE_DATE_INDONESIA($spt_dalam->tgl_berangkat)?></span>
															</div>
														</div>
														<div class="profile-info-row">
															<div class="profile-info-name"> Tanggal Kembali </div>

															<div class="profile-info-value">
																<span class="editable" id="about"><?=LONGE_DATE_INDONESIA($spt_dalam->tgl_kembali)?></span>
															</div>
														</div>
													</div>
												</div>

												<div id="nominatif" class="tab-pane fade">

<div class="row" style="width: 100%;">
</div>

<div class="row">
	<?php
if (count($spt_pengikut) > 0) {
    ?>
    <div style="padding-top: 0px;"  class="no-print"></div>
    <table border="0">

        <tr>
            <td></td>
            <td style="text-align:right;">Kode Rekening :  M.A. 1.03 . 1.03.01. <?=$this->m_master->kegiatan($spt_dalam->kegiatan_id, "rekening")?> . 01</td>
        </tr>

        <tr>
            <td colspan="2" style="text-align: justify;">
            	<p>
                Sudah terima dari <span class="blue"><?=$retVal = ($anggaran != "") ? $this->m_master->anggaran($anggaran, "ket").' '.$this->m_master->anggaran($anggaran, "tahun") : "<strike>ANGGARAN</strike>";?></span>
                uang sejumlah Rp. <span class="blue"><?=angka($Total)?></span>,- (<span class="blue"><?=angka_terbilang($Total)?></span>)
                sebab dari pembayaran lunas pada <span class="blue"><?=$nm_diperintah?><?=$cs?></span>
                Biaya Perjalanan Dinas Dalam Rangka <span class="blue"><?=$maksud?></span>
                ke <span class="blue"><?=$tujuan?>  <?=$kec?></span>
                Tanggal <span class="blue"><?=LONGE_DATE_INDONESIA($tgl_berangkat)?></span>
                pada Kegiatan <span class="blue"><?=$this->m_master->belanja($spt_dalam->kegiatan_id, "nama_belanja") . ' ' . $spt_dalam->kegiatan_id?></span>
                berdasarkan SPPD Nomor : <span class="blue"><?=$no_sppd?></span>
                tanggal   <span class="blue"><?=LONGE_DATE_INDONESIA($tgl_sppd)?></span>
                dengan perincian sebagai berikut :
            	</p>
            </td>
        </tr>
    </table>

    <table border="1" class="tables">
        <tr style="text-align: center !important;">
            <th rowspan="2" width="1%" style="text-align: center;">No</th>
            <th rowspan="2" width="30%" style="text-align: center;">Nama / NIP</th>
            <th rowspan="2" width="10%" style="text-align: center;">Eselon/Golongan</th>
            <th colspan="2" width="20%" style="text-align: center;">Uang Harian</th>
            <th rowspan="2" width="10%" style="text-align: center;">Jumlah<br/>Diterima</th>
            <th rowspan="2" width="5%" style="text-align: center;">Bayar</th>
        </tr>
        <tr>
            <th style="text-align: center;">Jumlah Hari</th>
            <th style="text-align: center;">Satuan</th>
        </tr>
        <tr>
        	<th style="text-align: center;">1</th>
        	<th style="text-align: center;">2</th>
        	<th style="text-align: center;" >3</th>
        	<th style="text-align: center;">4</th>
        	<th style="text-align: center;">5</th>
        	<th style="text-align: center;">6=(4x5)</th>
        	<th style="text-align: center;">7</th>
        </tr>
        <tbody>
        	<?php
if ($spt_pengikut > 0) {
        $no    = 1;
        $Total = 0;
        foreach ($spt_pengikut as $pengikut) {
            $vnama = $pengikut["nama_pengikut"] . " " . $pengikut["wilayah"];
            $vnip  = ($pengikut["nip_pengikut"] == "") ? $pengikut["pangkat"] : $pengikut["nip"];
            $vgol  = ($pengikut["pangkat"] == $pengikut["golongan"]) ? $pengikut["pangkat"] : $pengikut["pangkat"] . ' ' . $pengikut["golongan"];

            ?>
            <tr>
                <td style="text-align: right;"><?=$no?>.</td>
                <td><?=$vnama?><br/><?=$vnip?></td>
                <td style="text-align: center;"><?=$vgol?></td>
                <td style="text-align: center;"><?php
//echo $pengikut["wilayah"];
            $hari_perjalanan = JUMLAHHARI($pengikut["tgl_berangkat"], $pengikut["tgl_kembali"]);
            echo $hari_perjalanan;

            ?></td>
                <td style="text-align: right;">
                	<?php
//// TENTUKAN WILAYAH PERJALANAN DINAS
            $wil         = $pengikut["wilayah"];
            $uang_harian = 0;
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
            echo angka($uang_harian) . " <br><i class='red'>( wilayah " . $wil . ")</i>";
            ?>

                </td>
                <td style="text-align: right;"><?=angka($subtotal = (intval($uang_harian) * intval($hari_perjalanan)))?></td>
                <td ><?=$no?>. <button class="btn btn-xs btn-success btn-bayar btn-<?=$pengikut["bayar"]?>" data-val="<?=$pengikut["bayar"]?>" data-id="<?=$pengikut['id_peng']  ?>"><?=$pengikut["bayar"]?></button></td>
                 <!--td></td-->
            </tr>
            <?php
$no++;
            $Total += $subtotal;
        }
    }
    ?>
            <tfoot>
                <tr>
                    <th colspan="5" style="text-align: center;">J U M L A H</th>
                    <th style="text-align: right;"><?=angka($Total)?></th>
                    <th></th>
                    <!--td></td-->
                </tr>
            </tfoot>
        </tbody>
    </table>
<!--?= $this->db->last_query() ?-->
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
            <th><u><?=$KPA?></u></th>
            <th><u><?=$nm_diperintah?></u></th>
        </tr>

        <tr class="ttd-tr">
            <td>NIP. <?=$nipKPA?></td>
            <td>NIP. <?=$nip_diperintah?></td>
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
            <th><u><?=$BENDAHARA?></u></th>
            <th><u><?=$PPTK?></u></th>
        </tr>
        <tr class="ttd-tr">
            <td>NIP. <?=$nipBENDAHARA?></td>
            <td>NIP. <?=$nipPPTK?></td>
        </tr>
    </table>
<?php } else {?>
<center>
	<a href="<?=base_url('spt/dalam/pengikut/') . '/' . $this->uri->segment(4)?>" class="btn btn-xs btn-warning"><i class="fa fa-users"></i> + PENGIKUT</a>
</center>

<?php }?>
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
	<div class="nomor-kwitansi" style="text-align: right;">No. REK. 1.03.1.03.01. <?=$this->m_master->kegiatan($spt_dalam->kegiatan_id, "rekening")?></div>
	<span>Sudah terima dari : </span><div class="col-kanan">
		<?php $retVal = ($anggaran != "") ? $this->m_master->anggaran($anggaran, "ket") : "<strike style='color:red;'>ANGGARAN</strike>";?>
		<b><?=strtoupper($retVal)?>
	 	<?=$this->m_master->anggaran($anggaran, "tahun")?></b>
	 </div>
	<span>Uang Sejumlah Rp.</span>
	<div id="nominal-angka" style="display: contents;">
	<?php
//[wil1] => 150000 [wil2] => 180000 [wil3] => 185000 [bbm_luar]
$wil         = $pengikut["wilayah"];
$uang_harian = 0;
$liter       = 0;
switch ($wil) {
    case '1': // Wilayah 1
        $uang_harian = $transpor->wil1;
        $liter       = $transpor->liter1;
        break;
    case '2': // Wilayah 2
        $uang_harian = $transpor->wil2;
        $liter       = $transpor->liter2;
        break;
    case '3': // Wilayah 3
        $uang_harian = $transpor->wil3;
        $liter       = $transpor->liter3;
        break;
    case '4': // Wilayah 4
        $uang_harian = $pengikut->harian_luar;
        $liter       = $pengikut->liter_luar;
        break;
    default:
        $uang_harian = 0;
        $liter       = 0;
        break;
}

?>

		<b><?=angka($uang_harian)?></b>
	</div>

	<div id="terbilang" >
				<b><i><?=angka_terbilang($uang_harian)?></i></b>
	</div>
	<span>Sebab dari : </span><div class="col-kanan" style="text-align: justify;">
	Pembayaran Lunas Pada "<?=$spt_dalam->nama?>"
	atas Penggantian Biaya BBM <?=$transpor->bahan_bakar?>
	Untuk Kendaraan Dinas <?=$transpor->nomor?>
	Sebanyak  <?=$transpor->bahan_bakar . ' ' . $liter?>  liter,
	Atas Perjalanan Dinas Ke <?=$this->m_master->tujuan($spt_dalam->tujuan_id, "kec");?>
	Pada Tanggal  <?=LONGE_DATE_INDONESIA($spt_dalam->tgl_kembali)?>.
	Pada Kegiatan <?=$this->m_master->kegiatan($spt_dalam->kegiatan_id, "kegiatan")?>.
	Seperti SPT, SPPD dan LHP Terlampir.</div>
<span></span><div class="col-kanan" style="text-align: center;">Dibebankan Pada Anggaran Belanja Langsung Tahun  <?=date("Y")?></div>
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
		<td>
			<?php
$k         = $this->m_master->kegiatan($spt_dalam->kegiatan_id, "kpa");
$p         = $this->m_master->kegiatan($spt_dalam->kegiatan_id, "pptk");
$b         = $this->m_master->kegiatan($spt_dalam->kegiatan_id, "bendahara");
$kpa       = "<b><i>(" . $this->m_master->pegawai_data($k, "nama") . ")</i></b><br/>Nip. " . $this->m_master->pegawai_data($k, "nip");
$pptk      = "<b><i>(" . $this->m_master->pegawai_data($p, "nama") . ")</i></b><br/>Nip. " . $this->m_master->pegawai_data($p, "nip");
$bendahara = "<b><i>(" . $this->m_master->pegawai_data($b, "nama") . ")</i></b><br/>Nip. " . $this->m_master->pegawai_data($b, "nip");

?>
			<?=$kpa?>
			<br></td>
		<td><br><br>Nama terang :  <b><?=$nm_diperintah?></b> <br>Alamat terang : Simpang Empat</td>
	</tr>
	<tr><td>Lunas tgl………………………………<b><br/>Bendahara Pengeluaran</b></td><td>Diketahui Oleh:<br><b>Pejabat Pelaksana Teknis Kegiatan</b></td></tr>
	<tr><td><br>
			<?=$bendahara?>
		</td>
		<td>
			 <?=$pptk?>
		</td>
	</tr>
</table>

</div>
</div>
</div>
												</div>
											</div>
										</div>
									</div><!-- /.col -->
								</div><!-- /.row -->

							</div>
						</div>

