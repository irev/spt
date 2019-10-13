<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class M_backup extends CI_Model {
	
	function __construct(){
		parent::__construct();		
	}
	
	public function tampiltabel()
    {
       return $this->db->query("show tables")->result();
    }

}	