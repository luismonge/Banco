<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
session_start();

class Only_authenticaded_users extends CI_Controller {
			
	public function __construct() {
		parent::__construct();	
		//$this->load->library('session');	
	}
	
	public function index() {
		if($this->session->userdata('logged_in'))
		{				
			redirect('banco/banco_controller/controlPanel', 'refresh');
		}										
		else
		{
			redirect('banco/banco_controller', 'refresh');		
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('banco/banco_controller', 'refresh');	
	}

}


?>