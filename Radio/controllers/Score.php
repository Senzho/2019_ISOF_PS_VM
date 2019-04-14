<?php

class Score extends CI_Controller
{
    private function validate_data($index){
        $songId = "songId" + index;
        $score = "scoreSelect" + index;
        $this->form_validation->set_rules($songId, $songId, 'required');
        $this->form_validation->set_rules($score, $score, 'required');
        return $this->form_validation->run();
    }
    public function __construct()
	{
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('score_l');
        $this->load->helper('url');
    }

    public function saveQuiz(){
        for ($i = 0; $i < 3; $i ++){
            $songId = $this->input->post('songId' . strval($i));
            $score = $this->input->post('scoreSelect' . strval($i));
            //if ($this->validate_data($i)){
                $this->score_l->store($songId, $score);
            //}
        }
    }
}