<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();
		$this->load->model(['m_dataload']);
		//$this->load->library(['session','Mylib_form','Mylib_themes','l_paket']);
		$this->load->database();
		//$this->load->helper(['url','tanggal','tanggal_id','terbilang']);
	}
 

	public function index()
	{
	$data['supplier'] = $this->m_dataload->data_supplier();
	$this->template->load('template','supplier/v_supplier',$data);
	}
}
