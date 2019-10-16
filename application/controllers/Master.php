<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

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
		$this->load->model(['m_mjabatan','m_transport']);
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
	/**
	 * { function_description }
	 */
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
		//$data['perusahaan'] = $this->m_dataload->Select_perusahaan_by_userID($idclient);
		//$data['kontrak'] = $this->m_perusahaan->kontrak_by_userID($idclient);
		//$data['paket'] = $this->m_dataload->Select_paket_by_userID($idclient);
		
		//$data['client'] = $this->m_dataload->id_client();
		$this->template->load_js('template','master/master');

		//$this->template->load('template','bap/f_bap',$data);
		//$this->load->view('theme/HEAD');
		//$this->load->view('bap/f_bap');
		//$this->load->view('theme/FOOTER');
	}

	/**
	 * { function_description }
	 *
	 * @return     array  ( description_of_the_return_value )
	 */
	public function rule_pegawai()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],
/*
            ['field' => 'nip',
            'label' => 'Nip',
            'rules' => 'required'],
*/
            ['field' => 'jabatan',
            'label' => 'Jabatan',
            'rules' => 'required'],

            ['field' => 'golongan',
            'label' => 'Golongan',
            'rules' => 'required'],

            ['field' => 'tahun',
            'label' => 'Tahun',
            'rules' => 'required'],
        ];
    }

/**
 * { function_description }
 *
 * @param      string  $TOKEN  The token
 * @param      <type>  $ID     { parameter_description }
 */
