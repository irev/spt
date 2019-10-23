<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kalender extends CI_Controller {

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
		$this->load->model(['m_dalam','m_mjabatan','m_transport','m_eselon','m_tujuan','m_kegiatan','m_anggaran']);
		//$this->load->library(['session','Mylib_form','Mylib_themes','l_paket']);
		////$this->load->helper(['url','tanggal','tanggal_id','terbilang']);
		$this->load->library(['session','form_validation']);
		$this->load->helper(['url','meedun_hitungbap_helper','spd_helper']);
		$this->load->database();
		// unshift crumb
		if($this->uri->segment(2)=='master'){
			$this->breadcrumbs->unshift('<i class="ace-icon fa fa-home home-icon"></i> Home', '/');
		}else{
			 $this->breadcrumbs->push('<i class="ace-icon fa fa-home home-icon"></i>Home', '/master');
		}
		$this->breadcrumbs->push('<i class="menu-icon fa fa-list"></i> Master', '/master');
		
	}
	/**
	 * { function_description }
	 */
	public function index(){

		//----------------------------------------------------------- start session code 
		$newdata = array(
			'idclient'   => '1',
			'username'   => 'user Anggaran',
			'perusahaan' => '1',
			'email'      => 'johndoe@some-site.com',
	        'logged_in' => TRUE
		);
		$this->session->set_userdata($newdata);
		$idclient = $this->session->userdata('idclient');
		//----------------------------------------------------------- end session code
		
		$this->breadcrumbs->push('Anggaran', 'Anggaran');
		$data["anggaran"] = $this->m_master->anggaran();
		$this->template->load_js('template','kalender/kalender', $data);

	}
// https://fullcalendar.io/docs/v3/events-json-feed
	function get_jadwal(){
			$data  = $this->m_dalam->spt_dalam();
			$data_event = array();
			$sumday=0;
			$perjalanan ="";
			foreach ($this->m_dalam->spt_dalam() as $key => $value) {
				$sumday = JUMLAHHARI($value["tgl_berangkat"], $value["tgl_kembali"]);
				$perjalanan = $value["perjalanan"];
				if($perjalanan == "dalam"){
					$color = 'green';
					$textColor = 'white';
					$classlabel='label-success';
				}else{
					$color = 'red';
					$textColor = 'white';
					$classlabel='label-danger';
				}	
				$data_event[] = [
						'title'=>$value['maksud'].' - '.$sumday.' Hari ('.LONGE_DATE_INDONESIA($value["tgl_berangkat"]).' - '.LONGE_DATE_INDONESIA($value["tgl_kembali"]).') Dinas '. $value["perjalanan"], 
						'start'=>$value['tgl_berangkat'], 
						'end'=>$value['tgl_kembali'],
						'day'=>$sumday,
						'className'=> $classlabel,
					];
			}
			echo 'events:'.json_encode(['events'=>$data_event]).',';
	}

	function event(){
			$data  = $this->m_dalam->spt_dalam($ID);
			//$event [
			//	'maksud'=> $data["maksud"];
			//]; 
			//echo json_encode($event => '');
	}

}