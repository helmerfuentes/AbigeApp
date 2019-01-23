<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Municipios extends CI_Controller {

    public $data;
    public function __construct(){
        
        parent::__construct();
        $this->load->model('Departamentos_Model');
        $this->load->model('Municipios_Model');
        //$this->load->model('Dispositivo/DispositivosModels');
       
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
   
    }

    public function data($id){
        $data = [
            'departamento' => $this->Departamentos_Model->get($id),
            'municipios' => $this->Municipios_Model->getByDpto($id)
        ];
        header('Content-Type: application/json');
        echo json_encode( $data );
    }
}