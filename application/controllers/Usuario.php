<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('util_model', 'util');
		$this->load->model('usuario_model', 'usuarioModel');
		$this->load->model('empresa_model', 'empresaModel');
		$this->util->estaLogueado();
	}

	public function index()
	{
		$this->ver();
	}

	public function ver(){
		$this->_template('usuario/editar');
	}


	//funcion template para ahorrar codigo
	private function _template($view,$data = null){
		if($data == null){
			$this->util->template($view);
		}else{
			$this->util->template($view,$data);
		}

	}
}

/* End of file Usuario.php */
/* Location: ./application/controllers/Usuario.php */