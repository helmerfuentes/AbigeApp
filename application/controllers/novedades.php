<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class novedades extends CI_Controller {
    
    public function __construct(){

        parent::__construct();
        $this->load->model('Dispositivo/mantenimientoModels');
        $this->load->model("Menu_Models");
    }

    public function lista(){
        if($this->session->userdata('rol')=="SYSTEM1" || $this->session->userdata('rol')=="SYSTEM2"){
            $mantenimiento=array(
                'mantenimiento'=>$this->mantenimientoModels->getListado(),
            );
            
       }else{
            
        }
       
            $this->cargarLayaout('admin/dispositivos/novedades',$mantenimiento);

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
