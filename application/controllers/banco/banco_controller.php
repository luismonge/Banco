<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Banco_controller extends CI_Controller {
	
	public function __construct() {
		parent::__construct();		
	}
	
	public function index() {
		$this->load->helper('form');	
		$this->load->view('banco/index');										
	}

	public function controlPanel ()
	{
		if($this->session->userdata('logged_in'))
		{
			$this->load->view('banco/control_panel');											
		}
		else 
		{
			$this->index();
		}
	}

	public function money()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data         = $session_data['id'];

			$this->load->model('banco/banco_model', 'b_model');
			$result['cuentas'] = $this->b_model->balance($data);

			$this->load->view('banco/consulta', $result);
		}
		else
		{
			$this->index();
		}
		
	}

	public function checkBalance()
	{
		if($this->session->userdata('logged_in'))
		{
			$no_cuenta = $this->input->get('id',TRUE);			

			$this->load->model('banco/banco_model', 'b_model');
			$balance['bal'] = $this->b_model->getBalance($no_cuenta);
			
			$this->load->view('Banco/resultado', $balance);
		}
		else
		{
			$this->index();
		}
	}

	public function goTransaction($value='')
	{
		if($this->session->userdata('logged_in'))
		{
			$this->load->view('Banco/transaction');
		}
		else
		{
			$this->index();
		}
	}

}

?>