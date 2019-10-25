
<style type="text/css">
div{
	display: inline-block;
	margin-top: 2mm;
}

div#nominal-angka {
	background: repeating-linear-gradient(153deg, #efefef, #f3eeee 3px, white 0.1px, white 4px);
    width: 150mm;
    height: auto;
    transform: skew(-36deg);
    padding: 0px 21px;
    /* margin-left: 360px; */
    /* font-size: 30pt; */
    display: inline-block;
    margin-right: 146px;
    /* font-size: 30pt;*/
}
div#nominal-angka > p{
	transform: skew(15deg);
    font-weight: bolder;
    margin-top: 5px;
    margin-bottom: 5px;
    width: 100mm;
    position: inherit;

}
b{
	font-size: 12pt !important;
}

span{
	vertical-align: top;
    /*font-weight: bolder;*/
    width: 50mm;
    display: inline-block;
    margin-top: 2mm;
}

div#terbilang {
	background: repeating-linear-gradient(153deg, #efefef, #f3eeee 3px, white 0.1px, white 4px);
    width: 185mm;
    height: auto;
    transform: skew(-36deg);
    padding: 0px 21px;
    /* margin-left: 360px; */
    /* font-size: 30pt; */
    display: inline-block;
}
div#terbilang > p{
	transform: skew(34deg);
    font-weight: bolder;
    margin-top: 5px;
    margin-bottom: 5px;
    padding: 0mm 5mm;
    font-size: 12.5pt;
    letter-spacing: 0.3px;
    text-transform: capitalize;
    word-spacing: 0.1;
}



#trapezoid {
    border-bottom: 100px solid red;
    border-left: 50px solid transparent;
    border-right: 50px solid transparent;
    height: 0;
    width: 100px;
}

 #parallelogram {
      width: 150px;
      height: 100px;
      transform: skew(20deg);
      background: red;
    }
.page {
	    margin: 5mm;
	    border: 1px dotted !important;
	    border-radius: initial;
	    width: initial;
	    min-height: initial;
	    box-shadow: initial;
	    background: initial;
	    padding: 5mm;  
	    width:252.5mm;
	    box-shadow: 0px 0px 19px rgba(0, 0, 0, 1);      
        }
  center, b, u{
        	font-size: 14.5pt;
        }
.nomor-kwitansi{
	width: 49%;
	display: inline-grid;
  }	
.col-kanan{
	vertical-align: top;
			width: 200mm;
		}
.col-kiri{
	vertical-align: top;
			width: 200mm;
}
.col-50{
	width: 49%;
	display: inline-flex;
  }	
  .col-100{
	width: 100%;
	display: inline-grid;
  }
table {
  border-collapse: collapse;
} 
 td, th {
  border: 1px solid black;
}
table.border tr td{
			 border: 1px solid #000 !important;
		}
table.noborder tr td{
			 border: 0px solid #fff !important;
}
.text-center{
	text-align: center !important;
}
.text-left{
	text-align: left !important;
}
.text-right{
	text-align: right !important;
}
.sign-name{
	font-size: 12pt !important;
	margin-top: 9mm !important;
    display: grid !important;
}
  @page {
        size: legal potret !important;
        margin: 0;
        font: 12.5pt "Time New Roman, Tahoma";
        text-align: justify;
    }
  @media print {
  	 @page {
  	 	 size: legal potret !important;
  	 	 font: 12.5pt "Time New Roman, Tahoma";
             width:252.5mm;
             height:331mm;
             -webkit-print-color-adjust: exact;
             text-align: justify;
  	 }
        /*html, body:before {
           /*
            width: 210mm;
            height: 297mm; 
           
             font: 12.5pt "Time New Roman, Tahoma";
             width:252.5mm;
             height:331mm;
             -webkit-print-color-adjust: exact;
             text-align: justify;
             size: legal potret !important;
        } */ 
        .page {
		    margin: 5mm;
		    border: 1px dotted !important;
		    border-radius: initial;
		    width: initial;
		    min-height: initial;
		    box-shadow: initial;
		    background: initial;
		    padding: 5mm;
		    width:252.5mm; 
		    size: potret !important;       
        }
		table {
		  border-collapse: collapse;
		} 
		 td, th {
		  border: 1px solid black;
		}
		table.noborder tr td{
			 border: 0px solid #fff !important;
		}
		.col-kanan{
			width: 200mm;
		}

		.garis-putus{
			width: 255.5mm;
			border-bottom: thin red dotted;
		}

		.no-print, .no-print *{
			display: none;
		} 
    }   

 button{
 	position: fixed;
    background-color: blue;
    border-radius: 28px;
    padding: 3px 10px 2px 10px;
    color: whitesmoke;
    font-size: x-large;
    cursor: pointer;
    border-color: blue;
 } 
 button:hover{
 	position: fixed;
    background-color: #38e7ffb3;
    border-radius: 28px;
    padding: 3px 10px 2px 10px;
    color: #011b17;
    font-size: x-large;
    cursor: pointer;
    border-color: #27c1ea;
 }    
</style>
	<?php
$no    = 1;
$Total = 0;
foreach ($spt_pengikut as $pengikut) {
    $nm_diperintah       = $pengikut["nm_diperintah"];
    $nip_diperintah      = $pengikut["nip_diperintah"];
    $pangkat_diperintah  = $pengikut["pangkat_diperintah"];
    $golongan_diperintah = $pengikut["golongan_diperintah"];
    $cs                  = (count($spt_pengikut) >= 1) ? ", Cs" : "";
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

    /**
     *   PENENTUAN JUMLAH BBM PERWILAYAH  
     * [wil1] => 150000 [wil2] => 180000 [wil3] => 185000 [bbm_luar]
     */
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

}
$halaman = 2; //jumlah cetak halaman
?>
<div style="float: right; width: 15%;" class="no-print">
 <button class="no-print" onclick="print(7)" style="">CETAK</button>
 <br><br><hr>Lembar:
 <select name="lembar" onchange="myFunction(this.value)">
 	<option value="0">1 Lembar</option>
 	<option value="2" selected>2 Lembar</option>
 	<option value="3">3 Lembar</option>
 	<option value="4">4 Lembar</option>
 	<option value="5">5 Lembar</option>
 </select>
