<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fincas extends CI_Controller {

    public $data;
    public function __construct(){
        
        parent::__construct();
        $this->load->model("Menu_Models");
        $this->load->model("Fincas/Fincas_Model");
        $this->load->model("Departamentos_Model");
        $this->load->model("Municipios_Model");
       
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
    }

    public function lista() {
        $data = array(
            'fincas' => $this->Fincas_Model->consultarGeneral(), 
        );
        $this->cargarLayaout('admin/fincas/list',$data);
    }
    public function ver($id) {
        $finca = $this->Fincas_Model->consultarIndividual($id);
        echo "
        <p><strong>Nombre: </strong>$finca->nombreFinca</p>
        <p><strong>Ubicación: </strong>$finca->ubicacion</p>
        <p><strong>Latitud: </strong>$finca->latitud</p>
        <p><strong>Longitud: </strong>$finca->longitud</p>
        <p><strong>Municipio: </strong>$finca->DESCRIPCION</p>
        ";
        if($finca->estado == 1) {
            echo "<p><strong>Estado: </strong><span class='label-success'>Activa</span>";
        } else {
            echo "<p><strong>Estado: </strong><span class='label-danger'>Inactiva</span>";
        }
    }

    public function info($id) {
        $data = array(
            'finca' => $this->Fincas_Model->detailedInfo($id)
        );
        $this->cargarLayaout("admin/fincas/info", $data);
    }

    public function activar($id) {
        $data  = array(
            'estado' => "1", 
        );
        $this->Fincas_Model->update($id,$data);
        $data = array(
            'finca' => $this->Fincas_Model->consultarIndividual($id)
        );
        $this->load->view("admin/fincas/view",$data);
    }

    public function desactivar($id) {
        $data  = array(
            'estado' => "0", 
        );
        $this->Fincas_Model->update($id,$data);
        $data = array(
            'finca' => $this->Fincas_Model->consultarIndividual($id)
        );
        $this->load->view("admin/fincas/view",$data);
    }

    public function modificar($id) {
        $data = array(
            'finca' => $this->Fincas_Model->consultarIndividual($id),
            'departamentos' => $this->Departamentos_Model->consultarGeneral()
        );
        $this->cargarLayaout("admin/fincas/edit", $data);
    }

 

    public function nuevo() {
        $data = array(
            'departamentos' => $this->Departamentos_Model->consultarGeneral()
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