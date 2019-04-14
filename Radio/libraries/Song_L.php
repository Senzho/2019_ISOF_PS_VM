<?php

class Song_L {
    public function __construct(){
        $this->load->model('Song_Model', 'song_model');
    }

    public function __get($attr){
        return CI_Controller::get_instance()->$attr;
    }

    public function getQuizSongs(){
        return $this->song_model->getRandom();
    }
    public function getSongs(){
        return $this->song_model->getAll();
    }
}