</div>
<div  id="kwitansi">
<?php for ($i=0; $i < $halaman ; $i++): ?>
<div class="page">
	<div>
	<center><b><u style="letter-spacing: 8px;">KWITANSI</u></b></center>
	<div class="nomor-kwitansi">No. : KWT/ /GU- /DPUPR/2018</div>
	<div class="nomor-kwitansi" style="text-align: right;">No. : KWT/ /GU- /DPUPR/2018</div>
	<div class="nomor-kwitansi"></div>
	<div class="nomor-kwitansi" style="text-align: right;">No. REK. 1.03.1.03.01. <?=$this->m_master->kegiatan($spt_dalam->kegiatan_id, "rekening")?></div>
	<span>Sudah terima dari : </span><div class="col-kanan"><?php $retVal = ($anggaran != "") ? $this->m_anggaran->anggaran($anggaran, "ket") : "<strike style='color:red;'>ANGGARAN</strike>";?>
		<b><?=strtoupper($retVal)?>
	 	<?=$this->m_anggaran->anggaran($anggaran, "tahun")?></b>
	 </div>
	<span>Uang Sejumlah Rp.</span>
	<div id="nominal-angka"> 
		<p><?=  angka($uang_harian)  ?></p>
	</div>
			<span></span>
	<div id="terbilang"> 
		<p>
			<i>
				<?=angka_terbilang($uang_harian)?> Rupiah
			</i>
		</p>
	</div>
	<span>Sebab dari : </span><div class="col-kanan" style="text-align: justify;">Pembayaran Lunas Pada "<?=$spt_dalam->nama?>"
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
	<tr><td><b>Kuasa Pengguna Anggaran</b></td><td></td></tr>
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
			<br><br><?=$kpa?>
			<br></td>
		<td><br><br>Nama terang :  <b><?=$nm_diperintah?></b> <br>Alamat terang : Simpang Empat</td>
	</tr>
	<tr><td>Lunas tgl………………………………<b><br/>Bendahara Pengeluaran</b></td><td>Diketahui Oleh:<br><b>Pejabat Pelaksana Teknis Kegiatan</b></td></tr>
	<tr><td><br><br>
			<?=$bendahara?>
		</td>
		<td><br><br>
			 <?=$pptk?>
		</td>
	</tr>
</table>

</div>
</div>
</div>

<br>
<br>

<hr class="garis-putus"></hr>

<?php endfor ?>
</div>
<div id="kwitansi-copy"></div>
<!--div class="page">
	<div>
	<center><b><u style="letter-spacing: 8px;">KWITANSI</u></b></center>
	<div class="nomor-kwitansi">No. : KWT/ /GU- /DPUPR/2018</div>
	<div class="nomor-kwitansi" style="text-align: right;">No. : KWT/ /GU- /DPUPR/2018</div>
	<div class="nomor-kwitansi"></div>
	<div class="nomor-kwitansi" style="text-align: right;">No. REK. 1.03.1.03.01. <?=$this->m_master->kegiatan($spt_dalam->kegiatan_id, "rekening")?></div>
	<span>Sudah terima dari : </span><div class="col-kanan"><?php $retVal = ($anggaran != "") ? $this->m_master->anggaran($anggaran, "ket") : "<strike style='color:red;'>ANGGARAN</strike>";?>
		<b><?=strtoupper($retVal)?>
	 	<?=$this->m_master->anggaran($anggaran, "tahun")?></b>
	 </div>
	<span>Uang Sejumlah Rp.</span>
	<div id="nominal-angka"> 
		<p><?=  angka($uang_harian)  ?></p>
	</div>
			<span></span>
	<div id="terbilang"> 
		<p>
			<i>
				<?=angka_terbilang($uang_harian)?> Rupiah
			</i>
		</p>
	</div>
	<span>Sebab dari : </span><div class="col-kanan" style="text-align: justify;">Pembayaran Lunas Pada "<?=$spt_dalam->nama?>"
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
	<tr><td><b>Kuasa Pengguna Anggaran</b></td><td></td></tr>
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
			<br><br><?=$kpa?>
			<br></td>
		<td><br><br>Nama terang :  <b><?=$nm_diperintah?></b> <br>Alamat terang : Simpang Empat</td>
	</tr>
	<tr><td>Lunas tgl………………………………<b><br/>Bendahara Pengeluaran</b></td><td>Diketahui Oleh:<br><b>Pejabat Pelaksana Teknis Kegiatan</b></td></tr>
	<tr><td><br><br>
			<?=$bendahara?>
		</td>
		<td><br><br>
			 <?=$pptk?>
		</td>
	</tr>
</table>

</div>
</div>
</div-->

 <script type="text/javascript">
  //document.getElementById("lembar").addEventListener("change", myFunction);
  function copyDiv(int) {
  		var firstDivContent = document.getElementById('kwitansi');
  		var tempDivContent  = '';
    	var secondDivContent = document.getElementById('kwitansi-copy');
 		for (var i = 0; i < int-1 ; i++) {
 			var br =  '<br>';
 			tempDivContent += br+br+firstDivContent.innerHTML; 
 		}
 		secondDivContent.innerHTML = tempDivContent;
	}
  function myFunction(val) {
	copyDiv(val);
  }
  copyDiv(2);
 </script>
