<?php

class Song_Model extends CI_Model
{
    public function __construct(){
		$this->load->database('radio');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('score_model');
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
        $this->db->select('*');
        $this->db->from('canciones');
        $this->db->join('puntuaciones', 'puntuaciones.pun_can_id = canciones.can_id');
        $query = $this->db->get();
        $result = $query->result();

        $final = array();
        for ($i = 0; $i < count($result); $i ++){
            $fila = $result[$i];
            $isIn = False;
            for ($c = 0; $c < count($final); $c ++){
                if ($fila->can_id == $final[$c]["can_id"]){
                    $isIn = True;
                    break;
                }
            }
            if (!$isIn){
                array_push($final, array("can_id" => $fila->can_id, "can_titulo" => $fila->can_titulo));
            }
        }

        for ($i = 0; $i < count($final); $i ++){
            $element = $final[$i];
            $score = $this->score_model->getScore($result, $element["can_id"]);
            $array[$i] = array("id" => $element["can_id"], "name" => $element["can_titulo"], "votes" => $score["votes"], "average" => $score["average"]);
        }
        return $array;
    }
}