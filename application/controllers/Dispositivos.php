<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dispositivos extends CI_Controller {

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



    public function eliminar(){
        $id=$this->input->post('idDisp');
        
         echo $this->DispositivosModels->eliminarmodels($id);

    }

    public function info(){
        
        $id=$this->input->post('idDisp');
        $opcion=$this->input->post('opcion');
       

        $respuesta=array(
            'dis'=>$this->DispositivosModels->inforDispositivoModels($id),
        );

          

        if($opcion==1)
        $this->load->view('admin/mviews',$respuesta);
        else if ($opcion==2)
        $this->load->view('admin/mUpdateDispositivo',$respuesta);
        else{
            
        }
        

    }

    public function actualizar(){
        
        $param['idDisposotivo'] = $this->input->post('dispositivo');
        $param['idAnimal']= $this->input->post('animal');
        $param['estado']=$this->input->post('esta');
        $param['bateria']=$this->input->post('bate');

        
        
       echo  $this->DispositivosModels->actualizarModels($param);
      

    }
    

    public function guardar(){
        $codigo=$this->input->post("codigoDispositivo");
        $finca=$this->input->post("finca");
        $codigoanimal=$this->input->post("codigoAnimal");

        $data=array(
            'iddispositivo'=>$codigo,
            'idperimetro'=>$finca,
            'IdAnimal'=>$codigoanimal,
        );

        if($this->DispositivosModels->addDispositivo($data,"dispositivos")){
            redirect(base_url()."dispositivos/nuevo");
        }else{
            $this->session->set_flashdata("Error","No se pudo Registrar Información");
            redirect(base_url()."dispositivos/nuevo");
        }

    }

    public function nuevo(){
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

    public function lista() {
        if($this->session->userdata('rol')=="SYSTEM1" || $this->session->userdata('rol')=="SYSTEM2"){
        $dispositivos=$this->DispositivosModels->getListadoDispositivoCompleto();
       
            
        $activos=0;
        $inactivo=0;
        $dentro=0;
            if($dispositivos){
        foreach ($dispositivos as  $value) {
            if($value->estado=="Activo"){
                $activos=$activos+1;
                if($value->ubicacion=="Dentro" || $value->ubicacion==""){
                    $dentro=$dentro+1; 
                 }
            }else{
                $inactivo=$inactivo+1;
            }    

        }

        }
        
        $dispo=array(
            'dispositivos'=>$dispositivos,
            'dActivos'=>$activos,
            'dInactivos'=>$inactivo,
            'dDentro'=>$dentro,
            'dTotal'=>$activos+$inactivo
        );

       

        $this->cargarLayaout('admin/ConsultaDispositivoSystem',$dispo);
        }else {
            $this->cargarLayaout('admin/ConsultaDispositivoSystem',$dispo);
        }
       
    }
    
}