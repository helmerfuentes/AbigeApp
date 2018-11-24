
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class novedadesmodels extends CI_Model {

    //novedades general de todos los dispositivos por fincas

    public function getListadoGeneral(){
        $this->db->select("count(*) as total, dis.iddispositivo, fi.nombreFinca, nov.fecha as fecha, tp.novedad,tp.idnovedad");
        $this->db->from("dispositivos dis");
        $this->db->join("novedades nov","dis.iddispositivo=nov.iddispositivo");
        $this->db->join("tiponovedad tp","nov.idnovedad=tp.idnovedad");
        $this->db->join("perimetros per","dis.idperimetro=per.idperimetro");
        $this->db->join("fincas fi","fi.idfinca=per.idfinca");

        $resultado=$this->db->get();
        if($resultado->num_rows()>0){
    
            return $resultado->result();
        }else{
            return  false;
        }
        

    }

    //novedades de los dispositivos correspondiente a una finca

    public function getlistadoFinca($finca){
        $this->db->select("count(*) as total, dis.iddispositivo, fi.nombreFinca, nov.fecha as fecha, tp.novedad,tp.idnovedad");
        $this->db->from("dispositivos dis");
        $this->db->join("novedades nov","dis.iddispositivo=nov.iddispositivo");
        $this->db->join("tiponovedad tp","nov.idnovedad=tp.idnovedad");
        $this->db->join("perimetros per","dis.idperimetro=per.idperimetro");
        $this->db->join("fincas fi","fi.idfinca=per.idfinca");
        $this->db->where("fi.idfinca=",$finca);
        $resultado=$this->db->get();
        if($resultado->num_rows()>0){
    
            return $resultado->result();
        }else{
            return  false;
        }

    }

    


}