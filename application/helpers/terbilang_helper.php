<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   if( ! function_exists('angka_terbilang')){

			function angka_terbilang($number,$bulat=1, $awal= " ", $akhir= " ")
			{
				$before_comma = trim(to_word($number));
				$after_comma = trim(comma($number));
				if($bulat == 1 || $bulat=="" || $bulat==null){
					return ucwords($results = $awal.' '.$before_comma.' '.$akhir);

				}else{
					return ucwords($results = $awal.' '.$before_comma.' koma '.$after_comma.' '.$akhir);
				}
			}

			function to_word($number)
			{
				$words = "";
				$arr_number = array(
				"",
				"satu",
				"dua",
				"tiga",
				"empat",
				"lima",
				"enam",
				"tujuh",
				"delapan",
				"sembilan",
				"sepuluh",
				"sebelas");

				if($number<12)
				{
					$words = " ".$arr_number[$number];
				}
				else if($number<20)
				{
					$words = to_word($number-10)." belas";
				}
				else if($number<100)
				{
					$words = to_word($number/10)." puluh ".to_word($number%10);
				}
				else if($number<200)
				{
					$words = "seratus ".to_word($number-100);
				}
				else if($number<1000)
				{
					$words = to_word($number/100)." ratus ".to_word($number%100);
				}
				else if($number<2000)
				{
					$words = "seribu ".to_word($number-1000);
				}
				else if($number<1000000)
				{
					$words = to_word($number/1000)." ribu ".to_word($number%1000);
				}
				else if($number<1000000000)
				{
					$words = to_word($number/1000000)." juta ".to_word($number%1000000);
				}
				else if($number<1000000000000)
				{
					$words = to_word($number/1000000000)." Milyar ".to_word(fmod($number,1000000000));
				}else if($number<1000000000000000)
				{
					$words = to_word($number/1000000000000)." trilyun ".to_word(fmod($number,1000000000000));
				}
				else
				{
					$words = "undefined";
				}
				return $words;
			}

			function comma($number)
			{
				$after_comma = stristr($number,'.');
				$arr_number = array(
				"nol",
				"satu",
				"dua",
				"tiga",
				"empat",
				"lima",
				"enam",
				"tujuh",
				"delapan",
				"sembilan");

				$results = "";
				$length = strlen($after_comma);
				$i = 1;
				while($i<$length)
				{
					$get = substr($after_comma,$i,1);
					$results .= " ".$arr_number[$get];
					$i++;
				}
				return $results;
			}

			function rupiah($number){
	
				$hasil_rupiah = "Rp " . number_format($number,'2',',','.');
				return $hasil_rupiah;
			}

			function angka($number){
				$hasil_angaka = number_format($number,'0','','.');
				return $hasil_angaka;
			}


	}

//}//end_CLASS