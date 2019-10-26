<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
	Private  $_tabel = "tbluser";
	public  $lastlog;
	function __construct(){  
	    parent::__construct();  
	    $this->load->database();  
	}  
	function islogin($data){
		$query=$this->db->get_where('tbluser',array('uname'=>$data['username'],'upwd'=>$data['password']));  
		$this->lastlogin($data);
    	return $query->num_rows();  
	}
	function userLoginData($data){
		$this->db->select('uname, urole, intusertype, struseremail');
		$this->db->where('uname', $data['username']);
		$query = $this->db->get('tbluser');
		return $query->row();
	}
	function lastlogin($data){
		$uname         = $data['username'];
		$this->lastlog = ['lastlog' => unix_to_human(time())];
		$this->db->update($this->_tabel, $this->lastlog, array('uname' => $uname));
	}
	

}

/* End of file m_login.php */
/* Location: ./application/models/m_login.php */