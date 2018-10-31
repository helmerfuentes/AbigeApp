<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

    public function __construct(){

        parent::__construct();
       
        }

        public function index()
	{
        if ($this->session->userdata("login")) {
            redirect(base_url()."Principal");
        }else{
        $this->load->view('templateIndex');
        }
    }

}