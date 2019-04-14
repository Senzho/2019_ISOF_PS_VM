<?php

class M_Account extends CI_Model
{
	public function __construct(){
		$this->load->database('radio');
	}

	public function get_account($id)
	{
		$result;
		$query = $this->db->get_where('usuario', array('idUsuario' => $id));
		if ($query->num_rows() === 1){
			$fila = $query->row();
			$result['account'] = array('name' => $fila->nombre, 'email' => $fila->correo, 'phone' => $fila->telefono, 'user' => $fila->usuario, 'password' => $fila->contraseña);
			$result['finded'] = True;
		}else{
			$result['finded'] = False;
		}
		return $result;
	}
	public function store($user)
	{
		$user['activo'] = True;
		$user['idGrupo'] = 1;
		$result = $this->db->insert('usuario', $user);
		$id = $this->db->insert_id();
		$response = array('result' => $result, 'id' => $id);
		return $response;
	}
	public function update($user, $id)
	{
		$updated = $this->db->update('usuario', $user, array('idUsuario' => $id));
		return $updated;
	}
}