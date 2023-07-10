<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/tcpdf/tcpdf.php';

class ReporteController extends CI_Controller {



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
    //Funciones para la vista 
	public function index()
	{
        $data['clinicas'] = $this->Solicitud_model->getAllClinicas();
        $data['categoria'] = $this->Solicitud_model->getAllCategorias();

		$this->load->view('header');
		$this->load->view('reporte_view', $data);
		$this->load->view('footer');
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
        $idClinica = $this->input->post('clinica');
        $idAnalisis = $this->input->post('analisis');
        
        if($idClinica == 0){
            if($idAnalisis == 0){
                $datos = $this->Solicitud_model->getAllAnalisisForAllClinicas();
            }else{
                $datos = $this->Solicitud_model->getAnalisisIdForAllClinicas($idAnalisis);
            }
        }else{
            if($idAnalisis == 0){
                $datos = $this->Solicitud_model->getAllAnalisisForClinicaId($idClinica);
            }else{
                $datos = $this->Solicitud_model->getAnalisisIdForClinicaId($idClinica, $idAnalisis);
            }
        }

        // Cargar la biblioteca TCPDF
        $this->load->library('tcpdf');

        // Crear un nuevo objeto TCPDF
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING_CORP);

        // Configurar el documento PDF
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Michael Jackson');
        $pdf->SetTitle('Reporte');
        $pdf->SetSubject('Subject of PDF');
        $pdf->SetKeywords('Keywords of PDF');
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


        foreach ($datos as $data) {
            //crea el cuerpo del pdf
            $data["data"] = $data;
            $html = $this->load->view('reporte', $data, true);
            
            $pdf->AddPage();

            // Escribir el contenido HTML en el PDF
            $pdf->writeHTML($html, true, false, true, false, '');
        }

        



        // Generar el archivo PDF
        $pdf->Output('example.pdf', 'I');
    }
    
}