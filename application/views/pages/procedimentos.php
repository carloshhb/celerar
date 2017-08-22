<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Celerar - Resolução alternativa de disputas online</title>

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

    <style>
        .btn{
            cursor: pointer;
        }
        .has-error{
            border: 1px solid #ef0006;
        }
        .help-block{
            color: #ef0006;
        }
        .user-head.inbox-avatar {
            width: 65px;
        }
        .user-head.inbox-avatar img {
            border-radius: 50%;
        }
        a.header-text {
            padding-left: 68px;
            font-size: 15pt;
            color: white;
        }
        a.nav-link.topnav:hover {
            background-color: transparent;
        }
        input[type="email"]{
            height: 44px;
            font-size: 16px;
            width: 100%;
            margin-bottom: 10px;
            -webkit-appearance: none;
            background: #ffffff;
            border-top: 0;
            border-left: 0;
            border-right: 0;
            padding: 0 8px;
            box-sizing: border-box;
        }
        #registrarAdv{
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <aside class="sidebar">
        <div class="sidebar_header">
            <a class="header-text" href="<?= base_url()?>"> CELERAR</a>
        </div>

        <nav class="nav flex-column">
            <a class="nav-link active" href="#"><i class="fa fa-desktop fa-fw" aria-hidden="true"></i>&nbsp; Procedimentos</a>
            <a class="nav-link" href="<?= site_url('home/acordos')?>"><i class="fa fa-handshake-o fa-fw" aria-hidden="true"></i>&nbsp; Acordos</a>
            <a class="nav-link" href="<?= site_url('home/regulamento')?>"><i class="fa fa-file-text fa-fw" aria-hidden="true"></i>&nbsp; Regulamento</a>
            <?php if($_SESSION['adv'] == 1){?>
                <a class="nav-link" href="<?=site_url('cadastro/novo')?>"><i class="fa fa-plus fa-fw" aria-hidden="true"></i>&nbsp; Novo caso</a>
                <a class="nav-link" href="#" onclick="tokenize()"><i class="fa fa-puzzle-piece fa-fw" aria-hidden="true"></i>&nbsp; Código</a>
                <a class="nav-link" href="<?=site_url('home/teste')?>"><i class="fa fa-puzzle-piece fa-fw" aria-hidden="true"></i>&nbsp; Teste</a>
            <?php } ?>
        </nav>
    </aside>

    <div class="page-wrapper">
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#"><i class="fa fa-balance-scale" aria-hidden="true"></i> Procedimentos</a>
            <div class="collapse navbar-collapse" id="navbarText">
                <span class="navbar-text">Bem vindo(a) <?= $_SESSION['nome'].' '.$_SESSION['unome']?></span>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link topnav" href="<?=site_url('home/perfil')?>"><i class="fa fa-id-badge" aria-hidden="true"></i> PERFIL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link topnav" href="<?=site_url('home/logout')?>"><i class="fa fa-sign-out" aria-hidden="true"></i> SAIR</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid maincontent">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Casos em andamento</h4>
                        </div>
                        <div class="card-block">
                            <ul class="list-group">
                                <?php
                                if (!empty($procsativos)) {
                                    foreach ($procsativos as $nkey => $newa):
                                        if ($newa):
                                            foreach ($newa as $key => $value):
                                                switch ($key):
                                                    case ($key == "proid"):
                                                        ?><a href="#" data-ProcessoID="<?= $value?>"
                                                             class="list-group-item list-group-item-action justify-content-between">
                                                        <div class="d-flex w-100 justify-content-between">
                                                            <h5 class="mb-1">Caso nº <?= $value ?></h5>
                                                        </div>
                                                        <p class="mb-1"><br>Requerente: <?= $newa["nomeAutor"]?> <br>Requerido: <?= $newa["nomeReu"]?></p>
                                                        </a>
                                                        <?php
                                                        break;
                                                endswitch;
                                            endforeach;
                                        endif;
                                    endforeach;
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="card-block">
                            <?php echo $paginationA; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-block">
                            <?php if($quantidadeP == 0) $msg = "Você não tem casos no sistema"; elseif ($quantidadeP == 1) $msg = "Você tem ".$quantidadeP." caso"; else $msg = "Você tem ".$quantidadeP." casos"; ?>
                            <h4 class="card-title">Casos pendentes</h4>
                            <h6 class="card-subtitle"><?php echo $msg?></h6>
                        </div>
                        <div class="card-block">
                            <ul class="list-group">
                                <?php
                                if (!empty($procspendentes)) {
                                    foreach ($procspendentes as $nkey => $newa):
                                        if ($newa):
                                            foreach ($newa as $key => $value):
                                                switch ($key):
                                                    case ($key == "proid"):
                                                        ?><a href="#" data-ProcessoID="<?= $value ?>"
                                                             class="list-group-item list-group-item-action justify-content-between">
                                                        <div class="d-flex w-100 justify-content-between">
                                                            <h5 class="mb-1">Caso nº <?= $value ?></h5>
                                                        </div>
                                                        <p class="mb-1"><br>Requerente: <?= $newa["nomeAutor"] ?> <br>Requerido: <?= $newa["nomeReu"] ?>
                                                        </p><br>
                                                        </a>
                                                        <?php
                                                         if ($_SESSION['adv'] == 0){
                                                            if($tipoParte === 2){?>
                                                            <button type="button" id="registrarAdv" data-ID="<?=$value?>" class="btn btn-primary">Registrar Advogado</button>
                                                        <?php } }
                                                        break;
                                                endswitch;
                                            endforeach;
                                        endif;
                                    endforeach;
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="card-block">
                            <?php echo $paginationP; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <p class="text-alert">CELERAR.COM</p>
        </div>
    </div>
</div>
</body>

<div class="modal fade" id="modalAdv">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Neste formulário você está prestes a enviar um email para o seu advogado
                    com o objetivo que este venha a integrar o seu caso e defender seus
                    interesses.</p><br>
                <?php echo form_open('cadastro/cadastro_advreu', 'id="addAdv"');?>
                <div class="form-group">
                    <label for="emailadv" class="form-control-label">Email do advogado:</label>
                    <input type="email" class="form-control" name="emailadv" id="emailadv" placeholder="advogado@advogado.com">
                    <span class="help-block"></span>
                </div>
                <input type="text" name="procid" value="" hidden>
                <input type="text" name="tokenreu" value="" hidden>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="save()" class="btn btn-primary">Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <?php echo form_close()?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalSucesso">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sucesso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>O e-mail foi encaminhado com sucesso para seu advogado. Entre em contato com ele e
                    o informe de tal ato.</p><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="reloadpage()" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modaltoken">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Inserir código de acesso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Insira código de acesso que você recebeu por e-mail para ter acesso ao procedimento do seu cliente.</p><br>
                <?php echo form_open('home/tokenizador', 'id="tokenform"');?>
                <div class="form-group">
                    <label for="token" class="form-control-label">Código recebido por email:</label>
                    <input type="text" class="form-control" name="codigoacesso" id="token" placeholder="">
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="inserir_Token()" class="btn btn-primary">Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <?php echo form_close()?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalSucessoCodigo">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sucesso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>O código inserido é válido, agora você integra o caso também.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="reloadpage()" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){

        // Carregar o ID dos botões
        var data = document.querySelectorAll("[data-Id]");
        for(var index in data){
            if(data.hasOwnProperty(index)) addAdv(data[index])
        }

        $("[data-tSidebar]").click(function(){
            var e = $(".sidebar");
            e.fadeToggle(1200);
        });

        function addAdv(bElement){
            var data = bElement.dataset;
            var id = data["id"];

            bElement.addEventListener("click", function(){
                $('.modal-title').text('Cadastro de advogado - Caso nº: '+id);
                $("input[name=procid]").attr('value', id);
                $("input[name=tokenreu]").attr('value', randomstring(8));
                $('#modalAdv').modal('show');
            });
        }

        $("input").change(function(){
            $(this).removeClass('has-error');
            $(this).next().empty();
        });

        $("input").focusin(function(){
            $(this).removeClass('has-error');
            $(this).next().empty();
        });
    });

    document.addEventListener("DOMContentLoaded", function(){
        function prepareUrl(aElement){
            if(aElement.constructor !== HTMLAnchorElement) throw("Invalid Type");

            var data = aElement.dataset;
            var id = data["processoid"];

            aElement.addEventListener("click", function(){
                var siteUrl = '<?= site_url('home/procedimento')?>/PROCESSOID';
                window.location = siteUrl.replace(/PROCESSOID/g, id);
            });
        }

        var query = document.querySelectorAll("[data-ProcessoId]");

        for(var index in query){
            if(query.hasOwnProperty(index)) prepareUrl(query[index]);
        }
    });

    function randomstring(L){
        var s= '';
        var randomchar=function(){
            var n= Math.floor(Math.random()*62);
            if(n<10) return n; //1-10
            if(n<36) return String.fromCharCode(n+55); //A-Z
            return String.fromCharCode(n+61); //a-z
        };
        while(s.length< L) s+= randomchar();
        return s;
    }

    function save(){
        var url = "<?php echo base_url('cadastro/cadastroAdvReu')?>";

        $.ajax({
            url: url,
            type: "POST",
            data: $("#addAdv").serialize(),
            dataType: "JSON",
            success: function (data) {

                if (data.status) {
                    $('#modalAdv').modal('hide');
                    $('#modalSucesso').modal('show');
                }
                else {
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="' + data.inputerror[i] + '"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Erro ao enviar e-mail');
            }
        });
    }

    function inserir_Token(){
        var url = "<?php echo base_url('home/tokenizador')?>";

        $.ajax({
            url: url,
            type: "POST",
            data: $("#tokenform").serialize(),
            dataType: "JSON",
            success: function (data) {

                if (data.status)
                {
                    if(data.invalido){
                        alert("Código inválido");
                    }
                    else{
                        $('#modaltoken').modal('hide');
                        $('#modalSucessoCodigo').modal('show');
                    }
                }
                else {
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="' + data.inputerror[i] + '"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert("erro");
            }
        });
    }

    function tokenize(){
        $('#modaltoken').modal('show');
    }

    function reloadpage(){
        location.reload(true);
    }
</script>
</html>
