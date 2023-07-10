<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {



	public function __construct()
    {
        parent::__construct();
     
        $this->load->helper('url');
        $this->load->library('session');
    }

	public function index()
	{
		if($this->session->userdata('is_logged')){
        	redirect('portada');
        }
		$this->load->view('login');
	}

	public function logearte()
	{
		$this->load->model('Login_model');
		$data = $this->input->post();
       
       if(!$result = $this->Login_model->get_User($data)){
		$mss = 'Usuario o contraseña incorectos';
        echo json_encode($mss);
       }else{
       	$this->session->set_userdata($result);
        echo json_encode($result);
       } 
	}
	public function logout()
	{
		$vars = array('usuario','contraseña','id','idPersona','idTipoUsuario','url','is_logged');
		$this->session->unset_userdata($vars);
		$this->session->sess_destroy();

		redirect('login');
	}
	
}