public function pegawai($TOKEN=null, $ID=null)
	{
		// add breadcrumbs
		 $this->breadcrumbs->push('Pegawai', 'master/pegawai');
		$newdata = array(
			'idclient'   => '1',
			'username'   => 'user',
			'perusahaan' => '1',
			'email'      => 'johndoe@some-site.com',
	        'logged_in' => TRUE
		);

		$this->session->set_userdata($newdata);

		$idclient = $this->session->userdata('idclient');
		$data['TOKEN'] = $TOKEN;
		$data['ID'] = $ID;
		if($TOKEN==='pegawai' && is_numeric($ID)){
			$data['pegawai'] = $this->m_master->pegawai($ID);
			$this->template->load('template','master/pegawai/pegawai', $data);
		}elseif ($TOKEN==='add' && $ID===null) {
			$this->breadcrumbs->push('<i class="menu-icon fa fa-plus"></i> Add', '/add');
			$validation = $this->form_validation;
        	$validation->set_rules($this->rule_pegawai());
        	if ($validation->run()) {
            	if($this->m_master->query_simpanpegawai() === true){
            		$this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data '.$this->input->post('nama_jabatan').' berhasil disimpan'));
					$red = base_url("master/pegawai/");
					header("refresh:4; url=$red"); 
				}else{
            		$this->session->set_flashdata('msg', $this->MSG('danger', 'Info', 'Data '.$this->input->post('nama_jabatan').' gagal disimpan'));
				}
			}
			$data['pegawai'] = $this->m_master->pegawai($ID);
			$data['jabatan'] = $this->m_master->jabatan();
			$data['golongan'] = $this->m_master->golongan();
			$this->template->load_js('template','master/pegawai/add_pegawai', $data);
			
		}elseif ($TOKEN==='edit' && is_numeric($ID)) {
			$this->breadcrumbs->push('<i class="menu-icon fa fa-pencil"></i> Edit', '/edit');
			$validation = $this->form_validation;
        	$validation->set_rules($this->rule_pegawai());
        	if ($validation->run()) {
            	if($this->m_master->query_updatepegawai() === true){
            		$this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data '.$this->input->post('nama_jabatan').' berhasil disimpan'));
					$red = base_url("master/pegawai/");
					header("refresh:4; url=$red"); 
				}else{
            		$this->session->set_flashdata('msg', $this->MSG('danger', 'Info', 'Data '.$this->input->post('nama_jabatan').' gagal disimpan'));
				}
			}
			$data['pegawai'] = $this->m_master->pegawai($ID);
			//echo $this->db->last_query();
			$data['jabatan'] = $this->m_master->jabatan();
			$data['golongan'] = $this->m_master->golongan();
			$data['eselon'] = $this->m_master->eselon();
			$this->template->load_js('template','master/pegawai/add_pegawai', $data);
		}else{
			$data['pegawai'] = $this->m_master->pegawai();
			//echo $this->db->last_query();
			$data['eselon'] = $this->m_master->eselon();
			$this->template->load_js('template','master/pegawai/v_pegawai', $data);
		}
		
	}

	/**
	 * { function_description }
	 *
	 * @return     array  ( description_of_the_return_value )
	 */
	public function rule_jabatan()
    {
        return [
            ['field' => 'nama_jabatan',
            'label' => 'Nama Jabatan',
            'rules' => 'required'],

            ['field' => 'nominal',
            'label' => 'Uang Saku',
            'rules' => 'required'],
        ];

    }

	/**
	 * { function_description }
	 *
	 * @param      string  $TOKEN  The token
	 * @param      <type>  $ID     { parameter_description }
	 */
	function jabatan($TOKEN=null, $ID=null){
		// add breadcrumbs
		 $this->breadcrumbs->push('Jabatan', 'master/jabatan');
		$data['TOKEN'] = $TOKEN;
		$data['ID'] = $ID;

		if($TOKEN==='jabatan'){
			$data['jabatan'] = $this->m_mjabatan->jabatan($ID);
			if (!$data['jabatan']) show_404();	
			$this->template->load_js('template','master/jabatan/jabatan', $data);

		}elseif($TOKEN==='add'){
			$this->breadcrumbs->push('<i class="menu-icon fa fa-plus"></i> Add', '/add');
			$validation = $this->form_validation;
        	$validation->set_rules($this->rule_jabatan());
        	if ($validation->run()) {
            	if($this->m_mjabatan->query_simpan() === true){
            		$this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data '.$this->input->post('nama_jabatan').' berhasil disimpan'));
					$red = base_url("master/jabatan/");
					header("refresh:4; url=$red"); 
				}else{
            		$this->session->set_flashdata('msg', $this->MSG('danger', 'Info', 'Data '.$this->input->post('nama_jabatan').' gagal disimpan'));
				}
			}
        	$data['jabatan'] = $this->m_mjabatan->jabatan($ID);
        	if (!$data['jabatan']) show_404();	
			$this->template->load_js('template','master/jabatan/add_jabatan',$data);

		}elseif ($TOKEN ==='edit' && is_numeric($ID)) {
			$this->breadcrumbs->push('<i class="menu-icon fa fa-pencil"></i> Edit', '/edit');
			 //echo $TOKEN;
			 //echo $ID;
			$validation = $this->form_validation;
        	$validation->set_rules($this->rule_jabatan());
        	if ($validation->run()) {
        		$this->m_mjabatan->query_update();
				if($this->m_mjabatan->query_update() === true){
            		$this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data '.$this->input->post('nama_jabatan').' berhasil disimpan'));
					
				}else{
            		$this->session->set_flashdata('msg', $this->MSG('danger', 'Info', 'Data '.$this->input->post('nama_jabatan').' gagal disimpan'));
				}
				
			}
        	$data['jabatan'] = $this->m_mjabatan->jabatan($ID);
        	if (!$data['jabatan']) show_404();	
        	$this->template->load_js('template','master/jabatan/add_jabatan', $data);
		}else{
			$data['jabatan'] = $this->m_mjabatan->jabatan();
			if (!$data['jabatan']) show_404();	
			$this->template->load_js('template','master/jabatan/jabatan', $data);
		}
				

	}

	public function rule_golongan()
    {
        return [
            ['field' => 'nama_eselon',
            'label' => 'Nama Eselon',
            'rules' => 'required'],

            ['field' => 'nominal',
            'label' => 'Uang Saku',
            'rules' => 'required'],
        ];

    }
	/**
	 *   [foo description]
	 *   @method      foo
	 *   Meedun function
	 *   @author Meedun
	 *   @date        2019-10-17
	 *   @file        {{file}}
	 *   @anotherdate 2019-10-17T03:30:42+0700
	 *   @version     [version]
	 *   @param       String                   $txt [description]
	 *   @param       [type]                   $bol [description]
	 *   @return      [type]                        [description]
	 */
    function foo($txt,$bol){
    	return $txt_id;
    }
    /**
     *   [golongan description]
     *   @method      golongan
     *   Meedun function
     *   @author Meedun
     *   @date        2019-10-17
     *   @file        {{file}}
     *   @anotherdate 2019-10-17T03:20:52+0700
     *   @version     [version]
     *   @param       [type]                   $TOKEN [description]
     *   @param       [type]                   $ID    [description]
     *   @return      [type]                          [description]
     */
    function golongan($TOKEN=null, $ID=null){
		// add breadcrumbs
		 $this->breadcrumbs->push('Jabatan', 'master/jabatan');
		$data['TOKEN'] = $TOKEN;
		$data['ID'] = $ID;

		if($TOKEN==='golongan'){
			$data['golongan'] = $this->m_master->golongan($ID);
			if (!$data['golongan']) show_404();	
			$this->template->load_js('template','master/golongan/golongan', $data);

		}elseif($TOKEN==='add'){
			$this->breadcrumbs->push('<i class="menu-icon fa fa-plus"></i> Add', '/add');
			$validation = $this->form_validation;
        	$validation->set_rules($this->rule_jabatan());
        	if ($validation->run()) {
            	if($this->m_master->query_simpan_golongan() === true){
            		$this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data '.$this->input->post('nama_jabatan').' berhasil disimpan'));
					$red = base_url("master/golongan/");
					header("refresh:4; url=$red"); 
				}else{
            		$this->session->set_flashdata('msg', $this->MSG('danger', 'Info', 'Data '.$this->input->post('nama_jabatan').' gagal disimpan'));
				}
			}
        	$data['golongan'] = $this->m_master->golongan($ID);
        	
			if (!$data['golongan']) show_404();	
			$this->template->load_js('template','master/golongan/add_golongan',$data);

		}elseif ($TOKEN ==='edit' && is_numeric($ID)) {
			$this->breadcrumbs->push('<i class="menu-icon fa fa-pencil"></i> Edit', '/edit');
			 //echo $TOKEN;
			 //echo $ID;
			$validation = $this->form_validation;
        	$validation->set_rules($this->rule_jabatan());
        	if ($validation->run()) {
        		$this->m_mjabatan->query_update();
				if($this->m_mjabatan->query_update() === true){
            		$this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data '.$this->input->post('nama_jabatan').' berhasil disimpan'));
					
				}else{
            		$this->session->set_flashdata('msg', $this->MSG('danger', 'Info', 'Data '.$this->input->post('nama_jabatan').' gagal disimpan'));
				}
				
			}
        	$data['jabatan'] = $this->m_mjabatan->jabatan($ID);
        	if (!$data['jabatan']) show_404();	
        	$this->template->load_js('template','master/jabatan/add_jabatan', $data);
		}else{
			$data['jabatan'] = $this->m_mjabatan->jabatan();
			if (!$data['jabatan']) show_404();	
			$this->template->load_js('template','master/jabatan/jabatan', $data);
		}
				

	}

	//-----------------------------------------------------------------------------
	/// ESELON //////
	///
	/// @return     array  ( description_of_the_return_value )
	///
	public function rule_eselon()
    {
        return [
            ['field' => 'nama_eselon',
            'label' => 'Nama Eselon',
            'rules' => 'required'],

            ['field' => 'nominal',
            'label' => 'Uang Saku',
            'rules' => 'required'],
        ];

    }
    	function eselon($TOKEN=null, $ID=null){
		// add breadcrumbs
		 $this->breadcrumbs->push('Jabatan', 'master/jabatan');
		$data['TOKEN'] = $TOKEN;
		$data['ID'] = $ID;

		if($TOKEN==='jabatan'){
			$data['jabatan'] = $this->m_mjabatan->jabatan($ID);
			if (!$data['jabatan']) show_404();	
			$this->template->load_js('template','master/jabatan/jabatan', $data);

		}elseif($TOKEN==='add'){
			$this->breadcrumbs->push('<i class="menu-icon fa fa-plus"></i> Add', '/add');
			$validation = $this->form_validation;
        	$validation->set_rules($this->rule_jabatan());
        	if ($validation->run()) {
            	if($this->m_mjabatan->query_simpan() === true){
            		$this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data '.$this->input->post('nama_jabatan').' berhasil disimpan'));
					$red = base_url("master/jabatan/");
					header("refresh:4; url=$red"); 
				}else{
            		$this->session->set_flashdata('msg', $this->MSG('danger', 'Info', 'Data '.$this->input->post('nama_jabatan').' gagal disimpan'));
				}
			}
        	$data['jabatan'] = $this->m_mjabatan->jabatan($ID);
        	if (!$data['jabatan']) show_404();	
			$this->template->load_js('template','master/jabatan/add_jabatan',$data);

		}elseif ($TOKEN ==='edit' && is_numeric($ID)) {
			$this->breadcrumbs->push('<i class="menu-icon fa fa-pencil"></i> Edit', '/edit');
			 //echo $TOKEN;
			 //echo $ID;
			$validation = $this->form_validation;
        	$validation->set_rules($this->rule_jabatan());
        	if ($validation->run()) {
        		$this->m_mjabatan->query_update();
				if($this->m_mjabatan->query_update() === true){
            		$this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data '.$this->input->post('nama_jabatan').' berhasil disimpan'));
					
				}else{
            		$this->session->set_flashdata('msg', $this->MSG('danger', 'Info', 'Data '.$this->input->post('nama_jabatan').' gagal disimpan'));
				}
				
			}
        	$data['jabatan'] = $this->m_mjabatan->jabatan($ID);
        	if (!$data['jabatan']) show_404();	
        	$this->template->load_js('template','master/jabatan/add_jabatan', $data);
		}else{
			$data['jabatan'] = $this->m_mjabatan->jabatan();
			if (!$data['jabatan']) show_404();	
			$this->template->load_js('template','master/jabatan/jabatan', $data);
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

	/**
	 * { function_description }
	 *
	 * @param      <type>  $id     The identifier
	 */
	public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->m_mjabatan->delete($id)) {
            redirect(site_url('master/jabatan'));
        }
    }
    /**
     * { function_description }
     *
     * @param      <type>  $id     The identifier
     */
    public function delete_pegawai($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->m_master->delete_pegawai($id)) {
            redirect(site_url('master/pegawai'));
        }
    }

