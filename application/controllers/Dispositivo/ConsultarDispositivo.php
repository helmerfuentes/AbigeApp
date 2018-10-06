<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConsultarDispositivo extends CI_Controller {

    public $data;
    public function __construct(){

        parent::__construct();
        $this->load->model("Menu_Models");
        $this->load->model('Dispositivo/DispositivosModels');
        //$this->load->model('Dispositivo/DispositivosModels');
       
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
   
    }


	public function index()
	{

        $rol=$this->session->userdata('rol');
        $menu=$this->Menu_Models->opcionesMenuPrincipal($rol);
        $submenu=$this->Menu_Models->opcionesSubMenu($rol);
        $data['menu']=$menu;
        $data["submenu"]=$submenu;

        $dispo=array(
            'dispositivos'=>$this->DispositivosModels->getListadoDispositivoCompleto(),

        );

        print_r($this->data);
     $this->load->view('layouts/Backend/header'); 
     $this->load->view("layouts/Backend/aside",$data);
     if($this->session->userdata("rol")=="SYSTEM1" || $this->session->userdata("rol")=="SYSTEM2"){
        $this->load->view('admin/ConsultaDispositivoSystem',$dispo);
     }elseif ($this->session->userdata("rol")=="DUEÑO"){
        $this->load->view('admin/ConsultaDispositivoSystem',$dispo);
     }else {
        $this->load->view('admin/ConsultaDispositivoSystem',$dispo);
     }
     
     $this->load->view('layouts/Backend/footer');
	}
}