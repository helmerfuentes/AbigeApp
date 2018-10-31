<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class novedades extends CI_Controller {
    
    public function __construct(){

        parent::__construct();
        $this->load->model('Dispositivo/novedadesmodels');
        $this->load->model("Menu_Models");
    }

    public function lista(){
        if($this->session->userdata('rol')=="SYSTEM1" || $this->session->userdata('rol')=="SYSTEM2"){
            
            $novedades=$this->novedadesmodels->getListadoGeneral();
                $localizacion=0;
                $collar=0;
                $hoy=0;
                $total=0;
                foreach ($novedades as $value) {
                   
                        $total++;
                    

                    if($value->novedad=="perimetro")
                        $localizacion++;
                    if ($value->novedad=="senal") 
                        $collar++;
                    if(date("d-m-Y",strtotime($value->fecha))==date("d-m-Y")) $hoy++;
                }



            $data=array(
                'novedades'=>$novedades,
                'localizacion'=>$localizacion,
                'collar'=>$collar,
                'hoy'=>$hoy,
                'total'=>$total
            );
            
       }else{
            
        }
       
            $this->cargarLayaout('admin/dispositivos/novedades',$data);
   

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
