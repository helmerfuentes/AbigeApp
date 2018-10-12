<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fincas extends CI_Controller {

    public $data;
    public function __construct(){
        
        parent::__construct();
        $this->load->model("Menu_Models");
        $this->load->model("Fincas/Fincas_Model");
        $this->load->model("Municipios_Model");
       
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
    }

    public function lista() {
        $data = array(
            'fincas' => $this->Fincas_Model->consultarGeneral(), 
        );
        $this->cargarLayaout('admin/Fincas/list',$data);
    }

    public function activar($id) {
        $data  = array(
            'estado' => "1", 
        );
        $this->Fincas_Model->update($id,$data);
        $data = array(
            'finca' => $this->Fincas_Model->consultarIndividual($id)
        );
        $this->load->view("admin/fincas/ver",$data);
    }

    public function desactivar($id) {
        $data  = array(
            'estado' => "0", 
        );
        $this->Fincas_Model->update($id,$data);
        $data = array(
            'finca' => $this->Fincas_Model->consultarIndividual($id)
        );
        $this->load->view("admin/fincas/ver",$data);
    }

    public function nuevo() {
        $data = array(
            'municipios' => $this->Municipios_Model->consultarGeneral()
        );
        $this->cargarLayaout("admin/fincas/nueva", $data);
    }

    public function agregar() {

    }

    private function cargarLayaout($vista,$datoEnviar){
        $rol=$this->session->userdata('rol');
        $menu=$this->Menu_Models->opcionesMenuPrincipal($rol);
        $submenu=$this->Menu_Models->opcionesSubMenu($rol);
        $data['menu']=$menu;
        $data["submenu"]=$submenu;

        $this->load->view('layouts/Backend/header'); 
        $this->load->view("layouts/Backend/aside",$data);
        $this->load->view($vista,$datoEnviar);
        $this->load->view('layouts/Backend/footer');
    }
}