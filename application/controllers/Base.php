<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 17/04/2017
 * Time: 19:26
 */
class Base extends CI_Controller
{
// Método construtor da classe
    function __construct(){
        parent::__construct();
        $this->load->model(array('pro_model', 'processo'));
        $this->load->database();
    }

// Método que carregará a home
    public function Index()
    {
        $this->load->view('upload_page');
    }

// Método que processar o upload do arquivo
    function upload()
    {
        // definimos um nome aleatório para o diretório
        $ano = date('Y');
        // data entrada
        $data_entrada = $this->pro_model->data_entrada();
        $folder = $ano . random_string('numeric', 8);
        // definimos o path onde o arquivo será gravado
        $path = "./uploads/" . $folder;
        // verificamos se o diretório existe
        // se não existe criamos com permissão de leitura e escrita
        if (!is_dir($path)) {
            mkdir($path, 0777, $recursive = true);
        }

        // definimos as configurações para o upload
        // determinamos o path para gravar o arquivo
        $configUpload['upload_path'] = $path;
        // definimos - através da extensão -
        // os tipos de arquivos suportados
        $configUpload['allowed_types'] = 'jpg|png|pdf|doc';
        // definimos que o nome do arquivo
        // será alterado para um nome criptografado
        $configUpload['encrypt_name'] = FALSE;
        // passamos as configurações para a library upload
        $this->upload->initialize($configUpload);
        // verificamos se o upload foi processado com sucesso

        if ( ! $this->upload->do_upload('arquivo'))
        {
            // em caso de erro retornamos os mesmos para uma variável
            // e enviamos para a home
            $data= array('error' => $this->upload->display_errors());
            $this->load->view('upload_page',$data);
        }
        else
        {
            // Registrar o numero do processo no banco de dados

            // Registrar o usuario que fez o cadastro
            $usuario = $this->session->userdata('username');
            $info = array (
                'proid' => $folder,
                'pautor' => $usuario,
                'dataentrada' => $data_entrada
            );
            $this->db->insert('procedimentos', $info);

            $data['dadosArquivo'] = $this->upload->data();
            // definimos o path original do arquivo
            $arquivoPath = 'uploads/' . $folder . "/autor/" . $data['dadosArquivo']['file_name'];
            // passando para o array '$data'
            $data['urlArquivo'] = base_url($arquivoPath);
            // definimos a URL para download
            $downloadPath = 'download/' . $folder . "/autor/" . $data['dadosArquivo']['file_name'];
            // passando para o array '$data'
            $data['urlDownload'] = base_url() . "index.php/base/" . $downloadPath;
            // carregamos a view com as informações e link para download
            redirect(site_url('home/procedimentos'));
        }
    }

    function upload_multiplo(){

        if ($this->input->post() !== FALSE) {
            $procid = $this->uri->segment(3);
            $path = 'uploads/' . $procid . "/autor/";

            if (!empty($_FILES['arquivos']['name'][0])) {
                if ($this->upload_files($path, $_FILES['arquivos']) === FALSE) {
                    $data['error'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                }
            }

            if (!isset($data['error'])) {
                $this->session->set_flashdata('suc_msg', 'New real estate added successfully');
                $this->load->view('home/procedimentos', $data);
            }
        }

        $this->load->view('home/procedimentos', $data);

    }

    private function upload_files($path, $files)
    {
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => 'jpg|gif|png|pdf',
            'overwrite'     => 1,
        );

        $this->upload->initialize($config);

        $arquivos = array();

        foreach ($files['name'] as $key => $arquivo) {
            $_FILES['arquivos[]']['name']= $files['name'][$key];
            $_FILES['arquivos[]']['type']= $files['type'][$key];
            $_FILES['arquivos[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['arquivos[]']['error']= $files['error'][$key];
            $_FILES['arquivos[]']['size']= $files['size'][$key];

            $fileName = $arquivo;
            echo var_dump($_FILES['arquivos[]']);
            $arquivos[] = $fileName;
            $config['file_name'] = $fileName;

            $this->upload->initialize($config);
            if ($this->upload->do_upload('arquivos[]')) {
                $data = $this->upload->data();
                echo var_dump($data);
            } else {
                return false;
            }
        }

        return $arquivos;
    }

    public function uploadUpdate(){

        $folder = $this->uri->segment(3);
        $user = $_SESSION['username'];
        $userType = $this->pro_model->getUserType($folder, $user);
        if ($userType != ""){
            if($_SERVER['REQUEST_METHOD'] === "POST")
            {
                $path = "./uploads/". $folder. "/" . $userType;

                if(!file_exists($path))
                    mkdir($path, 0777, true);

                // Configuração do caminho
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc';
                $config['max_size'] = '30000';

                $this->upload->initialize($config);

                if ($this->upload->do_upload('files')) {
                    $data = $this->upload->data();

                    // informar a última atualização do procedimento
                    $this->processo->SetLastUpdate($folder);

                    //set the data for the json array
                    $info = new StdClass;
                    $info->name = $data['file_name'];
                    $info->size = $data['file_size'] * 1024;
                    $info->type = $data['file_type'];
                    $info->url = $path . $data['file_name'];
                    $info->error = null;

                    $files[] = $info;
                    if (IS_AJAX) {
                        echo json_encode(array("files" => $files));
                    }
                }
            }
        }
    }


    public function Download(){
        // recuperamos o terceiro segmento da url, que é o nome do arquivo
        $arquivo = $this->uri->segment(5);
        $parte = $this->uri->segment(4);
        // recuperamos o segundo segmento da url, que é o diretório
        $diretorio = $this->uri->segment(3);
        // definimos original path do arquivo
        $arquivoPath = './uploads/'.$diretorio."/".$parte."/".$arquivo;

        // forçamos o download no browser
        // passando como parâmetro o path original do arquivo
        force_download($arquivoPath,null);
    }
}
