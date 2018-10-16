<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mantenimientoModels extends CI_Model {

    //registrar un mantenimiento
    public function add($dispositivo){
        


    }

    //listado de mantenimientos de todos los dispositivos de todas las finca

    public function getListado(){
        $this->db->select("count(ma.iddispositivo) as cantidad, fi.nombreFinca,fi.ubicacion, fi.municipio,
        dis.iddispositivo,dis.estado as estadodispositivo,dis.idanimal,
        dis.bateria,po.estado as posicionestado, po.bateria as bateriaposicion, max(ma.fecha) as fecha, ma.descripcion");
        $this->db->from("fincas fi");
        $this->db->join("perimetros per","fi.idfinca=per.idfinca","left");
        $this->db->join("dispositivos dis","dis.idperimetro=per.idperimetro","left");
        $this->db->join("posicion po", "dis.iddispositivo=po.iddispositivo","left");
        $this->db->join("mantenimiento ma", "ma.iddispositivo=dis.iddispositivo","left");
        $this->db->group_by("ma.iddispositivo");
        $this->db->having("fi.nombreFinca <>","Sistema");
        
        $resultado=$this->db->get();
        if($resultado->num_rows()>0){
    
            return $resultado->result();
        }else{
            return  false;
        }

   /* select count(ma.iddispositivo) as cantidad, fi.nombreFinca,fi.ubicacion, fi.municipio,dis.iddispositivo,
   dis.estado as estadodispositivo,dis.idanimal, dis.bateria,po.estado as posicionestado,
    po.bateria as bateriaposicion, max(ma.fecha), ma.descripcion from fincas fi
    left join perimetros per
    on fi.idfinca=per.idfinca
    left join dispositivos dis
    on dis.idperimetro=per.idperimetro
    left join posicion po
    on dis.iddispositivo=po.iddispositivo
    left join mantenimiento ma
    on ma.iddispositivo=dis.iddispositivo
    group by ma.iddispositivo
    having nombreFinca<>'Sistema';
    */

    }   

    //listado de mantenimiento de dispositivo de una finca
    public function getListadoFinca(){


    }

    //modificar el registro de un mantenimiento
    public function modificar($dispositivo){
        
    }

    //elimininar el registro de un mantenimiento
    public function eliminar($dispositivo){

    }





}