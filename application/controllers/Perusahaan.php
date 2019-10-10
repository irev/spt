<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends CI_Controller {

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
		$this->load->database();
		//$this->load->helper(['url','tanggal','tanggal_id','terbilang']);
	}

	public function index($ID_PERUSAHAAN=null)
	{
		$newdata = array(

		'idclient'   => '1',
		'username'   => 'user',
		//'perusahaan' => '1',
		'paket' => '1',
		'email'      => 'johndoe@some-site.com',
        'logged_in' => TRUE
		);

		$this->session->set_userdata($newdata);
		if($ID_PERUSAHAAN==null){
			$data['client'] = $this->m_dataload->id_client(1); //session client login
			$data['perusahaan_client'] = $this->m_dataload->perusahaan_client(1);
			
			$this->load->view('theme/HEAD');
			$this->load->view('login/perusahaan',$data);
			$this->load->view('theme/FOOTER');
		}else{
			$data['client'] = $this->m_dataload->id_client(1);
			//$data['perusahaan_client'] = $this->m_dataload->perusahaan_client(1);
			$data['perusahaan_client'] = $this->m_dataload->id_perusahaan_client(1,$ID_PERUSAHAAN); // id_perusahaan_client($idclient=null, $ID_CLIENT=null)
			
			$this->load->view('theme/HEAD');
			$this->load->view('login/perusahaan',$data);
			$this->load->view('theme/FOOTER');
		}


	}

	public function paket($ID_PERUSAHAAN=null)
	{
		$newdata = array(

		'idclient'   => '1',
		'username'   => 'user',
		'perusahaan' => '1',
		'paket' => '1',
		'email'      => 'johndoe@some-site.com',
        'logged_in' => TRUE
		);

		$this->session->set_userdata($newdata);
	    //Perusahaan ---> Kontrak ----> BAP ---- > 
        //$data['kontrak'] = $this->m_perusahaan->kontrak();
        //$data['paket'] = $this->m_perusahaan->paket();
        $data['perusahaan'] = $this->m_perusahaan->perusahaan($ID_PERUSAHAAN);
        $data['data_paket'] = $this->m_perusahaan->paket($ID_PERUSAHAAN);
        

		$this->template->load_js('template','perusahaan/paket/v_paket', $data);
	}
	public function inputpaket($ID=null)
	{
		$newdata = array(

		'idclient'   => '1',
		'username'   => 'user',
		'perusahaan' => '1',
		'paket' => '1',
		'email'      => 'johndoe@some-site.com',
        'logged_in' => TRUE
		);

		$this->session->set_userdata($newdata);
	//Perusahaan ---> Kontrak ----> BAP ---- > 
        $data['kontrak'] = $this->m_perusahaan->kontrak();
        $data['paket'] = $this->m_perusahaan->paket();
        $data['perusahaan'] = $this->m_perusahaan->perusahaan();

		$this->template->load_js('template','perusahaan/paket/f_paket', $data);
	}
	

	public function inputkontrak($ID=null)
	{
		$newdata = array(

		'idclient'   => '1',
		'username'   => 'user',
		'perusahaan' => '1',
		'paket' => '1',
		'email'      => 'johndoe@some-site.com',
        'logged_in' => TRUE
		);

		$this->session->set_userdata($newdata);
	//Perusahaan ---> Kontrak ----> BAP ---- > 
        $data['kontrak'] = $this->m_perusahaan->kontrak();
        $data['paket'] = $this->m_perusahaan->paket();
        $data['perusahaan'] = $this->m_perusahaan->perusahaan();

		$this->template->load_js('template','perusahaan/f_kontrak', $data);
	}

	public function act_kontrak($ID=null)
	{
		
	}

 


	public function kontrak($ID_PERUSAHAAN=null)
	{
		$newdata = array(

		'idclient'   => '1',
		'username'   => 'user',
		'perusahaan' => '1',
		'paket' => '1',
		'email'      => 'johndoe@some-site.com',
        'logged_in' => TRUE
		);

		$this->session->set_userdata($newdata);
	//Perusahaan ---> Kontrak ----> BAP ---- > 
        $data['kontrak'] = $this->m_perusahaan->kontrak($ID_PERUSAHAAN);
        $data['paket'] = $this->m_perusahaan->paket();
        $data['perusahaan'] = $this->m_perusahaan->perusahaan($ID_PERUSAHAAN);

		$this->template->load_js('template','perusahaan/v_kontrak', $data);

	}
	



	public function profile($ID=null)
	{
		echo "disini perofile perusahaan, tampilkan : <br>1. kontrak yang di miliki perusahan<br> 2. BAP yang telah dibuat perusahaan";
		echo "
			<p>Tabel Kontrak</p>
			<table border='1' width='100%' >
				<tr><td>1</td><td>2</td><td>3</td></tr>
			</table>
		";
				echo "
			<p>Tabel BAP</p>
			<table border='1' width='100%'>
				<tr><td>1</td><td>2</td><td>3</td></tr>
			</table>
		";
		//$this->template->load_js('template','bap/v_bap');

	}

	public function bap()
	{
		$this->template->load_js('template','bap/v_bap');

	}
}
