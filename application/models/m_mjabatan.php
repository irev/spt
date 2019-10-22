<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * This class describes a m mjabatan.
 */

class M_mjabatan extends CI_Model {
	
	function __construct(){
		parent::__construct();		
	}
	private $_table = "m_jabatan";
    public $id_jab;
    public $nama_jabatan;

		function jabatan($ID_JABATAN = null){
			//$ID_CLIENT = $this->session->userdata('idclient');
			$this->db->order_by("id_jab","ASC");
			if($ID_JABATAN != null){
				$this->db->where("id_jab", $ID_JABATAN);
			}
			$query=$this->db->get("m_jabatan");
			if($ID_JABATAN != null){
				return $query->row();
			}else{
				return $query->result_array();
			}
		}		
		function maxID(){
            $this->db->select_max('id_jab');
            $query = $this->db->get($this->_table);
            return $query->row("id_jab")+1;
        }
		/**
		 * Queries a simpan.
		 *
		 * @return     <type>  ( description_of_the_return_value )
		 */
		function query_simpan(){
			 		$post = $this->input->post();
		        	//$this->product_id = uniqid();
					$this->id_jab       = $post["id_jabatan"];
					$this->nama_jabatan = $post["nama_jabatan"];
					//$this->uang_harian  = $post["nominal"];
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
		 * Queries an update.
		 *
		 * @return     <type>  ( description_of_the_return_value )
		 */
		function query_update(){
			$post = $this->input->post();
			$this->id_jab       = $post["id_jabatan"];
			$this->nama_jabatan = $post["nama_jabatan"];
			//$this->uang_harian  = $post["nominal"];
			//if(is_numeric($this->id_jab) || $this->id_jab != 0 && $this->nama_jabatan !=""){
				//$this->db->trans_start();
		        $this->db->update($this->_table, $this, array('id_jab' => $post['id_jabatan']));
				//CEK KONDISI
				$result  = ($this->db->affected_rows() >= 1) ? false : true;
				return  $result;
				
				//$this->db->trans_complete();
			//}
			
		}

		/**
		 * Deletes the given identifier.
		 *
		 * @param      <type>  $id     The identifier
		 *
		 * @return     <type>  ( description_of_the_return_value )
		 */
		public function delete($id)
    	{
        return $this->db->delete($this->_table, array("id_jab" => $id));
    	}

}

	










