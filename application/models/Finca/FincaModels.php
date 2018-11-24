
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

    //funcion creada para obtener fincas que no tienen dueño asignado aun
    //para al momento de registrar usuario

    public function noAsignada(){
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

    public function noAsifgnada(){
        $this->db->select("fi.nombreFinca, fi.idfinca");
        $this->db->from("fincas fi");
        $this->db->join("usuarios usu","fi.idfinca=usu.idfinca","left");
        $this->db->where("usu.idfinca is null");
        $resultado=$this->db->get();
        if($resultado->num_rows()>0){
    
            return $resultado->result();
        }else{
            return  false;
        }

    }

    //traer los datos de una finca y su perimetro, respecto a una ID finca

    public function perimetro($finca){
        
        $this->db->select("*");
        $this->db->from("fincas fi");
        $this->db->join("perimetros p","fi.idfinca=p.idfinca","left");
        $this->db->where("fi.idfinca=",$finca);
        $resultado=$this->db->get();
        if($resultado->num_rows()>0){
    
            return $resultado->row();
        }else{
            return  false;
        }

        


    }

}