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
        $this->load->view('admin/dispositivos/mviews',$respuesta);
        else if ($opcion==2)
        $this->load->view('admin/dispositivos/mUpdateDispositivo',$respuesta);
        else{
            
        }
        

    }

    public function actualizar(){
        
        $param['idDisposotivo'] = $this->input->post('mCodDispositivo');
        $param['idAnimal']= $this->input->post('animal');
        $param['estado']=$this->input->post('esta');
        $param['bateria']=$this->input->post('bate');

            $mCodDispositivo=$this->input->post('mCodDispositivo');
            

       
       

        $this->load->library(array('form_validation'));

        if($this->session->userdata('rol')=="DUEÑO")
        $this->form_validation->set_rules("animal","Codigo Animal","required|min_length[4]|max_length[10]");
        else
        $this->form_validation->set_rules("animal","Codigo Animal","min_length[4]|max_length[10]");
     
        $this->form_validation->set_rules("mCodDispositivo","Dispositivo","required");
        $this->form_validation->set_rules("esta","Estado","required|numeric");
        $this->form_validation->set_rules("bate","Bateria","required|numeric");
    
        $this->form_validation->set_message("required", "Campo %s es Requerido");
        $this->form_validation->set_message("numeric", "Seleccione Opción");
         $this->form_validation->set_message("numeric", "Seleccione Opción");
        $this->form_validation->set_message("in_list", "Seleccione Opción");
        $this->form_validation->set_message("is_unique", "%s Codigo ya existe");
        $this->form_validation->set_message("min_length", "%s Minimo 4 caracteres");
        $this->form_validation->set_message("max_length", "%s Maximo 10 caracteres");

        if(!$this->form_validation->run()){
            $this->session->set_flashdata("Error","No se pudo Registrar Información");
            
            echo validation_errors('<div class="errors">','</div>');

        }else{
            echo  $this->DispositivosModels->actualizarModels($param);
        }
       
      

    }
    

    public function guardar(){
        $codigoDispositivo=$this->input->post("codigoDispositivo");
        $finca=$this->input->post("finca");
        $codigoanimal=$this->input->post("codigoAnimal");
        $estado=$this->input->post("estado");

        $this->load->library(array('form_validation'));      

        $this->form_validation->set_rules("codigoDispositivo","Codigo","required|is_unique[dispositivos.iddispositivo]|min_length[5]|max_length[10]");
        
        if($this->session->userdata('rol')=="DUEÑO")
        $this->form_validation->set_rules("codigoAnimal","Codigo Animal","required|min_length[4]|max_length[10]");

        else
        $this->form_validation->set_rules("codigoAnimal","Codigo Animal","min_length[4]|max_length[10]");


        $this->form_validation->set_rules("finca","Finca","required|numeric");
        $this->form_validation->set_rules("estado","Estado","required|numeric|in_list[0,1]");

        $this->form_validation->set_message("required", "Campo %s es Requerido");
        $this->form_validation->set_message("numeric", "Seleccione Opción");
        $this->form_validation->set_message("in_list", "Seleccione Opción");
        $this->form_validation->set_message("min_length", "Minimo 4 caracteres");
        $this->form_validation->set_message("max_length", "Maximo 10 caracteres");
        $this->form_validation->set_message("is_unique", "Codigo ya existe");

        if(!$this->form_validation->run()){
            
            $this->nuevo();

        }else{
            
        $data=array(
            'iddispositivo'=>$codigoDispositivo,
            'idperimetro'=>$finca,
            'IdAnimal'=>$codigoanimal,
            'eliminado'=>0,
            'estado'=>$estado
        );

        if($this->DispositivosModels->addDispositivo($data,"dispositivos")){
            $this->session->set_flashdata("success","Dispositivo Registrado");
            redirect(base_url()."dispositivos/nuevo");
            
        }else{
            $this->session->set_flashdata("Error","No se pudo Registrar Información");
            redirect(base_url()."dispositivos/nuevo");
        }
    }

    }

    public function nuevo(){

        if($this->session->userdata('rol')=="SYSTEM1" || $this->session->userdata('rol')=="SYSTEM2"){
           
          $finca=array(
              'perimetro'=>$this->FincaModels->getNombreFincas(),
          );

    
            $this->cargarLayaout('admin/dispositivos/RegistrarDispositivo',$finca);
        }else {
            $finca=array(
                'perimetro'=>$this->FincaModels->perimetro($this->session->userdata('finca')),
            );
            
            $this->cargarLayaout('Dueño/Dispositivos/RegistrarDispositivo',$finca); 
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
        }else{
            $idfinca=$this->session->userdata('finca');
            $dispositivos=$this->DispositivosModels->getListadoDispositivo($idfinca);
        }
              
                $activos=0;
                $inactivo=0;
                $fuera=0;
            if($dispositivos){
                 foreach ($dispositivos as  $value) {
                    if($value->estado=="1"){
                        $activos=$activos+1;
                        if($value->ubicacion=!"Dentro" || $value->ubicacion!=""){
                            $fuera=$fuera+1; 
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
                    'dDentro'=>$fuera,
                    'dTotal'=>$activos+$inactivo
                );
                          
                
                if($this->session->userdata('rol')=="SYSTEM1" || $this->session->userdata('rol')=="SYSTEM2"){
                    $this->cargarLayaout('admin/dispositivos/ConsultaDispositivoSystem',$dispo);
                }else{
                    $this->cargarLayaout('Dueño/Dispositivos/lista',$dispo);
                }
       

         
       
       
    }
    
    public function getData() {
        if($this->session->userdata('rol')=="SYSTEM1" || $this->session->userdata('rol')=="SYSTEM2"){
            $dispositivos=$this->DispositivosModels->getListadoDispositivoCompleto();
        }else{
            $idfinca=$this->session->userdata('finca');
            $dispositivos=$this->DispositivosModels->getListadoDispositivo($idfinca);
        }
        $activos=0;
        $inactivos=0;
        $fuera=0;
        if($dispositivos){
            foreach ($dispositivos as  $value) {
                if($value->estado=="1"){
                    $activos=$activos+1;
                    if($value->ubicacion=!"Dentro" || $value->ubicacion!=""){
                        $fuera=$fuera+1; 
                    }
                }else{
                    $inactivos=$inactivos+1;
                }    
            }
        }
        $listDevices=array(
            'devices'=>$dispositivos,
            'actives'=>$activos,
            'inactives'=>$inactivos,
            'out'=>$fuera,
            'total'=>$activos+$inactivos
        );
        echo json_encode($listDevices);
    }

}