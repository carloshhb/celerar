<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 23/04/2017
 * Time: 23:11
 */
class Cadastro extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model(array('pro_model', 'user_model'));
        $this->load->database();
    }

    function novo(){
        $this->load->view('pages/cadastro_procedimento');
    }

    function disputa(){
        //-------------------------------------
        // Regras de validação do formulário
        //-------------------------------------
        $typeA = "";
        $typeR = "";

        // Regras para validação caso seja Pessoa Física ou jurídica
        switch ($this->input->post('radioA')){
            case 1:
                $this->form_validation->set_rules('cpfA', 'CPF', 'trim|required|callback_TestaCPF',
                    array(
                        'required' => 'Obrigatório'
                    ));
                $this->form_validation->set_rules('nomeA', 'Nome', 'trim|alpha|min_length[3]|max_length[30]|required|xss_clean',
                    array(
                        'required' => 'Obrigatório',
                        'alpha' => 'Apenas letras, sem acentos'
                    ));
                $this->form_validation->set_rules('snomeA', 'Sobrenome', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean',
                    array(
                        'required' => 'Obrigatório',
                        'alpha' => 'Apenas letras, sem acentos'
                    ));
                $typeA = "pf";
                break;

            case 2:
                $this->form_validation->set_rules('cnpjA', 'CNPJ', 'required|xss_clean',
                    array(
                        'required' => 'Obrigatório'
                    ));
                $this->form_validation->set_rules('nomeEmp', 'Nome da Empresa', 'trim|alpha|min_length[3]|max_length[30]|required|xss_clean',
                    array(
                        'required' => 'Obrigatório',
                        'alpha' => 'Apenas letras, sem acentos'
                    ));
                $typeA = "pj";
                break;
        }

        switch ($this->input->post('radioR')){
            case 1:
                $this->form_validation->set_rules('cpfR', 'CPF ID', 'trim|required|callback_TestaCPF',
                    array(
                        'required' => 'Obrigatório',
                    ));
                $this->form_validation->set_rules('nomeR', 'Nome', 'trim|alpha|min_length[3]|max_length[30]|required|xss_clean',
                    array(
                        'required' => 'Obrigatório',
                        'alpha' => 'Apenas letras, sem acentos'
                    ));
                $this->form_validation->set_rules('snomeR', 'Sobrenome', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean',
                    array(
                        'required' => 'Obrigatório',
                        'alpha' => 'Apenas letras, sem acentos'
                    ));
                $typeR = "pf";
                break;

            case 2:
                $this->form_validation->set_rules('cnpjR', 'CNPJ', 'required|xss_clean',
                    array(
                        'required' => 'Obrigatório',
                    ));
                $this->form_validation->set_rules('nomeEmpR', 'Nome da Empresa', 'trim|alpha|min_length[3]|max_length[30]|required|xss_clean',
                    array(
                        'required' => 'Obrigatório',
                        'alpha' => 'Apenas letras, sem acentos'
                    ));
                $typeR = "pj";
                break;

        }

        // Regras para validação de requisito da parte Requerente
        $this->form_validation->set_rules('emailA', 'Email', 'trim|required|valid_email|xss_clean',
            array(
                'required' => 'Obrigatório',
                'valid_email' => 'E-mail inválido'
            ));
        $this->form_validation->set_rules('enderecoA', 'Endereço', 'trim|required|xss_clean',
            array(
                'required' => 'Obrigatório',
            ));
        $this->form_validation->set_rules('nEndA', 'Numero do endereço', 'trim|required|xss_clean',
            array(
                'required' => 'Obrigatório',
            ));
        $this->form_validation->set_rules('cepA', 'CEP', 'trim|required|xss_clean',
            array(
                'required' => 'Obrigatório',
            ));
        $this->form_validation->set_rules('telefoneA', 'Telefone', 'trim|required|xss_clean',
            array(
                'required' => 'Obrigatório',
            ));
        $this->form_validation->set_rules('estadoA', 'Estado', 'trim|required|xss_clean',
            array(
                'required' => 'Obrigatório',
            ));
        $this->form_validation->set_rules('cidadeA', 'Cidade', 'trim|required|xss_clean',
            array(
                'required' => 'Obrigatório',
            ));

        // Regras para validação de requisito da parte Requerida
        $this->form_validation->set_rules('emailR', 'Email', 'trim|required|valid_email|xss_clean',
            array(
                'required' => 'Obrigatório',
                'valid_email' => 'E-mail inválido'
            ));
        $this->form_validation->set_rules('enderecoR', 'Endereço', 'trim|required|xss_clean',
            array(
                'required' => 'Obrigatório',
            ));
        $this->form_validation->set_rules('nEndR', 'Numero do endereço', 'trim|required|xss_clean',
            array(
                'required' => 'Obrigatório',
            ));
        $this->form_validation->set_rules('cepR', 'CEP', 'trim|required|xss_clean',
            array(
                'required' => 'Obrigatório',
            ));
        $this->form_validation->set_rules('telefoneR', 'Telefone', 'trim|required|xss_clean',
            array(
                'required' => 'Obrigatório',
            ));
        $this->form_validation->set_rules('estadoR', 'Estado', 'trim|required|xss_clean',
            array(
                'required' => 'Obrigatório',
            ));
        $this->form_validation->set_rules('cidadeR', 'Cidade', 'trim|required|xss_clean',
            array(
                'required' => 'Obrigatório',
            ));

        //----------------------
        // Upload dos arquivos
        //----------------------

        if ($this->form_validation->run() == FALSE){
            $this->load->view('pages/cadastro_procedimento');
        }
        else{
            // Data entrada do procedimento
            $data_entrada = $this->pro_model->data_entrada();

            // Definir onde vai ficar os arquivos upados para procedimento inicial
            $ano = date('Y');
            $folder = $ano . random_string('numeric', 8);
            $path = "./uploads/" . $folder . "/Autor";

            if (!is_dir($path)) {
                mkdir($path, 0777, $recursive = true);
            }

            // Configuração do caminho
            $configUpload['upload_path'] = $path;
            $configUpload['allowed_types'] = 'pdf';
            $configUpload['max_size'] = '100000';

            $this->upload->initialize($configUpload);

            if ( (!$this->upload->do_upload('reqInicial') OR !$this->upload->do_upload('decArb')))
            {
                // Em caso de erro no upload do requerimento, retorna para
                // a página de cadastro
                $data= array('error' => $this->upload->display_errors());
                $this->load->view('pages/cadastro_procedimento', $data);
            }
            else
            {
                // Registrar o usuário que fez o cadastro do procedimento
                $usuario = $this->session->userdata('username');

                $info = array (
                    'proid' => $folder,
                    'advautor' => $usuario,
                    'dataentrada' => $data_entrada,
                    'emailAutor' => $this->input->post('emailA'),
                    'emailReu' => $this->input->post('emailR'),
                  );
                $this->db->insert('procedimentos', $info);

                // Dados da parte autora
                if($typeA == "pf"){
                    $CPF = $this->input->post('cpfA');
                    $strCPF = $this->user_model->limparMask($CPF);
                    $strTel = $this->user_model->limparMask($this->input->post('telefoneA'));
                    $strCEP = $this->user_model->limparMask($this->input->post('cepA'));
                    $infoParteAutora = array(
                        'nome' => $this->input->post('nomeA'),
                        'sobrenome' => $this->input->post('snomeA'),
                        'cpf' => $strCPF,
                        'email' => $this->input->post('emailA'),
                        'endereco' => $this->input->post('enderecoA'),
                        'numero_end' => $this->input->post('nEndA'),
                        'cep' => $strCEP,
                        'estado' => $this->input->post('estadoA'),
                        'cidade' => $this->input->post('cidadeA'),
                        'telefone' => $strTel
                    );
                    $this->db->insert('pessoasfisicas', $infoParteAutora);

                    $info = array(
                      'nomeAutor' => $this->input->post('nomeA')." ".$this->input->post('snomeA'),
                    );
                    $this->db->where('proid', $folder);
                    $this->db->update('procedimentos', $info);
                }
                else{
                  $strTel = $this->user_model->limparMask($this->input->post('telefoneA'));
                  $strCEP = $this->user_model->limparMask($this->input->post('cepA'));
                    $infoParteAutora = array(
                        'nome_empresa' => $this->input->post('nomeEmpA'),
                        'cnpj' => $this->input->post('cnpjA'),
                        'email' => $this->input->post('emailA'),
                        'endereco' => $this->input->post('enderecoA'),
                        'numero_end' => $this->input->post('nEndA'),
                        'cep' => $strCEP,
                        'estado' => $this->input->post('estadoA'),
                        'cidade' => $this->input->post('cidadeA'),
                        'telefone' => $strTel
                    );
                    $this->db->insert('pessoasjuridicas', $infoParteAutora);

                    $info = array(
                      'nomeAutor' => $this->input->post('nomeEmpA')." ".$this->input->post('snomeA'),
                    );
                    $this->db->where('proid', $folder);
                    $this->db->update('procedimentos', $info);
                }

                // Cadastrar a parte ré no banco de dados
                if($typeR == "pf"){
                  // Informar os dados na tabela pessoas fisicas
                  $CPF = $this->input->post('cpfR');
                  $strCPF = $this->user_model->limparMask($CPF);
                  $strTel = $this->user_model->limparMask($this->input->post('telefoneR'));
                  $strCEP = $this->user_model->limparMask($this->input->post('cepR'));
                    $infoParteReu = array(
                        'nome' => $this->input->post('nomeR'),
                        'sobrenome' => $this->input->post('snomeR'),
                        'cpf' => $strCPF,
                        'email' => $this->input->post('emailR'),
                        'endereco' => $this->input->post('enderecoR'),
                        'numero_end' => $this->input->post('nEndR'),
                        'cep' => $strCEP,
                        'estado' => $this->input->post('estadoR'),
                        'cidade' => $this->input->post('cidadeR'),
                        'telefone' => $strTel
                    );
                    $this->db->insert('pessoasfisicas', $infoParteReu);

                    $info = array(
                      'nomeReu' => $this->input->post('nomeR')." ".$this->input->post('snomeR')
                    );
                    $this->db->where('proid', $folder);
                    $this->db->update('procedimentos', $info);
                }
                else{
                  $strTel = $this->user_model->limparMask($this->input->post('telefoneR'));
                  $strCEP = $this->user_model->limparMask($this->input->post('cepR'));
                    $infoParteReu = array(
                        'nome_empresa' => $this->input->post('nomeEmpR'),
                        'cnpj' => $this->input->post('cnpjR'),
                        'email' => $this->input->post('emailR'),
                        'endereco' => $this->input->post('enderecoR'),
                        'numero_end' => $this->input->post('nEndR'),
                        'cep' => $strCEP,
                        'estado' => $this->input->post('estadoR'),
                        'cidade' => $this->input->post('cidadeR'),
                        'telefone' => $strTel
                    );
                    $this->db->insert('pessoasjuridicas', $infoParteReu);

                    $info = array(
                      'nomeReu' => $this->input->post('nomeEmpR')." ".$this->input->post('snomeR')
                    );
                    $this->db->where('proid', $folder);
                    $this->db->update('procedimentos', $info);
                }

                $data['dadosArquivo'] = $this->upload->data();
                // definimos o path original do arquivo
                $arquivoPath = 'uploads/' . $folder . "/autor/" . $data['dadosArquivo']['file_name'];
                // passando para o array '$data'
                $data['urlArquivo'] = base_url($arquivoPath);

                // Enviar email para o réu
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

                $this->email->from('nao_responda@celerar.com', 'CELERAR.COM'); // Remetente
                $this->email->to($this->input->post('emailR')); // Destinatário

                // Define o assunto do email
                $this->email->subject('Convite para Arbitragem Online - CELERAR.COM');
                $this->email->message($this->load->view('email_reu',$data, TRUE));

                $this->email->send();

                redirect(site_url('home/procedimentos'));
            }
        }
    }

    function upload(){
        $config['upload_path'] = "./uploads/";
        $config['allowed_types'] = 'pdf|jpg|jpeg|png';
        $config['max_size'] = '100000';
        $this->upload->initialize($config);

        $this->upload->do_upload('reqInicial');
        $this->upload->do_upload('decArb');
        $this->load->view('pages/cadastro_procedimento');
    }

    function TestaCPF($CPF){
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

    public function cadastroAdvReu(){
        $this->validar();
        $data = array(
            'procid' => $this->input->post('procid'),
            'token' => $this->input->post('tokenreu')
        );

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'gator4021.hostgator.com';
        $config['smtp_user'] = 'nao_responda@celerar.com';
        $config['smtp_pass'] = 'Projeto58747';
        $config['smtp_port'] = '465';
        $config['smtp_crypto'] = 'ssl';
        $config['wordwrap'] = TRUE; // define se haverá quebra de palavra no texto
        $config['validate'] = TRUE; // define se haverá validação dos endereços de email
        $config['mailtype'] = 'html';
        $config['charset'] = 'UTF-8';

        $this->email->initialize($config);


        // Update okay, send email
        $email = $this->input->post('emailadv');
        $this->email->from('nao_responda@celerar.com', 'CELERAR.COM'); // Remetente
        $this->email->to($email); // Destinatário

        // Define o assunto do email
        $this->email->subject('Cadastro em procedimento');
        $this->email->message($this->load->view('email_adv', $data, TRUE));

        $this->email->send();

        $tokenize = $this->pro_model->inserir($this->input->post('procid'), $this->input->post('tokenreu'));
        echo json_encode(array('errotoken' => $tokenize, 'error' => $this->email->print_debugger(),"status" => TRUE));

    }

    private function validar(){

        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('emailadv') == '')
        {
            $data['inputerror'][] = 'emailadv';
            $data['error_string'][] = 'É necessário inserir o e-mail';
            $data['status'] = FALSE;
        }
        if($data['status'] === FALSE){
            echo json_encode($data);
            exit();
        }
    }

    function regulamento(){
        $arquivoPath = './documentos/cadastro/ArbitrosTermodeAceite.pdf';
        force_download($arquivoPath, null);
    }
}
