<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departamentos_Model extends CI_Model {
    public function consultarGeneral() {
        /**
         * Mostrar los datos de todos los municipios
         */
        $this->db->select("*");
        $this->db->from("departamentos")->order_by('DESCRIPCION');
        $consulta = $this->db->get();
        return $consulta->result();
    }
    public function getById($id) {
        /**
         * Mostrar los datos de todos los municipios
         */
        $this->db->select("*");
        $this->db->from("departamentos");
        $this->db->where('COD_DPTO',$id);
        $consulta = $this->db->get();
        return $consulta->row();
    }
}