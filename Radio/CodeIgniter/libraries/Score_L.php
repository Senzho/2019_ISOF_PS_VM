<?php

class Score_L {
    public function __construct(){
        $this->load->model('Score_Model', 'score_model');
    }

    public function __get($attr){
        return CI_Controller::get_instance()->$attr;
    }

    public function store($song_id, $score){
        return $this->score_model->store($song_id, $score);
    }
}