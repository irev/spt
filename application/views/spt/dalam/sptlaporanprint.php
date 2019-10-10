<?php 
if(!$spt_dalam){
                    $red = base_url("spt/dalam");
                    header("refresh:4; url=$red");
                    echo "<center><h2>DOKUMEN SPT TIDAK DITEMUKAN</h2></center>";
                    //&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
}else{
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>LAPORAN PERJALANAN DINAS</title>
</head>
<style type="text/css">
/* Kode CSS Untuk PAGE ini dibuat oleh http://jsfiddle.net/2wk6Q/1/ */
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #464c4c;
        font: 12.5pt "Time New Roman, Tahoma";
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    input, select, textarea{
        width: 100%;
        color: #2838f1; 
        font-family: Time New Roman, Tahoma, Verdana;
        font-weight: bold;
        background-color: #daffd7;
    }
    table {
        width: 100%;
        border-collapse: collapse;

    }
    td{
        vertical-align:top;
    }

    /*table, td, th,*/ 
    .table-konten{
        border: 1px solid black;
        line-height: 19px;
    }
    /* f4 2480px x 3508px  */ 
    /* f4 216mm  x 330mm  */ 
    .page {
        width: 252.5mm;
        min-height: 331mm;
        padding: 20mm;
        margin: 10mm auto;
        border: 1px #cccbcb solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        padding: 0.5cm;
        border: 2px #614949 dotted;
        height: 349mm;
        width: 212mm;
        outline: 2cm #e8e6e6 solid;
    }
    .logo{
            width: 20mm !important;
        }
    .table-header-surat{
        /*font-family: "Time New Roman", Tahoma, Verdana !important; */
        width: 100%;
        text-align: center;
        border: 0px !important;
    }
    tr{
        font-family: Time New Roman !important;
        border-right-color: 1pt solid black !important;
    }
    .border-r{
        border-right-color: #000 !important;
    }
    .noborder-r{
        border-right-color: #fff ;
    }
    .noborder-l{
        border-left-color: #fff; 
    }
    td.noline-lr{
         border-left-color: #fff !important; 
         border-right-color: #fff !important;
    }
    tr.noline-lr td{
         border-left-color: #fff !important; 
         border-right-color: #fff ;
    }
    tr.noline-b td{
        border-bottom-color: #fff;
    }
    .nomor-center{
        text-align: right;
    }
    /*
    .table-konten{
        width: 100%;
        text-align: center;
        border: 1px solid !important;
        
    }
    */
    .garis{
        border-style: double;
        margin-bottom: 5px;
    }
    h1{
        font-size: 1.2em;
        margin: 0px;
        font-family: Time New Roman !important;
        /* line-height: 0px;*/
    }
    h2{
        font-size: 1em;
        margin: -5px;
        font-family: Time New Roman !important;
        /*line-height: 0px;*/
    }
    h3{
        font-size: 0.9em;
        margin: -2px;
        font-family: Time New Roman !important;
        /*line-height: 0px;*/
    } 
    h4{
            font-size: 0.7em;
    		margin: 0px;
            font-family: Time New Roman !important;
    		line-height: 14px;
    }      
    @page {
        size: f4;
        margin: 0;
    }

    @media print {
        html, body {
           /*
            width: 210mm;
            height: 297mm; 
            */ 
           
             width:252.5mm;
             height:331mm;
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            
        }
        textarea, input, select{

                outline: none;
                border: none;
                background-color: transparent;
                font-style: "Time New Roman";
                font: 12pt "Time New Roman, Tahoma";
                font-weight: inherit;
                color:#000;
                 /* Removes the default <select> styling */
                  -webkit-appearance: none;
                  -moz-appearance: none;
                  appearance: none;
            }

           .subpage {
                padding: 0cm;
                border: 2px #fff;
                height: 349mm;
                width: 212mm;
                outline: none !important;
            }
    }

</style>
<script type="text/javascript">
function textAreaAdjust(o) {
  o.style.height = "0px";
  o.style.height = (20+o.scrollHeight)+"px";
}
</script>

<body>
<div class="book">
        <div class="page">
        <div class="subpage"><!--HEADER SURAT-->
            <table class="table-header-surat">
                <tbody>
                    <tr> <td rowspan="4"><img src="<?= base_url('asset') ?>/logo-kab-pasaman-barat.png" class="logo"></td> <td><h3>PEMERINTAH KABUPATEN PASAMAN BARAT</h3></td></tr>
                    <tr> <td><h1>DINAS PEKERJAAN UMUM & PENATAAN RUANG</h1></td></tr>
                    <tr> <td><h4>Jalan M. Natsir Pasaman Baru - Simpang Empat</h4></td></tr>
                    <tr> <td><h4>Telpon.  :  ( 0753 )  4611984  Fax  ( 0753 ) 7464232 Email :puprkab.pasamanbarat@gmail.com</h4></td></tr>

                </tbody>
            </table>
<!--HEADER SURAT END-->

            <div class="garis"></div>
<!--ISI SURAT-->
            <table>
                <tbody>
                    <tr>
                        <td colspan="5" style="text-align: center; border-bottom-color: #fff;"><u><h2><b>SURAT PERINTAH TUGAS</b></h2></u></td>
                    </tr>
                     <tr>
                        <td colspan="5" style="text-align: center;     padding-top: 4px !important;">
                          <!--  Nomor:090/<input type="text" name="nomo_sppd" style=" width:35px;">/SPT/DPUPR/<?= date('Y') ?> -->
                          <b><?= $spt_dalam->no_spt  ?></b>
                        </td>
                    </tr>
                </tbody>
            </table>
            Yang bertanda tangan dibawah ini:
            <table class="table-konten" border="1">
                <tbody>
                    <tr>
                        <td colspan="5" style="text-align: center;"><h4>MEMERINTAHKAN</h4></td>
                    </tr>
                    <tr>
                        <td colspan="5"><h4>KEPADA</h4></td>
                    </tr>
                    <tr>
                        <td class="noborder-r nomor-center">1.</td>
                        <td>Nama </td>
                        <td >:</td>
                        <td colspan="3"><?= $spt_dalam->nama  ?></td>
                    </tr>
                    <tr>
                        <td class="noborder-r nomor-center">2.</td>
                        <td>Nip</td>
                        <td >:</td>
                        <td><?= $spt_dalam->nip  ?></td>
                    </tr>
                    <tr>
                        <td class="noborder-r nomor-center">3.</td>
                        <td >Pangkat / Golongan</td>
                        <td >:</td>
                        <td><?= $spt_dalam->golongan  ?></td>
                    </tr>
                    <tr>
                        <td class="noborder-r nomor-center">4.</td>
                        <td>Jabatan</td>
                        <td >:</td>
                        <td><?= $spt_dalam->jabatan  ?></td>
                    </tr>
                    <tr>
                        <td class="noborder-r nomor-center">5.</td>
                        <td>Maksud Melaksanakan Tugas</td>
                        <td >:</td>
                        <td><?= $spt_dalam->maksud  ?> </td>
                    </tr>
                    <tr>
                        <td class="noborder-r nomor-center">6.</td>
                        <td>TRANSPORTASI</td>
                        <td >:</td>
                        <td><?= $spt_dalam->transportasi  ?></td>
                    </tr>
                    
                    <tr>
                        <td class="noborder-r nomor-center">7.</td>
                        <td >TUJUAN </td>
                        <td >:</td>
                        <td><?= $spt_dalam->tujuan  ?></td>

                    </tr>
                    <tr>
                        <td class="noborder-r nomor-center">8.</td>
                        <td >Berangkat Tanggal</td>
                        <td >:</td>
                        <td> <?= LONGE_DATE_INDONESIA($spt_dalam->tgl_berangkat)  ?></td>
                    </tr>
                    <tr>
                        <td class="noborder-r nomor-center">9.</td>
                        <td >Kembali Tanggal</td>
                        <td >:</td>
                        <td> <?= LONGE_DATE_INDONESIA($spt_dalam->tgl_kembali)  ?></td>
                    </tr>
                    <tr>
                        <td class="noborder-r nomor-center">10.</td>
                        <td >SUMBER DANA</td>
                        <td >:</td>
                        <td>Anggaran Belanja Langsung Tahun <?= $spt_dalam->sumber_dana  ?></td>
                    </tr>
                    <tr>
                        <td class="noborder-r nomor-center">11.</td>
                        <td colspan="3">Pengikut </td>
                    </tr>   
            </table>
            <!--PENGIKUT-->
            <table class="table-konten" border="1" style="text-align: center; font-size: 14px; border-top-color:#fff;">
                    <tr style="font-weight: bolder;">
                        <td width="2%" style="text-align: center;">No</td>
                        <td width="30%">Nama</td>
                        <td width="20%">Nip</td>
                        <td width="20%">Pangkat/Gol</td>
                        <td width="30%">Jabatan</td>
                    </tr>
                    <?php 
                    $no=1; 
                    foreach ($spt_dalam_pengikut as $pengikut) {
                    
                    ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td style="text-align: left;"> <?= $pengikut['nama'] ?></td>
                        <td > <?= $pengikut['nama'] ?></td>
                        <td> <?= $pengikut['nama'] ?></td>
                        <td> <?= $pengikut['nama'] ?></td>
                    </tr>
                    <?php $no++; } ?>
                    <!--tr>
                        <td>1</td>
                        <td style="text-align: left;">MUHAMMAD DIS, SE</td>
                        <td >19650401 200604 1 003</td>
                        <td>Penata III/c</td>
                        <td>Ka. UPT Peralatan & Pengujian</td>
                    </tr-->
            </table>
            <!--PENGIKUT END-->
           <br>
              <P style="text-align: justify !important;">
                <span >
                   Demikianlah Surat Perintah Tugas ini diberikan kepada yang bersangkutan untuk dilaksanakan dengan penuh rasa tanggungjawab.
                </span>
           </P>
            <table width="100%" border="0">
                <tr>
                    <td width="50%"></td>
                    <td width="15%">Dikeluarkan di</td>
                    <td >:</td>
                    <td ><?= $spt_dalam->ttd_tempat ?></td>
                </tr>
                <tr>
                    <td width="50%"></td>
                    <td style="border-bottom: 1px solid #000; ">Pada Tanggal</td>
                    <td >:</td>
                    <td ><?= LONGE_DATE_INDONESIA($spt_dalam->ttd_tgl) ?></td>
                </tr>     
                <tr>
                    <td width="50%" ></td>
                    <td style="text-align: center; padding-top: 10px;" colspan="3">
                    Kepala Dinas,<br><br><br><br><br><br>


                    <h3><u><b><?= $spt_dalam->ttd_nama ?></b></u></h3><?= $spt_dalam->ttd_gol ?><br/><?= $spt_dalam->ttd_nip ?>
                </td>
                </tr>
            </table>
            
 <!--ISI SURAT END-->         
        </div>    
    </div>

    
    <div class="page">
        <div class="subpage">
<!--HEADER SURAT-->
            <table class="table-header-surat">
                <tbody>
                    <tr> <td rowspan="4"><img src="<?= base_url('asset') ?>/logo-kab-pasaman-barat.png" class="logo"></td> <td><h3>PEMERINTAH KABUPATEN PASAMAN BARAT</h3></td></tr>
                    <tr> <td><h1>DINAS PEKERJAAN UMUM & PENATAAN RUANG</h1></td></tr>
                    <tr> <td><h4>Jalan M. Natsir Pasaman Baru - Simpang Empat</h4></td></tr>
                    <tr> <td><h4>Telpon.  :  ( 0753 )  4611984  Fax  ( 0753 ) 7464232 Email :puprkab.pasamanbarat@gmail.com</h4></td></tr>

                </tbody>
            </table>
<!--HEADER SURAT END-->

            <div class="garis"></div>
<!--ISI SURAT-->
            <table class="table-konten" border="1" style="font-size:12pt;">
                <tbody>
                    <tr class="noline-lr noline-b" style="border-bottom-color: #fff;">
                            <td ></td>
                            <td width="50%" ></td>
                            <td >Nomor</td>
                            <td width="1%" >:</td>
                            <td class="border-r">900/&nbsp;<input maxlength="4" type="text" name="nomo_sppd" style=" width:40px;">/SPPD/DPUPR/<?= date('Y') ?>2019</td>
                    </tr>
                    <tr class="noline-lr noline-b">
                        <td></td>
                        <td  width="50%"></td>
                        <td>Lembar&nbsp;Ke</td>
                        <td>:</td>
                        <td class="border-r">1 (satu)</td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align: center; border-bottom-color: #fff;"><u><h3><b>SURAT PERINTAH PERJALANAN DINAS</b></h3></u></td>
                    </tr>
                    
                    <tr>
                        <td colspan="5" style="text-align: center;">(SPPD)</td>
                    </tr>
                    <tr>
                        <td class="noborder-r nomor-center">1.</td>
                        <td>Pejabat yang Memberikan Perintah</td>
                        <td colspan="3">Kepala Dinas Pekerjaan Umum & Penataan Ruang</td>
                    </tr>
                    <tr>
                        <td class="noborder-r nomor-center">2.</td>
                        <td>Pegawai yang diperintahkan mengadakan Perjalanan Dinas</td>
                        <td class="noline-lr">
                        	Nama
                        	<br>
                        	Nip<br>
                        	Jabatan<br>
                        	Pangkat dan Golongan<br>
                        </td>
                        <td class="noline-lr">
                        	:<br>
                        	:<br>
                        	:<br>
                        	:<br>
                        	:<br>
                        </td>
                        <td>
                            <select name="select_nama">
                                <option>HENNY FERNIZA, ST, MT</option>
                                <option>WILDAN, SH, M.Si</option>
                            </select>
                            <input type="text" name="input_nama">
                        </td>
                    </tr>
                    <tr>
                        <td class="noborder-r nomor-center">3.</td>
                        <td>Perjalanan Dinas yang diperintahkan</td>
                        <td class="noline-lr">Nip</td>
                        <td class="noline-lr">:</td>
                        <td><input type="text" name="input_golongan"></td>
                    </tr>
                    <tr>
                        <td class="noborder-r nomor-center">4.</td>
                        <td>Perjalanan Dinas direncanakan</td>
                        <td class="noline-lr">Jabatan</td>
                        <td class="noline-lr">:</td>
                        <td><input type="text" name="input_golongan"></td>
                    </tr>
                    <tr>
                        <td class="noborder-r nomor-center">5.</td>
                        <td>Maksud Mengadakan Perjalanan Dinas</td>
                        <td class="noline-lr">Golongan</td>
                        <td class="noline-lr">:</td>
                        <td><input type="text" name="input_golongan"></td>
                    </tr>
                    <tr>
                        <td class="noborder-r nomor-center">6.</td>
                        <td colspan="5">Pengikut :</td>
                    </tr>   
            </table>
            <br>
            <!--PENGIKUT-->
            <table class="table-konten" border="1" style="text-align: center; font-size: 14px">
                    <tr style="font-weight: bolder;">
                        <td width="2%" style="text-align: center;">No</td>
                        <td width="30%">Nama</td>
                        <td width="20%">Nip</td>
                        <td width="20%">Pangkat/Gol</td>
                        <td width="30%">Jabatan</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td style="text-align: left;">MUHAMMAD DIS, SE</td>
                        <td >19650401 200604 1 003</td>
                        <td>Penata III/c</td>
                        <td>Ka. UPT Peralatan & Pengujian</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td style="text-align: left;">MUHAMMAD DIS, SE</td>
                        <td >19650401 200604 1 003</td>
                        <td>Penata III/c</td>
                        <td>Ka. UPT Peralatan & Pengujian</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td style="text-align: left;">MUHAMMAD DIS, SE</td>
                        <td >19650401 200604 1 003</td>
                        <td>Penata III/c</td>
                        <td>Ka. UPT Peralatan & Pengujian</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td style="text-align: left;">MUHAMMAD DIS, SE</td>
                        <td >19650401 200604 1 003</td>
                        <td>Penata III/c</td>
                        <td>Ka. UPT Peralatan & Pengujian</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td style="text-align: left;">MUHAMMAD DIS, SE</td>
                        <td >19650401 200604 1 003</td>
                        <td>Penata III/c</td>
                        <td>Ka. UPT Peralatan & Pengujian</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td style="text-align: left;">MUHAMMAD DIS, SE</td>
                        <td >19650401 200604 1 003</td>
                        <td>Penata III/c</td>
                        <td>Ka. UPT Peralatan & Pengujian</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td style="text-align: left;">MUHAMMAD DIS, SE</td>
                        <td >19650401 200604 1 003</td>
                        <td>Penata III/c</td>
                        <td>Ka. UPT Peralatan & Pengujian</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td style="text-align: left;">MUHAMMAD DIS, SE</td>
                        <td >19650401 200604 1 003</td>
                        <td>Penata III/c</td>
                        <td>Ka. UPT Peralatan & Pengujian</td>
                    </tr>
            </table>
            <!--PENGIKUT END-->
           <br>
            <table class="table-konten" border="1">       
                    <tr>
                        <td width="2%" class="noborder-r nomor-center">7.</td>
                        <td width="50%">Perhitungan Mengadakan Pekerjaan</td>
                        <td width="15%">Atas Beban</td>
                        <td width="1%">:</td>
                        <td width="48%"><textarea name="input_pasal_anggaran" onkeyup="textAreaAdjust(this)" rows="4" cols="150" style="resize: none;">DPA Dinas Pekerjaan Umum & Penataan Ruang Kab. Pasaman Barat Tahun Anggaran 2019</textarea></td>
                    </tr>
                    <tr>
                        <td class="noborder-r nomor-center"></td>
                        <td></td>
                        <td>Pasal Anggaran</td>
                        <td>:</td>
                        <td><input type="text" name="input_golongan"></td>
                    </tr>
                    <tr>
                        <td class="noborder-r nomor-center">8.</td>
                        <td >Perhitungan Biaya Perjalanan Dinas</td>
                        <td colspan="3"></td>
                        
                    </tr>
                    <tr>
                        <td class="noborder-r nomor-center">9.</td>
                        <td >Keterangan</td>
                        <td colspan="3"></td>
                        
                    </tr>
                </tbody>
            </table>
            <br>
            <table width="100%" border="0">
                <tr>
                    <td width="50%"></td>
                    <td style="text-align: center;">
                    Simpang Empat,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Juli 2019<br/>Kepala Dinas,<br><br><br><br><br><br>


                    <h3><u>HENNY FERNIZA,ST, MT</u></h3>Pembina IV/a<br/>Nip. 19811022 200604 2007
                </td>
                </tr>
            </table>
            
            <P style="text-align: justify !important;">Perhatian :<br/>
                <span >
                   Pejabat yang berwenang menerbitkan SPPD, pegawai yang melakukan perjalanan dinas, para pejabat yang mengesahkan tanggal 
                   tiba/kembali, serta bendahara bertanggungjawab berdasarkan peraturan-peraturan keuangan nergara apabila negara menderita 
                   rugi akibat kesalahan, kelalaian dan kealpaannya.
                </span>
           </P>
            <table class="table-konten" border="1">
                    <tr>
                        <td width="50%" class="border-l">
                            Tiba&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Padang <br/>
                            Tanggal&nbsp;: 24 juni 2019 <br><br><br><br>
                            <p style="text-align: center;">
                                <U>(...................................................)</U><br>
                                NIP. <span style="margin-right: 177px"></span>.
                            </p>
                        </td>
                        <td width="50%" class="border-l">
                            Kembali&nbsp;&nbsp;: Padang <br/>
                            Tanggal&nbsp;&nbsp;&nbsp;: 24 juni 2019 <br><br><br><br>
                            <p style="text-align: center;">
                                <U>(...................................................)</U><br>
                                NIP. <span style="margin-right: 177px"></span>.
                            </p>
                        </td>
                    </tr>
            </table>
 <!--ISI SURAT END-->         
        </div>    
    </div >
</div>

</body>
</html>
<!--script type="text/javascript">window.print();</script-->
<?php } ?>