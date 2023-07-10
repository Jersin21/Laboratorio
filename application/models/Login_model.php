<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{

	private $db;
	private $table;

	function __construct(){
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
        $this->load->library('cription');

		$this->table = 'usuario';
	}


	function get_User($data){
        
        $contra = $data['contraseña'];

        $this->db->where('usuario', $data['usuario']);
        $rs = $this->db->get('usuario');

        $dato = array();

        if ($rs->num_rows() > 0) {
            $rw = $rs->row();
            $contrace =$this->cription->decryption($rw->contraseña);
            if('pass' == $contra){
                $dato = array(
                    'usuario' => $rw->usuario,
                    'contraseña' => $rw->contraseña,
                    'id' => $rw->id,
                    'emailCorporativo' => $rw->emailCorporativo,
                    'idPersona' => $rw->idPersona,
                    'idTipoUsuario' => $rw->idTipoUsuario,
                    'url'=>'portada',
                    'is_logged' => TRUE
                );
                return $dato;
            }
            return false;
        }
        return false;
	}
}
