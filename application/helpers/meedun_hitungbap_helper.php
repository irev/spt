<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function bulat($num){
     return  round($num) ; 
  }
// PERHITUNAGAN PAJAK
/*
PERHITUNGAN PAJAK PPN
Wajib pajak PPh Pasal 21 adalah orang yang dikenai pajak atas penghasilannya atau penerima penghasilan yang dipotong PPh21 berdasarkan Perdirjen PER-32/PJ/2015 Pasal 3 wajib pajak PPh 21.
*/ 
if (!function_exists('MEEDUN_HITUNG_PPN')) {

	function MEEDUN_HITUNG_PPN($nilai=0, $jenisPekerjaan=0, $klasPerusahaan=0){
    		return  bulat($nilai/11);
	}
}

/*
HITUNG PPH
 */
if (!function_exists('MEEDUN_HITUNG_PPH')) {

	function MEEDUN_HITUNG_PPH($nilai=0, $jenisPekerjaan=0, $klasPerusahaan=0){
		//NILAIFISIK = NILAISPP - PPN
     $NILAI_PPN = MEEDUN_HITUNG_PPN($nilai, $jenisPekerjaan, $klasPerusahaan);
     $NILAI_FISIK = $nilai - $NILAI_PPN;
     $num =  0;
     $persen_pph =  0;
    	if($jenisPekerjaan === 1){ // ####### Jenis Pekerjaan FISIK #######

              if($klasPerusahaan === 1){
                //Perusahan kecil
                $persen_pph = 0.02;
              }else if($klasPerusahaan === 2 ){
                //Perusahan Menengah
                $persen_pph = 0.03;
              }else if( $klasPerusahaan === 3 ){
                //Perusahan besar
                $persen_pph = 0.03;
              }

      }else if($jenisPekerjaan === 2 ){
      // ####### Jenis PEKERJAAN PENGADAAN BARANG ########
          $persen_pph = 0.15;
      }else if($jenisPekerjaan === 3 ){
      // ####### Jenis PEKERJAAN PERENCANAAN PENGAWASAN #######
              if($klasPerusahaan === 1){
                //Perusahan kecil
                $persen_pph = 0.04;
              }else if($klasPerusahaan === 2 ){
                //Perusahan Menengah
                $persen_pph = 0.06;
              }else if( $klasPerusahaan === 3 ){
                //Perusahan besar
                $persen_pph = 0.06;
              }
      }else if($jenisPekerjaan === 4 ){
       // ####### Jenis PEKERJAAN HIBAH #######
          $persen_pph =0;
      }else{
          $persen_pph =0;
      }

    $num =   $NILAI_FISIK * $persen_pph;
    return bulat($num);
	}
}

if (!function_exists('RETENSI')) {
	/*
	# RETENSI = 5% * NILAI FISIK
		#progres 100% atau 5% 
			- RETENSI = 5% * NILAI KONTRAK
		#prgress 95 pada realisasi pertama
			- RETENSI = 5% * NILAI KONTRAK
		#prgress 95 pada bukan pertama
			- RETENSI = 5% * NILAI KONTRAK
	 */ 
		function RETENSI($PROGRES, $KONTRAK, $ARG){
			$NILAI_FISIK      = ($PROGRES * $KONTRAK)/100 ;
			if($PROGRES == 100 || $PROGRES == 5 && $ARG == 2){
				$RETENSI = 0; 
			}else if($PROGRES == 100 || $PROGRES == 5 && $ARG != 1 ){
				$RETENSI = $KONTRAK * 0.05; //NILAI_KONTRAK
			}else if($PROGRES == 95.00 && $ARG == 1 ){
				$RETENSI = $KONTRAK * 0.05; //NILAI_KONTRAK
			}else if($PROGRES == 95 && $ARG != 1 ){
				$RETENSI = $KONTRAK * 0.05; //NILAI_KONTRAK
			}else{
				$RETENSI = $NILAI_FISIK * 0.05; //NILAI_FISIK
			}
			return $RETENSI;

		}
}
if (!function_exists('MEEDUN_HITUNG_BAP')) {

	function MEEDUN_HITUNG_BAP($progres=0, $kontrak=0, $klasPerusahaan=0 , $jenisPekerjaan=1, $nilaiBapLalu=1220, $DATA = array(), $PL=0){
		// CARI NILAI FISIK
		$NILAI_FISIK      = ($progres * $kontrak)/100 ;
		if($nilaiBapLalu == 0){
			//kondisi perhitungan  retensi
			$ARG = 0;
		}elseif($PL == 1){
			$ARG = 2;
		}else{
			$ARG = 1;
		}	
		$UANGMUKA_KEMBALI = 0; //sementara di nol kan dulu
		$RETENSI = RETENSI($progres, $kontrak, $ARG);
		$REALISASI_JUMLAH_POTONGAN = $nilaiBapLalu + $UANGMUKA_KEMBALI + $RETENSI;
		$SISA = (($NILAI_FISIK + $nilaiBapLalu) == $kontrak) ? 0 : $kontrak - $NILAI_FISIK - $nilaiBapLalu ;
 
    		$data =[
    			'arg_pl'=> $ARG,
    			'JUDUL' => $DATA['JUDUL'],
    			'progres'=> $progres,
    			'jenisPekerjaan'=> $jenisPekerjaan,
    			'kontrak'=> $kontrak,
    			'klasPerusahaan'=> $klasPerusahaan,
    			'REALISASI_NILAI_KONTRAK' => $kontrak,
    			'NILAI_FISIK'=> $NILAI_FISIK,
    			'REALISASI_BAP_INI'=> $NILAI_FISIK,
    			'REALISASI_BAP_BRUTO'=> $kontrak, //$NILAI_FISIK + $nilaiBapLalu, //NILAI_PEKERJAAN_MC_INI
    			'REALISASI_UMK' => $UANGMUKA_KEMBALI,
    			'REALISASI_RETENSI'=> $RETENSI, //0.05 * $kontrak, //RETENSI = 5% * NILAI_KONTRAK
    			'REALISASI_JUMLAH_POTONGAN' => $REALISASI_JUMLAH_POTONGAN ,
    			'REALISASI_PEMBAYARAN_BAP_INI'=> $kontrak - $REALISASI_JUMLAH_POTONGAN,
    			'REALISASI_PPH' => MEEDUN_HITUNG_PPH($NILAI_FISIK, $jenisPekerjaan, 1), // nilai, Jenis pekerjaan, kelas perusahaan
    			'REALISASI_PPN' => MEEDUN_HITUNG_PPN($NILAI_FISIK, $jenisPekerjaan, 1),
    			'REALISASI_RINCIAN_PAJAK' => MEEDUN_HITUNG_PPH($NILAI_FISIK, $jenisPekerjaan, 1) +  MEEDUN_HITUNG_PPN($NILAI_FISIK, $jenisPekerjaan, 1),
    			'PL' => $PL,
    			'REALISASI_BAP_LALU' => $nilaiBapLalu,
    			'REALISASI_SISA_DANA' =>  $SISA,
    			//'HASIL_YG HARUS DIDAPAT ' => '142.224.500' 

    		];
    		return $data;
	}
}