<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/tcpdf/tcpdf.php';

class SolicitudController extends CI_Controller {



	public function __construct()
    {
        parent::__construct();
     
        $this->load->helper('url');
        $this->load->library(array('cssjs', 'session'));
        $this->load->library('tcpdf');
        $this->cssjs->set_path_css(APP_PATH_CSS);
        $this->cssjs->set_path_js(APP_PATH_JS);
        $this->load->model('Solicitud_model');
        if(!$this->session->userdata('is_logged')){
        	redirect('login');
        }
    }
    
	public function index()
	{
		$this->load->view('header');
		$this->load->view('analisis_view');
		$this->load->view('footer');
	}
    public function getSolicitudMedico()
    {
       
        $result = $this->Solicitud_model->getSolicitudMedico();

        echo json_encode($result); 
    }

    public function saveSolicitud()
    {
        $data = $this->input->post();
       
        $result = $this->Solicitud_model->saveSolicitud($data);

        echo json_encode($result); 
    }

    public function getSolicitudId()
    {
        $id = $this->input->post('id');
        $result = $this->Solicitud_model->getSolicitudId($id);

        echo json_encode($result); 
    }
    public function getResultadoId()
    {
        $id = $this->input->post('id');
        $result = $this->Solicitud_model->getResultadoId($id);

        echo json_encode($result); 
    }
    public function editSolicitud()
    {
        $data = $this->input->post();
       
        $result = $this->Solicitud_model->editSolicitud($data);

        echo json_encode($result); 
    }

    public function deleteSolicitud()
    {
        $id = $this->input->post('id');
        $result = $this->Solicitud_model->deleteSolicitud($id);
        echo json_encode($result); 
    }

    public function getReporte(){

        $idClinica = $this->input->post('idClinica');
        $idAnalisis = $this->input->post('idAnalisis');

        if($idClinica == 0){
            if($idAnalisis == 0){
                $datos = $this->Solicitud_model->getAllAnalisisForAllClinicas();
            }else{
                $datos = $this->Solicitud_model->getAnalisisIdForAllClinicas($idAnalisis);
            }
        }else{
            if($idAnalisis == 0){
                $datos = $this->Solicitud_model->getAllAnalisisForClinicaId();
            }else{
                $datos = $this->Solicitud_model->getAnalisisIdForClinicaId($idClinica, $idAnalisis);
            }
        }

        echo json_encode($datos);
    }

    public function generarPdf()
    {
        // Cargar la biblioteca TCPDF
        $this->load->library('tcpdf');

        // Crear un nuevo objeto TCPDF
        $pdf = new TCPDF();

        // Configurar el documento PDF
        $pdf->SetCreator('Your Name');
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Title of PDF');
        $pdf->SetSubject('Subject of PDF');
        $pdf->SetKeywords('Keywords of PDF');

        // Agregar una página
        $pdf->AddPage();

        // Escribir contenido en el PDF
        $pdf->SetFont('Helvetica', 'B', 14);
        $pdf->Cell(0, 10, 'Hello, World!', 0, 1, 'C');

        // Generar el archivo PDF
        $pdf->Output('example.pdf', 'I');
    }
    
}