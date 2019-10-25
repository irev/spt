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
		$this->load->model(['m_dalam','m_transport','m_tujuan','m_kegiatan','m_anggaran']);
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


function test_anggaran($anggaran=null, $field=null){
	$echo = $this->m_anggaran->anggaran($anggaran, $field);
	print_r($echo);
	echo '<br><br>'.$this->db->last_query();
	echo "<br><br>".$echo->$field;

}


	public function back_page($NUM=NULL){
		$this->load->library('user_agent');
		if ($this->agent->is_referral())
		{
		    echo $this->agent->referrer();
		    redirect($_SERVER['HTTP_REFERER']);
		}
		print_r();
	}



	/**
	 * { function_description }
	 *
	 * @return     array  ( description_of_the_return_value )
	 */
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
            
			['field' => 'pilih_transportasi',
            'label' => 'transpor',
            'rules' => 'required'],

            ['field' => 'transpor',
            'label' => 'transpor',
            'rules' => 'required'],
		
            ['field' => 'tran_nama',
            'label' => 'Transportasi',
            ],
        //pilih_tujuan    
            ['field' => 'pilih_tujuan',
            'label' => 'Tujuan',
            'rules' => 'required'],

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
            'label' => 'Nomor SPT',
            'rules' => 'required'],
        //nomor_sppd
             ['field' => 'nomor_sppd',
            'label' => 'Nomor SPPD',
            'rules' => 'required'],
        //pilih_pegawai  TTD SPT
            ['field' => 'ttd_nama',
            'label' => 'Nama Penanda Tangan SPT',
            'rules' => 'required'],

            ['field' => 'ttd_nip',
            'label' => 'Nip Penanda Tangan SPT',
            'rules' => 'required'],

            ['field' => 'ttd_jabatan',
            'label' => 'Jabatan Pemberi Printah',
            'rules' => 'required'],

            ['field' => 'ttd_golongan',
            'label' => 'Golongan Pemberi Printah',
            'rules' => 'required'],
        //pilih_pegawai TTD SPPD    
            ['field' => 'ttd_sppd_nama',
            'label' => 'Nama Penandatangan SPPD',
            'rules' => 'required'],

            ['field' => 'ttd_sppd_nip',
            'label' => 'Nip Penanda Tangan SPT',
            'rules' => 'required'],

            ['field' => 'ttd_sppd_jabatan',
            'label' => 'Penandatangan SPPD',
            'rules' => 'required'],

            ['field' => 'ttd_sppd_golongan',
            'label' => 'Golongan Penandatangan SPPD ',
            'rules' => 'required'],

            ['field' => 'pilih_beban',
            'label' => 'Anggaran',
            'rules' => 'required'],

             ['field' => 'kegiatan',
            'label' => 'Kegiatan',
            'rules' => 'required'],

        ];
								
	}

	/**
	 * { function_description }
	 */
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

	 /**
	  * { function_description }
	  *
	  * @param      string  $TOKEN  The token
	  * @param      string  $ID     { parameter_description }
	  */
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
			$data['kegiatan']     = $this->m_kegiatan->kegiatan();
			//$data['spt_pengikut'] = array();
	 	///// AKSES PAGE BY TOKEN	
		if($TOKEN==='detail-spt-sppd'){
				$data['spt_dalam']    	 = $this->m_dalam->spt_dalam($ID);
				$data['spt_pengikut']    = $this->m_dalam->spt_pengikut($ID);
				$data['transpor']        = $this->m_master->trasportsasi_nomor($data['spt_dalam']->transportasi);
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
			            		//echo $this->db->last_query();
							}
							
						}else{
							$this->session->set_flashdata('msg', $this->MSG('danger', 'Ups, ', 'Data '.$this->input->post('nomor_spt').' NOMOR SPT Sudah ADA'));
						}
					}
	        	//$data['transportasi'] = $this->m_dalam->jabatan($ID);
	        	//if (!$data['spt_dalam']) show_404();	
				$this->template->load_js('template','spt/dalam/add_spt', $data);

		}elseif($TOKEN==='addw'){
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
				$this->template->load_js('template','spt/dalam/add_spt_w', $data);

		}elseif($TOKEN ==='edit' && $this->input->get('p')==2) {
				$data['spt_dalam']    = $this->m_dalam->spt_dalam($ID);
				$data['spt_pengikut'] = $this->m_dalam->spt_pengikut($ID);
				$validation = $this->form_validation;
	        	$validation->set_rules($this->rule_sptdalam());
	        	if ($validation->run()) {
	        		///DUPLIKAT KODE NOMOR SPT
	        		if(!$this->m_dalam->cekDuplikatEntry('no_spt', $this->input->post('nomor_spt'))){
			            	if($this->m_dalam->query_update() === false){
			            		$this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data '.$this->input->post('nama_jabatan').' berhasil diubah'));
								$red = base_url("spt/dalam/detail-spt-sppd/".$ID);
								header("refresh:4; url=$red"); 
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


	 /**
	  * { function_description }
	  *
	  * @param      string  $TOKEN  The token
	  * @param      string  $ID     { parameter_description }
	  */
	 function luar($TOKEN=null, $ID=null){
	 	// add breadcrumbs
		 $this->breadcrumbs->push('SPT', '/spt');
		 $this->breadcrumbs->push('Dinas Luar', '/spt/luar');
		 $this->breadcrumbs->push('Detail SPT', '/spt/luar/deteil-spt-sppd');
		 $data['spt_pengikut'] = $this->m_dalam->spt_pengikut($ID);
		// unshift crumb
		// $this->breadcrumbs->unshift('<i class="ace-icon fa fa-home home-icon"></i> Home', '/');
		$data['TOKEN'] = $TOKEN;
		$data['ID'] = $ID;
			$data['spt_dalam']    = $this->m_dalam->spt_dalam();
			$data['pegawai']      = $this->m_master->pegawai();
			$data['anggaran']     = $this->m_master->anggaran();
			$data['transportasi'] = $this->m_transport->trasnsportasi();
			$data['tujuan']       = $this->m_tujuan->tujuan();
			$data['kegiatan']     = $this->m_kegiatan->kegiatan();
			//$data['spt_pengikut'] = array();
	 	///// AKSES PAGE BY TOKEN	
		if($TOKEN==='detail-spt-sppd'){
				$data['spt_dalam']    	 = $this->m_dalam->spt_dalam($ID);
				$data['spt_pengikut']    = $this->m_dalam->spt_pengikut($ID);
				$data['transpor']        = $this->m_master->trasportsasi_nomor($data['spt_dalam']->transportasi);
				//echo $this->db->last_query();
					$this->template->load_js('template','spt/luar/detail_spt_sppd', $data);
		}
		elseif($TOKEN==='add'){
	 		$this->breadcrumbs->push('ADD', '/add');
				//FORM ADD / TAMBAH 
				$validation = $this->form_validation;
	        	$validation->set_rules($this->rule_sptdalam());
	        	if ($validation->run()) {
	        		///DUPLIKAT KODE NOMOR SPT
	        		if($this->m_dalam->cekDuplikatEntry('no_spt', $this->input->post('nomor_spt'))){
			            	if($this->m_dalam->query_simpan() === true){
			            		$this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data '.$this->input->post('nama_jabatan').' berhasil disimpan'));
								$red = base_url("spt/luar");
								//header("refresh:4; url=$red"); 
							}else{
			            		$this->session->set_flashdata('msg', $this->MSG('danger', 'Info', 'Data '.$this->input->post('nama_jabatan').' gagal disimpan'));
							}
						}else{
							$this->session->set_flashdata('msg', $this->MSG('danger', 'Ups, ', 'Data '.$this->input->post('nomor_spt').' NOMOR SPT Sudah ADA'));
						}
					}else{
						$this->template->load_js('template','spt/luar/add_spt_w', $data);	
					}
		}elseif($TOKEN ==='edit' && $this->input->get('p')==2) {
				if (!$data['spt_dalam']) show_404();
				$data['spt_dalam']    = $this->m_dalam->spt_dalam($ID);
				if (!$data['spt_pengikut']) show_404();
				$data['spt_pengikut'] = $this->m_dalam->spt_pengikut($ID);
				$validation = $this->form_validation;
	        	$validation->set_rules($this->rule_sptdalam());
	        	if ($validation->run()) {
	        		///DUPLIKAT KODE NOMOR SPT
	        		if(!$this->m_dalam->cekDuplikatEntry('no_spt', $this->input->post('nomor_spt'))){
			            	if($this->m_dalam->query_update() === false){
			            		$this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data '.$this->input->post('nama_jabatan').' berhasil diubah'));
								$red = base_url("spt/luar/detail-spt-sppd/".$ID);
								header("refresh:4; url=$red"); 
							}else{
								//echo $this->db->last_query();
			            		$this->session->set_flashdata('msg', $this->MSG('danger', 'Info', 'Data '.$this->input->post('nama_jabatan').' gagal disimpan'));
							}
						}else{
							$this->session->set_flashdata('msg', $this->MSG('danger', 'Error', 'Data '.$this->input->post('nomor_spt').' NOMOR SPT Sudah ADA'));
						}
					}
				$this->template->load_js('template','spt/luar/add_spt', $data);
		}elseif($TOKEN==='pengikut'){
			$this->breadcrumbs->push('Pengikut', 'spt/luar/edit/'.$ID.'?p=2');
			$data['spt_pengikut']    = $this->m_dalam->spt_pengikut($ID);
			//echo $this->db->last_query();
			$this->template->load_js('template','spt/luar/add_pengikut', $data);
		}else{
			$this->template->load_js('template','spt/luar/spt', $data);
		}
		//echo $this->db->last_query();	
	 }



	 function simpanSPT(){
	 			$validation = $this->form_validation;
	        	$validation->set_rules($this->rule_sptdalam());
	        	//if ($validation->run()) {
	        		///DUPLIKAT KODE NOMOR SPT
	        		if (!$this->input->post('nomor_spt')) show_404();
	        		
	        		if($this->m_dalam->cekDuplikatEntry('no_spt', $this->input->post('nomor_spt'))){
			            	if($this->m_dalam->query_simpan() === true){
			            		$this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data '.$this->input->post('nama_jabatan').' berhasil disimpan'));
								$red = base_url("spt/luar");
								//header("refresh:4; url=$red"); 
								echo json_encode(['success'=>'Record added successfully.']);
							}else{
			            		$this->session->set_flashdata('msg', $this->MSG('danger', 'Info', 'Data '.$this->input->post('nama_jabatan').' gagal disimpan'));
			            		$errors = validation_errors();
			            		echo json_encode(['error'=>$errors]);
							}
					}else{
						$this->session->set_flashdata('msg', $this->MSG('danger', 'Ups, ', 'Data '.$this->input->post('nomor_spt').' NOMOR SPT Sudah ADA'));
					}
						
			        
	}


/**
 * @return [type]
 */
function bayar(){
	if($this->m_dalam->update_bayar() === false){
		//update_bayar
	}
}

/**
 * { function_description }
 *
 * @param      <type>  $ID     { parameter_description }
 */
function cek_db($ID=null){
	$data['spt_pengikut']    = $this->m_dalam->spt_pengikut($ID);
	echo $this->db->last_query();
}


	/**
	 * { function_description }
	 *
	 * @param      string  $warna  The warna
	 * @param      string  $intro  The intro
	 * @param      string  $pesan  The pesan
	 *
	 * @return     string  ( description_of_the_return_value )
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

	/**
	 * { function_description }
	 *
	 * @param      <type>  $IDSPTDLAM  The idsptdlam
	 */
	function prints($IDSPTDLAM=null){
			$data['ID'] = $IDSPTDLAM;
			$this->template->load('template','spt/menu_print',$data);
	}

	 /**
	  * { function_description }
	  *
	  * @param      <type>  $IDSPTDLAM  The idsptdlam
	  */
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

	 /**
	  * { function_description }
	  *
	  * @param      <type>  $IDSPTDLAM  The idsptdlam
	  */
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


/** CETAK KWITANSI BBM
 *  @param      <type>  $ID     { parameter_description }
 *  
**/
	 function print_kwitansi($ID){
		 // add breadcrumbs
	 	$data['ID'] = $ID;
		 $this->breadcrumbs->push('SPT', '/spt');
		 $this->breadcrumbs->push('Dinas Dalam', '/spt/dalam');
		 $nospt = $this->m_dalam->get_data('spt_data','no_spt','id_spt',$ID);
		 $this->breadcrumbs->push('Print', 'spt/prints/'.$ID);
		 $this->breadcrumbs->push($nospt, '#');
		 ////// GET DATA
		 		$data['spt_dalam']    	 = $this->m_dalam->spt_dalam($ID);
				$data['spt_pengikut']    = $this->m_dalam->spt_pengikut($ID);
				$data['transpor']        = $this->m_master->trasportsasi_nomor($data['spt_dalam']->transportasi);
		$this->load->view('spt/dalam/kwitansi_bbm',$data);
	}

	/**
	 *  CETAK KWITANSI nominatif	
	 *
	 * @param      <type>  $ID     { parameter_description }
	 */
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

	 /**
	  * { function_description }
	  *
	  * @param      <type>  $IDSPTDLAM  The idsptdlam
	  */
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
	
	/**
	 * { function_description }
	 *
	 * @param      <type>  $id     The identifier
	 */
	public function delete_spt_dalam($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->m_dalam->delete($id)) {
            redirect(site_url('spt/dalam'));
        }
    }



	 /**
	  * data ajax
	  */
	 function select_pegawai(){
	 	$ID = $this->input->post('pilih_pegawai');
	 	$result = $this->m_master->pegawai($ID);
	 	echo json_encode($result);
	 }
	 /**
	  * { function_description }
	  */
	 function select_tujuan(){
	 	$ID = $this->input->post('pilih_tujuan');
	 	$result = $this->m_tujuan->tujuan($ID);
	 	echo json_encode($result);
	 }
	 /**
	  * { function_description }
	  */
	 function select_transportasi(){
	 	$ID = $this->input->post('pilih_transportasi');
	 	$result = $this->m_transport->trasnsportasi($ID);
	 	echo json_encode($result);
	 }

	/**
	 * { simpan_pengikut }
	 */
	function simpan_pengikut(){
		if($this->m_dalam->query_simpan_pengikut()!=1){
			 $this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data '.$this->input->post('nama_jabatan').' berhasil disimpan'));
			   	$this->session->flashdata('msg');
			  	//echo $this->db->affected_rows();//json_encode($data['data'] =true);
		}else{
				//echo $this->db->affected_rows();//echo json_encode($data['data'] =false); 
		}
	}

	/**
	 * { function_description }
	 *
	 * @param      <type>  $id     The identifier
	 * @param      <type>  $sptid  The sptid
	 */
	function delete_spt_dalam_pengikut($id,$sptid){
		if (!isset($id)) show_404();
        if ($this->m_dalam->deletePengikut($id)) {
            redirect(site_url('spt/dalam/pengikut/'.$sptid));
        }
	}	



	 /**
	  * { function_description }
	  *
	  * @param      <type>  $IDSPTDLAM  The idsptdlam
	  */
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

/**
 * { function_description }
 */
function readme(){
	$this->template->load('template_load','readme');
	//$contents = file_get_contents('README.md');
	//echo $this->parsedown->text($contents);
}



}