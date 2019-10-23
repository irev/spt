<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if (!function_exists('lengkapiData')) {
	 function lengkapiData($id){
		return "<a style='color:red;' href='".base_url('master/pegawai/edit/'.$id)."'>Data belum lengkap</a>";
	}
}