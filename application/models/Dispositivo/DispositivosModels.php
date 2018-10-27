
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DispositivosModels extends CI_Model {

    //esta funcion, es para retornar dispositivos de todas las fincas, vista System
    public function getListadoDispositivoCompleto(){
        
        $this->db->select("dis.*, fi.nombreFinca, po.estado as ubicacion");
        $this->db->from("dispositivos dis");
        $this->db->join("perimetros per","per.idperimetro=dis.idperimetro");
        $this->db->join("fincas fi","fi.idfinca=per.idfinca");
        $this->db->join("posicion po", "dis.iddispositivo=po.iddispositivo","left");
        $this->db->group_by("dis.iddispositivo");
        $this->db->having("dis.eliminado=0"); 
        $resultado=$this->db->get();
        if($resultado->num_rows()>0){
    
            return $resultado->result();
        }else{
            return  false;
        }

    

    }

    public function eliminarmodels($didpositivo){
            $campos=array(
                'eliminado' => 1
            );

            $this->db->where('iddispositivo',$didpositivo);

            return $this->db->update('dispositivos',$campos);


    }

    public function actualizarModels($param){
       
        
        $campos = array(
			'idanimal' =>  $param['idAnimal'],
			'estado' =>  $param['estado'],
			'bateria' => $param['bateria']
			
        );
        
		$this->db->where('iddispositivo', $param['idDisposotivo']);
		$this->db->update('dispositivos',$campos);
		
		return 1;

    }

    public function inforDispositivoModels($id){
    
        if($query = $this->db->query("CALL infoDispositivo('$id')"))
        {
        return ($query->row());
        }else{
            return false;
        }

    
        /*
        $sql="select fi.nombreFinca,fi.ubicacion, fi.municipio,per.tipo,dis.iddispositivo,dis.estado as estadodispositivo,dis.idanimal, dis.bateria,po.estado as posicionestado, po.bateria as bateriaposicion, ma.fecha from fincas fi
        left join perimetros per
        on fi.idfinca=per.idfinca
        left join dispositivos dis
        on dis.idperimetro=per.idperimetro
        left join posicion po
        on dis.iddispositivo=po.iddispositivo
        left join mantenimiento ma
        on ma.iddispositivo=dis.iddispositivo
        where dis.iddispositivo = '$id'";
     

        
        $this->db->select('fi.nombreFinca,fi.ubicacion, fi.municipio,per.tipo,dis.iddispositivo,dis.estado as estadodispositivo,
        dis.idanimal, dis.bateria,po.estado as posicionestado, po.bateria as bateriaposicion, ma.fecha');
        $this->db->from("fincas fi");
        $this->db->join("perimetros per","fi.idfinca=per.idfinca","left");
        $this->db->join("dispositivos dis","dis.idperimetro=per.idperimetro","left");
        $this->db->join("posicion po", "dis.iddispositivo=po.iddispositivo","left");
        $this->db->join("mantenimiento ma", "ma.iddispositivo=dis.iddispositivo","rigth");
        $this->db->where("dis.iddispositivo",$id);
        $resultado=$this->db->get();
        if($resultado->num_rows() > 0){
          
            return $resultado->row();
        }else{
            return  false;
        }
        
 */


    }

        public function addDispositivo($datos,$tabla){
       //  $this->db->set('iddispositivo', $datos->codigoDispositivo);
         //$this->db->set('idperimetro', $datos->finca);
         //$this->db->set('IdAnimal', $datos->codiigoAnimal);
         $this->db->set($datos);
         return $this->db->insert($tabla);

        }

}