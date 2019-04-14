<?php

class Login extends CI_Controller
{
	private function validate_data(){
        $this->form_validation->set_rules('user', 'Usuario', 'trim|required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('password', 'Contraseña', 'trim|required|min_length[5]|max_length[25]');
        return $this->form_validation->run();
    }

	public function __construct()
	{
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('auth');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function view($page = 'login'){
    	if ($page === 'login'){
            if ($this->auth->isLogged()){
                redirect('Main/view/main', 'location');
            }else{
                $this->load->view('pages/login', array('message' => ''));
            }
    	}else{
    		$this->load->view('pages/error', array('message' => 'Lo sentimos, no encontramos la página que deseas, asegurate de escribir la dirección correcta'));
    	}
    }
    public function login(){
        if ($this->auth->isLogged()){
            redirect('Main/view/main', 'location');
        }else{
            $user = $this->input->post('user');
            $password = $this->input->post('password');
            if ($this->validate_data()){
                if ($this->auth->validUser($user, $password)){
                    $this->auth->setUserId($user, $password);
                    redirect('Main/view/main', 'location');
                }else{
                    $this->load->view('pages/error', array('message' => 'Lo sentimos, no encontramos una cuenta con los datos proporcionados, asegurate de escribir tu nombre de usuario y contraseña correctamente'));
                }
            }else{
            	$this->load->view('pages/login', array('message' => 'Los datos no son válidos'));
            }
        }
    }
    public function log_out(){
    	$this->auth->endSession();
    	redirect('Index/view', 'location');
    }
}