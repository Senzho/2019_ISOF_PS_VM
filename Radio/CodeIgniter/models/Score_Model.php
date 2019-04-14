<?php

class Score_Model extends CI_Model
{
    public function __construct(){
		$this->load->database('radio');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function store($song_id, $score){
        $result = $this->db->insert('puntuaciones', array("pun_can_id" => $song_id, "puntuacion" => $score));
        return $result;
    }
    public function getScore($lista, $id){
        $votes = 0;
        $score = 0.0;
        for ($i = 0; $i < count($lista); $i ++){
            $fila = $lista[$i];
            if ($fila->can_id == $id){
                $votes ++;
                $score = $score + $fila->puntuacion;
            }
        }
        $array = array("votes" => $votes, "average" => ($score / $votes));
        return $array;
    }
}