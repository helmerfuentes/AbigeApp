<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fincas_Model extends CI_Model {
    public function consultarGeneral() {
        /**
         * Mostrar los datos de todas las fincas.
         */
        $this->db->select("*");
        $this->db->from("fincas");
        $this->db->join("municipios", "fincas.idmunicipio = municipios.idmunicipio", "left");
        $this->db->join("departamentos", "municipios.iddpto = departamentos.COD_DPTO", "left");

        $consulta = $this->db->get();
        return $consulta->result();
    }

    public function consultarIndividual($idFinca) {
        /**
         * Consultar los datos de una finca, por su id.
         */
        $this->db->select("*");
        $this->db->from("fincas");
        $this->db->join("municipios", "fincas.idmunicipio = municipios.idmunicipio", "left");
        $this->db->join("departamentos", "municipios.iddpto = departamentos.COD_DPTO", "left");
        $this->db->where("idfinca", $idFinca);
        $consulta = $this->db->get();
        return $consulta->row();
    }

    public function consultarPorDepartmento($nombreDpto) {
        /**
         * Consultar los datos de fincas en un departamento.
         */
    }

    public function consultarPorCiudad($nombreCiudad) {
        /**
         * Consultar los datos de fincas por ciudades o municipios.
         */
    }

    public function add($data) {
        
    }

    public function update($id, $data) {
        $this->db->where("idfinca",$id);
        return $this->db->update("fincas",$data);
    }
}