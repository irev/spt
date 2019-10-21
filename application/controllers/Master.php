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
		$this->load->model(['m_mjabatan','m_transport','m_eselon','m_tujuan','m_kegiatan']);
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

            ['field' => 'eselon',
            'label' => 'Eselon',
            'rules' => 'required'],

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

		$data['TOKEN'] = $TOKEN;
		$data['ID'] = $ID;
		$data['eselon'] = $this->m_master->eselon();
		$data['jabatan'] = $this->m_master->jabatan();
		$data['golongan'] = $this->m_master->golongan();
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
	/**
	 *   [rule_tujuan description]
	 *   @method      rule_tujuan
	 *   @author Meedun
	 *   @date        2019-10-21
	 *   @file        file_name()
	 *   @anotherdate 2019-10-21T15:33:42+0700
	 *   @version     [version]
	 *   @return      [type]                   [description]
	 */
	public function rule_tujuan()
    {
        return [
            ['field' => 'tujuan',
            'label' => 'Nama Tujuan',
            'rules' => 'required'],

            ['field' => 'prov',
            'label' => 'Provinsi',
            'rules' => 'required'],

            ['field' => 'kab',
            'label' => 'Kabupaten',
            'rules' => 'required'],

            ['field' => 'kec',
            'label' => 'Kecamatan',
            'rules' => 'required'],

            ['field' => 'perjalanan',
            'label' => 'Perjalanan',
            'rules' => 'required'],
        ];

    }
    	/**
    	 *   [tujuan description]
    	 *   @method      tujuan
    	 *   @author Meedun
    	 *   @date        2019-10-21
    	 *   @file        file_name()
    	 *   @anotherdate 2019-10-21T15:33:35+0700
    	 *   @version     [version]
    	 *   @param       [type]                   $TOKEN [description]
    	 *   @param       [type]                   $ID    [description]
    	 *   @return      [type]                          [description]
    	 */
    	function tujuan($TOKEN=null, $ID=null){
		// add breadcrumbs
		 $this->breadcrumbs->push('Tujuan', 'master/tujuan');
		$data['TOKEN'] = $TOKEN;
		$data['ID'] = $ID;
		$data['provinsi'] = $this->m_master->prov();
		if($TOKEN==='tujuan'){
			$data['tujuan'] = $this->m_tujuan->tujuan($ID);
			if (!$data['tujuan']) show_404();	
			$this->template->load('template_load','master/tujuan/tujuan', $data);

		}elseif($TOKEN==='add'){
			$this->breadcrumbs->push('<i class="menu-icon fa fa-plus"></i> Add', '/add');
			$validation = $this->form_validation;
        	$validation->set_rules($this->rule_tujuan());
        	if ($validation->run()) {
            	if($this->m_tujuan->query_simpan() === true){
            		$this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data '.$this->input->post('nama_eselon').' berhasil disimpan'));
					$red = base_url("master/tujuan/");
					header("refresh:4; url=$red"); 
				}else{
            		$this->session->set_flashdata('msg', $this->MSG('danger', 'Info', 'Data '.$this->input->post('nama_jabatan').' gagal disimpan'));
				}
			}
        	$data['tujuan'] = $this->m_mjabatan->jabatan($ID);
        	if (!$data['tujuan']) show_404();	
			$this->template->load('template_load','master/tujuan/add_tujuan',$data);

		}elseif ($TOKEN ==='edit' && is_numeric($ID)) {
			$this->breadcrumbs->push('<i class="menu-icon fa fa-pencil"></i> Edit', '/edit');
			 //echo $TOKEN;
			 //echo $ID;
			$validation = $this->form_validation;
        	$validation->set_rules($this->rule_eselon());
        	if ($validation->run()) {
        		$this->m_mjabatan->query_update();
				if($this->m_mjabatan->query_update() === true){
            		$this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data '.$this->input->post('nama_jabatan').' berhasil disimpan'));
					
				}else{
            		$this->session->set_flashdata('msg', $this->MSG('danger', 'Info', 'Data '.$this->input->post('nama_jabatan').' gagal disimpan'));
				}
				
			}
        	$data['tujuan'] = $this->m_tujuan->tujuan($ID);
        	if (!$data['tujuan']) show_404();	
        	$this->template->load('template_load','master/tujuan/add_tujuan', $data);
		}else{
			$data['tujuan'] = $this->m_tujuan->tujuan();
			if (!$data['tujuan']) show_404();	
			$this->template->load('template_load','master/tujuan/tujuan', $data);
		}
	}


	public function listkab(){
			$post  = $this->input->post();
			$id    = $post["id"];
			$field = $post["key"];
			echo '<option value=""></option>';
			foreach ($this->m_master->provKab($id) as $val) {
				//echo $val;
				echo '<option value="'.$val['idkab'].'">'.$val['idkab'].') '.$val['kabupaten'].'</option>';
			}
	}
	public function listkec(){
			$post  = $this->input->post();
			$id    = $post["id"];
			$field = $post["key"];
			echo '<option value=""></option>';
			foreach ($this->m_master->kabKec($id) as $val) {
				//echo $val;
				echo '<option value="'.$val['idkec'].'">'.$val['idkec'].') '.$val['kecamatan'].'</option>';
			}
	}
	




	/**
	 * function rule eselon
	 * @return [type]
	 */
	public function rule_eselon()
    {
        return [
            ['field' => 'nama_eselon',
            'label' => 'Nama Eselon',
            'rules' => 'required'],

            ['field' => 'uang_harian_eselon',
            'label' => 'Uang Saku',
            'rules' => 'required'],
        ];

    }
    	/**
    	 *   [eselon description]
    	 *   @method      eselon
    	 *   @author Meedun
    	 *   @date        2019-10-17
    	 *   @file        file_name()
    	 *   @anotherdate 2019-10-17T12:19:11+0700
    	 *   @version     [version]
    	 *   @param       [type]                   $TOKEN [description]
    	 *   @param       [type]                   $ID    [description]
    	 *   @return      [type]                          [description]
    	 */
    	function eselon($TOKEN=null, $ID=null){
		// add breadcrumbs
		 $this->breadcrumbs->push('Eselon', 'master/eselon');
		$data['TOKEN'] = $TOKEN;
		$data['ID'] = $ID;

		if($TOKEN==='eselon'){
			$data['eselon'] = $this->m_eselon->eselon($ID);
			if (!$data['eselon']) show_404();	
			$this->template->load('template_load','master/eselon/eselon', $data);

		}elseif($TOKEN==='add'){
			$this->breadcrumbs->push('<i class="menu-icon fa fa-plus"></i> Add', '/add');
			$validation = $this->form_validation;
        	$validation->set_rules($this->rule_eselon());
        	if ($validation->run()) {
            	if($this->m_eselon->query_simpan() === true){
            		$this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data '.$this->input->post('nama_eselon').' berhasil disimpan'));
					$red = base_url("master/eselon/");
					header("refresh:4; url=$red"); 
				}else{
            		$this->session->set_flashdata('msg', $this->MSG('danger', 'Info', 'Data '.$this->input->post('nama_jabatan').' gagal disimpan'));
				}
			}
        	$data['eselon'] = $this->m_mjabatan->jabatan($ID);
        	if (!$data['eselon']) show_404();	
			$this->template->load('template_load','master/eselon/add_eselon',$data);

		}elseif ($TOKEN ==='edit' && is_numeric($ID)) {
			$this->breadcrumbs->push('<i class="menu-icon fa fa-pencil"></i> Edit', '/edit');
			 //echo $TOKEN;
			 //echo $ID;
			$validation = $this->form_validation;
        	$validation->set_rules($this->rule_eselon());
        	if ($validation->run()) {
        		$this->m_mjabatan->query_update();
				if($this->m_mjabatan->query_update() === true){
            		$this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data '.$this->input->post('nama_jabatan').' berhasil disimpan'));
					
				}else{
            		$this->session->set_flashdata('msg', $this->MSG('danger', 'Info', 'Data '.$this->input->post('nama_jabatan').' gagal disimpan'));
				}
				
			}
        	$data['eselon'] = $this->m_eselon->eselon($ID);
        	if (!$data['eselon']) show_404();	
        	$this->template->load('template_load','master/eselon/add_eselon', $data);
		}else{
			$data['eselon'] = $this->m_eselon->eselon();
			if (!$data['eselon']) show_404();	
			$this->template->load('template_load','master/eselon/eselon', $data);
		}
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
/**
             ['field' => 'cc',
            'label' => 'Volume Sentimeter Kubik (CC) Transportasi',
            'rules' => 'required|is_natural'],

            ['field' => 'wil1',
            'label' => 'wil1',
            'rules' => 'required|is_natural'],

            ['field' => 'wil2',
            'label' => 'wil2',
            'rules' => 'required|is_natural'],

            ['field' => 'wil3',
            'label' => 'wil3',
            'rules' => 'required|is_natural'],

            ['field' => 'wil4',
            'label' => 'wil4',
            'rules' => 'required|is_natural'],
            */

            ['field' => 'addbbmwil1',
            'label' => 'BBM wilayah 1 @(liter)',
            'rules' => 'required|is_natural'],

            ['field' => 'addbbmwil2',
            'label' => 'BBM wilayah 2 @(liter)',
            'rules' => 'required|is_natural'],

            ['field' => 'addbbmwil3',
            'label' => 'BBM wilayah 3 @(liter)',
            'rules' => 'required|is_natural'],

            ['field' => 'addbbmwil4',
            'label' => 'BBM Luar Daerah @(liter)',
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
	$this->breadcrumbs->push('Transportasi', 'master/transportasi');
		$data['TOKEN'] = $TOKEN;
		$data['ID'] = $ID;

		if($TOKEN==='transportasi'){
			$data['transportasi'] = $this->m_mjabatan->jabatan($ID);
			if (!$data['transportasi']) show_404();	
			$this->template->load_js('template','master/transportasi/transportasi', $data);

		}elseif($TOKEN==='add'){
			$this->breadcrumbs->push('Add', 'master/add');
			//FORM ADD / TAMBAH 
			$validation = $this->form_validation;
        	$validation->set_rules($this->rule_transportasi());
        	if ($validation->run()) {
            	if($this->m_transport->query_simpan() === true){
            		//echo $this->db->last_query();
            		$this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data Transportasi <b>'.$this->input->post('nama').'/b> berhasil disimpan'));
					$red = base_url("master/transportasi/");
					header("refresh:4; url=$red"); 
				}else{
            		$this->session->set_flashdata('msg', $this->MSG('danger', 'Info', 'Data Transportasi <b>'.$this->input->post('nama').'</b> gagal disimpan'));
				}
			}
        	$data['transportasi'] = $this->m_mjabatan->jabatan($ID);
        	if (!$data['transportasi']) show_404();	
        	
			$this->template->load_js('template','master/transportasi/add_transportasi',$data);

		}elseif ($TOKEN ==='edit' && is_numeric($ID)) {
			$this->breadcrumbs->push('Edit', 'master/edit');
			 //FORM EDIT
			 //echo $TOKEN;
			 //echo $ID;
			$validation = $this->form_validation;
        	$validation->set_rules($this->rule_transportasi());
        	if ($validation->run()) {
        		$this->m_transport->query_update();
				if($this->m_transport->query_update() === true){
					//echo $this->db->last_query();
            		$this->session->set_flashdata('msg', $this->MSG('success', 'Info', 'Data Transportasi <b>'.$this->input->post('nama').'</b> berhasil ubah'));
					$red = base_url("master/transportasi/");
					header("refresh:4; url=$red");
				}else{
            		$this->session->set_flashdata('msg', $this->MSG('danger', 'Info', 'Data Transportasi <b>'.$this->input->post('nama').'</b> gagal ubah'));
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
    public function delete_eselon($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->m_eselon->delete($id)) {
            redirect(site_url('master/eselon'));
        }
    }
    public function delete_kegiatan($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->m_kegiatan->delete($id)) {
        	$this->session->set_flashdata('msg', $this->MSG('danger', 'Info', 'Data berhasil dihapus!'));
            redirect(site_url('master/kegiatan'));

        }
    }





}