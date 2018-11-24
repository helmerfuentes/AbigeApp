<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sesion extends CI_Controller {

        public function __construct(){

        parent::__construct();
        $this->load->model('Usuarios/Usuarios_Model');
        }

	public function index()
	{
        if ($this->session->userdata("login")) {
            redirect(base_url()."Principal");
        }else{
		$this->load->view('admin/login');
        }
    }

    public function login(){
        $correo=$this->input->post('correo');
        $password=$this->input->post('password');

        //sha1(); ENCRIPTAR LA CONTRASEÑA
        $respuesta=$this->Usuarios_Model->login($correo, $password);
       

        if (!$respuesta) {
            $this->session->set_flashdata("error","El usuario y/o Contraseña son Incorrectos!");
            redirect(base_url());
        }else{
            $data=array(
                'identificacion'=>$respuesta->identificacion,
                'nombres'=>$respuesta->nombres,
                'apellido'=>$respuesta->primerApellido,
                'rol'=>$respuesta->rol,
                'imagen'=>$respuesta->imagen,
                'finca'=>$respuesta->idfinca,
                'login'=>true
            );
            $this->session->set_userdata($data);
            redirect(base_url()."Principal");
        }
    }

    public function Salir(){
        $this->session->sess_destroy();
        redirect(base_url());
    
    }

}