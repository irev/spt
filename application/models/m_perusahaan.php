<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class M_perusahaan extends CI_Model {
	
	function __construct(){
		parent::__construct();		
	}

	function kontrak($ID_PERUSAHAAN=null){
			$ID_CLIENT = $this->session->userdata('idclient');
			$this->db->order_by("id_kontrak","ASC");
			$this->db->where("client_id",$ID_CLIENT);
			$this->db->where("perusahaan_id",$ID_PERUSAHAAN);
			$query=$this->db->get("kontrak");
			return $query->result_array();

	}

	function kontrak_by_userID($ID_CLIENT=null){
			$ID_CLIENT = $this->session->userdata('idclient');
			$this->db->order_by("id_kontrak","ASC");
			$this->db->where("client_id",$ID_CLIENT);
			//$this->db->where("perusahaan_id",$ID_PERUSAHAAN);
			$query=$this->db->get("kontrak");
			return $query->result_array();

	}

	// AMBIL PAKET YANG DIMILIKI dengan KATA KUNCI ( CLIENT_ID, PERUSAHAAN_ID )
	function paket($ID_PERUSAHAAN=null){
			$ID_CLIENT = $this->session->userdata('idclient');
			$this->db->where("client_id",$ID_CLIENT);
			$this->db->where("perusahaan_id",$ID_PERUSAHAAN);
			$query=$this->db->get("paket");
			return $query->result_array();
	}
	function perusahaan($ID_PERUSAHAAN=null){
			$ID_CLIENT = $this->session->userdata('idclient');
			$this->db->where("client",$ID_CLIENT);
			$this->db->where("id_perusahaan",$ID_PERUSAHAAN);
			$query=$this->db->get("data_perusahaan");
			return $query->result_array();
	}








}

