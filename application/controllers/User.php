<?php

/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 16/04/2017
 * Time: 15:52
 */
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->model(array('user_model', 'login_model'));

        $this->timeNow = mdate('%Y-%m-%d %H:%i:%s', now('BRT'));
        $this->timeObject = new DateTime($this->timeNow);
        $interval = new DateInterval("P0Y0DT2H0M");
        date_add($this->timeObject, $interval);
    }

    public function index(){

        $this->form_validation->set_rules('username', 'Usuário', 'trim|required|alpha_numeric|min_length[3]
        |max_length[30]|is_unique[logins.username]|xss_clean',
            array(
                'alpha_numeric' => 'Apenas letras e números',
                'required' => '%s não preenchido',
                'is_unique' => 'Este %s já existe'
            ));
        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[logins.email]|xss_clean',
            array(
                'is_unique' => 'Este %s já existe',
                'valid_email' => 'O E-mail digitado não é válido',
                'required' => 'Obrigatório'
            ));
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passwordCheck]|xss_clean',
            array(
                'required' => 'Obrigatório',
                'matches' => 'As senhas não conferem'
            ));
        $this->form_validation->set_rules('passwordCheck', 'Confirm Password', 'trim|required|xss_clean',
            array(
                'required' => 'Obrigatório',
            ));
        $this->form_validation->set_rules('pnome', 'Nome', 'trim|required|xss_clean',
            array(
                'required' => 'Obrigatório'
            ));
        $this->form_validation->set_rules('unome', 'Sobrenome', 'trim|required|xss_clean',
            array(
                'required' => 'Obrigatório'
            ));
        $this->form_validation->set_rules('cpf', 'CPF ID', 'trim|required|xss_clean|is_unique[logins.cpf]|callback_TestaCPF',
            array(
                'required' => 'Obrigatório',
                'is_unique[logins.cpf]' => 'CPF já cadastrado'
            ));

        if ($this->input->post('eadv') == 1){
            $adv = 1;
            $this->form_validation->set_rules('noab', 'Número da OAB', 'trim|required|numeric',
                array(
                    'required' => 'Obrigatório',
                    'numeric' => 'Apenas números'
                ));
        }
        else
            $adv = 0;

        if ($this->form_validation->run() == FALSE)
        {
            // fails
            $this->load->view('pages/home_view');
        }
        else {

            if (isset($_POST['g-recaptcha-response']))
                $captcha = $_POST['g-recaptcha-response'];
            if (!$captcha)
                echo '<script> alert("Por favor, verifique o Captcha.") </script>';

            $secretKey = "6LdTSCQUAAAAAFnG3Dwl8btdBY4F5OeyEt2XG3XP";
            $ip = $_SERVER['REMOTE_ADDR'];

            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
            $responseKeys = json_decode($response, true);
            if (intval($responseKeys['success']) !== 1)
                $this->load->view('pages/home_view');
            else {
                $CPF = $this->input->post('cpf');
                $strCPF = $this->user_model->limparMask($CPF);
                if ($adv == 0)
                    $secOAB = "";
                else {
                    $secOAB = $this->input->post('secoab');
                }
                if ($this->TestaCPF($CPF)){
                    $data = array(
                        'username' => $this->input->post('username'),
                        'email' => $this->input->post('email'),
                        'password' => password_hash(($this->input->post('password')), PASSWORD_BCRYPT),
                        'pnome' => $this->input->post('pnome'),
                        'unome' => $this->input->post('unome'),
                        'cpf' => $strCPF,
                        'adv' => $adv,
                        'noab' => $this->input->post('noab'),
                        'seccional' => $secOAB
                    );

                    if ($this->user_model->insertUser($data))
                    {
                        $this->session->set_flashdata('msg', 'You are Successfully Registered! Please login to access your Profile!');
                        redirect('login');
                    } else {
                        // error
                        $this->session->set_flashdata('msg', 'Oops! Error.  Please try again later!!!');
                        redirect('registro');
                    }
                }
                redirect('registro');
            }
        }
    }

    function TestaCPF($CPF){
        if (!empty($CPF)){
            //Verifica se CPF é válido
            $Soma = 0;
            $Resto = 0;
            //strCPF  = RetiraCaracteresInvalidos(strCPF,11);

            $strCPF = $this->user_model->limparMask($CPF);
            $verCPF = $this->user_model->verificarCPF($strCPF);
            if (!$verCPF){
                $this->form_validation->set_message('TestaCPF', 'CPF digitado é invalido');
                return false;
            }

            for ($i=1; $i<=9; $i++)
                $Soma = $Soma + parse_str(substr($strCPF,$i-1, $i)) * (11 - $i);
            $Resto = ($Soma * 10) % 11;
            if (($Resto == 10) || ($Resto == 11))
                $Resto = 0;
            if ($Resto != parse_str(substr($strCPF,9, 10))){
                $this->form_validation->set_message('TestaCPF', 'CPF digitado é invalido');
                return false;
            }
            $Soma = 0;
            for ($i = 1; $i <= 10; $i++)
                $Soma = $Soma + parse_str(substr($strCPF,$i-1, $i)) * (12 - $i);
            $Resto = ($Soma * 10) % 11;
            if (($Resto == 10) || ($Resto == 11))
                $Resto = 0;
            if ($Resto != parse_str(substr($strCPF,10, 11) ) ){
                $this->form_validation->set_message('TestaCPF', 'CPF digitado é invalido');
                return false;
            }
            return true;
        }
        else
        {
            $this->form_validation->set_message('TestaCPF', 'CPF digitado é invalido');
            return false;
        }
    }

    function editarPerfil(){
        $this->form_validation->set_rules('email', 'Email ID', 'trim|valid_email|is_unique[logins.email]|xss_clean',
            array(
                'valid_email' => 'E-mail digitado não é válido',
                'is_unique' => 'Este %s já existe'
            ));
        $this->form_validation->set_rules('password', 'Password', 'trim|matches[passwordCheck]|xss_clean',
            array(
                'matches' => "As senhas não conferem"
            ));
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|xss_clean');
        $this->form_validation->set_rules('pnome', 'Nome', 'trim||alpha|xss_clean',
            array(
                'alpha' => 'Apenas letras, sem acentos'
            ));
        $this->form_validation->set_rules('unome', 'Sobrenome', 'trim|alpha|xss_clean',
            array(
                'alpha' => 'Apenas letras, sem acentos'
            ));
        $this->form_validation->set_rules('cpf', 'CPF ID', 'trim|numeric|exact_length[11]|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            // fails
            redirect('home/perfil');
        }
        else {
            $data = array(
                'email' => $this->input->post('email'),
                'password' => password_hash(($this->input->post('password')), PASSWORD_BCRYPT),
                'pnome' => $this->input->post('pnome'),
                'unome' => $this->input->post('unome'),
                'cpf' => $this->input->post('cpf')
            );
            $id = $_SESSION['id'];
            if ($this->user_model->updateUser($id ,$data))
            {
                redirect('home/procedimentos');
            } else {
                // error
                $this->session->set_flashdata('msg', 'Oops! Error.  Please try again later!!!');
                redirect('home/perfil');
            }
        }
    }

    function forgotpassword(){
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[5]|max_length[125]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pages/forgotpassword');
        }
        else{
            $email = $this->input->post();
            $dados = $this->user_model->getUserFP($email['email']);
            if ($dados){
                $code = random_string('alnum', 32);
                $data = array(
                    'forgot_password' => $code,
                );
                $fpcode = $this->user_model->FPCode($email["email"], $data);
                if ($fpcode){

                    $config['protocol'] = 'smtp';
                    $config['smtp_host'] = 'gator4021.hostgator.com';
                    $config['smtp_user'] = 'nao_responda@celerar.com';
                    $config['smtp_pass'] = 'Projeto58747';
                    $config['smtp_port'] = '465';
                    $config['smtp_crypto'] = 'ssl';
                    $config['wordwrap'] = TRUE; // define se haverá quebra de palavra no texto
                    $config['validate'] = TRUE; // define se haverá validação dos endereços de email
                    $config['mailtype']  = 'html';
                    $config['charset']  = 'UTF-8';

                    $this->email->initialize($config);


                    // Update okay, send email

                    $data['code'] = $code;

                    $this->email->from('nao_responda@celerar.com', 'CELERAR.COM'); // Remetente
                    $this->email->to($email); // Destinatário

                    // Define o assunto do email
                    $this->email->subject('Recuperação de senha');
                    $this->email->message($this->load->view('email_recuperarSenha',$data, TRUE));

                    if($this->email->send())
                    {
                        $this->load->view('pages/sucesso_emailpass');
                    }
                    else
                    {
                        $this->session->set_flashdata('error',$this->email->print_debugger());
                        $this->load->view('pages/forgotpassword');
                    }
                }
                else
                {
                    redirect('forgotpassword');
                }
            }
            else
                redirect('forgotpassword');
        }
    }

    function novo_pass(){
        $this->load->view('pages/new_pass');
    }

    function new_pass(){

        // Get Code from URL or POST and clean up
        $code = $this->uri->segment(3);
        // Verificar se o código bate
        if ($this->user_model->code_match_fp($code)) {
            if ($this->input->post()){
                $this->form_validation->set_rules('novasenha', 'Password', 'trim|required|min_length[5]|xss_clean');
                $this->form_validation->set_rules('cnovasenha', 'Confirmation Password', 'trim|required|matches[novasenha]|xss_clean');

                if ($this->form_validation->run() == FALSE) {
                    if ($this->input->post('novasenha') == $this->input->post('cnovasenha'))
                        echo "senhas batem";
                    $this->load->view('pages/new_pass');
                }
                else {
                    $data = array(
                        'password' => password_hash(($this->input->post('novasenha')), PASSWORD_BCRYPT),
                        'forgot_password' => NULL
                    );

                    $this->user_model->updateUserFP($data, $code);
                    redirect ('login');
                }
            }
        } else{
            echo "codigo nao bate";
            $this->load->view('pages/new_pass');
        }
    }
}
