

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_Models extends CI_Model {

 

    public function opcionesMenuPrincipal($rol){
       
        $this->db->select("me.id_menu, me.titulo, me.padre, me.controller");
        $this->db->from("menu me");
        $this->db->join("menu_perfil mp","me.id_menu=mp.menu");
        $this->db->where("mp.rol='$rol' and padre is  null");
        $this->db->order_by("me.titulo","asc");
        


        $menuPrincipal=$this->db->get();

        return $menuPrincipal->result();
    }

    public function opcionesSubMenu($rol){
       
        $this->db->select("me.id_menu, me.titulo, me.padre, me.controller");
        $this->db->from("menu me");
        $this->db->join("menu_perfil mp","me.id_menu=mp.menu");
        $this->db->where("mp.rol='$rol' and padre is not  null");
        $menuSubMenunl=$this->db->get();
        return $menuSubMenunl->result();
    }


}