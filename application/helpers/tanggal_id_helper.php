<?php
function validateDate($date, $format = 'Y-m-d H:i:s')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

// CARI Selisih JUMLAH HARI 
function JUMLAHHARI($date_1 , $date_2 , $differenceFormat = '%a' )
{
	if (validateDate($date_1, 'Y-m-d')== true && validateDate($date_2, 'Y-m-d') == true ){
	    $datetime1 = date_create($date_1);
	    $datetime2 = date_create($date_2);
	    
	    $interval = date_diff($datetime1, $datetime2);
	    $selisih  = $interval->format($differenceFormat);
	    $string_hari = (int)$selisih+1;
	    return $string_hari. " ";
	}else{
		return " 0 ";
	}
}



// CARI JUMLAH HARI KONTAK
function JUMLAHHARI_text($date_1 , $date_2 , $differenceFormat = '%a' )
{
	if (validateDate($date_1, 'Y-m-d')== true && validateDate($date_2, 'Y-m-d') == true ){
	    $datetime1 = date_create($date_1);
	    $datetime2 = date_create($date_2);
	    
	    $interval = date_diff($datetime1, $datetime2);
	    $selisih  = $interval->format($differenceFormat);
	    $string_hari = (int)$selisih+1;
	    return kekata($string_hari);
	}else{
		return "Nol";
	}
}

function kekata($x) {
    $x = abs($x);
    $angka = array("", "satu", "dua", "tiga", "empat", "lima",
    "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($x <12) {
        $temp = " ". $angka[$x];
    } else if ($x <20) {
        $temp = kekata($x - 10). " belas";
    } else if ($x <100) {
        $temp = kekata($x/10)." puluh". kekata($x % 10);
    } else if ($x <200) {
        $temp = " seratus" . kekata($x - 100);
    } else if ($x <1000) {
        $temp = kekata($x/100) . " ratus" . kekata($x % 100);
    } else if ($x <2000) {
        $temp = " seribu" . kekata($x - 1000);
    } else if ($x <1000000) {
        $temp = kekata($x/1000) . " ribu" . kekata($x % 1000);
    } else if ($x <1000000000) {
        $temp = kekata($x/1000000) . " juta" . kekata($x % 1000000);
    } else if ($x <1000000000000) {
        $temp = kekata($x/1000000000) . " milyar" . kekata(fmod($x,1000000000));
    } else if ($x <1000000000000000) {
        $temp = kekata($x/1000000000000) . " trilyun" . kekata(fmod($x,1000000000000));
    }
        return $temp;
}

//FORMAT TANGGAL
function FORMAT_TANGGAL($tanggal){
		$date=date_create($tanggal);
		return date_format($date,"d M Y");
}
//FORMAT TANGGAL
function LONGE_DATE_INDONESIA($tanggal){
	if (validateDate($tanggal,'Y-m-d') == TRUE){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return  (int)$pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}else{
		return validateDate($tanggal,'Y-m-d');
	}
	//$date=date_create($tanggal);
	//return date_format($date,"d M Y");
	}


