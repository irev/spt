
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
        size: f4;
        margin: 0;
        font: 12.5pt "Time New Roman, Tahoma";
        text-align: justify;
    }
  @media print {
        html, body:before {
           /*
            width: 210mm;
            height: 297mm; 
            */ 
             font: 12.5pt "Time New Roman, Tahoma";
             width:252.5mm;
             height:331mm;
             -webkit-print-color-adjust: exact;
             text-align: justify;
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

<div style="float: right; width: 15%;">
 <button class="no-print" onclick="print(7)" style="">CETAK</button>
</div>

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
	<tr><td>Lunas tgl………………………………<b>Bendahara Pengeluaran</b></td><td>Diketahui Oleh:</td></tr>
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

<br>
<br>
<br>
<br>
<br>
<hr class="garis-putus"></hr>


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
Pembayaran Lunas Pada "Drs. H.RAF'AN,MM" atas Penggantian Biaya BBM Solar Untuk Kendaraan Dinas BA 8036 S Sebanyak  40 liter, Atas Perjalanan Dinas .</div>
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
	<tr><td>Lunas tgl………………………………<b>Bendahara Pengeluaran</b></td><td>Diketahui Oleh:</td></tr>
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

 