//------------------------------------------------------------------------------
/// TRANSPORT TASI
/// /////////////////////////////////////////////////////////////////////////////
///
/// @return     array  ( description_of_the_return_value )
///
	public function rule_transportasi()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama Transportasi',
            'rules' => 'required'],

            ['field' => 'nomor',
            'label' => 'Nomor Transportasi',
            'rules' => 'required'],

             ['field' => 'jenis',
            'label' => 'Jenis Transportasi',
            'rules' => 'required'],

             ['field' => 'jenis',
            'label' => 'Jenis Transportasi',
            'rules' => 'required'],

            ['field' => 'roda',
            'label' => 'Roda Transportasi',
            'rules' => 'required|is_natural'],

             ['field' => 'cc',
            'label' => 'Volume Sentimeter Kubik (CC) Transportasi',
            'rules' => 'required|is_natural'],
             array('rule2' => 'Error Message on rule2 for this field_name')
        ];
    }    
/**
 * { function_description }
 *
 * @param      string  $TOKEN  The token
 * @param      <type>  $ID     { parameter_description }
 */
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
	/**
	 * { function_description }
	 *
	 * @param      <type>  $id     The identifier
	 */
	public function delete_trans($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->m_transport->delete($id)) {
            redirect(site_url('master/transportasi'));
        }
    }





}