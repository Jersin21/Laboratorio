<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResultadoController extends CI_Controller {



	public function __construct()
    {
        parent::__construct();
     
        $this->load->helper('url');
        $this->load->library(array('cssjs', 'session'));
        $this->cssjs->set_path_css(APP_PATH_CSS);
        $this->cssjs->set_path_js(APP_PATH_JS);
        $this->load->model('Resultado_model');
        if(!$this->session->userdata('is_logged')){
        	redirect('login');
        }
    }
    //Funciones para la vista 
	public function index()
	{
		$this->load->view('header');
		$this->load->view('resultado_view');
		$this->load->view('footer');
	}
    public function getSolicitudMedico()
    {
       
        $result = $this->Resultado_model->getSolicitudMedico();

        echo json_encode($result); 
    }

    public function saveResultado()
    {
        $data = $this->input->post();
       
        $result = $this->Resultado_model->saveResultado($data);

        echo json_encode($result); 
    }

    public function getSolicitudId()
    {
        $id = $this->input->post('id');
        $result = $this->Resultado_model->getSolicitudId($id);

        echo json_encode($result); 
    }

    public function saveImage()
    {
        $id = $_POST["id"];
        $files = $_FILES["files"];
        $images = array();

        foreach ($files["name"] as $i => $name) {
          $tmp_name = $files["tmp_name"][$i];
          $error = $files["error"][$i];
          
          $FileName = $id."_".date("YmdHis")."_".$name;
          if ($error == UPLOAD_ERR_OK) {
            $path = "uploads/$FileName";
            move_uploaded_file($tmp_name, $path);
            $images[] = $path;
          }
        }
        $result = $this->Resultado_model->saveImage($id, $images);

        echo json_encode($images); 
    }

    public function GetImages()
    {
        $id = $this->input->post('id');
        $result = $this->Resultado_model->getImages($id);

        echo json_encode($result); 
    }

    public function editSolicitud()
    {
        $data = $this->input->post();
       
        $result = $this->Resultado_model->editSolicitud($data);

        echo json_encode($result); 
    }

    public function deleteSolicitud()
    {
        $id = $this->input->post('id');
        $result = $this->Resultado_model->deleteSolicitud($id);
        echo json_encode($result); 
    }

   
    
}