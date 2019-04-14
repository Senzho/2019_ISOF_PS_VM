<?php

class Main extends CI_Controller
{
    private function show_main_page(){
        $account = $this->auth->getUserData($this->auth->getUserId());
        if ($account['finded']){
            $user = $account['account'];
            $this->load->view('pages/main', array('name' => 'Bienvenido ' . explode(' ', $user['name'])[0]));
        }else{
            $this->load->view('pages/error', array('message' => 'Lo sentimos, ocurrió un error al obtener la información de la cuenta'));
        }
    }

	public function __construct()
	{
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('auth');
    }

    public function view($page = 'main'){
    	if ($page === 'main'){
            if ($this->auth->isLogged()){
                $this->show_main_page();
            }else{
                redirect('Login/view/login', 'location');
            }
    	}else{
    		$this->load->view('pages/error', array('message' => 'Lo sentimos, no encontramos la página que deseas, asegurate de escribir la dirección correcta'));
    	}
    }
}