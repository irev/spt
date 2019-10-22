            <?php 
                $no=1; 
                $Total=0;
                $or =0; //pengikut
                $org =0; 
                foreach ($spt_pengikut as $pengikut) { 
                        $nm_diperintah = $pengikut["nm_diperintah"];
                        $nip_diperintah = $pengikut["nip_diperintah"];
                        $pangkat_diperintah = $pengikut["pangkat_diperintah"];
                        $golongan_diperintah = $pengikut["golongan_diperintah"];
                        
                        $maksud = $pengikut["maksud"];          
                        $tujuan = $pengikut["tujuan"];          
                        $kec    = $pengikut["kec"];
                        $tahun  = $pengikut["tahun"];              
                        $tgl_berangkat  = $pengikut["tgl_berangkat"];           
                        $no_sppd    = $pengikut["no_sppd"];             
                        $tgl_sppd   = $pengikut["ttd_sppd_tgl"];  

                        ///ANGARAN KEGIATAN 
                        $REKENING = $pengikut["rekening"];
                        $KEGIATAN =$pengikut["kegiatan"];
                        $KPA            = $pengikut["kpa"];
                        $jabKPA         = $pengikut["jabkpa"];
                        $nipKPA         = $pengikut["nipkpa"];
                        $PPTK           = $pengikut["pptk"];
                        $jabPPTK        = $pengikut["jabpptk"];
                        $nipPPTK        = $pengikut["nippptk"];
                        $BENDAHARA      = $pengikut["bendahara"];
                        $jabBENDAHARA   = $pengikut["jabbendahara"];
                        $nipBENDAHARA   = $pengikut["nipbendahara"];
                        $anggaran       = $pengikut["anggaran"];

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
                        $bayar = $pengikut['bayar'];
                        if($bayar=="yes"){
                             $or=1;
                        }else{
                             $or=0;
                        }
                        $org += $or;
                        $subtotal = (intval($uang_harian) * intval($hari_perjalanan)); //SUBTOTAL
                        $Total += $subtotal; //SUM TOTAL       
                }
                $cs = ($org > 1 ) ? ", Cs ":" "; /// penambahan kalimat CS di belakang nama jika memiliki pengikut 
            ?>  


