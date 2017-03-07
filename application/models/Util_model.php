<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Util_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	//template utilizado en las vistas para los scripts y estilos. 
	public function template($nombre,$data = null){
		$this->load->view('template/header');
		if($this->logueado()){
			$this->load->view('template/navbar');
		}
		if ($data == null){
			$this->load->view($nombre);
		}else{
			$this->load->view($nombre, $data);
		}
		$this->load->view('template/footer');
	}

	//redirige al log si no estoy logueado
	public function estaLogueado(){
		if(!$this->logueado()){
			redirect(base_url('log'),'refresh');
		}
	}

	//verifica si estoy logueado: TRUE O FALSE
	public function logueado(){
		$valor = $this->session->userdata('username');
		if(empty($valor)){
			return false;
		}else{
			return true;
		}
	}

}

/* End of file util_model.php */
/* Location: ./application/models/util_model.php */