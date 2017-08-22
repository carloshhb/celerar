<?php

/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 24/04/2017
 * Time: 01:38
 */
class Sessao extends CI_Hooks
{

    function verificarSessao(){

        if(empty($_SESSION['logged_in'])) {
            $this->load->view('welcome_message2');
            $this->session->set_flashdata('flash_data', 'Você não está logado!');
        }
    }
}