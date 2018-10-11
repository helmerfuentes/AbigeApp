
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DispositivosModels extends CI_Model {

    //esta funcion, es para retornar dispositivos de todas las fincas, vista System
    public function getListadoDispositivoCompleto(){
        $this->db->select("dis.*, fi.nombreFinca");
        $this->db->from("dispositivos dis");
        $this->db->join("perimetros per","dis.idperimetro=dis.idperimetro");
        $this->db->join("fincas fi","fi.idfinca=per.idfinca");
        
        $resultado=$this->db->get();
        if($resultado->num_rows()>0){
    
            return $resultado->result();
        }else{
            return  false;
        }

    

    }

    public function inforDispositivoModels($id){
        $this->db->select('*');
        $this->db->from("dispositivos dis");
        $this->db->join("perimetros per","dis.idperimetro=per.idperimetro","left");
        $this->db->join("fincas fi","fi.idfinca=per.idfinca","left");
        $this->db->join("mantenimiento ma", "ma.iddispositivo=dis.iddispositivo","left");
        $this->db->join("posicion po", "dis.iddispositivo=po.iddispositivo","left");
        $this->db->where("dis.iddispositivo='$id'");
        
        
        /*
        $this->db->query("select max(ma.fecha), dis.estado, fi.nombreFinca from dispositivos dis
        inner join perimetros per
        on dis.idperimetro=dis.idperimetro
        inner join fincas fi
        on fi.idfinca=per.idfinca
        inner join mantenimiento ma
        on dis.iddispositivo=ma.iddispositivo
        where dis.iddispositivo='$id';");
*/
        $resultado=$this->db->get();
        if($resultado->num_rows() > 0){
    
            return $resultado->row();
        }else{
            return  false;
        }
        



    }

        public function addDispositivo($datos,$tabla){
       //  $this->db->set('iddispositivo', $datos->codigoDispositivo);
         //$this->db->set('idperimetro', $datos->finca);
         //$this->db->set('IdAnimal', $datos->codiigoAnimal);
         $this->db->set($datos);
         return $this->db->insert($tabla);

        }

}