<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!empty($_SESSION['logged_in'])) {
    $username = $_SESSION['username'];
}
else redirect('login');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Celerar</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,400i" rel="stylesheet">

    <!-- Estilo custom da dashboard -->
    <link href="<?=base_url('assets/css/estilodash.css')?>" rel="stylesheet">

    <!-- JS Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/89f033c1f5.js"></script>

    <script src="<?php echo base_url('assets/js/cleave.js')?>"></script>
    <script src="<?php echo base_url('assets/js/cleave-phone.br.js')?>"></script>


    <style>
        .card-body.arquivos-inp {
            padding-left: 20px;
            padding-right: 20px;
        }
        #cadisputa{
            cursor: pointer;
        }

        .fileUpload_ProgressBar
        {
            position: absolute;
            bottom:0;
            left:0;
            background: rgba(0,255,0,.2);
            width: 0;
            height: 5px;
        }

        .fileUpload_itemContainer
        {
            display:flex;
            justify-content: space-between;
        }

        .fileUpload_fileNameContainer
        {
            display:flex;
            flex-direction: column;
            justify-content: center;
        }
    </style>

    <script>
        $(document).ready(function() {

            $('input[name="radioA"]').click(function() {

                if ($(':radio[id=cpfCheckA]').prop("checked") == true){
                    // Requerente
                    $('#ifCPFA').css("display", "block");
                    $('#nomePFA').css("display", "block");
                    $('#snomePFA').css("display", "block");
                    $('#ifCNPJA').css("display", "none");
                    $('#nomePJA').css("display", "none");
                }
                else{
                    // Requerente
                    $('#ifCPFA').css("display", "none");
                    $('#nomePFA').css("display", "none");
                    $('#snomePFA').css("display", "none");
                    $('#ifCNPJA').css("display", "block");
                    $('#nomePJA').css("display", "block");
                }
            });

            $('input[name="radioR"]').click(function() {
                if ($(':radio[id=cpfCheckR]').prop("checked") == true) {
                    // Requerido
                    $('#ifCPFR').css("display", "block");
                    $('#nomePFR').css("display", "block");
                    $('#snomePFR').css("display", "block");
                    $('#ifCNPJR').css("display", "none");
                    $('#nomePJR').css("display", "none");
                }
                else{
                    $('#ifCPFR').css("display", "none");
                    $('#nomePFR').css("display", "none");
                    $('#snomePFR').css("display", "none");
                    $('#ifCNPJR').css("display", "block");
                    $('#nomePJR').css("display", "block");
                }
            });

            var cpfA_Cleave = new Cleave('#icpfA', {
                numericOnly: true,
                delimiters: ['.', '.', '-'],
                blocks: [3, 3, 3, 2]
            });

            var cpfR_Cleave = new Cleave('#icpfR', {
                numericOnly: true,
                delimiters: ['.', '.', '-'],
                blocks: [3, 3, 3, 2]
            });

            var cleavePhoneA = new Cleave('#itelA', {
                phone: true,
                phoneRegionCode: 'BR'
            });

            var cleavePhoneR = new Cleave('#itelR', {
                phone: true,
                phoneRegionCode: 'BR'
            });

            var cleaveCEPA = new Cleave('#icepA', {
                numericOnly: true,
                delimiters: ['-'],
                blocks: [5, 3]
            });

            var cleaveCEPR = new Cleave('#icepR', {
                numericOnly: true,
                delimiters: ['-'],
                blocks: [5, 3]
            });

        });
    </script>
