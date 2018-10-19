<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct(){

        parent::__construct();
         $this->load->model("Menu_Models");
         $this->load->model("Finca/FincaModels");
         $this->load->model('Usuarios/Usuarios_Model');
    }

public function nuevo(){
    $data = array(
        'fincas' => $this->FincaModels-> noAsifgnada(), 
    );
   
$this->cargarLayaout("admin/usuarios/nuevo", $data);

}

public function Guardar(){
    $iden=$this->input->post("identificacion");
    $nombres=$this->input->post("nombres");
    $apellidos=explode(" ",$this->input->post("apellidos"));
    $emai=$this->input->post("email");
    $direcc=$this->input->post("direccion");
    $telefono=$this->input->post("telefono");
    $idfinca=$this->input->post("finca");

    $data=array(
        'idfinca'=>$idfinca,
        'nombres'=>$nombres,
        'primerApellido'=>$apellidos[0],
        'identificacion'=>$iden,
        'rol'=>"DUEÑO",
        'email'=>$emai,
        'telefono'=>$telefono,
        'clave'=>$iden,
        'direccion'=>$direcc,
        'estado'=>"A",
        'segundoApellido'=>$apellidos[1],
        'imagen'=>"default.png"
    );
    
    
   echo $this->Usuarios_Model->guardar($data,"usuarios");
}



public function lista(){
    $this->cargarLayaout("admin/usuarios/lista", "");
}

public function cargarLayaout($vista,$datoEnviar){
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