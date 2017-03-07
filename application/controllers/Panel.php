<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('util_model', 'util');
		$this->util->estaLogueado();
	}
	public function index()
	{
		$this->bienvenido();
	}

	//mensaje de bienvenida
	public function bienvenido(){
		$this->_template('panel/welcome');
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

/* End of file Panel.php */
/* Location: ./application/controllers/Panel.php */