<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Solicitud_model extends CI_Model{

	private $db;
	private $tableS;
    private $tableDS;

	function __construct(){
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
		$this->tableS = 'solicitud';
        $this->tableDS = 'solicituddetalle';
	}

	function getSolicitudMedico(){
        $idU = $this->session->userdata('id'); 
        $query = "select id, paciente, fecha, muestra, observaciones, estado, idUsuarioLab from solicitud where idUsuarioMedico = '$idU'";

        $rs = $this->db->query($query);

        if ($rs->result()) {
            $datos = $rs->result_array();
            return $datos;
        }
        return false;
	}
    function saveSolicitud($data){

        $this->db->trans_start ();
        $idU = $this->session->userdata('id');
        $datos = array(
            'paciente' => $data['paciente'],
            'fecha' => $data['fecha'],
            'muestra' => $data['muestra'],
            'observaciones' => $data['observaciones'],
            'estado' => 'Pendiente',
            'idUsuarioMedico' => $idU
        );
        $this->db->insert($this->tableS, $datos);
        $Id = $this->db->insert_id();

        foreach ($data["detalle"] as $d) {
            $dataDS = array();
            $dataDS = array(
                "idSolicitud"=> $Id,
                "idAnalisis"=> $d,
            );

            $this->db->insert($this->tableDS, $dataDS);
        }

        $this->db->trans_complete ();
        
        if  ( $this->db->trans_status() === FALSE ) 
        { 
            return false;
        }

        return $Id;
    }
    function getSolicitudId($id){

        $query = "select id, paciente, fecha, muestra, observaciones, estado, idUsuarioMedico, idUsuarioLab from solicitud where id = '$id'";

        $solicitud = $this->db->query($query);

        if ($solicitud->result()) {
            $datos[] = $solicitud->row_array();

            $query1 = "select idAnalisis from solicituddetalle where idSolicitud = '$id'";

            $DetalleSolicitud = $this->db->query($query1);
            if ($DetalleSolicitud->result()) {
                $datos[] = $DetalleSolicitud->result_array();
            }
            

            return $datos;
        }
        return false;
    }
    function getResultadoId($id){

        $query = "select id, paciente, fecha, muestra, observaciones, estado, idUsuarioMedico, idUsuarioLab from solicitud where id = '$id'";

        $solicitud = $this->db->query($query);

        if ($solicitud->result()) {
            $datos[] = $solicitud->row_array();

            $query1 = "select sd.id, a.name as analisis, r.detalle as resultado, a.idCategoria, c.name as categoria from solicituddetalle as sd 
            inner join analisis as a on a.id = sd.idAnalisis
            inner join categoria as c on c.id = a.idCategoria
            inner join resultado as r on r.idSolicitudDetalle = sd.id
            where idSolicitud = '$id'";

            $DetalleSolicitud = $this->db->query($query1);
            if ($DetalleSolicitud->result()) {
                $datos[] = $DetalleSolicitud->result_array();
            }
            

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
    function deleteSolicitud($id){

        $this->db->trans_start ();

        $this->db->delete($this->tableDS, array('idSolicitud' => $id));
        $this->db->delete($this->tableS, array('id' => $id));
        
        $this->db->trans_complete ();
        
        if  ( $this->db->trans_status() === FALSE ) 
        { 
            return false;
        }

        return true;
    }
    
    function getAllClinicas(){
        $idU = $this->session->userdata('id'); 
        $query = "select id, name from clinica";

        $rs = $this->db->query($query);

        if ($rs->result()) {
            $datos = $rs->result_array();
            return $datos;
        }
        return false;
    }

    function getAllAnalisis(){
        $idU = $this->session->userdata('id'); 
        $query = "select id, name from analisis";

        $rs = $this->db->query($query);

        if ($rs->result()) {
            $datos = $rs->result_array();
            return $datos;
        }
        return false;
    }

    function getAllCategorias(){
        $idU = $this->session->userdata('id'); 
        $query = "select id, name from categoria";

        $rs = $this->db->query($query);

        if ($rs->result()) {
            $datos = $rs->result_array();
            return $datos;
        }
        return false;
    }

    function getAllAnalisisForAllClinicas(){

        $arrayDatas = array();

        $query = "select id, name from clinica";

        $clinicas = $this->db->query($query);

        if ($clinicas->result()) {

            $clinicas = $clinicas->result_array();
            

            foreach ($clinicas as $c) {

                $arrayClinicas = array();
                $arrayClinicas[]= $c['name'];
                $id = $c['id'];

                $query1 = "SELECT c.id, a.id, a.name, COUNT(sd.id) AS cantidadSolicitada, cat.id AS idCategoria, cat.name AS categoria 
                FROM Medico m 
                JOIN usuario u ON m.idUsuario = u.id 
                JOIN clinica c ON m.idClinica = c.id 
                JOIN solicitud s ON u.id = s.idUsuarioMedico 
                JOIN solicitudDetalle sd ON s.id = sd.idSolicitud 
                JOIN analisis a ON sd.idAnalisis = a.id
                JOIN categoria cat ON a.idCategoria = cat.id
                WHERE c.id = $id
                GROUP BY c.id, a.id";

                $Analisis = $this->db->query($query1);
                $arrayClinicas[] = $Analisis->result_array();

                $arrayDatas[] = $arrayClinicas;
            }
            

            return $arrayDatas;
        }
        return false;
    }
    function getAnalisisIdForAllClinicas($idCategoria){

        $arrayDatas = array();

        $query = "select id, name from clinica";

        $clinicas = $this->db->query($query);

        if ($clinicas->result()) {

            $clinicas = $clinicas->result_array();
            

            foreach ($clinicas as $c) {

                $arrayClinicas = array();
                $arrayClinicas[]= $c['name'];
                $id = $c['id'];

                $query1 = "SELECT c.id, a.id, a.name, COUNT(sd.id) AS cantidadSolicitada, cat.id AS idCategoria, cat.name AS categoria 
                FROM Medico m 
                JOIN usuario u ON m.idUsuario = u.id 
                JOIN clinica c ON m.idClinica = c.id 
                JOIN solicitud s ON u.id = s.idUsuarioMedico 
                JOIN solicitudDetalle sd ON s.id = sd.idSolicitud 
                JOIN analisis a ON sd.idAnalisis = a.id
                JOIN categoria cat ON a.idCategoria = cat.id
                WHERE c.id = $id and cat.id = $idCategoria
                GROUP BY c.id, a.id";

                $Analisis = $this->db->query($query1);
                $arrayClinicas[] = $Analisis->result_array();

                $arrayDatas[] = $arrayClinicas;
            }
            

            return $arrayDatas;
        }
        return false;
    }
    function getAllAnalisisForClinicaId($idClinica){

        $arrayDatas = array();

        $query = "select id, name from clinica where id = $idClinica";

        $clinicas = $this->db->query($query);

        if ($clinicas->result()) {

            $clinicas = $clinicas->result_array();
            

            foreach ($clinicas as $c) {

                $arrayClinicas = array();
                $arrayClinicas[]= $c['name'];
                $id = $c['id'];

                $query1 = "SELECT c.id, a.id, a.name, COUNT(sd.id) AS cantidadSolicitada, cat.id AS idCategoria, cat.name AS categoria
                FROM Medico m 
                JOIN usuario u ON m.idUsuario = u.id 
                JOIN clinica c ON m.idClinica = c.id 
                JOIN solicitud s ON u.id = s.idUsuarioMedico 
                JOIN solicitudDetalle sd ON s.id = sd.idSolicitud 
                JOIN analisis a ON sd.idAnalisis = a.id
                JOIN categoria cat ON a.idCategoria = cat.id
                WHERE c.id = $id
                GROUP BY c.id, a.id";

                $Analisis = $this->db->query($query1);
                $arrayClinicas[] = $Analisis->result_array();

                $arrayDatas[] = $arrayClinicas;
            }
            

            return $arrayDatas;
        }
        return false;
    }
    function getAnalisisIdForClinicaId($idClinica, $idCategoria){

        $arrayDatas = array();

        $query = "select id, name from clinica where id = $idClinica";

        $clinicas = $this->db->query($query);

        if ($clinicas->result()) {

            $clinicas = $clinicas->result_array();
            

            foreach ($clinicas as $c) {

                $arrayClinicas = array();
                $arrayClinicas[]= $c['name'];
                $id = $c['id'];

                $query1 = "SELECT c.id, a.id, a.name, COUNT(sd.id) AS cantidadSolicitada, cat.id AS idCategoria, cat.name AS categoria
                FROM Medico m 
                JOIN usuario u ON m.idUsuario = u.id 
                JOIN clinica c ON m.idClinica = c.id 
                JOIN solicitud s ON u.id = s.idUsuarioMedico 
                JOIN solicitudDetalle sd ON s.id = sd.idSolicitud 
                JOIN analisis a ON sd.idAnalisis = a.id
                JOIN categoria cat ON a.idCategoria = cat.id
                WHERE c.id = $id and cat.id = $idCategoria
                GROUP BY c.id, a.id";

                $Analisis = $this->db->query($query1);
                $arrayClinicas[] = $Analisis->result_array();

                $arrayDatas[] = $arrayClinicas;
            }
            

            return $arrayDatas;
        }
        return false;
    }
}