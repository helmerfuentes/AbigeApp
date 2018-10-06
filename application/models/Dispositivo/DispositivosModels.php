
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DispositivosModels extends CI_Model {

    //esta funcion, es para retornar dispositivos de todas las fincas, vista System
    public function getListadoDispositivoCompleto(){
        $this->db->select("dis.*, fi.nombreFinca");
        $this->db->from("dispositivos dis");
        $this->db->join("perimetros per","dis.idperimetro=dis.idperimetro");
        $this->db->join("fincas fi","fi.idfinca=per.idfinca");
        
        $resultado=$this->db->get("usuarios");
        if($resultado->num_rows()>0){
    
            return $resultado->row();
        }else{
            return  false;
        }
    

    }
/*
select *from dispositivos dis
inner join perimetros per
on dis.idperimetro=dis.idperimetro
inner join fincas fi
on fi.idfinca=per.idfinca;
*/


}