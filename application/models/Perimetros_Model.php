<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perimetros_Model extends CI_Model {
    public function all() {
        $this->db->select("fincas.idfinca,perimetros.idperimetro,coordenadas.idcoordenada,coordenadas.numeroPunto,coordenadas.latitud,coordenadas.longitud");
        $this->db->from("fincas");
        $this->db->join("perimetros","fincas.idfinca=perimetros.idfinca");
        $this->db->join("coordenadas","coordenadas.idperimetro=perimetros.idperimetro");
        $this->db->order_by('fincas.idfinca');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function coords($idperimetro) {
        $this->db->select("perimetros.idperimetro,coordenadas.idcoordenada,coordenadas.numeroPunto,coordenadas.latitud,coordenadas.longitud");
        $this->db->from("perimetros");
        $this->db->join("coordenadas","coordenadas.idperimetro=perimetros.idperimetro");
        $this->db->where("perimetros.idperimetro",$idperimetro)->order_by('coordenadas.numeroPunto');
        $query = $this->db->get();
        return $query->result();
    }

    public function perimetersByFarm($idfinca) {
        $this->db->select("perimetros.idperimetro as id,perimetros.tipo,perimetros.descripcion");
        $this->db->from("fincas");
        $this->db->join("perimetros","fincas.idfinca=perimetros.idfinca");
        $this->db->where("fincas.idfinca",$idfinca)->order_by('perimetros.idperimetro');
        $query = $this->db->get();
        return $query->result();
    }
}