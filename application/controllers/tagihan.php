<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan extends CI_Controller {

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

		$this->load->view('theme/HEAD');
		$this->load->view('v_Dashboard');
		$this->load->view('theme/FOOTER');

	}
	public function invoice($KODE=null)
	{
		//$data['client'] = $this->m_dataload->id_client(1);
		//$data['perusahaan_client'] = $this->m_dataload->perusahaan_client(1);
		
		$this->load->view('theme/HEAD');
		$this->load->view('tagihan/v_invoice');
		$this->load->view('theme/FOOTER');

	}
}
