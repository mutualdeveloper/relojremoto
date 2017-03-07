<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('util_model', 'util');
		$this->load->model('usuario_model', 'usuarioModel');
		$valor = $this->session->userdata('username');
	}
	//por defecto carga log
	public function index()
	{
		$this->in();
	}

	//muestra el panel de log. Si nos encontramos logueados redirige al panel
	public function in(){
		$valor = $this->session->userdata('username');
		if(empty($valor)){
			$this->util->template('log/in');
		}else{
			redirect('panel','refresh');
		}
		
	}

	//recibe los datos del log y verifica si son correctos
	public function data(){
		if($this->usuarioModel->exist_username($this->input->post('username'))){
			$username = $this->input->post('username');
			$log = $this->usuarioModel->access($this->input->post());
			if ($log['respuesta']){
				$this->session->set_userdata(array('username' => $username));
				redirect('panel','refresh');
			}else{
				$datos['error'] = true;
				$datos['mensaje_error'] = $log['mensaje_error'];
				$this->util->template('log/in',$datos);
			}
		}else{
			$datos['error'] = true;
			$datos['mensaje_error'] = 'El usuario especificado no existe';
			$this->util->template('log/in',$datos);
		}
		
	}

	//destruye la sesion y redirige al log
	public function out(){
		$this->session->sess_destroy();
		redirect('log/in');
	}



}