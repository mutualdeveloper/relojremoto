<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	//devuelve los datos de un usuario, o todos los usuarios
	public function get($id = null){
		if($id == null){
			return $this->db->get('usuario')->result();
		}else{
			if($this->exist($id)){
				return $this->db->get_where('usuario', array('id' => $id))->result()[0];
			}else{
				return null;
			}
		}
	}

	//devuelve un usuario a partir del nombre
	public function getByName($nombre){
		if($this->exist_username($nombre)){
			$id = $this->getId($nombre);
			return $this->get($id);
		}
	}

	//verifica si existe el id: TRUE o FAlSE
	public function exist($id){
		$query = $this->db->get_where('usuario', array('id' => $id));
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	//verifica si existe el nombre de usuario: TRUE o FAlSE
	public function exist_username($nombre){
		$query = $this->db->get_where('usuario',array('nombre' => $nombre));
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	//Devuelve el ID de un usuario a partir del nombre
	private function getId($nombre){
		return $this->db->get_where('usuario',array('nombre' => $nombre))->result()[0]->id;
	}

	//verifica el log. devuelve: TRUE O FALSE y el mensaje de error
	public function access($data){
		$id = $this->getid($data['username']);
		$rta = array('respuesta' => false, 'mensaje_error' => 'Usuario y/o Contraseña Incorrecto/s');
		if($this->exist($id)){
			$datos = $this->get($id);
			if($datos->nombre == $data['username']){
				if($datos->password == md5($data['password'])){
					if($datos->estado == true){
						$rta['respuesta'] = true;
					}else{
						$rta['mensaje_error'] = 'Cuenta desactivada';
					}
				}
			}
		}
		return $rta;
	}

	
	

}

/* End of file usuario_model.php */
/* Location: ./application/models/usuario_model.php */