<style type="text/css">
/* PRINT VIEW SETTING */    
     @media print {
        html, body {
           /*
            width: 210mm;
            height: 297mm; 
            */ 
             width:330mm;      /* f4 landscape */
             height:190mm;   /* f4 landscape */
             size: legal landscape !important;
             background: none;

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
        .blue{
            color: #000 !important;
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
            .ttd{
                padding: 40px;
            }
            tr.ttd-tr{
                text-align: center !important;
            }

            .no-print, .no-print *
            {
                display: none !important;
            }
             
    }

/* PAGE */
    .blue{
        color: #79798e;
    }
    table {
        width: 100%;
        border-collapse: collapse;

    }
    td{
        vertical-align:top;
    }
    .ttd{
        padding: 40px;
            }
    tr.ttd-tr{
        text-align: center !important;
    }
    .btn-cetak{
        float: right;
        margin-right: 48px;
        border-radius: 5px;
        padding: 5px 23px;
        color: crimson;
        font-weight: bolder;
        background: #dddddddb;
    }
    .btn-cetak:hover{
        float: right;
        margin-right: 48px;
        border-radius: 5px;
        padding: 5px 23px;
        color: #000000;
        background: #eee;
        font-weight: bolder;
    }


</style>
<script type="text/javascript">
function close_window() {
  if (confirm("Close Window?")) {
    close();
  }
}
function openWindow( url ){
  window.open("#", "_blank", "fullscreen=1, toolbar=yes,scrollbars=yes,resizable=yes top=5,left=5,width=1300,height=700");
}
</script>
<div class="row" style="width: 100%;">
    <div class="no-print" style="float: right;
                padding: 3px;
                background: #f11606e6;
                position: fixed;
                width: inherit;
                margin-top: -9px;
                margin-left: -9px;" >
<?php if($org != 0 ): ?>            
    <button class="btn-cetak no-print" onclick="print()">CETAK</button>
<?php endif?>
    <button class="btn-cetak no-print" onclick="close_window()">TUTUP</button>
    

    </div>
</div>

<div class="row">
    <div style="padding-top: 57px;"  class="no-print"></div>
    <table border="0">
        <tr>
            <th width="5%" style="text-align:left;">No. : KWT/
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/GU-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/DPUPR/2018 </th>
            <th width="5%" style="text-align:right;">No. SPJ :
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/SPJ-GU&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/DPUPR/2018</th>
        </tr>
        <tr>
            <td></td>
            <td style="text-align:right;">Kode Rekening :  M.A. 1.03 . 1.03.01. <?= $REKENING ?> . 01</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center; font-weight: bolder; font-size: 21pt; "><u>K W I T A N S I</u></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: justify;">

                <P>
                 <span class="blue">Sudah terima dari</span> <?= $this->m_anggaran->anggaran($anggaran,"kuasa") ?>  <?= $this->m_anggaran->anggaran($anggaran,"ket") ?>  <span class="blue">uang Sejumlah Rp.</span> <?= angka($Total) ?>,- (<?= angka_terbilang($Total) ?>)  <span class="blue">sebab dari pembayaran lunas pada</span> <?= $nm_diperintah ?><?= $cs ?>  <span class="blue">Biaya Perjalanan Dinas Dalam Rangka</span> <?= $maksud ?> <span class="blue"> <?= $tujuan ?> <?= $kec ?></span> <span class="blue">tanggal</span> <?= LONGE_DATE_INDONESIA($tgl_berangkat) ?> <span class="blue">pada Kegiatan</span> <?= $KEGIATAN ?> <span class="blue">berdasarkan SPPD Nomor :</span> <?= $no_sppd ?>  <span class="blue">tanggal</span> <?= LONGE_DATE_INDONESIA($tgl_sppd) ?>  <span class="blue">dengan perincian sebagai berikut :</span>
                 </P>
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
        <tr style="text-align: center;">
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6=(4x5)</td>
            <td>7</td>
        </tr>
        <tbody>
            <?php if($org == 0 ): ?>
                <tr>
                    <td colspan="7" style="color: red; font-size: 25pt;"><center>==== DAFTAR PERGAWAI YANG DIBAYARKAN TIDAK ADA===</center></td>
                </tr>
            <?php endif ?>
            <?php 
                $no=1; 
                $Total=0;
                //print_r($spt_pengikut);
                foreach ($spt_pengikut as $pengikut) { 
                    if($pengikut["bayar"]==="yes"){
                        $vnama = $pengikut["nama_pengikut"];
                        $vnip = ($pengikut["nip_pengikut"]=="") ? $pengikut["pangkat"] : $pengikut["nip_pengikut"] ;
                        $vgol = ($pengikut["pangkat"]==$pengikut["eselon"]) ? $pengikut["pangkat"] : $pengikut["grup"];
                        $vesel = ($pengikut["struktural"]=="no") ? '- <b>/</b>' : $pengikut["eselon"].' <b>/</b> ';

                ?>
                
            <tr>
                <td style="text-align: center;"><?= $no ?>.</td>
                <td><?= $vnama ?><br/><?= $vnip ?></td>
                <td style="text-align: center;"><?=  $vesel.' '.$vgol ?></td>
                <td style="text-align: center;"><?php

                        //echo $pengikut["wilayah"]; 
                         $hari_perjalanan = JUMLAHHARI($pengikut["tgl_berangkat"], $pengikut["tgl_kembali"]);
                         echo $hari_perjalanan;

                ?></td>
                <td style="text-align: right;">
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
                        echo angka($uang_harian);
                    ?>
                        
                </td>
                <td style="text-align: right;"><?= angka($subtotal = (intval($uang_harian) * intval($hari_perjalanan))) ?></td>
                <td><?= $no ?>. <button class="btn btn-xs btn-success no-print">YA</button></td>
                 <!--td></td-->
            </tr>
            <?php 
                $no++; 
                $Total += $subtotal;
              }  
            } ?>
            <tfoot>
                <tr>
                    <th style="text-align: right;" colspan="5">J U M L A H</th>
                    <th style="text-align: right;"><?= angka($Total) ?></th>
                    <th></th>

                    <!--td></td-->
                </tr>
            </tfoot>
        </tbody>
    </table>

    <table border="0">
        <tr>
            <td width="50%"></td>
            <td colspan="2" style="text-align: center;"><br>Simpang Empat,  ……………………….  <?= $tahun ?></td>
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

