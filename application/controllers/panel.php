<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

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


public function index()
    {
        $this->load->model('m_backup');
        $data['tabel'] = $this->m_backup->tampiltabel(); //AMBIL DATA TABEL-TABEL
        //$this->load->view('db_backup',$data);
        $this->template->load('template_load','db_backup',$data);
    }

public function backup()
    {
      $tabel = $this->input->post('tabel');
      $this->load->dbutil();
      $prefs = array(    
              'tables'      => array($tabel),
                    'format'      => 'zip',            
                    'filename'    => 'my_db_backup.sql'
                  );
      $backup =& $this->dbutil->backup($prefs);
      $db_name = 'backup-on-'. $tabel . '-' . date("d-m-Y") .'.zip'; //NAMAFILENYA
      $save = 'pathtobkfolder/'.$db_name;
      $this->load->helper('file');
      write_file($save, $backup);
      $this->load->helper('download');
      force_download($db_name, $backup);
    }

public function restore()   
    {
        $this->load->helper('file');
        $this->load->model('m_backup');
        $config['upload_path']="./assets/database/";
        $config['allowed_types']="jpg|png|gif|jpeg|bmp|sql|x-sql";
        $this->load->library('upload',$config);
        $this->upload->initialize($config);

        if(!$this->upload->do_upload("datafile")){
         $error = array('error' => $this->upload->display_errors());
         echo "GAGAL UPLOAD";
         var_dump($error);
         exit();
        }

        $file = $this->upload->data();  //DIUPLOAD DULU KE DIREKTORI assets/database/
        $fotoupload=$file['file_name'];
                   
          $isi_file = file_get_contents('./assets/database/' . $fotoupload); //PANGGIL FILE YANG TERUPLOAD
          $string_query = rtrim( $isi_file, "\n;" );
          $array_query = explode(";", $string_query);   //JALANKAN QUERY MERESTORE KEDATABASE
              foreach($array_query as $query)
              {
                    $this->db->query($query);
              }

          $path_to_file = './assets/database/' . $fotoupload;
            if(unlink($path_to_file)) {   // HAPUS FILE YANG TERUPLOAD
                 redirect('panel/setting');
            }
            else {
                 echo 'errors occured';
            }
       
    }


}