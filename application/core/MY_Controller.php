<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
// Create file application/core/MY_Controller.php
class Auth_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('logged_in'))
        { 
            redirect('login');
        }
    }
}