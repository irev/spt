<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok extends CI_Controller {

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

	public function index()
	{

		$this->template->load('template','stok/data_stok');

/*
		$this->load->view('theme/HEAD');
		$this->load->view('stok/data_stok');
		$this->load->view('theme/FOOTER');
		$this->load->view('theme/data_stok_js');
*/
	}
	public function data()
	{
		$this->load->view('theme/HEAD');
		$this->load->view('v_Dashboard');
		$this->load->view('theme/FOOTER');

	}
	public function add()
	{
		$this->load->view('theme/HEAD');
		$this->load->view('v_Dashboard');
		$this->load->view('theme/FOOTER');

	}
	public function del()
	{
		$this->load->view('theme/HEAD');
		$this->load->view('v_Dashboard');
		$this->load->view('theme/FOOTER');

	}
}
