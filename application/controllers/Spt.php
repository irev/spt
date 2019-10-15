<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spt extends CI_Controller {

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
	public function back_page(){
		$this->load->library('user_agent');
		if ($this->agent->is_referral())
		{
		    echo $this->agent->referrer();
		    redirect($_SERVER['HTTP_REFERER']);
		}
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
		
	$data['spt_dalam'] = $this->m_dalam->spt_dalam();
	 	$this->template->load_js('template','spt/dalam/spt', $data);
	}


    function uh($id){
    	$ceks = $this->m_dalam->cekDuplikatEntry('no_spt',$id);
    	
    	if($ceks){
    		echo '  belum xxx '. $id;
    	}else{
    		echo ' sudah ada'.$id;
    	}
     echo $this->db->last_query();
    }

	 function dalam($TOKEN=null, $ID=null){
	 	// add breadcrumbs
		 $this->breadcrumbs->push('SPT', '/spt');
		 $this->breadcrumbs->push('Dinas Dalam', '/spt/dalam');
		 $this->breadcrumbs->push('Detail SPT', '/spt/dalam/deteil-spt-sppd');
		// unshift crumb
		// $this->breadcrumbs->unshift('<i class="ace-icon fa fa-home home-icon"></i> Home', '/');
		$data['TOKEN'] = $TOKEN;
		$data['ID'] = $ID;
			$data['spt_dalam']    = $this->m_dalam->spt_dalam();
			$data['pegawai']      = $this->m_master->pegawai();
			$data['anggaran']     = $this->m_master->anggaran();
			$data['transportasi'] = $this->m_transport->trasnsportasi();
			$data['tujuan']       = $this->m_tujuan->tujuan();

			$data['spt_pengikut'] = array();
	 	///// AKSES PAGE BY TOKEN	
		if($TOKEN==='detail-spt-sppd'){
				$data['spt_dalam']    	 = $this->m_dalam->spt_dalam($ID);
				$data['spt_pengikut']    = $this->m_dalam->spt_pengikut($ID);
				//echo $this->db->last_query();
					$this->template->load_js('template','spt/dalam/detail_spt_sppd', $data);
		}elseif($TOKEN==='add'){
	 		$this->breadcrumbs->push('ADD', '/add');
				//FORM ADD / TAMBAH 
				$validation = $this->form_validation;
	        	$validation->set_rules($this->rule_sptdalam());
	        	if ($validation->run()) {
	        		///DUPLIKAT KODE NOMOR SPT
	        		if($this->m_dalam->cekDuplikatEntry('no_spt', $this->input->post('nomor_spt'))){
			            	if($this->m_dalam->query_simpan() === true){
			            		$this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data '.$this->input->post('nama_jabatan').' berhasil disimpan'));
								$red = base_url("spt/dalam");
								header("refresh:4; url=$red"); 
							}else{
			            		$this->session->set_flashdata('msg', $this->MSG('danger', 'Info', 'Data '.$this->input->post('nama_jabatan').' gagal disimpan'));
							}
						}else{
							$this->session->set_flashdata('msg', $this->MSG('danger', 'Ups, ', 'Data '.$this->input->post('nomor_spt').' NOMOR SPT Sudah ADA'));
						}
					}
	        	//$data['transportasi'] = $this->m_dalam->jabatan($ID);
	        	//if (!$data['spt_dalam']) show_404();	
				$this->template->load_js('template','spt/dalam/add_spt', $data);

		}elseif($TOKEN ==='edit' && $this->input->get('p')==2) {
				$data['spt_dalam']    = $this->m_dalam->spt_dalam($ID);
				$data['spt_pengikut']    = $this->m_dalam->spt_pengikut($ID);
				$validation = $this->form_validation;
	        	$validation->set_rules($this->rule_sptdalam());
	        	if ($validation->run()) {
	        		///DUPLIKAT KODE NOMOR SPT
	        		if(!$this->m_dalam->cekDuplikatEntry('no_spt', $this->input->post('nomor_spt'))){
			            	if($this->m_dalam->query_update() === true){
			            		$this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data '.$this->input->post('nama_jabatan').' berhasil diubah'));
								$red = base_url("spt/dalam");
								//header("refresh:4; url=$red"); 
							}else{
								//echo $this->db->last_query();
			            		$this->session->set_flashdata('msg', $this->MSG('danger', 'Info', 'Data '.$this->input->post('nama_jabatan').' gagal disimpan'));
							}
						}else{
							$this->session->set_flashdata('msg', $this->MSG('danger', 'Error', 'Data '.$this->input->post('nomor_spt').' NOMOR SPT Sudah ADA'));
						}
					}
				$this->template->load_js('template','spt/dalam/add_spt', $data);
		}elseif($TOKEN==='pengikut'){
			$this->breadcrumbs->push('Pengikut', 'spt/dalam/edit/'.$ID.'?p=2');
			$data['spt_pengikut']    = $this->m_dalam->spt_pengikut($ID);
			//echo $this->db->last_query();
			$this->template->load_js('template','spt/dalam/add_pengikut', $data);
		}else{
				$this->template->load_js('template','spt/dalam/spt', $data);
		}
		//echo $this->db->last_query();	
	 }


function cek_db($ID=null){
	$data['spt_pengikut']    = $this->m_dalam->spt_pengikut($ID);
	echo $this->db->last_query();
}


/*
	function transportasi($TOKEN=null, $ID=null){
			$data['TOKEN'] = $TOKEN;
			$data['ID'] = $ID;

			if($TOKEN==='transportasi'){
				$data['transportasi'] = $this->m_mjabatan->jabatan($ID);
				if (!$data['transportasi']) show_404();	
				$this->template->load_js('template','master/transportasi/transportasi', $data);

			}elseif($TOKEN==='add'){
				//FORM ADD / TAMBAH 
				$validation = $this->form_validation;
	        	$validation->set_rules($this->rule_transportasi());
	        	if ($validation->run()) {
	            	if($this->m_transport->query_simpan() === true){
	            		$this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data '.$this->input->post('nama_jabatan').' berhasil disimpan'));
						$red = base_url("master/transportasi/");
						header("refresh:4; url=$red"); 
					}else{
	            		$this->session->set_flashdata('msg', $this->MSG('danger', 'Info', 'Data '.$this->input->post('nama_jabatan').' gagal disimpan'));
					}
				}
	        	$data['transportasi'] = $this->m_mjabatan->jabatan($ID);
	        	if (!$data['transportasi']) show_404();	
				$this->template->load_js('template','master/transportasi/add_transportasi',$data);

			}elseif ($TOKEN ==='edit' && is_numeric($ID)) {
				 //FORM EDIT
				 //echo $TOKEN;
				 //echo $ID;
				$validation = $this->form_validation;
	        	$validation->set_rules($this->rule_transportasi());
	        	if ($validation->run()) {
	        		$this->m_transport->query_update();
					if($this->m_transport->query_update() === true){
	            		$this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data '.$this->input->post('nama_jabatan').' berhasil disimpan'));
						$red = base_url("master/transportasi/");
						header("refresh:4; url=$red");
					}else{
	            		$this->session->set_flashdata('msg', $this->MSG('danger', 'Info', 'Data '.$this->input->post('nama_jabatan').' gagal disimpan'));
					}
					
				}
	        	$data['transportasi'] = $this->m_transport->trasnsportasi($ID);
	        	if (!$data['transportasi']) show_404();	
	        	$this->template->load_js('template','master/transportasi/add_transportasi', $data);

			}else{
				$data['transportasi'] = $this->m_transport->trasnsportasi();
				if (!$data['transportasi']) show_404();	
				$this->template->load_js('template','master/transportasi/transportasi', $data);
			}
					

	}
*/
	private function MSG($warna="danger", $intro= 'Upss!', $pesan=" TAMPIL PESAN DISINI "){
			$_MSG = '
				<div class="alert alert-'.$warna.'">
					<button type="button" class="close" data-dismiss="alert">
						<i class="ace-icon fa fa-times"></i>
					</button>
					<strong>
						<i class="ace-icon fa fa-times"></i>
						'.$intro.'
					</strong>
						'.$pesan.'.
						<br>
				</div>';
			return $_MSG;				
	}

	function prints($IDSPTDLAM=null){
			$data['ID'] = $IDSPTDLAM;
			$this->template->load('template','spt/menu_print',$data);
	}

	 function print_dalam($IDSPTDLAM){
	 	// add breadcrumbs
		 $this->breadcrumbs->push('SPT', '/spt');
		 $this->breadcrumbs->push('Dinas Dalam', '/spt/dalam');
		 $nospt = $this->m_dalam->get_data('spt_data','no_spt','id_spt',$IDSPTDLAM);
		 $this->breadcrumbs->push('Print', 'spt/prints/'.$IDSPTDLAM);
		 $this->breadcrumbs->push($nospt, '#');

	 $data['spt_dalam'] = $this->m_dalam->spt_dalam($IDSPTDLAM);
	 $data['spt_dalam_pengikut'] = $this->m_dalam->spt_pengikut($IDSPTDLAM);
	 	$this->template->load_js('template','spt/dalam/sptprint', $data);
	 }
	 function cetak_spt_dalam($IDSPTDLAM){
	 	 	// add breadcrumbs
		 $this->breadcrumbs->push('SPT', '/spt');
		 $this->breadcrumbs->push('Dinas Dalam', '/spt/dalam');
		 $nospt = $this->m_dalam->get_data('spt_data','no_spt','id_spt',$IDSPTDLAM);
		 $this->breadcrumbs->push('Print', 'spt/prints/'.$IDSPTDLAM);
		 $this->breadcrumbs->push($nospt, '#');

	 $data['spt_dalam'] = $this->m_dalam->spt_dalam($IDSPTDLAM);
	 $data['spt_dalam_pengikut'] = $this->m_dalam->spt_pengikut($IDSPTDLAM);
	 	$this->load->view('spt/dalam/sptprint', $data);
	 }

/////// CETAK KWITANSI BBM
	 function print_kwitansi($ID){
		 // add breadcrumbs
	 	$data['ID'] = $ID;
		 $this->breadcrumbs->push('SPT', '/spt');
		 $this->breadcrumbs->push('Dinas Dalam', '/spt/dalam');
		 $nospt = $this->m_dalam->get_data('spt_data','no_spt','id_spt',$ID);
		 $this->breadcrumbs->push('Print', 'spt/prints/'.$ID);
		 $this->breadcrumbs->push($nospt, '#');
		// unshift crumb
		// $this->breadcrumbs->unshift('<i class="ace-icon fa fa-home home-icon"></i> Home', '/');
		
		//$this->template->load_js('template','spt/luar/spt', $data);
		//$this->template->load('template','dev', $data);
		//$this->template->load('template','spt/dalam/kwitansi',$data);
		//$this->template->load('template','spt/dalam/kwitansi_bbm',$data);
		$this->load->view('spt/dalam/kwitansi_bbm',$data);
	}
/////// CETAK KWITANSI nominatif	
	function PrintKwitansiNominatif($ID){
		 // add breadcrumbs
	 	$data['ID'] = $ID;
		 $this->breadcrumbs->push('SPT', '/spt');
		 $this->breadcrumbs->push('Dinas Dalam', '/spt/dalam');
		 $nospt = $this->m_dalam->get_data('spt_data','no_spt','id_spt',$ID);
		 $this->breadcrumbs->push('Print', 'spt/prints/'.$ID);
		 $this->breadcrumbs->push($nospt, '#');
		$data['spt_pengikut']    = $this->m_dalam->spt_pengikut($ID);
		// unshift crumb
		// $this->breadcrumbs->unshift('<i class="ace-icon fa fa-home home-icon"></i> Home', '/');
		
		//$this->template->load_js('template','spt/luar/spt', $data);
		//$this->template->load('template','dev', $data);
		//$this->template->load('template','spt/dalam/kwitansi',$data);
		//$this->template->load('template','spt/dalam/kwitansi_bbm',$data);
		$this->load->view('spt/dalam/kwitansi',$data);
	}

	 function laporan_sppd($IDSPTDLAM=null){
	 	
	 	if($IDSPTDLAM){
	 	 // add breadcrumbs
		 $this->breadcrumbs->push('SPT', '/spt');
		 $this->breadcrumbs->push('Dinas Dalam', '/spt/dalam');
		 $nospt = $this->m_dalam->get_data('spt_data','no_spt','id_spt',$IDSPTDLAM);
		 $this->breadcrumbs->push('Print', 'spt/prints/'.$IDSPTDLAM);
		 $this->breadcrumbs->push($nospt, '#');
		// unshift crumb
		// $this->breadcrumbs->unshift('<i class="ace-icon fa fa-home home-icon"></i> Home', '/');
		$data['ID'] = $IDSPTDLAM;
		//$this->template->load_js('template','spt/luar/spt', $data);
		$this->template->load('template','dev', $data);
		}
		$this->template->load('template','dev');
	 }
	
	public function delete_spt_dalam($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->m_dalam->delete($id)) {
            redirect(site_url('spt/dalam'));
        }
    }


