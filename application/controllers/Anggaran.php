<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggaran extends CI_Controller {

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
		$this->load->model(['m_mjabatan','m_transport','m_eselon','m_tujuan','m_kegiatan','m_anggaran']);
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
			'tahun'      => date('Y');
	        'logged_in' => TRUE
		);
		$this->session->set_userdata($newdata);
		$idclient = $this->session->userdata('idclient');
		//----------------------------------------------------------- end session code
		
		$this->breadcrumbs->push('Anggaran', 'Anggaran');
		$data["anggaran"] = $this->m_master->anggaran();
		$this->template->load_js('template','master/anggaran/anggaran', $data);

	}

	public function rule_anggaran()
    {
        return [
        	['field' => 'dinas',
            'label' => 'Nama Dinas',
            'rules' => 'required'],
            ['field' => 'tgl_ang',
            'label' => 'Tanggal Anggaran',
            'rules' => 'required'],
            ['field' => 'tahun',
            'label' => 'Tahun Anggaran',
            'rules' => 'required'],
            ['field' => 'kuasa',
            'label' => 'Kuasa Anggaran',
            'rules' => 'required'],
            ['field' => 'kode',
            'label' => 'Kode Anggaran',
            'rules' => 'required'],
        ];
	}

	function add($TOKEN=null, $ID=null){
		$this->breadcrumbs->push('Anggaran', 'Anggaran');
		$this->breadcrumbs->push('<i class="menu-icon fa fa-plus"></i> Add', '/add');
			$validation = $this->form_validation;
        	$validation->set_rules($this->rule_anggaran());
        	if ($validation->run()) {
            	if($this->m_anggaran->query_simpan() === true){
            		$this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data '.$this->input->post('dinas').' berhasil disimpan'));
					$red = base_url("anggaran");
					header("refresh:4; url=$red"); 
				}else{
            		$this->session->set_flashdata('msg', $this->MSG('danger', 'Info', 'Data '.$this->input->post('dinas').' gagal disimpan'));
				}
			}
		$data["anggaran"] = $this->m_anggaran->anggaran();
		$this->template->load_js('template','master/anggaran/add_anggaran', $data);
	}
	
	function edit($ID=null){
		$this->breadcrumbs->push('Anggaran', 'Anggaran');
		$this->breadcrumbs->push('<i class="menu-icon fa fa-pencil"></i> edit', '/edit');
			$validation = $this->form_validation;
        	$validation->set_rules($this->rule_anggaran());
        	if ($validation->run()) {
            	if($this->m_anggaran->query_update() === true){
            		$this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data '.$this->input->post('dinas').' berhasil diubah'));
					$red = base_url("anggaran");
					header("refresh:4; url=$red"); 
				}else{
            		$this->session->set_flashdata('msg', $this->MSG('danger', 'Info', 'Data '.$this->input->post('dinas').' gagal diubah'));
				}
			}
		$data["anggaran"] = $this->m_anggaran->anggaran($ID);
		$this->template->load_js('template','master/anggaran/add_anggaran', $data);
	}

	public function rule_kegiatan()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama Kegiatan',
            'rules' => 'required'],

             ['field' => 'nomor',
            'label' => 'Rekening Kegiatan',
            'rules' => 'required'],

             ['field' => 'pagu',
            'label' => 'Pagu Kegiatan',
            'rules' => 'required|is_natural'], // angka 

             ['field' => 'kpa',
            'label' => 'Nama KPA',
            'rules' => 'required'],

            ['field' => 'bendahara',
            'label' => 'Nama Bendahara',
            'rules' => 'required'],
            
            ['field' => 'pptk',
            'label' => 'Nama PPTK',
            'rules' => 'required'],
            

         
        ];

    }
/**
 *   [kegiatan description]
 *   @method      kegiatan
 *   @author Meedun
 *   @date        2019-10-17
 *   @file        file_name()
 *   @anotherdate 2019-10-17T15:42:28+0700
 *   @version     [version]
 *   @param       [type]                   $TOKEN [description]
 *   @param       [type]                   $ID    [description]
 *   @return      [type]                          [description]
 */
