<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Municipios_Model extends CI_Model {
    public function consultarGeneral() {
        /**
         * Mostrar los datos de todos los municipios
         */
        $this->db->select("*");
        $this->db->from("municipios");
        $consulta = $this->db->get();
        return $consulta->result();
    }
    public function consultarPorDepartamento($dpto) {
        $this->db->select("*");
        $this->db->from("municipios");
        $this->db->where("iddpto", $dpto);
        $consulta = $this->db->get();
        return $consulta->result();
    }
}