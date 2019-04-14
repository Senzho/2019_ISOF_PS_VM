<?php

class Song_Model extends CI_Model
{
    public function __construct(){
		$this->load->database('radio');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function getRandom(){
        $array = array();
        $this->db->order_by('rand()');
        $this->db->limit(3);
        $query = $this->db->get('canciones');
        $result = $query->result();
        for ($i = 0; $i < count($result); $i ++){
            $fila = $result[$i];
            $array[$i] = array("id" => $fila->can_id, "name" => $fila->can_titulo);
        }
        return $array;
    }
    public function getAll(){
        $array = array();
        $query = $this->db->get('canciones');
        $result = $query->result();
        for ($i = 0; $i < count($result); $i ++){
            $fila = $result[$i];
            $array[$i] = array("id" => $fila->can_id, "name" => $fila->can_titulo);
        }
        return $array;
    }
}