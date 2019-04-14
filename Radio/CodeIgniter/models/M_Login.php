<?php

class M_Login extends CI_Model
{
	public function __construct(){
		$this->load->database('radio');
	}

	public function find_user($user, $password)
	{
		$result;
		$query = $this->db->get_where('usuario', array('usuario' => $user, 'contraseña' => $password));
		if ($query->num_rows() === 1){
			$fila = $query->row();
			$result['id'] = $fila->idUsuario;
			$result['result'] = True;
		}else{
			$result['result'] = False;
		}
		return $result;
	}
}