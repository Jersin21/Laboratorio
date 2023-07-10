<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecepcionController extends CI_Controller {



	public function __construct()
    {
        parent::__construct();
     
        $this->load->helper('url');
        $this->load->library(array('cssjs', 'session'));
        $this->cssjs->set_path_css(APP_PATH_CSS);
        $this->cssjs->set_path_js(APP_PATH_JS);
        $this->load->model('Recepcion_model');
        if(!$this->session->userdata('is_logged')){
        	redirect('login');
        }
    }
    //Funciones para la vista 
	public function index()
	{
		$this->load->view('header');
		$this->load->view('recepcion_view');
		$this->load->view('footer');
	}
    public function getSolicitudPendiente()
    {
       
        $result = $this->Recepcion_model->getSolicitudPendiente();

        echo json_encode($result); 
    }

    public function getResponsable()
    {
       
        $result = $this->Recepcion_model->getResponsable();

        echo json_encode($result); 
    }

    public function asignarSolicitud()
    {
        $data = $this->input->post();
       
        $result = $this->Recepcion_model->asignarSolicitud($data);

        echo json_encode($result); 
    }
    
}