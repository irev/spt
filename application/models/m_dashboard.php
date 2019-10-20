<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *   Class modal dashboard 
 *   berisikan data perhitungan total record data yan sidah di input
 *   @author Meedun 
 *   2019-10-19T02:37:35+0700
 *   Project SPT/SPPD DPUPR PASAMAN BARAT 2019 
 */
class M_dashboard extends CI_Model {
	
	function __construct(){
		parent::__construct();		
	}
	public $tb_pegawai = "m_pegawai";
		/**
		 *   [count_spd_dalam hitung perjalanan dalam daerah]
		 *   @method      count_spd_dalam
		 *   @author Meedun
		 *   @date        2019-10-19
		 *   @file        file_name()
		 *   @anotherdate 2019-10-19T02:37:35+0700
		 *   @version     [version 1.0]
		 *   @return      [int]     tampilkan total perjalan dalam daeah
		 */
		function count_spd_dalam(){
			$this->db->where("perjalanan","dalam");
			$this->db->from("spt_data");
			 return $this->db-> count_all_results();
		}
		/**
		 *   [count_spd_luar hitung perjalanan dalam luar]
		 *   @method      count_spd_luar
		 *   @author Meedun
		 *   @date        2019-10-19
		 *   @file        file_name()
		 *   @anotherdate 2019-10-19T02:37:26+0700
		 *   @version     [version 1.0]
		 *   @return      [int]   tampilkan total perjalan dalam daeah
		 */
		function count_spd_luar(){
			$this->db->where("perjalanan","luar");
			$this->db->from("spt_data");
			 return $this->db-> count_all_results();
		}	

	


}