<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fincas_Model extends CI_Model {
    protected $table = 'Fincas';
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
        $this->db->from($this->table);
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

    public function store($data) {
        return $this->db->insert($this->table,$data);
    }

    public function detailedInfo($id) {
        /**
         * Información detallada de la finca para mostrar en la vista individual
         */
        $query = $this->db->query("Call detailedFinca($id)")->row();
        mysqli_next_result($this->db->conn_id);
        return $query;
    }

    public function update($id, $data) {
        $this->db->where("idfinca",$id);
        return $this->db->update($this->table,$data);
    }
}