<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->model("Menu_Models");
        $this->load->model("Finca/FincaModels");
        $this->load->model('Usuarios/Usuarios_Model');
        $this->load->library(array('form_validation'));

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


    public function updateEstado(){
        $id=$this->input->post("id");
        $opcion=$this->input->post("opcion");
        $this->form_validation->set_rules("id","Identificación","required|numeric"); 
        $this->form_validation->set_rules("opcion","Opcion","required|in_list[A,I]");

        if(!$this->form_validation->run()){
           echo -1;
        }else{
            $respuesta=$this->Usuarios_Model->UpdateEstado($id,$opcion);

            if($respuesta==1){
    
                $data = array(
                    'value' => $this->Usuarios_Model->buscarCodigo($id)
                );
                
                    if($opcion!="E")
                    $this->load->view("Dueño/Usuarios/view", $data);    
    
             }else{
                    return 0;
             }
            

        }

       

}



public function buscar(){
    $idusuario=$this->input->post("identificacion");

    $this->form_validation->set_rules("identificacion","Identificación","required|min_length[7]|max_length[11]|numeric"); 
    if(!$this->form_validation->run()){
       
        $this->load->library('user_agent');
         redirect($this->agent->referrer());
    }else{
        $respuesta= array(
            'respuesta' =>  $this->Usuarios_Model->buscarCodigo($idusuario)
        );
     
     
         $this->load->view('admin/usuarios/mInfor',$respuesta);

    }

   

    

    


}

public function Guardar(){


    $identificacion=$this->input->post("identificacion");
    $nombres=$this->input->post("nombres");
    $apellidos=$this->input->post("apellidos");
    $email=$this->input->post("email");
    $direccion=$this->input->post("direccion");
    $telefono=$this->input->post("telefono");

    if(ctype_space($apellidos)){
        $apellidos=(explode(' ', $apellidos));
        $apellido1=$apellidos[0];
        $apellido2=$apellidos[1];

    }else{
        $apellido1=$apellidos;
        $apellido2="";

    }
    $this->form_validation->set_rules("identificacion","Identificación","required|min_length[7]|max_length[11]|numeric"); 

    $this->form_validation->set_rules("nombres","Nombres","required|min_length[3]|max_length[20]|regex_match[/^[\p{L} ]*$/u]");

    $this->form_validation->set_rules("apellidos","Apellidos","required|min_length[3]|max_length[20]|regex_match[/^[\p{L} ]*$/u]");

    $this->form_validation->set_rules("email","Email","required|min_length[3]|max_length[60]|valid_email|is_unique[usuarios.email]");

    $this->form_validation->set_rules("direccion","Direccion","required|min_length[10]|max_length[40]");

    $this->form_validation->set_rules("telefono","Telefono","required|exact_length[10]");

    $this->form_validation->set_message("required", "Campo %s es Requerido");
    $this->form_validation->set_message("max_length", "Campo %s no cumple con maximo caracteres");
    $this->form_validation->set_message("min_length", "Campo %s no cumple con minimo caracteres");
    $this->form_validation->set_message("valid_email", "Campo %s  no valido");
    $this->form_validation->set_message("exact_length", "Campo %s erroneo");
    $this->form_validation->set_message("is_unique", "%s ya Registrado");

    if(!$this->form_validation->run()){
       
        $this->nuevo();
    }else{
            
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
            'primerApellido'=>$apellido1,
            'identificacion'=>$identificacion,
            'rol'=>$rol,
            'email'=>$email,
            'telefono'=>$telefono,
            'clave'=>$identificacion,
            'direccion'=>$direccion,
            'estado'=>"A",
            'segundoApellido'=>$apellido2,
            'imagen'=>"default.png"
        );


         $this->Usuarios_Model->guardar($data,"usuarios");
         
         $this->session->set_flashdata("success","Usuario Registrado");         
         $this->load->library('user_agent');
         redirect($this->agent->referrer());
       
    }

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
    
    $apellidos=$this->input->post("apellidos");

    $nombres=$this->input->post("nombres");
  
    $direccion=$this->input->post("direccion");
    $telefono=$this->input->post("telefono");
    $codigo=$this->input->post("codigo");

    

       
        $apellido=(explode(' ', $apellidos));
        $apellido1=$apellido[0];
        $apellido2=$apellido[1];

    }else{
        $apellido1=$apellidos;
        $apellido2="";

    }


    $this->form_validation->set_rules("codigo","Codigo","required|numeric"); 


    $this->form_validation->set_rules("nombres","Nombres","required|min_length[3]|max_length[20]|regex_match[/^[\p{L} ]*$/u]");


    $this->form_validation->set_rules("apellidos","Apellidos","required|min_length[3]|max_length[20]|regex_match[/^[\p{L} ]*$/u]");

   
    $this->form_validation->set_rules("direccion","Direccion","required|min_length[10]|max_length[40]");

    $this->form_validation->set_rules("telefono","Telefono","required|exact_length[10]");

    $this->form_validation->set_message("required", "Campo %s es Requerido");
    $this->form_validation->set_message("numeric", "Campo %s es Numerico");
    $this->form_validation->set_message("max_length", "Campo %s no cumple con maximo caracteres");
    $this->form_validation->set_message("min_length", "Campo %s no cumple con minimo caracteres");
   
    $this->form_validation->set_message("exact_length", "Campo %s erroneo");
    $this->form_validation->set_message("is_unique", "%s ya Registrado");



    $datos=array(
        'nom'=>$nombres,
        'ape1'=>$apellido1,
        'ape2'=>$apellido2,
        'tele'=>$telefono,
        'dire'=>$direccion
    );

    if(!$this->form_validation->run()){
      
        echo 0;
        
    }else{
       
        echo $this->Usuarios_Model->updatemodels($datos,$codigo);
    }
    


}




}