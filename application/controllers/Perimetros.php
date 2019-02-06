<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perimetros extends CI_Controller {

    public $data;
    public function __construct(){
        
        parent::__construct();
        $this->load->helper('array');
        $this->load->model("Menu_Models");
        $this->load->model("Perimetros_Model");
        $this->load->model("Fincas/Fincas_Model");
        $this->load->model('Departamentos_Model');
        $this->load->model('Municipios_Model');
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
   
    }

    public function index() {
        echo json_encode($this->Perimetros_Model->all());
    }

    public function nuevo() {
        $data = [
            'fincas' => $this->Fincas_Model->list()
        ];
        $this->cargarLayaout('admin/perimeters/new', $data);
    }

    public function data($idfinca) {
        $data = [
            'perimetros' => $this->Perimetros_Model->perimetersByFarm($idfinca),
        ];
        echo json_encode($data);
    }

    public function points($id) {
        $data = [
            'coordenadas' => $this->Perimetros_Model->coords($id),
        ];
        echo json_encode($data);
    }

    public function store() {
        $data = json_decode(file_get_contents('php://input'), true);
        var_dump($data);
        $finca = $data['idfinca'];
        $tipo = $data['tipo'];
        $descripcion = $data['descripcion'];
        $id = $this->Perimetros_Model->store([
            'idfinca' => $finca,
            'tipo' => $tipo,
            'descripcion' => $descripcion
        ]);
        foreach ($data['coordenadas'] as $coordenada) {
            $this->Perimetros_Model->insertCoord([
                'idperimetro' => $id,
                'latitud' => $coordenada['latitude'],
                'longitud' => $coordenada['longitude'],
                'numeroPunto' => $coordenada['number']
            ]);
        }
        echo json_encode(['id' => $id]);
    }

    private function cargarLayaout($vista,$datoEnviar){
        $rol=$this->session->userdata('rol');
        $menu=$this->Menu_Models->opcionesMenuPrincipal($rol);
        $submenu=$this->Menu_Models->opcionesSubMenu($rol);
        $data['menu']=$menu;
        $data["submenu"]=$submenu;

        $this->load->view('layouts/Backend/header'); 
        $this->load->view("layouts/Backend/aside",$data);
        $this->load->view($vista,$datoEnviar);
        $this->load->view('layouts/Backend/footer');
    }

}