<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class M_transport extends CI_Model {
	
	function __construct(){
		parent::__construct();		
	}
	private $_table = "m_trasportsasi";
	public $id_tran;
	public $nama; 
	public $nomor;
	public $jenis; 
	public $roda; 
	public $cc; 
	/**
	public $wil1; 
	public $wil2; 
	public $wil3;
	public $wil4;
	*/
	public $bahan_bakar;
	public $liter1;
	public $liter2;
	public $liter3;
	public $bbm_luar;
		function trasnsportasi($ID_KENDARAAN=null){
			//$ID_CLIENT = $this->session->userdata('idclient');
			$this->db->order_by("id_tran","ASC");
			if($ID_KENDARAAN != null){
				$this->db->where("id_tran", $ID_KENDARAAN);
			}
			$query=$this->db->get($this->_table);
			if($ID_KENDARAAN != null){
				return $query->row();
			}else{
				return $query->result_array();
			}
		}	

		function query_simpan(){
			//SET DATA
			$post = $this->input->post();
			$this->nama        = $post["nama"];
			$this->nomor       = $post["nomor"];
			$this->jenis       = $post["jenis"];
			$this->roda        = $post["roda"];
			$this->cc          = $post["cc"];
			/**
			$this->wil1        = $post["wil1"];
			$this->wil2        = $post["wil2"];
			$this->wil3        = $post["wil3"];
			$this->wil4        = $post["wil4"];
			*/
			$this->bahan_bakar = $post["bahan_bakar"];
			$this->liter1      = $post["addbbmwil1"];
			$this->liter2      = $post["addbbmwil2"];
			$this->liter3      = $post["addbbmwil3"];
			$this->bbm_luar    = $post["addbbmwil4"];


			//EXE
		        $this->db->insert($this->_table, $this);
				$result  = ($this->db->affected_rows() != 1) ? false : true;
				return $result;
		}
		
		function query_update(){
			//SET DATA
			$post = $this->input->post();
			$this->id_tran     = $post["id"];
			$this->nama        = $post["nama"];
			$this->nomor       = $post["nomor"];
			$this->jenis       = $post["jenis"];
			$this->roda        = $post["roda"];
			$this->cc          = $post["cc"];
			/**
			$this->wil1        = $post["wil1"];
			$this->wil2        = $post["wil2"];
			$this->wil3        = $post["wil3"];
			$this->wil4        = $post["wil4"];
			*/
			$this->bahan_bakar = $post["bahan_bakar"];
			$this->liter1      = $post["liter1"];
			$this->liter2      = $post["liter2"];
			$this->liter3      = $post["liter3"];
			$this->bbm_luar    = $post["bbm_luar"];
			$this->tahun       = date("Y");







			//EXE
		        $this->db->update($this->_table, $this, array('id_tran' => $post['id']));
				//CEK KONDISI
				$result  = ($this->db->affected_rows() >= 1) ? false : true;
				return  $result;
		}

		public function delete($id)
    	{
        return $this->db->delete($this->_table, array("id_tran" => $id));
    	}



}