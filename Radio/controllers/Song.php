<?php

class Song extends CI_Controller
{
    public function __construct()
	{
        parent::__construct();
        $this->load->library('auth');
        $this->load->library('song_l');
        $this->load->helper('url');
    }

    public function quizSongs(){
        echo json_encode($this->song_l->getQuizSongs());
    }
    public function songs(){
        if ($this->auth->isLogged()){
            echo json_encode($this->song_l->getSongs());
        }
    }
}