<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perimetros extends CI_Controller {

    public $data;
    public function __construct(){
        
        parent::__construct();
        
        $this->load->model("Perimetros/Perimetros_Model");
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
   
    }

    public function index() {
        echo($this->Perimetros_Model->consultaCoordenadas(1));
    }

    public function data($idFinca) {
        header("Content-type: text/xml");
        // Start XML file, echo parent node
        echo '<markers>';
        // Iterate through the rows, adding XML nodes for each
        foreach ($consulta as $row) {
            echo '<marker ';
            echo 'name="' . $row['idcoordenada'] . '" ';
            echo 'address="' . $row['idperimetro'] . '" ';
            echo 'lat="' . $row['latitud'] . '" ';
            echo 'lng="' . $row['longitud'] . '" ';
            echo '/>';
        }
        // End XML file
        echo '</markers>';
    }

}