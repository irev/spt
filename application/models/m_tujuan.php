<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class M_tujuan extends CI_Model {
	
	function __construct(){
		parent::__construct();		
	}
	private $_table = "m_tujuan";
	public $id_tujuan;
	public $tujuan; 
	//public $jarak; 
	public $wilayah; 
	public $perjalanan; 
	public $kec;
	public $kab;
	public $prov;
	//public $bbm;

		function tujuan($IDTUJUAN=null){
			//$ID_CLIENT = $this->session->userdata('idclient');
			$this->db->order_by("id_tujuan","ASC");
			if($IDTUJUAN != null){
				$this->db->where("id_tujuan", $IDTUJUAN);
			}
			$query=$this->db->get($this->_table);
			if($IDTUJUAN != null){
				return $query->row();
			}else{
				return $query->result_array();
			}
		}	

		function query_simpan(){
			//SET DATA
			$post = $this->input->post();
			$this->id_tujuan  = "";
			$this->tujuan     = $post["tujuan"];
			//$this->jarak    = $post["jenis"];
			$this->wilayah    = $post["wilayah"];
			$this->perjalanan = $post["perjalanan"];
			$this->kec        = 'Kec. '.$post["kec_txt"];
			$this->kab        = 'Kab. '.$post["kab_txt"];
			$this->prov       = 'Prov. '.$post["prov_txt"];
			$this->kecid      = $post["kec"];
			$this->kabid      = $post["kab"];
			$this->provid     = $post["prov"];
			//$this->tahun      = $post["tahun"];

			//EXE
		        $this->db->insert($this->_table, $this);
				$result  = ($this->db->affected_rows() != 1) ? false : true;
				return $result;
		}



/*		
		function query_update(){
			//SET DATA
			$post = $this->input->post();
			$this->id_tran = $post["id"];
			$this->nama    = $post["nama"];
			$this->nomor   = $post["nomor"];
			$this->jenis   = $post["jenis"];
			$this->roda    = $post["roda"];
			$this->cc      = $post["cc"];
			$this->wil1    = $post["wil1"];
			$this->wil2    = $post["wil2"];
			$this->wil3    = $post["wil3"];
			//EXE
		        $this->db->update($this->_table, $this, array('id_tran' => $post['id']));
				//CEK KONDISI
				$result  = ($this->db->affected_rows() >= 1) ? false : true;
				return  $result;
		}
*/
		public function delete($id)
    	{
        return $this->db->delete($this->_table, array("id_tran" => $id));
    	}



}