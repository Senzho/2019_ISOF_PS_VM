<?php

class Auth {
    public function __construct(){
        $this->load->model('Auth_Model', 'model');
    }

    public function __get($attr){
        return CI_Controller::get_instance()->$attr;
    }

    public function isLogged(){
        return $this->model->isInSession('id');
    }
    public function getUserId(){
        return $this->isLogged();
    }
    public function getUserData($id){
        return $this->model->getUserData($id);
    }
    public function getCredentialsUserData($user, $password){
        return $this->model->getCredentialsUserData($user, $password);
    }
    public function validUser($user, $password){
        return $this->model->validUser($user, $password);
    }
    public function setUserId($user, $password){
        if ($this->validUser($user, $password)){
            $data = $this->getCredentialsUserData($user, $password);
            $this->model->setUserId($data['account']['id']);
        }
    }
    public function endSession(){
        $this->model->endSession('id');
    }
}