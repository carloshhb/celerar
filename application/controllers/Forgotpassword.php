<?php

/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 28/04/2017
 * Time: 21:34
 */
class Forgotpassword extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    function index(){
        $this->load->view('pages/forgotpassword');
    }

}