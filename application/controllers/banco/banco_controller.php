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
			$this->load->model('banco/banco_model', 'b_model');

			$session_data      = $this->session->userdata('logged_in');
			$data              = $session_data['id'];
			$result['cuentas'] = $this->b_model->account($data);

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
			$balance    = $this->b_model->getMoves($no_cuenta);
			$saldoTotal = $this->b_model->getBalance($no_cuenta);
			
			foreach ($saldoTotal as $val) 
			{
				$arr = array(
					'bal' => $balance,
					'saldo' => $saldoTotal
				);
			}

			$this->load->view('Banco/resultado', $arr);
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
			$this->load->model('banco/banco_model', 'b_model');
			$session_data = $this->session->userdata('logged_in');
			$data         = $session_data['id'];

			$accounts['cuentas'] = $this->b_model->account($data);

			$this->load->view('Banco/transaction', $accounts);
		}
		else
		{
			$this->index();
		}
	}


	public function doTransaction($value='')
	{
		if($this->session->userdata('logged_in'))
		{
			date_default_timezone_set('America/Hermosillo');
			$this->load->model('banco/banco_model', 'b_model');

			$corigen    = $this->input->post('cuenta_origen');			
			$cdestino   = $this->input->post('cuenta_destino');
			$cantidad   = $this->input->post('cantidad');
			$sucursal   = 999;
			$referencia = rand(1000, 9999);
			$fecha      = date('Y-m-d H:i:s');
			$saldoTotal = $this->b_model->getBalance($corigen); //Objeto que obtiene el saldo total de la cuenta
			$saldoTotal2 = $this->b_model->getBalance($cdestino);

			foreach ($saldoTotal as $val) 
			{
				$saldoTotal = $val ->saldo;
			}

			foreach ($saldoTotal2 as $val) 
			{
				$saldoTotal2 = $val ->saldo;
			}

			if ($saldoTotal > $cantidad) 
			{
				$id_transaccion = $this->b_model->getMaxID();
				foreach ($id_transaccion as $val) 
				{
					$id_transaccion = ($val ->id_transaccion) + 1;
				}

				$deposit = array(
					'id_transaccion' => $id_transaccion,
					'cuenta'         => $cdestino,
					'cantidad'		 => $cantidad,
					'referencia'     =>	$referencia,
					'sucursal'       => $sucursal,
					'tipo_mov'       => '1',
					'fecha'          => $fecha,
					'tarjeta'		 => '-1'
				);

				$out = array(
					'id_transaccion' => $id_transaccion,
					'cuenta'         => $corigen,
					'cantidad'		 => $cantidad,
					'referencia'     =>	$referencia,
					'sucursal'       => $sucursal,
					'tipo_mov'       => '2',
					'fecha'          => $fecha,
					'tarjeta'		 => '-1'
				);

				$cash_insert = array(
					'saldo' => $saldoTotal2 + $cantidad
				);

				$cash_discount =  array(
					'saldo' => $saldoTotal - $cantidad
				);

				$this->b_model->doTransaction($deposit, $out);	
				$this->b_model->cash_discount($cash_discount, $corigen);
				$this->b_model->cash_insert($cash_insert, $cdestino);			
			}
			else
			{
				$error = "No cuenta con el suficiente efectivo para realizar la transacción";
				return $error;
			}

			

		}
		else
		{
			$this->index();
		}
	}


}

?>