function kegiatan($TOKEN=null, $ID=null){
		// add breadcrumbs
		 $this->breadcrumbs->push('Kegiatan', 'master/kegiatan');
		$data['TOKEN'] = $TOKEN;
		$data['ID'] = $ID;
		$data['pegawai'] = $this->m_master->pegawai();
		if($TOKEN==='kegiatan'){
			$data['kegiatan'] = $this->m_kegiatan->kegiatan($ID);
			if (!$data['kegiatan']) show_404();	
			$this->template->load('template_load','master/kegiatan/kegiatan', $data);

		}elseif($TOKEN==='add'){
			$this->breadcrumbs->push('<i class="menu-icon fa fa-plus"></i> Add', '/add');
			$validation = $this->form_validation;
        	$validation->set_rules($this->rule_kegiatan());
        	if ($validation->run()) {
            	if($this->m_kegiatan->query_simpan() === true){
            		//$this->db->last_query();
            		$this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data '.$this->input->post('nama').' berhasil disimpan'));
					$red = base_url("master/kegiatan/");
					header("refresh:4; url=$red"); 
				}else{
            		$this->session->set_flashdata('msg', $this->MSG('danger', 'Info', 'Data '.$this->input->post('nama').' gagal disimpan'));
				}
			}
        	$data['kegiatan'] = $this->m_kegiatan->kegiatan($ID);
        	if (!$data['kegiatan']) show_404();	
			$this->template->load_js('template','master/kegiatan/add_kegiatan',$data);

		}elseif ($TOKEN ==='edit' && is_numeric($ID)) {
			$this->breadcrumbs->push('<i class="menu-icon fa fa-pencil"></i> Edit', '/edit');
			 //echo $TOKEN;
			 //echo $ID;
			$validation = $this->form_validation;
        	$validation->set_rules($this->rule_kegiatan());
        	if ($validation->run()) {
        		$this->m_kegiatan->query_update();
				if($this->m_kegiatan->query_update() === true){
            		$this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data '.$this->input->post('nama').' berhasil ubah'));
            		$red = base_url("master/kegiatan/");
					header("refresh:4; url=$red"); 
				}else{
            		$this->session->set_flashdata('msg', $this->MSG('danger', 'Info', 'Data '.$this->input->post('nama').' gagal ubah'));
				}
				
			}
        	$data['kegiatan'] = $this->m_kegiatan->kegiatan($ID);
        	if (!$data['kegiatan']) show_404();	
        	$this->template->load('template_load','master/kegiatan/add_kegiatan', $data);
		}else{
			$data['kegiatan'] = $this->m_kegiatan->kegiatan();
			if (!$data['kegiatan']) show_404();	
			$this->template->load('template_load','master/kegiatan/kegiatan', $data);
		}
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
										</div>
						';
		return $_MSG;				
	}



//--------------------------------------------------------------------------------
// function DELETE
//--------------------------------------------------------------------------------
    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if ($this->m_anggaran->delete($id)) {
        	if($this->db->error()['code']){
        		$this->session->set_flashdata('msg', $this->MSG('danger', 'Info', 'Data gagal dihapus! <br><code> Anggaran ini sudah memiliki data SPT/SPPD</code>'));
        		//echo $this->db->error()['message'];
        		//echo print_r($this->db->error());
        		redirect(site_url('anggaran'));
        	}else{
				$this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data berhasil dihapus!'));
	        	redirect(site_url('anggaran'));
        	} 
        }


    }


    public function delete_kegiatan($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->m_kegiatan->delete($id)) {
        	if($this->db->error()['code']){
        		$this->session->set_flashdata('msg', $this->MSG('danger', 'Info', 'Data gagal dihapus! <br><code> Kegiatan ini sudah memiliki data SPT/SPPD</code>'));
        		//echo $this->db->error()['message'];
        		//echo print_r($this->db->error());
        		redirect(site_url('anggaran/kegiatan'));
        	}else{
				$this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data berhasil dihapus!'));
	        	redirect(site_url('anggaran/kegiatan'));
        	} 
        }

    }





}