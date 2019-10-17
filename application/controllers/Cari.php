<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cari extends CI_Controller {

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
		$this->load->model(['m_dalam','m_transport','m_tujuan']);
		//$this->load->library(['session','Mylib_form','Mylib_themes','l_paket']);
		////$this->load->helper(['url','tanggal','tanggal_id','terbilang']);
		$this->load->library(['session','form_validation']);
		$this->load->helper(['url','meedun_hitungbap_helper']);
		$this->load->database();
		// unshift crumb
		if($this->uri->segment(2)=='master'){
			$this->breadcrumbs->unshift('<i class="ace-icon fa fa-home home-icon"></i> Home', '/');
		}else{
			 $this->breadcrumbs->push('<i class="ace-icon fa fa-home home-icon"></i>Home', '/master');
		}
		$this->breadcrumbs->push('<i class="menu-icon fa fa-list"></i> Master', '/master');
	}

	function rule_sptdalam(){
		return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'nip',
            'label' => 'Nip',
            'rules' => 'required'],

            ['field' => 'jabatan',
            'label' => 'Jabatan',
            'rules' => 'required'],

            ['field' => 'golongan',
            'label' => 'golongan',
            'rules' => 'required'],

            ['field' => 'maksud',
            'label' => 'maksud',
            'rules' => 'required'],
			//pilih_transportasi:
            ['field' => 'transpor',
            'label' => 'transpor',
            'rules' => 'required'],
		
            ['field' => 'tran_nama',
            'label' => 'Transportasi',
            ],
        //pilih_tujuan    
            ['field' => 'tujuan',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'jarak',
            'label' => 'jarak',
            ],

            ['field' => 'wilayah',
            'label' => 'wilayah',
            'rules' => 'required'],

            ['field' => 'perjalanan',
            'label' => 'perjalanan',
            'rules' => 'required'],

            ['field' => 'berangkat',
            'label' => 'berangkat',
            'rules' => 'required'],

            ['field' => 'kembali',
            'label' => 'Kembali',
            'rules' => 'required'],

            ['field' => 'tahun',
            'label' => 'tahun',
            'rules' => 'required'],
        //nomor_spt     
            ['field' => 'nomor_spt',
            'label' => 'nomor_spt',
            'rules' => 'required'],
        //nomor_sppd
             ['field' => 'nomor_sppd',
            'label' => 'nomor_sppd',
            'rules' => 'required'],
        //pilih_pegawai  TTD SPT
            ['field' => 'ttd_nama',
            'label' => 'Nama Penanda Tangan SPT',
            'rules' => 'required'],

            ['field' => 'ttd_nip',
            'label' => 'Nip Penanda Tangan SPT',
            'rules' => 'required'],

            ['field' => 'ttd_jabatan',
            'label' => 'ttd_jabatan',
            'rules' => 'required'],

            ['field' => 'ttd_golongan',
            'label' => 'ttd_golongan',
            'rules' => 'required'],
        //pilih_pegawai TTD SPPD    
            ['field' => 'ttd_sppd_nama',
            'label' => 'ttd_sppd_nama',
            'rules' => 'required'],

            ['field' => 'ttd_sppd_nip',
            'label' => 'Nip Penanda Tangan SPT',
            'rules' => 'required'],

            ['field' => 'ttd_sppd_jabatan',
            'label' => 'ttd_sppd_jabatan',
            'rules' => 'required'],

            ['field' => 'ttd_sppd_golongan',
            'label' => 'ttd_sppd_golongan',
            'rules' => 'required'],

            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

        ];
								
	}

	public function index()
	{
            $key = $this->input->get("q");
		$data['cari_spd'] = $this->m_dalam->cari_spt($key);
	 	$this->template->load_js('template','cari', $data);
	}
}