<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class M_eselon extends CI_Model {

	function __construct(){
		parent::__construct();		
	}
	private $_table = "m_eselon";
	public $id_eselon;
	public $tingkat;
	public $eselon;
	public $rp_oh;
	public $tahun;

		/**
		 *   [eselon description]
		 *   @method      eselon
		 *   @author Meedun
		 *   @date        2019-10-17
		 *   @file        file_name()
		 *   @anotherdate 2019-10-17T12:45:48+0700
		 *   @version     [version]
		 *   @param       [type]                   $IDeselon [description]
		 *   @return      [type]                             [description]
		 */
		function eselon($IDeselon=null){
			//$ID_CLIENT = $this->session->userdata('idclient');
			$this->db->order_by("id_eselon","ASC");
			if($IDeselon != null){
				$this->db->where("id_eselon", $IDeselon);
			}
			$query=$this->db->get($this->_table);
			if($IDeselon != null){
				return $query->row();
			}else{
				return $query->result_array();
			}
		}
		function maxID(){
			$this->db->select_max('id_eselon');
			$query = $this->db->get('m_eselon');
			return $query->row("id_eselon")+1;
		}
		/**
		 *   [query_simpan description]
		 *   @method      query_simpan
		 *   @author Meedun
		 *   @date        2019-10-17
		 *   @file        file_name()
		 *   @anotherdate 2019-10-17T12:45:06+0700
		 *   @version     [version]
		 *   @return      [type]                   [description]
		 */
		function query_simpan(){
			 		$post = $this->input->post();
		        	//$this->product_id = uniqid();
					$this->id_eselon = $post["id_eselon"];
					$this->eselon    = $post["nama_eselon"];
					$this->rp_oh     = $post["uang_harian_eselon"];
					$this->tahun     = date("Y");
					////scrip dibawah apa bila nilai angka  berkoma 1,000,000
					///maka dikembalikan ke 1000000 sebelum disimpan ke database
					//$ang = str_replace('.','', $post["nominal"]);
					//$this->uang_harian = number_format($ang,2,'.','');
					
		        //$this->db->trans_start();
		        $this->db->insert($this->_table, $this);
				$result  = ($this->db->affected_rows() != 1) ? false : true;
				return $result;
				//$this->db->trans_complete();
		}
		
		/**
		 *   [query_update description]
		 *   @method      query_update
		 *   @author Meedun
		 *   @date        2019-10-17
		 *   @file        file_name()
		 *   @anotherdate 2019-10-17T12:45:20+0700
		 *   @version     [version]
		 *   @return      [type]                   [description]
		 */
		function query_update(){
			$post = $this->input->post();
			$this->id_eselon = $post["id_eselon"];
			$this->eselon    = $post["nama_eselon"];
			$this->rp_oh     = $post["uang_harian_eselon"];
			$this->tahun     = date("Y");
			//if(is_numeric($this->id_jab) || $this->id_jab != 0 && $this->nama_eselon !=""){
				//$this->db->trans_start();
		        $this->db->update($this->_table, $this, array('id_eselon' => $post['id_eselon']));
				//CEK KONDISI
				$result  = ($this->db->affected_rows() >= 1) ? false : true;
				return  $result;
				
				//$this->db->trans_complete();
			//}
			
		}
		/**
		 *   [delete description]
		 *   @method      delete
		 *   @author Meedun
		 *   @date        2019-10-17
		 *   @file        file_name()
		 *   @anotherdate 2019-10-17T12:45:32+0700
		 *   @version     [version]
		 *   @param       [type]                   $id [description]
		 *   @return      [type]                       [description]
		 */
		public function delete($id)
    	{
        return $this->db->delete($this->_table, array("id_eselon" => $id));
    	}



}