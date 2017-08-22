<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define("GFFL_Todos", 0);
define("GFFL_Autor", 1);
define("GFFL_Reu", 2);
define("GFFL_Arb", 3);

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'html', 'form'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->model(array('pro_model', 'processo', 'user_model'));

    }

    function index()
    {
        $this->load->view(base_url());
    }

    function login()
    {
        $this->load->view('pages/login_view');
    }

    public function logout() {
        $data = ['id', 'username', 'logged_in'];
        $this->session->unset_userdata($data);

        redirect(base_url());
    }

    function admin(){
        $this->load->view('pages/admin_page');
    }

    function procedimentos(){
        if(empty($_SESSION['logged_in']))
            redirect('login');

        $data['quantidadeP'] = $this->pro_model->buscarProcessos($this->session->userdata('username'), 0);
        $config = array(
            "base_url" => base_url()."index.php/home/procedimentos/pendentes",
            "per_page" => 10,
            "num_links" => 4,
            "uri_segment" => 4,
            "total_rows" => $data['quantidadeP'],
            "full_tag_open" => "<ul class='pagination pagination-sm'>",
            "full_tag_close" => "</ul>",
            "first_link" => "&lt;",
            "last_link" => "&gt;",
            "first_tag_open" => "<li class='page-item'><a class='page-link'",
            "first_tag_close" => "</li>",
            "prev_link" => "&laquo;",
            "prev_tag_open" => "<li class='page-item prev'><a class='page-link'",
            "prev_tag_close" => "</li>",
            "next_link" => "&raquo;",
            "next_tag_open" => "<li class='page-item next'><a class='page-link'",
            "next_tag_close" => "</li>",
            "last_tag_open" => "<li class='page-item'><a class='page-link'",
            "last_tag_close" => "</li>",
            "cur_tag_open" => "<li class='page-item active'><a href='#' class='page-link'>",
            "cur_tag_close" => "</a></li>",
            "num_tag_open" => "<li class='page-item'><a class='page-link'",
            "num_tag_close" => "</li>"
        );
        $this->pagination->initialize($config);
        $data['paginationP'] = $this->pagination->create_links();
        $offsetP = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $data['procspendentes'] = $this->pro_model->buscarPendentes($this->session->userdata('id'), $this->session->userdata('username'), $config['per_page'], $offsetP);

        $data['tipoParte'] = $this->pro_model->tipoParte($this->session->userdata('username'));

        $data['quantidadeA'] = $this->pro_model->buscarProcessos($this->session->userdata('username'), 1);
        $config = array(
            "base_url" => base_url()."index.php/home/procedimentos/ativos",
            "per_page" => 10,
            "num_links" => 4,
            "uri_segment" => 4,
            "total_rows" => $data['quantidadeA'],
            "full_tag_open" => "<ul class='pagination pagination-sm'>",
            "full_tag_close" => "</ul>",
            "first_link" => "&lt;",
            "last_link" => "&gt;",
            "first_tag_open" => "<li class='page-item'><a class='page-link'",
            "first_tag_close" => "</li>",
            "prev_link" => "&laquo;",
            "prev_tag_open" => "<li class='page-item prev'><a class='page-link'",
            "prev_tag_close" => "</li>",
            "next_link" => "&raquo;",
            "next_tag_open" => "<li class='page-item next'><a class='page-link'",
            "next_tag_close" => "</li>",
            "last_tag_open" => "<li class='page-item'><a class='page-link'",
            "last_tag_close" => "</li>",
            "cur_tag_open" => "<li class='page-item active'><a href='#' class='page-link'>",
            "cur_tag_close" => "</a></li>",
            "num_tag_open" => "<li class='page-item'><a class='page-link'",
            "num_tag_close" => "</li>"
        );
        $this->pagination->initialize($config);
        $data['paginationA'] = $this->pagination->create_links();
        $offsetA = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $data['procsativos'] = $this->pro_model->buscarAtivos($this->session->userdata('id'), $this->session->userdata('username'), $config['per_page'], $offsetA);

        //abre a página
        $this->load->view('pages/procedimentos', $data);

    }

    function procedimento(){

        // pegar informações sobre o link clicado
        $procid = $this->uri->segment(3);
        if ($procid == "")
            redirect(site_url('home/procedimentos'));

        // Informações sobre td o procedimento
        $info = $this->pro_model->infoP($procid);

        // Pegar e separar todos os documentos e listar para o usuário
        $data['todos'] = $this->GetFolderFileList($procid);
        $data['autor'] = $data['todos']['Autor'];
        $data['reu'] = $data['autor'] = $data['todos']['Reu'];
        $data['arb'] = $data['autor'] = $data['todos']['Arb'];

        $data['procid'] = $procid;

        // Data de entrada do processo
        $de = $this->pro_model->getDE($procid);
        $data['data_entrada'] = $de->dataentrada;

        // Atualização das visualizações do procedimento
        if ($this->processo->CheckForUpdate($procid, $_SESSION['id']))
            $this->processo->SetLastView($procid, $_SESSION['id']);

        $data['lviewautor'] = $this->processo->GetLastView($procid, $_SESSION['id']);
        $data['lupdate'] = $this->processo->GetLastUpdate($procid);

        // Pegar informações sobre as partes
        $data['nomes'] = $this->GetPNames($info);
        if ($_SESSION['adv'] == 1)
            $data['tipoadv'] = $this->pro_model->getAdvType($_SESSION['username'], $procid);

        $this->load->view('pages/mostrar_procedimento_escolhido', $data);
    }

    function perfil(){
        $userid = $_SESSION['id'];
        $data['infos'] = $this->pro_model->infoUser($userid);
        $this->load->view('pages/perfil_view', $data);
    }

    function acordos(){
        if(empty($this->session->userdata('logged_in')))
        {
            $this->session->set_flashdata('flash_data', 'Você não está logado!');
            redirect('login');
        }
        else {
            $this->load->view('pages/acordos');
        }
    }

    private function GetFolderFileList($processId, $type = GFFL_Todos)
    {
        //Variavel de saida não modificar
        $ret = [];

        $basePath = './uploads/';

        //Caminho para as pastas
        $processPath = "{$basePath}/{$processId}/";
        $AutorPath = "{$processPath}Autor";
        $ReuPath = "{$processPath}Reu";
        $ArbPath = "{$processPath}Arb";

        switch($type)
        {
            case GFFL_Todos:
                $ret["Autor"] = $this->GetFolderFileList($processId, GFFL_Autor);
                $ret["Reu"] = $this->GetFolderFileList($processId, GFFL_Reu);
                $ret["Arb"] = $this->GetFolderFileList($processId, GFFL_Arb);
                break;

            case GFFL_Autor:
                $m = directory_map($AutorPath, 1);
                $ret = $m;
                break;

            case GFFL_Reu:
                $m = directory_map($ReuPath, 1);
                $ret = $m;
                break;

            case GFFL_Arb:
                $m = directory_map($ArbPath, 1);
                $ret = $m;
                break;
        }

        return $ret;
    }

    private function GetPNames($partes){

        $temp = [];

        foreach ($partes as $key => $v):
            if($v):
                switch ($key):

                    case $key == "pautor":
                        if (!empty($partes['pautor'])){
                            $autor = $this->pro_model->nomeUser($partes['pautor']);
                            $temp['Autor'] = $autor->pnome . ' ' . $autor->unome;
                        }
                        break;

                    case $key == "preu":
                        if (!empty($partes['preu'])) {
                            $reu = $this->pro_model->nomeUser($partes['preu']);
                            $temp['Requerido'] = $reu->pnome . ' ' . $reu->unome;
                        }
                        break;

                    case $key == "advautor":
                        if (!empty($partes['advautor'])) {
                            $advautor = $this->pro_model->nomeUser($partes['advautor']);
                            $temp['AdvAutor'] = $advautor->pnome . ' ' . $advautor->unome;
                        }
                        break;

                    case $key == "advreu":
                        if (!empty($partes['advreu'])) {
                            $advreu = $this->pro_model->nomeUser($partes['advreu']);
                            $temp['AdvRequerido'] = $advreu->pnome . ' ' . $advreu->unome;
                        }
                        break;

                    case $key == "arb":
                        if (!empty($partes['arb'])) {
                            $arb = $this->pro_model->nomeUser($partes['arb']);
                            $temp['Arbitro'] = $arb->pnome . ' ' . $arb->unome;
                        }
                        break;
                endswitch;
            endif;
        endforeach;

        return $temp;
    }

    public function tokenizador(){

        $this->validar();

        $token = trim($this->input->post('codigoacesso'));
        $username = $_SESSION['username'];
        $this->db->select('proid');
        $this->db->where('token', $token);
        $resultado = $this->db->get('procedimentos')->row();
        if(!empty($resultado))
        {
            $this->db->set('advreu', $username);
            $this->db->set('token', "");
            $this->db->where('proid', $resultado->proid);
            $this->db->update('procedimentos');
            echo json_encode(array('invalido' => FALSE, 'status' => TRUE));
        }
        else
            echo json_encode(array('invalido' => TRUE, 'status' => TRUE));
    }

    private function validar(){

        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('codigoacesso') == '')
        {
            $data['inputerror'][] = 'codigoacesso';
            $data['error_string'][] = 'É necessário inserir o token';
            $data['status'] = FALSE;
        }
        if($data['status'] === FALSE){
            echo json_encode($data);
            exit();
        }
    }

    function regulamento(){
        $arquivoPath = './documentos/diversos/RegulamentoV1p5.pdf';
        force_download($arquivoPath, null);
    }

    function teste(){

        $data['procspendentes'] = $this->pro_model->buscarPendentes($this->session->userdata('id'), $this->session->userdata('username'));
        $this->load->view('teste', $data);
    }
}
