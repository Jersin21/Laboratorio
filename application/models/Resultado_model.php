<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resultado_model extends CI_Model{

	private $db;
	private $tableS;
    private $tableDS;

	function __construct(){
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
		$this->tableS = 'solicitud';
        $this->tableDS = 'solicituddetalle';
        $this->tableR = 'resultado';
        $this->tableI = 'image';
	}

	function getSolicitudMedico(){
        $idU = $this->session->userdata('id'); 
        $query = "select id, paciente, fecha, muestra, observaciones, estado, idUsuarioLab from solicitud where idUsuarioLab = '$idU'";

        $rs = $this->db->query($query);

        if ($rs->result()) {
            $datos = $rs->result_array();
            return $datos;
        }
        return false;
	}
    function saveResultado($data){

        $this->db->trans_start ();

        $where = array('id' => $data['id']);

        $datos = array(
            'estado' => "Completado" 
        );

        $this->db->update($this->tableS, $datos, $where);

        foreach ($data['data'] as $d) {
            $dataR = array();
            $dataR = array(
                "idSolicitudDetalle "=> $d['id'],
                "detalle"=> $d['valor'],
                "fecha"=> date('Y-m-d')
            );

            $this->db->insert($this->tableR, $dataR);
        }

        $this->db->trans_complete ();
        
        if  ( $this->db->trans_status() === FALSE ) 
        { 
            return false;
        }

        return true;
    }
    function saveImage($id, $data){

        $this->db->trans_start ();

        foreach ($data as $d) {
            $dataI = array();
            $dataI = array(
                "idSolicitudDetalle "=> $id,
                "image_path"=> $d
            );

            $this->db->insert($this->tableI, $dataI);
        }

        $this->db->trans_complete ();
        
        if  ( $this->db->trans_status() === FALSE ) 
        { 
            return false;
        }

        return true;
    }
    function getSolicitudId($id){

        $query = "select id, paciente, fecha, muestra, observaciones, estado, idUsuarioMedico, idUsuarioLab from solicitud where id = '$id'";

        $solicitud = $this->db->query($query);

        if ($solicitud->result()) {
            $datos[] = $solicitud->row_array();

            $query1 = "select sd.id, a.name as analisis, a.idCategoria, c.name as categoria from solicituddetalle as sd 
            inner join analisis as a on a.id = sd.idAnalisis
            inner join categoria as c on c.id = a.idCategoria
            where idSolicitud = '$id'";

            $DetalleSolicitud = $this->db->query($query1);
            if ($DetalleSolicitud->result()) {
                $datos[] = $DetalleSolicitud->result_array();
            }
            

            return $datos;
        }
        return false;
    }

    function getImages($id){
        
        $query = "select image_path from image where idSolicitudDetalle  = '$id'";

        $rs = $this->db->query($query);

        if ($rs->result()) {
            $datos = $rs->result_array();
            return $datos;
        }
        return false;
    }

    function editSolicitud($data){

        $this->db->trans_start();

        $where = array('id' => $data['id']);

        $datos = array(
            'paciente' => $data['paciente'],
            'fecha' => $data['fecha'],
            'muestra' => $data['muestra'],
            'observaciones' => $data['observaciones'],
        );

        $this->db->update($this->tableS, $datos, $where);

        $this->db->delete($this->tableDS, array('idSolicitud' => $data['id']));

        foreach ($data["detalle"] as $d) {
            $dataDS = array();
            $dataDS = array(
                "idSolicitud"=> $data['id'],
                "idAnalisis"=> $d,
            );

            $this->db->insert($this->tableDS, $dataDS);
        }

        $this->db->trans_complete();
        
        if  ( $this->db->trans_status() === FALSE ) 
        { 
            return false;
        }

        return true;
    }
}