<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_Model extends CI_Model {

    public function login($correo, $password){
    $this->db->where("email",$correo);
    $this->db->where("clave",$password);

    $resultado=$this->db->get("usuarios");
    if($resultado->num_rows()>0){

        return $resultado->row();
    }else{
        return  false;
    }

    }

    public function guardar($datos,$tabla){
        $this->db->set($datos);
        return $this->db->insert($tabla);
    }


        //funcion para mostrar al SYSTEM, lista agrupada por finca
        //con numero de empleados, numeros de dispositivo en esa fina
    public function lista(){
    
        $query = $this->db->query("CALL procedureDuvan()");
        mysqli_next_result( $this->db->conn_id );
        $res= $query->result();

          

            return $res;

    }


}