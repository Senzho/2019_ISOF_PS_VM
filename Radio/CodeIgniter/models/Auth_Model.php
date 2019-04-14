<?php

class Auth_Model extends CI_Model
{
    private $userData;

    public function __construct(){
		$this->load->database('radio');
        $this->load->helper('url');
        $this->load->library('session');
    }
    
    public function isInSession($data){
        return $this->session->userdata($data);
    }
    public function getUserData($id){
        $result;
        if (isset($this->userData)){
            $result = $this->userData;
        }else{
            $query = $this->db->get_where('usuario', array('idUsuario' => $id));
            if ($query->num_rows() === 1){
                $fila = $query->row();
                $result['account'] = array('id' => $fila->idUsuario, 'name' => $fila->nombre, 'email' => $fila->correo, 'phone' => $fila->telefono, 'user' => $fila->usuario, 'password' => $fila->contraseña);
                $result['finded'] = True;
            }else{
                $result['finded'] = False;
            }
            $this->userData = $result;
        }
        return $result;
    }
    public function getCredentialsUserData($user, $password){
        $result;
        if (isset($this->userData)){
            $result = $this->userData;
        }else{
            $query = $this->db->get_where('usuario', array('usuario' => $user, 'contraseña' => $password));
            if ($query->num_rows() === 1){
                $fila = $query->row();
                $result['account'] = array('id' => $fila->idUsuario, 'name' => $fila->nombre, 'email' => $fila->correo, 'phone' => $fila->telefono, 'user' => $fila->usuario, 'password' => $fila->contraseña);
                $result['finded'] = True;
            }else{
                $result['finded'] = False;
            }
            $this->userData = $result;
        }
        return $result;
    }
    public function validUser($user, $password){
        $result;
		$query = $this->db->get_where('usuario', array('usuario' => $user, 'contraseña' => $password));
		if ($query->num_rows() === 1){
			$fila = $query->row();
			$result = True;
		}else{
			$result = False;
		}
		return $result;
    }
    public function setUserId($id){
        $this->session->set_userdata('id', $id);
    }
    public function endSession($data){
        $this->session->unset_userdata($data);
    }
}