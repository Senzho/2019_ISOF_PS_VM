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
}