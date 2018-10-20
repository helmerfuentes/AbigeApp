<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perimetros_Model extends CI_Model {
    public function consultaCoordenadas($idPerimetro) {
        /**
         * Mostrar datos (coordenadas) de un perimetro.
         */
        $this->db->select("*");
        $this->db->from("fincas");
        $this->db->where("idfinca", $idPerimetro);
        $consulta = $this->db->get();
        return $consulta->result();
    }

    public function consultaPorFinca() {
        /**
         * Mostrar datos (coordenadas) de perímetros de una finca.
         */
        $this->db->select("");
    }
}
