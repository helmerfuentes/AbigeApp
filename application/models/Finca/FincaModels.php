
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FincaModels extends CI_Model {

    //esta funcion, es para retornar dispositivos de todas las fincas, vista System
    public function getNombreFincas(){
        $this->db->select("f.nombreFinca, pe.idperimetro");
        $this->db->from("fincas f");
        $this->db->join("perimetros pe","f.idfinca=pe.idfinca");
        $this->db->where("nombreFinca!=","SIstema");
        
        $resultado=$this->db->get();
        if($resultado->num_rows()>0){
    
            return $resultado->result();
        }else{
            return  false;
        }
    

    }



}