/////////////////////////////////////
///data ajax
////////////////////////////////////
	 function select_pegawai(){
	 	$ID = $this->input->post('pilih_pegawai');
	 	$result = $this->m_master->pegawai($ID);
	 	echo json_encode($result);
	 }
	 function select_tujuan(){
	 	$ID = $this->input->post('pilih_tujuan');
	 	$result = $this->m_tujuan->tujuan($ID);
	 	echo json_encode($result);
	 }
	 function select_transportasi(){
	 	$ID = $this->input->post('pilih_transportasi');
	 	$result = $this->m_transport->trasnsportasi($ID);
	 	echo json_encode($result);
	 }
	function simpan_pengikut(){
		if($this->m_dalam->query_simpan_pengikut()!=1){
			 $this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data '.$this->input->post('nama_jabatan').' berhasil disimpan'));
			   	$this->session->flashdata('msg');
			  	//echo $this->db->affected_rows();//json_encode($data['data'] =true);
		}else{
				//echo $this->db->affected_rows();//echo json_encode($data['data'] =false); 
		}
	}

	function delete_spt_dalam_pengikut($id,$sptid){
		if (!isset($id)) show_404();
        if ($this->m_dalam->deletePengikut($id)) {
            redirect(site_url('spt/dalam/pengikut/'.$sptid));
        }
	}	
	function luar($TOKEN=null, $ID=null){
		 $this->breadcrumbs->push('SPT', '/spt');
		 $this->breadcrumbs->push('Dinas Luar', '/spt/luar');
		// unshift crumb
		// $this->breadcrumbs->unshift('<i class="ace-icon fa fa-home home-icon"></i> Home', '/');
		$data['TOKEN'] = $TOKEN;
		$data['ID'] = $ID;
		//$this->template->load_js('template','spt/luar/spt', $data);
		$this->template->load('template','dev', $data);
	}

	 function dev($IDSPTDLAM=null){
		 	
		 	if($IDSPTDLAM){
		 	 // add breadcrumbs
			 $this->breadcrumbs->push('SPT', '/spt');
			 $this->breadcrumbs->push('Dinas Dalam', '/spt/dalam');
			 $nospt = $this->m_dalam->get_data('spt_data','no_spt','id_spt',$IDSPTDLAM);
			 $this->breadcrumbs->push('Print', 'spt/prints/'.$IDSPTDLAM);
			 $this->breadcrumbs->push($nospt, '#');
			// unshift crumb
			// $this->breadcrumbs->unshift('<i class="ace-icon fa fa-home home-icon"></i> Home', '/');
			$data['ID'] = $IDSPTDLAM;
			//$this->template->load_js('template','spt/luar/spt', $data);
			$this->template->load('template','dev', $data);
			}
			$this->template->load('template_load','dev');
		 }

function readme(){
	$this->template->load('template_load','readme');
	//$contents = file_get_contents('README.md');
	//echo $this->parsedown->text($contents);
}



}