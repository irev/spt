<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bap extends CI_Controller {

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
		$this->load->model(['m_dataload','m_perusahaan']);
		//$this->load->library(['session','Mylib_form','Mylib_themes','l_paket']);
		////$this->load->helper(['url','tanggal','tanggal_id','terbilang']);
		$this->load->library(['session']);
		$this->load->helper(['url','meedun_hitungbap_helper']);
		$this->load->database();
		
	}
	public function index()
	{
		
		$newdata = array(
			'idclient'   => '1',
			'username'   => 'user',
			'perusahaan' => '1',
			'email'      => 'johndoe@some-site.com',
	        'logged_in' => TRUE
		);

		$this->session->set_userdata($newdata);

		$idclient = $this->session->userdata('idclient');
		$data['perusahaan'] = $this->m_dataload->Select_perusahaan_by_userID($idclient);
		$data['kontrak'] = $this->m_perusahaan->kontrak_by_userID($idclient);
		//$data['paket'] = $this->m_dataload->Select_paket_by_userID($idclient);
		
		$data['client'] = $this->m_dataload->id_client();
		$this->template->load_js('template','bap/f_bap', $data);

		//$this->template->load('template','bap/f_bap',$data);
		//$this->load->view('theme/HEAD');
		//$this->load->view('bap/f_bap');
		//$this->load->view('theme/FOOTER');
	}
	function json_perusahaan(){
		$newdata = array(
			'idclient'   => '1',
			'username'   => 'user',
			'perusahaan' => '1',
			'email'      => 'johndoe@some-site.com',
	        'logged_in' => TRUE
		);

		$this->session->set_userdata($newdata);
		$idclient = $this->session->userdata('idclient');
		$idperusahaan = $this->input->post('token');
		$data = $this->m_dataload->Select_perusahaan_by_userID_and_PERUSAHAAN_ID($idclient, $idperusahaan);
		echo json_encode($data[0]);
	}

	function json_realisasi(){
		
		$DATA = [
			'JUDUL' => $this->input->post('BAP_JUDUL'),
			'JUDULS' => $this->input->post('BAP_JUDUL')
		];
		$progress = $this->input->post('REALISASI_PROGRES');
		$kontrak  = $this->input->post('REALISASI_NILAI_KONTRAK');
		$REALISASI_BAP_LALU  = $this->input->post('REALISASI_BAP_LALU');
		if(!empty($progress)){
			//print_r(MEEDUN_HITUNG_BAP($progres=0, $kontrak=0, $klasPerusahaan=0 , $jenisPekerjaan=1, $nilaiBapLalu=1220, $DATA=array(), $PL=0));
			$bap = MEEDUN_HITUNG_BAP($progress,$kontrak,1,1,$REALISASI_BAP_LALU, $DATA ,1 );
			echo json_encode($bap);
		}
		//echo $this->input->post('REALISASI_BAP_LALU');

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
