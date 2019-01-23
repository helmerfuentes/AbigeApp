<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_Model extends CI_Model {

    public function login($correo, $password){
    $this->db->where("email",$correo);
    $this->db->where("clave",$password);
    $this->db->where("estado","A");

    $resultado=$this->db->get("usuarios");
    if($resultado->num_rows()>0){

        return $resultado->row();
    }else{
        return  false;
    }

    }

    public function UpdateEstado($id,$estado){
        $this->db->set( 'estado' ,  $estado );
        $this->db->where ( 'idusuario' ,$id); 
        $this->db->update ( 'usuarios' );
        return $this->db->affected_rows();


    }

    public function guardar($datos,$tabla){
        $this->db->set($datos);
        return $this->db->insert($tabla);
    }

    //buscar un usuario por su documento y taer todos sus datos
    public function buscar($identificacion){
        
        $this->db->where("identificacion",$identificacion);
        $resultado=$this->db->get("usuarios");
        if($resultado->num_rows()>0){

            return $resultado->row();
        }else{
            return  false;
        }


    }

     //buscar un usuario por su codigo Usuario y taer todos sus datos
     public function buscarCodigo($idusuario){
        
        $this->db->where("idusuario",$idusuario);
        $resultado=$this->db->get("usuarios");
        if($resultado->num_rows()>0){
            
            return $resultado->row();
        }else{
            return  false;
        }


    }



        //funcion para mostrar al SYSTEM, lista agrupada por finca
        //con numero de empleados, numeros de dispositivo en esa fina
    public function lista(){
    
        $query = $this->db->query("CALL procedureDuvan()");
        mysqli_next_result( $this->db->conn_id );
        $res= $query->result();

          

            return $res;

    }

    //retornar todos los usuarios rol empleado
    public function trabajadores(){
        $this->db->select("*");
        $this->db->from("usuarios");
        $this->db->where("rol","EMPLEADO");

        $resultado=$this->db->get();
        if($resultado->num_rows()>0){
    
            return $resultado->result();
        }else{
            return  false;
        }


    }
    //retorna los trbajadores que perptenecen  a una finca
    public function trabajadoresFinca($finca){
        $this->db->select("*");
        $this->db->from("usuarios");
        $this->db->where("rol","EMPLEADO");
        $this->db->where("idfinca",$finca);
        $this->db->where("estado!=","E");


        $resultado=$this->db->get();
        if($resultado->num_rows()>0){
    
            return $resultado->result();
        }else{
            return  false;
        }


    }


    public function updatemodels($datos,$codigo){
       
       
        extract($datos);
       
        $this->db->set('nombres',$nom );
        $this->db->set('primerApellido',$ape1);
        $this->db->set('segundoApellido',$ape2);
        $this->db->set('telefono',$tele);
        $this->db->set('direccion',$dire);
        $this->db->where ('idusuario' ,$codigo); 
        $this->db->update ('usuarios');
        return 1;

      
        
    }


}