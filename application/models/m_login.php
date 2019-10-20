<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
	function __construct(){  
	    parent::__construct();  
	    $this->load->database();  
	}  

	function islogin($data){
		$query=$this->db->get_where('tbluser',array('uname'=>$data['username'],'upwd'=>$data['password']));  
    	return $query->num_rows();  
	}

	

}

/* End of file m_login.php */
/* Location: ./application/models/m_login.php */