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
   
    if($this->session->userdata('rol')=="SYSTEM1" || $this->session->userdata('rol')=="SYSTEM2"){
        $data = array(
            'fincas' => $this->FincaModels-> noAsifgnada(), 
        );
       
    $this->cargarLayaout("admin/usuarios/nuevo", $data);
    }else{
        $this->cargarLayaout("Dueño/Usuarios/nuevo", "");
    }
    
   

}

/*
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
 */
    public function updateEstado(){
        $idusuario=$this->input->post("id");
        $opcion=$this->input->post("opcion");
     
        $respuesta=$this->Usuarios_Model->UpdateEstado($idusuario,$opcion);
        if($respuesta==1){
            
            $data = array(
                'value' => $this->Usuarios_Model->buscarCodigo($idusuario)
            );
            
            if($opcion!="E")
           $this->load->view("Dueño/Usuarios/view", $data);    

        }else{
            return 0;
        }
        
    }



public function buscar(){
    $idusuario=$this->input->post("identificacion");
    $respuesta= array(
     'respuesta' =>  $this->Usuarios_Model->buscarCodigo($idusuario)
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
    
    if($this->session->userdata('rol')=="SYSTEM1" || $this->session->userdata('rol')=="SYSTEM2"){
        $rol="DUEÑO";
        $idfinca=$this->input->post("finca");
    }else{
        $rol="EMPLEADO";
        $idfinca=$this->session->userdata('finca');

    }
    $data=array(
        'idfinca'=>$idfinca,
        'nombres'=>$nombres,
        'primerApellido'=>$apellidos[0],
        'identificacion'=>$iden,
        'rol'=>$rol,
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
    
    if($this->session->userdata('rol')=="SYSTEM1" || $this->session->userdata('rol')=="SYSTEM2"){
        $data=array(
            'lista'=>$this->Usuarios_Model->lista(),
            'empleados'=>$this->Usuarios_Model->trabajadores()
        );
    
        $this->cargarLayaout("admin/usuarios/lista", $data);
    }else{
        $idfinca=$this->session->userdata('finca');
        $data = array('empleados' =>$this->Usuarios_Model->trabajadoresFinca($idfinca));
        
        $this->cargarLayaout("Dueño/Usuarios/lista", $data);
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