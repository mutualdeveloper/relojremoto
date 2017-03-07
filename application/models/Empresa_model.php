<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa_model extends CI_Model {

	//devuelve el nombre de una empresa
	public function getName($id){
		return $this->db->get_where('empresa',array('id' => $id))->result()[0]->razon_social;
	}

}

/* End of file Empresa_model.php */
/* Location: ./application/models/Empresa_model.php */