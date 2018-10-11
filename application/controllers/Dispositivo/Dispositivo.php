<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dispositivo extends CI_Controller {

    public $data;
    public function __construct(){
        
        parent::__construct();
        $this->load->model("Menu_Models");
        $this->load->model("Finca/FincaModels");
        $this->load->model('Dispositivo/DispositivosModels');
        //$this->load->model('Dispositivo/DispositivosModels');
       
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
   
    }

    public function infoDispositivo($id){
        $data=array(
            'dis'=>$this->DispositivosModels->inforDispositivoModels($id),

        );

      
        
            $this->load->view('admin/mviews',$data);
        
        
         

    }

    public function add(){

        $codigo=$this->input->post("codigoDispositivo");
        $finca=$this->input->post("finca");
        $codigoanimal=$this->input->post("codigoAnimal");

        $data=array(
            'iddispositivo'=>$codigo,
            'idperimetro'=>$finca,
            'IdAnimal'=>$codigoanimal,
        );

        if($this->DispositivosModels->addDispositivo($data,"dispositivos")){
            redirect(base_url()."Dispositivo/Dispositivo/VistaRegistrarDispositivo");
        }else{
            $this->session->set_flashdata("Error","No se pudo Registrar Información");
            redirect(base_url()."Dispositivo/Dispositivo/VistaRegistrarDispositivo");
        }

    }

    public function VistaRegistrarDispositivo(){
        if($this->session->userdata('rol')=="SYSTEM1" || $this->session->userdata('rol')=="SYSTEM2"){
           
          $finca=array(
              'perimetro'=>$this->FincaModels->getNombreFincas(),
          );
    
            $this->cargarLayaout('admin/RegistrarDispositivo',$finca);
        }else {
            $this->cargarLayaout('admin/ConsultaDispositivoSystem',$dispo); 
        }

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

  


	public function VistaConsultar()
	{
        if($this->session->userdata('rol')=="SYSTEM1" || $this->session->userdata('rol')=="SYSTEM2"){
        $dispo=array(
            'dispositivos'=>$this->DispositivosModels->getListadoDispositivoCompleto(),
        );

        $this->cargarLayaout('admin/ConsultaDispositivoSystem',$dispo);
    }else {
        
    }
    }
    

}