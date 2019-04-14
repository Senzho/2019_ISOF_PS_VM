<?php

class Account extends CI_Controller
{
    private function show_account_page($new, $message = ''){
        if ($new){
            $this->load->view('pages/account', array('new' => $new, 'account' => array('name' => '', 'email' => '', 'phone' => '', 'user' => '', 'password' => ''), 'message' => $message));
        }else{
            $account = $this->M_Account->get_account($this->session->userdata('id'));
            if ($account['finded']){
                $this->load->view('pages/account', array('new' => $new, 'account' => $account['account'], 'message' => $message));
            }else{
                $this->load->view('pages/error', array('message' => 'Lo sentimos, ocurrió un error al obtener la información de la cuenta'));
            }
        }
    }
    private function show_error_account_page($new, $account, $message){
        $gui_account = array('name' => $account['nombre'], 'email' => $account['correo'], 'phone' => $account['telefono'], 'user' => $account['usuario'], 'password' => $account['contraseña']);
        $this->load->view('pages/account', array('new' => $new, 'account' => $gui_account, 'message' => $message));
    }
    private function validate_data(){
        $this->form_validation->set_rules('name', 'Nombre', 'trim|required|min_length[10]|max_length[100]');
        $this->form_validation->set_rules('email', 'Correo', 'trim|required|min_length[5]|max_length[100]|valid_email');
        $this->form_validation->set_rules('phone', 'Teléfono', 'trim|required|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('user', 'Usuario', 'trim|required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('password', 'Contraseña', 'trim|required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('confirmation', 'Confirmación', 'trim|required|min_length[5]|max_length[25]|matches[password]');
        return $this->form_validation->run();
    }

	public function __construct()
	{
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('M_Account');
    }

    public function view($page = 'new'){
    	if ($page === 'new'){
    		if ($this->session->userdata('id')){
    			redirect('Main/view/main', 'location');
    		}else{
    			$this->show_account_page(True);
    		}
    	}else if ($page === 'update'){
            if ($this->session->userdata('id')){
                $this->show_account_page(False);
            }else{
                redirect('Login/view/login', 'location');
            }
        }else{
    		$this->load->view('pages/error', array('message' => 'Lo sentimos, no encontramos la página que deseas, asegurate de escribir la dirección correcta'));
    	}
    }
    public function store(){
        if (!$this->session->userdata('id')){
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $user = $this->input->post('user');
            $password = $this->input->post('password');
            $confirmation = $this->input->post('confirmation');
            $account = array('nombre' => $name, 'correo' => $email, 'telefono' => $phone, 'usuario' => $user, 'contraseña' => $password);
            if ($this->validate_data()){
                $result = $this->M_Account->store($account);
                if ($result['result']){
                    $this->session->set_userdata('id', $result['id']);
                    redirect('Main/view/main', 'location');
                }else{
                    $this->load->view('pages/error', array('message' => 'Lo sentimos, ocurrió un error al crear tu cuenta'));
                }
            }else{
                $this->show_error_account_page(True, $account, 'Los datos no son válidos');
            }
        }else{
            $this->load->view('pages/error', array('message' => 'Lo sentimos, no tienes permiso'));
        }
    }
    public function update(){
        $id = $this->session->userdata('id');
        if ($id){
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $user = $this->input->post('user');
            $password = $this->input->post('password');
            $confirmation = $this->input->post('confirmation');
            $account = array('nombre' => $name, 'correo' => $email, 'telefono' => $phone, 'usuario' => $user, 'contraseña' => $password);
            if ($this->validate_data()){
                if ($this->M_Account->update($account, $id)){
                    redirect('Main/view/main', 'location');
                }else{
                    $this->load->view('pages/error', array('message' => 'Lo sentimos, ocurrió un error al actualizar tu cuenta'));
                }
            }else{
                $this->show_error_account_page(False, $account, 'Los datos no son válidos');
            }
        }else{
            $this->load->view('pages/error', array('message' => 'Lo sentimos, no tienes permiso'));
        }
    }
}