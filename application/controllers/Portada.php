<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portada extends CI_Controller {



	public function __construct()
    {
        parent::__construct();
     
        $this->load->helper('url');
        $this->load->library('session');
        if(!$this->session->userdata('is_logged')){
        	redirect('login');
        }
    }

	public function index()
	{
		$this->load->view('header');
		$this->load->view('portada');
		$this->load->view('footer');
	}
}