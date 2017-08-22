<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @name Login.php
 * @author Imron rosdiana
 */
class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->model(array('login_model', 'login_database'));
    }

    public function index()
    {
        if (!empty($_SESSION['logged_in']))
            redirect('home/procedimentos');
        else {

            $this->form_validation->set_rules('username', 'Usuário', 'trim|required|xss_clean', array('required' => "O campo %s é obrigatório"));
            $this->form_validation->set_rules('password', 'Senha', 'trim|required|xss_clean', array('required' => "O campo %s é obrigatório"));

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('pages/login_view');
            } else {
                $data = array(
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password')
                );
                $result = $this->login_model->validate_user($data);
                if (!empty($result)) {
                    $data = array(
                        'id' => $result->id,
                        'username' => $result->username,
                        'nome' => $result->pnome,
                        'unome' => $result->unome,
                        'adv' => $result->adv,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('flash_data', 'Logado com sucesso');
                    if ($data['id'] == 1)
                        redirect('home/admin');
                    else
                        redirect(site_url('home/procedimentos'));
                } else {
                    $this->session->set_flashdata('flash_data', 'Usuário ou senha inválido!');
                    $this->load->view('pages/login_view');
                }
            }
        }
    }
}
