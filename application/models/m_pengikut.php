<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class M_pengikut extends CI_Model {
	
	function __construct(){
		parent::__construct();
		$this->load->database();		
	}

	private $_table = "m_pengikut";
    public $id_peg;  
    public $lastID;
    //public $nama_jabatan;
    function lastID($tabel=null){
    	if($tabel==null){
    		$this->db->order_by('id_peng', 'desc')->limit(1);
    		return $this->db->get($_table)->row();
    	}
    }

	function pengikut($ID_PEGAWAI=null){
			//$ID_CLIENT = $this->session->userdata('idclient');
			$this->db->order_by("id_peg","ASC");
			if($ID_PEGAWAI!=null){
				$this->db->where("id_peg",$ID_PEGAWAI);
			}
			$query=$this->db->get($this->_tablepegawai);
			if($ID_PEGAWAI!=null){
				return $query->row();
			}else{
				return $query->result_array();
			}
	}

	public function getpegawaiById($id)
    {
        return $this->db->get_where($this->_table_pegawai, ["id_peg" => $id])->row();
    }

		function golongan($ID_GOLONGAN = null){
			//$ID_CLIENT = $this->session->userdata('idclient');
			$this->db->order_by("id_gol","ASC");
			if($ID_GOLONGAN != null){
				$this->db->where("id_gol", $ID_GOLONGAN);
			}
			$query=$this->db->get("m_golongan");
			if($ID_GOLONGAN != null){
				return $query->row();
			}else{
				return $query->result_array();
			}
		}
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

		function query_simpanpegawai(){
					$post 		    = $this->input->post();
					$this->nama     = $post["nama"];
					$this->nip      = $post["nip"];
					$this->jabatan  = $post["jabatan"];
					$this->golongan = $post["golongan"];
					$this->tahun    = $post["tahun"];
				//$this->db->trans_start();
				$this->db->insert($this->_tablepegawai, $this);
				$result  = ($this->db->affected_rows() != 1) ? false : true;
				return $result;
				//$this->db->trans_complete();
				//echo $this->db->last_query();
				
		}

		function query_updatepegawai(){
					$post 		    = $this->input->post();
					$this->id_peg   = $post["id_peg"];
					$this->nama     = $post["nama"];
					$this->nip      = $post["nip"];
					$this->jabatan  = $post["jabatan"];
					$this->golongan = $post["golongan"];
					$this->tahun    = $post["tahun"];
		        $this->db->update($this->_tablepegawai, $this, array('id_peg' => $post['id_peg']));
				//CEK KONDISI
				$result  = ($this->db->affected_rows() >= 1) ? true : false;
				return  $result;
		}
		public function delete_pegawai($id)
    	{
        return $this->db->delete($this->_tablepegawai, array("id_peg" => $id));
    	}

}

	










