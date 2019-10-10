<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// PERSINGKAT TAMPILAN TEX UNTUK READMORE
if (!function_exists('TextSingkat')) {
	function TextSingkat($string, $mulai = 0, $sampai=50, $link="#"){
		//$text  = substr($string, $mulai, $sampai);
		//$endPoint = strrpos($text, '...');
		//return $text.'...';

		$string = strip_tags($string,'<a><b><i>');
		if (strlen($string) > $sampai) {

		    // truncate string
		    $stringCut = substr($string, 0, $sampai);
		    $endPoint = strrpos($stringCut, ' ');

		    //if the string doesn't contain any space then it will cut without word basis.
		    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
		    if($link != '#' ){
		    $string .= '... <a href="'.base_url($link).'"> SELANJUTNYA>></a>';
			}
		}
		return $string;



	}
}
