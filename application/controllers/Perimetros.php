<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perimetro extends CI_Controller {

    public $data;
    public function __construct(){
        
        parent::__construct();
        
        $this->load->model("Perimetros/Perimetros_Model");
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
   
    }

    public function index() {
        var_dump($this->Perimetros_Model->consultaCoordenadas(1));
    }
}