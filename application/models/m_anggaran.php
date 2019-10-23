<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class M_anggaran extends CI_Model {
	
	function __construct(){
		parent::__construct();		
	}
	private $_table = "m_anggaran";
	public $id_anggaran;
	public $ket;
	public $kode;
	public $tgl_ang;
	public $kuasa;
	public $tahun;


		function anggaran($ID=null, $key=null){
			//$ID_CLIENT = $this->session->userdata('idclient');
	        $this->db->order_by("id_anggaran", "ASC");
	        if (!is_null($ID) ) {
	            $this->db->where("id_anggaran", $ID);
	        }
	        $query = $this->db->get("m_anggaran");
	        if(is_null($ID) && is_null($key)){
	            return $query->result_array();
	        }
	        if(!is_null($ID) && is_null($key)){
	            return $query->row();
	        }
	        if(!is_null($ID) && !is_null($key)) {
	            return $query->row($key);
	        }
	        //echo $this->db->last_query();
		}	

  		function maxID(){
            $this->db->select_max('id_anggaran');
            $query = $this->db->get('m_anggaran');
            return $query->row("id_anggaran")+1;
        }
		function query_simpan(){
			//SET DATA
			$post = $this->input->post();
			$this->id_anggaran = $this->maxID();
			$this->ket    	   = $post["dinas"];
			$this->kuasa       = $post["kuasa"];
			$this->kode        = $post["kode"];
			$this->tgl_ang     = $post["tgl_ang"];
			$this->tahun       = $post["tahun"];
			//EXE
		        $this->db->insert($this->_table, $this);
				$result  = ($this->db->affected_rows() != 1) ? false : true;
				return $result;
		}
		
		function query_update(){
			//SET DATA
			$post = $this->input->post();
			$this->id_anggaran = $post["id_anggaran"];
			$this->ket    	   = $post["dinas"];
			$this->kuasa       = $post["kuasa"];
			$this->kode        = $post["kode"];
			$this->tgl_ang     = $post["tgl_ang"];
			$this->tahun       = $post["tahun"];
			//EXE
		        $this->db->update($this->_table, $this, array('id_anggaran' => $post['id_anggaran']));
				//CEK KONDISI
				$result  = ($this->db->affected_rows() >= 1) ? false : true;
				return  $result;
		}

		public function delete($id)
    	{
         	if(!$this->db->delete($this->_table, array("id_anggaran" => $id))){
         		 return $this->db->error();
         	}else{
         		 return true;
         	}
    	}
}