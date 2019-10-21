<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class M_kegiatan extends CI_Model {
	
	function __construct(){
		parent::__construct();		
	}
	private $_table = "m_kegiatan";
	public $id_kegiatan;
	public $rekening;
	public $kegiatan;
	public $pptk;
	public $bendahara;
	public $kpa;
	public $pagu;
	public $dinas;
	public $tahun;


		function kegiatan($ID_kegiatan=null){
			//$ID_CLIENT = $this->session->userdata('idclient');
			$this->db->order_by("id_kegiatan","ASC");
			if($ID_kegiatan != null){
				$this->db->where("id_kegiatan", $ID_kegiatan);
			}
			$query=$this->db->get($this->_table);
			if($ID_kegiatan != null){
				return $query->row();
			}else{
				return $query->result_array();
			}
		}	

		function query_simpan(){
			//SET DATA
			$post = $this->input->post();
			$this->id_kegiatan = "";
			$this->kegiatan    = $post["nama"];
			$this->rekening    = $post["nomor"];
			$this->pagu        = $post["pagu"];
			$this->pptk        = $post["pptk"];
			$this->kpa         = $post["kpa"];
			$this->bendahara   = $post["bendahara"];
			$this->tahun       = $post["tahun"];
			$this->dinas       = $post["dinas"];
			//EXE
		        $this->db->insert($this->_table, $this);
				$result  = ($this->db->affected_rows() != 1) ? false : true;
				return $result;
		}
		
		function query_update(){
			//SET DATA
			$post = $this->input->post();
			$this->id_kegiatan = $post["id"];
			$this->kegiatan    = $post["nama"];
			$this->rekening    = $post["nomor"];
			$this->pagu        = $post["pagu"];
			$this->pptk        = $post["pptk"];
			$this->kpa         = $post["kpa"];
			$this->bendahara   = $post["bendahara"];
			$this->tahun       = $post["tahun"];
			$this->dinas        = $post["dinas"];
			//EXE
		        $this->db->update($this->_table, $this, array('id_kegiatan' => $post['id']));
				//CEK KONDISI
				$result  = ($this->db->affected_rows() >= 1) ? false : true;
				return  $result;
		}

		public function delete($id)
    	{
        return $this->db->delete($this->_table, array("id_kegiatan" => $id));
    	}



}