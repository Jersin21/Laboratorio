<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recepcion_model extends CI_Model{

	private $db;
	private $tableS;
    private $tableDS;

	function __construct(){
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
		$this->tableS = 'solicitud';
        $this->tableDS = 'solicituddetalle';
	}

	function getSolicitudPendiente(){
        $idU = $this->session->userdata('id'); 
        $query = "select s.id, s.paciente, s.fecha, s.muestra, s.observaciones, s.estado, s.idUsuarioLab, m.especialidad, CONCAT(p.nombre, ' ', p.apellidos) As medico, c.name As clinica from solicitud as s
            inner join usuario as u on u.id = s.idUsuarioMedico
            inner join medico as m on m.idUsuario = u.id
            inner join clinica as c on c.id = m.idClinica
            inner join persona as p on p.id = u.idPersona
            where s.estado = 'Pendiente'";

        $rs = $this->db->query($query);

        if ($rs->result()) {
            $datos = $rs->result_array();
            return $datos;
        }
        return false;
	}
    function getResponsable(){

        $query = "select CONCAT(p.nombre, ' ', p.apellidos, '-', p.ci) As label, u.id as value from usuario u
            inner join persona as p on p.id = u.idPersona
            where idTipoUsuario = 6";

        $rs = $this->db->query($query);

        if ($rs->result()) {
            $datos = $rs->result();
            return $datos;
        }
        return false;
    }
    function asignarSolicitud($data){

        $this->db->trans_start();

        $where = array('id' => $data['idSolicitud']);

        $datos = array(
            'idUsuarioLab ' => $data['idResponsable'],
            'estado' => 'Iniciado'
        );

        $this->db->update($this->tableS, $datos, $where);

        $this->db->trans_complete();
        
        if  ( $this->db->trans_status() === FALSE ) 
        { 
            return false;
        }

        return true;
    }
}