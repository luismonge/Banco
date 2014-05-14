<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');	

class Banco_model extends CI_Model{	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

	function login($username, $password)
	{
		$this-> db-> select('id_usuario, nombre_usuario');
		$this-> db-> from('Usuario');
		$this-> db-> where('nombre_usuario', $username);
		$this-> db-> where('password', MD5($password));
		$this-> db-> limit(1);		
		$query = $this->db->get();
		
		if ($query->num_rows() == 1)
		{
			return $query->result();
		}
		else {
			return false;
		}
		
	}

	function account($id_usuario)
	{
		$this->db->select('no_cuenta');
		$this->db->from('Cuenta');
		$this->db->where('cve_usuario', $id_usuario);
		$this->db->order_by('no_cuenta', 'asc');
		$query = $this->db->get();

		return $query->result();
	}

	function one_account($id_usuario)
	{
		$this->db->select('no_cuenta');		
		$this->db->where('cve_usuario', $id_usuario);
		$this->db->order_by('no_cuenta', 'asc');
		$query = $this->db->get('Cuenta',1);

		return $query->result();
	}

	function account_exits($cdestino)
	{		
		$this->db->where('no_cuenta', $cdestino);		
		$query = $this->db->get('Cuenta',1);
		
		if ($query->num_rows() == 1)
		{
			return $query->result();
		}
		else {
			return false;
		}
	}

	function getMoves($no_cuenta) {
		$this->db->select('*');
		$this->db->from('Transaccion');
		$this->db->where('cuenta', $no_cuenta);
		$this->db->order_by("id_transaccion", "asc");
		$query = $this->db->get();

		return $query->result();
	}

	function getSomeMoves($no_cuenta) {
		$this->db->select('id_transaccion, cuenta, cantidad, tipo_mov, fecha');		
		$this->db->where('cuenta', $no_cuenta);
		$this->db->order_by("id_transaccion", "desc");
        $this->db->limit(3);
		$query = $this->db->get('Transaccion');

		return $query->result();
	}

	public function getBalance($no_cuenta)
	{
		$this->db->select('saldo');
		$this->db->from('Cuenta');
		$this->db->where('no_cuenta', $no_cuenta);
		$query = $this->db->get();

		if ($query->num_rows() == 1)
		{
			return $query->result();
		}
		else {
			return false;
		}
	}

	function getMaxID()
	{
		$this->db->select_max('id_transaccion');
		$query = $this->db->get('Transaccion');
		return $query->result();
	}

	function doTransaction($deposit, $out)
	{
		$this->deposit($deposit);
		$this->out($out);
	}

	function deposit($deposit)
	{
		$this->db->insert('Transaccion', $deposit);
	}

	function out($out)
	{
		$this->db->insert('Transaccion', $out);
	}

	function cash_discount($array, $cuenta)
	{
		$this->db->where('no_cuenta', $cuenta);
		$this->db->update('Cuenta', $array);
	}

	function cash_insert($array, $cuenta)
	{
		$this->db->where('no_cuenta', $cuenta);
		$this->db->update('Cuenta', $array);
	}
}
?>