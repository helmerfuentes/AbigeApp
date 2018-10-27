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



public function buscar(){
    $identificacion=$this->input->post("identificacion");
    $respuesta= array(
     'respuesta' =>  $this->Usuarios_Model->buscar($identificacion)
    );
    
    $this->load->view('admin/usuarios/mInfor',$respuesta);

    

    


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
    

    $data=array(
        'lista'=>$this->Usuarios_Model->lista(),
        'empleados'=>$this->Usuarios_Model->trabajadores()
    );
   
    


    $this->cargarLayaout("admin/usuarios/lista", $data);
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

public function update(){
    $apellidos=explode(" ",$this->input->post("apellidos"));
    
    $nombres=$this->input->post("nombres");
    $apellido1=$apellidos[0];
    $apellido2=$apellidos[1];
    $email=$this->input->post("email");
    $direc=$this->input->post("direccion");
    $telefono=$this->input->post("telefono");
    $codigo=$this->input->post("codigo");

    $datos=array(
        'nom'=>$nombres,
        'ape1'=>$apellido1,
        'ape2'=>$apellido2,
        'ema'=>$email,
        'tele'=>$telefono,
        'dire'=>$direc
    );
    
  
        echo $this->Usuarios_Model->updatemodels($datos,$codigo);


}




}