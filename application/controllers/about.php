<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

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
	}	

/**
 * { function_description }
 */
function index(){
	$this->breadcrumbs->push('About', '/About');
	$this->template->load('template_load','readme');
}

/**
 * { function_description }
 */
function readme(){
	$this->breadcrumbs->push('About', '/About');
	$this->breadcrumbs->push('ReadMe', '/About/ReadMe');
	$this->template->load('template_load','readme');
	//$contents = file_get_contents('README.md');
	//echo $this->parsedown->text($contents);
}



}
