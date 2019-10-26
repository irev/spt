<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->model(['m_login']);
		$this->load->library(['session']);
		$this->load->helper(['url']);
	}

	public function index()
	{
	if($this->session->userdata("username") ===TRUE){
		// with 301 redirect
		redirect('dashboard', 'location');
	}
	$this->load->view('login/v_login');
	}
	/**
	 *   [login_action description]
	 *   @method      login_action
	 *   @author Meedun
	 *   @date        2019-10-19
	 *   @file        file_name()
	 *   @anotherdate 2019-10-19T18:18:47+0700
	 *   @version     [version]
	 *   @return      [type]     [description]
	 */
	function login_action(){
			 $name = $this->input->post('name');
			 $pwd  = $this->input->post('pwd');
		   	$data['username']=htmlspecialchars($name);  
    		$data['password']=htmlspecialchars($pwd);  
    		$res=$this->m_login->islogin($data);  
		    if($res){    
		        //$this->session->set_userdata('id',$data['username']);
				$newdata = array(
					'level'   => '1',
					'username'   => $name,
					'perusahaan' => '1',
					'Addresses' => $_SERVER['REMOTE_ADDR'], 
					'TA'		=> "2019",
					'email'      => 'meedun@simeedun.com',
			        'logged_in' => TRUE
				);
				
				$this->session->set_userdata($newdata);
				echo base_url()."dashboard/"; 
				$this->session->userdata("username");
		    }  
		    else{  
		       echo 0;  
		    } 
		     $this->db->last_query();
		     $this->input->post('name');  
	}  
	/**
	 *   [logout description]
	 *   @method      logout
	 *   @author Meedun
	 *   @date        2019-10-19
	 *   @file        file_name()
	 *   @anotherdate 2019-10-19T18:19:00+0700
	 *   @version     [version]
	 *   @return      [type]                   [description]
	 */
	public function logout(){  
    	$this->session->sess_destroy();  
    	header('location:'.base_url()."login/".$this->index());  
      }

      function login_test(){
      	echo local_to_gmt(time());
      	$now = time();
		echo $human = unix_to_human($now);
		echo $unix = human_to_unix($human);


$timestamp = time();
$timezone  = 'UTC +7:00';
$daylight_saving = TRUE;
echo '<br>'.unix_to_human(gmt_to_local($timestamp, $timezone, $daylight_saving)).'</br>';


      	$name = 'user';
      		$newdata = array(
					'level'     => '1',//1. admin 2. operator 
					'username'  => $name,
					'Addresses' => $_SERVER['REMOTE_ADDR'], 
					'TA'        => "2019",
					'email'     => 'meedun@simeedun.com',
					'date_login'=> date('Y-d-m H:m:s'),
					'logged_in' => TRUE
				);
				
				$this->session->set_userdata($newdata);
				print_r($this->session->userdata());
      }


}
