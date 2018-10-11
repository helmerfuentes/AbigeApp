<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dispositivo extends CI_Controller {

    public $data;
    public function __construct(){
        
        parent::__construct();
       
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
   
    }
}