</head>
<body>
<div class="wrapper">
    <aside class="sidebar">
        <div class="sidebar_header">
            <a href="<?= base_url();?>" class="simple-text"><span>Celerar</span></a>
        </div>

        <nav class="nav flex-column">
            <a class="nav-link" href="<?=site_url('home/procedimentos')?>"><i class="fa fa-desktop fa-fw" aria-hidden="true"></i>&nbsp; Procedimentos</a>
            <a class="nav-link" href="<?=site_url('home/acordos')?>"> <i class="fa fa-handshake-o fa-fw" aria-hidden="true"></i>&nbsp; Acordos</a>
            <a class="nav-link active" href="#"><i class="fa fa-plus fa-fw" aria-hidden="true"></i>&nbsp; Nova disputa</a>
        </nav>
    </aside>

    <div class="page-wrapper">
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#"><i class="fa fa-plus" aria-hidden="true"></i> Cadastro de procedimento</a>
            <div class="collapse navbar-collapse" id="navbarText">
                <span class="navbar-text">Bem vindo(a) <?= $_SESSION['nome'].' '.$_SESSION['unome']?></span>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('home/perfil')?>"><i class="fa fa-id-badge" aria-hidden="true"></i> PERFIL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('home/logout')?>"><i class="fa fa-sign-out" aria-hidden="true"></i> SAIR</a>
                    </li>
                </ul>
            </div>
        </nav>
        
        <div class="container-fluid maincontent">
            <form action="<?=site_url('cadastro/disputa');?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8 offset-md-2" id="uploads">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Dados da parte requerente</h4>
                                <h6 class="card-subtitle">Preencha com as informações necessárias e os arquivos abaixo</h6>
                            </div>
                            <div class="card-block">
                                <div class="form-group">
                                    <label class="custom-control custom-radio">
                                        <input id="cpfCheckA" name="radioA" type="radio" value="1" class="custom-control-input" checked>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Pessoa Física</span>
                                    </label>
                                    <label class="custom-control custom-radio">
                                        <input name="radioA" id="pj" type="radio" value="2" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Pessoa Jurídica</span>
                                    </label>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" id="nomePFA" style="display: block">
                                        <div class="form-group">
                                            <label for="inomeA">Nome</label>
                                            <input type="text" class="form-control" name="nomeA" id="inomeA" 
                                                   placeholder="Nome da parte" value="<?php echo set_value('nomeA') ?>">
                                            <span class="text-danger"><?php echo form_error('nomeA'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="snomePFA" style="display: block">
                                        <div class="form-group">
                                            <label for="isnomeA">Sobrenome</label>
                                            <input type="text" class="form-control" name="snomeA" id="isnomeA" 
                                                   placeholder="Sobrenome da parte" value="<?php echo set_value('snomeA') ?>">
                                            <span class="text-danger"><?php echo form_error('snomeA'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="nomePJA" style="display: none">
                                        <div class="form-group">
                                            <label for="inomeEmp">Nome empresarial</label>
                                            <input type="text" class="form-control" name="nomeEmpA" id="inomeEmp"
                                                   placeholder="Nome da parte" value="<?php echo set_value('nomeEmpA') ?>">
                                            <span class="text-danger"><?php echo form_error('nomeEmpA'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="iemailA">E-mail</label>
                                            <input type="email" class="form-control" name="emailA" id="iemailA"
                                                   placeholder="E-mail da parte" value="<?php echo set_value('emailA') ?>">
                                            <span class="text-danger"><?php echo form_error('emailA'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class=form-group id="ifCPFA" style="display: block">
                                            <label for="icpfA">CPF</label>
                                            <input type="text" class="form-control" name="cpfA" id="icpfA"
                                                   placeholder="CPF" value="<?php echo set_value('cpfA') ?>">
                                            <span class="text-danger"><?php echo form_error('cpfA'); ?></span>
                                        </div>
                                        <div class="form-group" id="ifCNPJA" style="display: none">
                                            <label for="icnpjA">CNPJ</label>
                                            <input type="text" class="form-control" name="cnpjA" id="inpcpnjA"
                                                   placeholder="CPNJ" value="<?php echo set_value('cnpjA') ?>">
                                            <span class="text-danger"><?php echo form_error('cnpjA'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="iendA">Endereço</label>
                                            <input type="text" class="form-control" name="enderecoA" id="iendA"
                                                   placeholder="Endereço" value="<?php echo set_value('enderecoA') ?>">
                                            <span class="text-danger"><?php echo form_error('enderecoA'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="inumA">Nº</label>
                                            <input type="number" class="form-control" name="nEndA" id="inumA"
                                                   placeholder="Nº" value="<?php echo set_value('nEndA') ?>">
                                            <span class="text-danger"><?php echo form_error('nEndA'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="icepA">CEP</label>
                                            <input type="text" class="form-control" name="cepA" id="icepA"
                                                   placeholder="CEP Nº" value="<?php echo set_value('cepA') ?>">
                                            <span class="text-danger"><?php echo form_error('cepA'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="itelA">Telefone para contato</label>
                                            <input type="text" class="form-control" name="telefoneA" id="itelA"
                                                   placeholder="Telefone com DDD" value="<?php echo set_value('telefoneA') ?>">
                                            <span class="text-danger"><?php echo form_error('telefoneA'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="iestadoA">Estado</label>
                                            <input type="text" class="form-control" name="estadoA" id="iestadoA"
                                                   placeholder="" value="<?php echo set_value('estadoA') ?>">
                                            <span class="text-danger"><?php echo form_error('estadoA'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="icidadeA">Cidade</label>
                                            <input type="text" class="form-control" name="cidadeA" id="icidadeA"
                                                   placeholder="" value="<?php echo set_value('cidadeA') ?>">
                                            <span class="text-danger"><?php echo form_error('cidadeA'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 offset-md-2" id="uploads">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Dados da parte requerida</h4>
                                <h6 class="card-subtitle">Preencha com as informações necessárias e os arquivos abaixo</h6>
                            </div>
                            <div class="card-block">
                                <div class="form-group">
                                    <label class="custom-control custom-radio">
                                        <input id="cpfCheckR" name="radioR" type="radio" value="1" class="custom-control-input" checked>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Pessoa Física</span>
                                    </label>
                                    <label class="custom-control custom-radio">
                                        <input name="radioR" type="radio" value="2" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Pessoa Jurídica</span>
                                    </label>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" id="nomePFR" style="display: block">
                                        <div class="form-group">
                                            <label for="inomeR">Nome</label>
                                            <input type="text" class="form-control" name="nomeR" id="inomeR"
                                                   placeholder="Nome da parte" value="<?php echo set_value('nomeR') ?>">
                                            <span class="text-danger"><?php echo form_error('nomeR'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="snomePFR" style="display: block">
                                        <div class="form-group">
                                            <label for="isnomeR">Sobrenome</label>
                                            <input type="text" class="form-control" name="snomeR" id="isnomeR"
                                                   placeholder="Sobrenome da parte" value="<?php echo set_value('snomeR') ?>">
                                            <span class="text-danger"><?php echo form_error('snomeR'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="nomePJR" style="display: none">
                                        <div class="form-group">
                                            <label for="inomeEmpR">Nome empresarial</label>
                                            <input type="text" class="form-control" name="nomeEmpR" id="inomeEmpR"
                                                   placeholder="Nome da parte" value="<?php echo set_value('nomeEmpR') ?>">
                                            <span class="text-danger"><?php echo form_error('nomeEmpR'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="iemailR">E-mail</label>
                                            <input type="email" class="form-control" name="emailR" id="iemailR"
                                                   placeholder="E-mail da parte" value="<?php echo set_value('emailR') ?>">
                                            <span class="text-danger"><?php echo form_error('emailR'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class=form-group id="ifCPFR" style="display: block">
                                            <label for="icpfR">CPF</label>
                                            <input type="text" class="form-control" name="cpfR" id="icpfR"
                                                   placeholder="CPF" value="<?php echo set_value('cpfR') ?>">
                                            <span class="text-danger"><?php echo form_error('cpfR'); ?></span>
                                        </div>
                                        <div class="form-group" id="ifCNPJR" style="display: none">
                                            <label for="icnpjR">CNPJ</label>
                                            <input type="text" class="form-control" name="cnpjR" id="inpcpnjR"
                                                   placeholder="CPNJ" value="<?php echo set_value('cnpjR') ?>">
                                            <span class="text-danger"><?php echo form_error('cnpjR'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="iendr">Endereço</label>
                                            <input type="text" class="form-control" name="enderecoR" id="iendr"
                                                   placeholder="Endereço" value="<?php echo set_value('enderecoR') ?>">
                                            <span class="text-danger"><?php echo form_error('enderecoR'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="inumr">Nº</label>
                                            <input type="number" class="form-control" name="nEndR" id="inumr"
                                                   placeholder="Nº" value="<?php echo set_value('nEndR') ?>">
                                            <span class="text-danger"><?php echo form_error('nEndR'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="icepR">CEP</label>
                                            <input type="text" class="form-control" name="cepR" id="icepR"
                                                   placeholder="CEP Nº" value="<?php echo set_value('cepR') ?>">
                                            <span class="text-danger"><?php echo form_error('cepR'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="itelr">Telefone para contato</label>
                                            <input type="text" class="form-control" name="telefoneR" id="itelR"
                                                   placeholder="Telefone com DDD" value="<?php echo set_value('telefoneR') ?>">
                                            <span class="text-danger"><?php echo form_error('telefoneR'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="iestador">Estado</label>
                                            <input type="text" class="form-control" name="estadoR" id="iestador"
                                                   placeholder="" value="<?php echo set_value('estadoR') ?>">
                                            <span class="text-danger"><?php echo form_error('estadoR'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="icidadeR">Cidade</label>
                                            <input type="text" class="form-control" name="cidadeR" id="icidadeR"
                                                   placeholder="" value="<?php echo set_value('cidadeR') ?>">
                                            <span class="text-danger"><?php echo form_error('cidadeR'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 offset-md-2" id="uploads">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Arquivos para cadastro do procedimento</h4>
                                <h6 class="card-subtitle">Requerimento inicial, declaração de arbitragem</h6>
                                <div class="card-body arquivos-inp">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a class="btn btn-primary"
                                               href="<?= base_url('cadastro/regulamento')?>">Baixar Termo de Arbitragem</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="requerimentoinicial">Requerimento inicial</label>
                                                <input type="file" class="form-control-file" id="requerimentoinicial"
                                                       name="reqInicial" aria-describedby="fileHelpReqI">
                                                <small id="fileHelpReqI"
                                                       class="form-text text-muted">Selecione o requerimento inicial!
                                                    Apenas PDF</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="declaracaoArbitragem">Declaração</label>
                                                <input type="file" class="form-control-file"
                                                       id="declaracaoArbitragem" name="decArb"
                                                       aria-describedby="fileHelpDecl">
                                                <small id="fileHelpDecl"
                                                       class="form-text text-muted">
                                                    Selecione o termo de arbitragem. Apenas PDF</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <button type="submit" name="cdisputa" id="cadisputa"
                                                    class="btn btn-success">Cadastrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="footer"><p class="text-alert">CELERAR &copy; 2017</p></div>
    </div>
</div>
</body>
</html>
