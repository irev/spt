<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$this->load->model(['m_dashboard']);
		$this->load->library(['session']);
		//$this->load->library('user_agent');
		$this->load->database();
		//$this->load->helper(['url','tanggal','tanggal_id','terbilang']);
		$newdata = array(
			'level'   => '1',
			'username'   => 'user',
			'perusahaan' => '1',
			'Addresses' => $_SERVER['REMOTE_ADDR'], 
			'TA'		=> "2019",
			'email'      => 'johndoe@some-site.com',
	        'logged_in' => TRUE
		);

		//$this->session->set_userdata($newdata);
	}
	public function index()
	{
		$this->breadcrumbs->push('<i class="fa fa-home"></i> Dashboard', '/Dashboard');
		$data["jumlah_pegawai"]   = $this->db->count_all("m_pegawai");
		$data["jumlah_spd_dalam"] = $this->m_dashboard->count_spd_dalam();
		$data["jumlah_spd_luar"]  = $this->m_dashboard->count_spd_luar();
		$data["jumlah_kendraan"]  = $this->db->count_all("m_trasportsasi");
		$data["jumlah_tujuan"]    = $this->db->count_all("m_tujuan");
		$data["jumlah_kegiatan"]  = $this->db->count_all("m_kegiatan");
		$this->load->view('theme/HEAD');
		$this->load->view('v_Dashboard', $data);
		$this->load->view('theme/FOOTER');
	}

	public function ses_TEST(){
		$newdata = array(
			'level'   => '1',
			'username'   => 'user',
			'perusahaan' => '1',
			'Addresses' => $_SERVER['REMOTE_ADDR'], 
			'TA'		=> "2019",
			'email'      => 'johndoe@some-site.com',
	        'logged_in' => TRUE
		);

		$this->session->set_userdata($newdata);
		//redirect(base_url());

		foreach ($this->session->userdata() as $key  => $ses) {
			echo $key ." = ".$ses."<br>";
		}
		if ($this->agent->is_browser())
		{
        	echo $agent = $this->agent->browser().' '.$this->agent->version();
		}
	echo "<a href='".base_url('dashboard/ses_TESTx')."'>ses_TESTx</a>";

	}

public function ses_TESTx(){
		$newdata = array(
			'level'   => '1',
			'username'   => 'user',
			'perusahaan' => '1',
			'Addresses' => $_SERVER['REMOTE_ADDR'], 
			'TA'		=> "2019",
			'email'      => 'johndoe@some-site.com',
	        'logged_in' => TRUE
		);

		$this->session->set_userdata($newdata);
		redirect(base_url());

		foreach ($this->session->userdata() as $key  => $ses) {
			echo $key ." = ".$ses."<br>";
		}
		if ($this->agent->is_browser())
		{
        	echo $agent = $this->agent->browser().' '.$this->agent->version();
		}
	

	}


	public function profile()
	{
		$data['client'] = $this->m_dataload->id_client(1);
		$data['perusahaan_client'] = $this->m_dataload->perusahaan_client(1);
		
		$this->load->view('theme/HEAD');
		$this->load->view('login/profile',$data);
		$this->load->view('theme/FOOTER');

	}
}
