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
    <link href="http://www.celerar.com/assets/css/estilodash.css" rel="stylesheet">

    <!-- JS Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/89f033c1f5.js"></script>
    <script src="https://unpkg.com/vue"></script>

    <style>
    /*adicionar em meu estilo dashboard*/
    .sidebar .sidebar_header {
        padding-bottom: 3px;
        padding-top: 8px;
        padding-left: 10px;
        padding-right: 15px;
        margin-bottom: 30px;
        text-align: center;
        background-color: #2f4c5a;
    }
    /*
        RETIRAR O OVERFLOW DA ROW QUE ESTIVER A TABELA PORQUE ELA ESCONDE
        O PEDAÇO DO POPUP
    */
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
        .menu_items{
            box-shadow: none;
            border-radius: 0;
            border-color: #c5c6c8;
            padding: 1px;
            background-color: #fff !important;
            top: 100%;
            right: 50%;
            margin-right: -15px
        }
        .set_color{
            text-decoration: none;
            position: relative;
            display: block;
            border-radius: 0;
            cursor: pointer;
            padding: 2px 5px;
        }
        .set_color:hover{
            background-color: rgba(216, 216, 216, 0.28);
        }
        .line_separate{
            height: 1px;
            background-color: #e0e5e1;
            position: relative;
            bottom: -3px;
        }
        li{
            list-style: none !important;
        }
        .popover__wrapper {
            cursor: pointer;
            position: relative;
            display: table-cell;
            width: 100px;
            bottom: -10px;
            background-color: #c4c4c4;
        }
        .menu_cores {
            display: none;
            position: absolute;
            top: -3px;
            left: -107px;
            transform: translate(0,40px);
            background-color: #ffffff;
            padding: 1px;
            border: 1px solid #c5c6c8;
            width: 194px;
            z-index: 99;
        }
        .menu_cores:before {
            position: absolute;
            z-index: -1;
            content: '';
            right: calc(50% - 88px);
            top: -8px;
            border-style: solid;
            border-width: 0 10px 10px 10px;
            border-color: transparent transparent #ffffff transparent;
            transition-duration: 0.3s;
            transition-property: transform;
        }
        /*.popover__wrapper .menu_cores {
            z-index: 10;
            opacity: 1;
            display: none
            left: -1px;
            transform: translate(0,45px);
            transition: all 0.5s cubic-bezier(0.75, -0.02, 0.2, 0.97);
        }*/
        .menu_wrapper{
            position: relative;
            top: 0;
            right: 0;
            margin: 0;
        }
        .menu{
            text-align: center;
            font-family: inherit;
            color: #666;
            height: 36px;
            font-size: 12px;
            width: 100%;
            display: block;
            padding: 9px 5px 0px 5px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            border-bottom-width: 1px;
            border-bottom-style: solid;
            -webkit-print-color-adjust: exact;
        }
        .menu_color_1{
            background-color: #f0f0f0;
            border-bottom-color: #e6e6e6;
            width: 126px;
        }
        .color_pick{
            cursor: pointer;
        }
        .img{
            width: 45px;
            position: relative;
            height: 45px;
            bottom: 5px;
            left: -5px;
        }
        .casos{
            display: flex;
            cursor: pointer;
            margin: 2px;
        }
        .documentos{
            display: none;
            cursor: pointer;
            margin-top: 10px;
            padding: 5px;
        }
        .open{
            display: block !important;
        }
        #pastaProcs, #pastaDocs{
            cursor: pointer;
        }
        .circle {
            position: relative;
            display: inline-block;
            top: 3px;
            width: 14px;
            height: 14px;
            background: #ffffff;
            border: 1px solid #dfdfdf;
            border-radius: 100%;
        }
        .label{
            display: inline-block;
            font-family: 'Merriweather Sans', sans-serif;
            font-weight: normal !important;
            max-width: 160px;
            vertical-align: top;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            word-wrap: break-word;
            line-height: 18px;
            font-size: 14px;
            margin-top: 1px;
            background-color: transparent;
            border-color: transparent;
            text-align: left;
            outline: none;
            width: 160px;
            cursor: pointer;
        }
        .edit_content{
            text-align: right;
            background-color: #f6f8fa;
        }
        .menu_risco{
            background-color: #f0f0f0;
            border-bottom-color: #e6e6e6;
            width: 100px;
            cursor: pointer;
        }
        .menu_risco_show {
            display: none;
            position: absolute;
            top: -4px;
            left: -32px;
            transform: translate(0,40px);
            background-color: #ffffff;
            padding: 1px;
            border: 1px solid #c5c6c8;
            width: 100px;
            z-index: 99;
        }
        .menu_risco_show:before {
            position: absolute;
            z-index: -1;
            content: '';
            right: calc(50% - 45px);
            top: -8px;
            border-style: solid;
            border-width: 0 10px 10px 10px;
            border-color: transparent transparent #ffffff transparent;
            transition-duration: 0.3s;
            transition-property: transform;
        }
        .set_risco{
            text-decoration: none;
            position: relative;
            display: block;
            border-radius: 0;
            cursor: pointer;
            padding: 2px 5px;
        }
        .set_risco:hover{
            background-color: rgba(216, 216, 216, 0.28);
        }
        .line_separate{
            height: 1px;
            background-color: #e0e5e1;
            position: relative;
            bottom: -3px;
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
                            <?php
                            foreach($procspendentes as $k => $v){
                                echo $k;
                                foreach($v as $key => $value){
                                    echo $value;
                                }
                            }
                            ?>
                        </div>
                        <div class="card-block">
                                                    </div>
                    </div>
                </div>
            </div>
            <div class="row" style="overflow: visible">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-block">
                                                        <h4 class="card-title">Casos pendentes</h4>
                            <h6 class="card-subtitle">Você tem 2 casos</h6>
                        </div>
                        <div class="card-block">
                            <table class="table" id="table">
                                <tr>
                                    <th>Número</th>
                                    <th>Responsável</th>
                                    <th>Prioridades</th>
                                    <th>Data de início</th>
                                    <th>Risco</th>
                                </tr>
                                <tr>
                                    <td contenteditable="false">Teste</td>
                                    <td contenteditable="false">
                                        <div class="menu_wrapper">
                                            <span class="menu menu_color_1">Adv A</span>
                                        </div>
                                    </td>
                                    <td contenteditable="false" class="color_pick">
                                        <div class="menu_wrapper">
                                            <span class="menu menu_color_1"></span>
                                            <ul class="menu_cores">
                                                <li>
                                                    <span class="set_color" data-color="1">
                                                        <span class="circle"></span>
                                                        <input type="text" class="label" value="Prazo Longo">
                                                        <div class="line_separate"></div>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="set_color" data-color="2">
                                                        <span class="circle"></span>
                                                        <input type="text" class="label" value="Vencendo prazo">
                                                        <div class="line_separate"></div>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="set_color" data-color="3">
                                                        <span class="circle"></span>
                                                        <input type="text" class="label" value="Prioridade">
                                                        <div class="line_separate"></div>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="set_color" data-color="4">
                                                        <span class="circle"></span>
                                                        <input type="text" class="label" value="Prazo vencido">
                                                        <div class="line_separate"></div>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="set_color" data-color="5">
                                                        <span class="circle"></span>
                                                        <input type="text" class="label" value="Complicado">
                                                        <div class="line_separate"></div>
                                                    </span>
                                                </li>
                                                <li class="edit_content">
                                                    <a href="#" id="edit"><i class="fa fa-fw fa-pencil-square-o" aria-hidden="true"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>01/01/2018</td>
                                    <td contenteditable="false" class="color_pick">
                                        <div class="menu_wrapper">
                                            <span class="menu menu_risco"></span>
                                            <ul class="menu_risco_show">
                                                <li>
                                                    <span class="set_risco" data-risco="1">
                                                        <input type="text" class="label" value="Remoto">
                                                        <div class="line_separate"></div>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="set_risco" data-risco="2">
                                                        <input type="text" class="label" value="Provável">
                                                        <div class="line_separate"></div>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="set_risco" data-risco="3">
                                                        <input type="text" class="label" value="Possível">
                                                        <div class="line_separate"></div>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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

        (function(jsonTeste){

            var j = JSON.parse(jsonTeste);

            function adcLinha(numString, advString, coresMenu, riscoMenu){

                var tr = $(document.createElement("tr"));
                var tdNumero = $(document.createElement("td"));
                var tdAdv = $(document.createElement("td"));
                var tdPrior = $(document.createElement("td"));
                var tdData = $(document.createElement("td"));
                var tdRisco = $(document.createElement("td"));

                var Div = $(document.createElement("div"));
                var Span = $(document.createElement("span"));

                // Settings do menu de cores
                var UlCores = $(document.createElement("ul"));
                var liCores = $(document.createElement("li"));
                var spanCores = $(document.createElement("span"));
                var spanCirculo = $(document.createElement("span"));
                var inputCores = $(document.createElement("input"));
                var separadorLinha = $(document.createElement("div"));

                // Settings do menu do risco
                var divRisco = $(document.createElement("div"));
                var spanInnerRisco = $(document.createElement("span"));
                var spanMenuRisco = $(document.createElement("span"));
                var ulRisco = $(document.createElement("ul"));
                var liRisco = $(document.createElement("li"));
                var inputRisco = $(document.createElement("input"));

                // menu do risco atributos
                divRisco.attr('class', 'menu_wrapper');
                spanMenuRisco.attr('class', 'menu menu_risco');
                ulRisco.attr('class', 'menu_risco_show');

                // Div e span geral
                Div.attr("class", "menu_wrapper");
                Span.attr("class", "menu menu_color_1");
                Div.append(Span);

                tdAdv.append(Div);

                UlCores.attr("class", "menu_cores");
                spanCores.attr("class", "set_color");
                spanCores.attr("data-color", "1");
                spanCirculo.attr("class", "circle");
                inputCores.attr("class", "label");
                separadorLinha.attr("class", "line_separate");

                for(var k=1; k<=3; k++){
                    liRisco[k] = $(document.createElement("li"));
                    spanInnerRisco[k] = $(document.createElement("span"));
                    spanInnerRisco[k].attr('class', 'set_risco');
                    inputRisco[k] = $(document.createElement("input"));
                    inputRisco[k].attr('class', 'label');
                    var separadorLinha = $(document.createElement("div"));
                    separadorLinha.attr("class", "line_separate");

                    switch (k){
                        case 1:
                            spanInnerRisco.attr('data-risco', '1');
                            inputRisco[k].attr('value', 'Provável');
                            spanInnerRisco.append(inputRisco[k], separadorLinha);
                            liRisco[k].append(spanInnerRisco);
                            break;
                        case 2:
                            spanInnerRisco.attr('data-risco', '2');
                            inputRisco[k].attr('value', 'Improvável');
                            spanInnerRisco.append(inputRisco[k], separadorLinha);
                            liRisco[k].append(spanInnerRisco);
                            break;
                        case 3:
                            spanInnerRisco.attr('data-risco', '3');
                            inputRisco[k].attr('value', 'Certeza');
                            spanInnerRisco.append(inputRisco[k], separadorLinha);
                            liRisco[k].append(spanInnerRisco);
                            break;
                    }
                    ulRisco.append(liRisco[k]);
                }
                spanInnerRisco.each(function(index, item){
                    console.log(item);
                    console.log(index);
                });
                divRisco.append(spanMenuRisco, ulRisco);

                spanCores.append(spanCirculo);
                spanCores.append(inputCores);
                spanCores.append(separadorLinha);
                liCores.append(spanCores);
                UlCores.append(liCores);
                Div.append(UlCores);

                tdPrior.attr("class", "color_pick");
                tdPrior.append(Div);

                tdRisco.append(divRisco);

                tr.append(tdNumero);
                tr.append(tdAdv);
                tr.append(tdPrior);
                tr.append(tdData);
                tr.append(tdRisco);

                tdNumero.text(numString);
                tdAdv.text(advString);
                tdData.text('01/01/01');

                return tr;
            }

            $('#table').each(function(index, item){
                var tab = $(item);
                var tableIts = j;

                for(var tI in tableIts){
                    if(tableIts.hasOwnProperty(tI)){
                        aI = tableIts[tI];
                        for(var aInd in aI){
                            if(aInd === "proid")
                                tab.append(adcLinha(aI[aInd], 'Adv', 5, 3));
                        }
                    }
                }
            });

            $('.menu_wrapper').click(function(){
              $(this).children('.menu_cores').toggle('display');
            });

            $('.menu_wrapper').click(function() {
                $(this).children('.menu_risco_show').toggle('display');
            });

            var cells = document.querySelectorAll(".menu_wrapper");
            var menusCores = document.querySelectorAll(".menu_cores");
            var menusRiscos = document.querySelectorAll(".menu_risco_show");

            for (let i in cells){
                if (menusCores.hasOwnProperty(i)) fixDisplays(cells[i]);
            }
            function fixDisplays(el){
                el.addEventListener('click', function(){
                    for (let m of menusCores){
                        // console.log($(el).children('.menu_cores'));
                        if ($(el).children('.menu_cores') === m){
                            // console.log(m);
                        }

                    //     if (el === m){
                    //         $(el).css('display', 'block');
                    //     }
                    //     else {
                    //         $(m).css('display', 'none');
                    //     }
                    }
                });
            }


            // função para determinar a cor de fundo do bloco da tabela
            // definindo as prioridades de acordo com o usuário
            var acao = document.querySelectorAll("[data-color]");
            var risco = document.querySelectorAll("[data-risco]");
            for (var ind in acao){
                if (acao.hasOwnProperty(ind)) setColorBackgroundMenu(acao[ind]);
            }
            for (var kIndex in risco){
                if (acao.hasOwnProperty(kIndex)) setRisco(risco[kIndex]);
            }

            function setRisco(t){
                var o = t.dataset;
                var p = o['risco'];

                t.addEventListener('click', function(){
                    menuR = $(t).parent().parent().parent().children('.menu_risco');
                    switch(p){
                        case '1':
                            $(menuR).text(($(t).children('.label').val()));
                            break;
                        case '2':
                            $(menuR).text(($(t).children('.label').val()));
                            break;
                        case '3':
                            $(menuR).text(($(t).children('.label').val()));
                            break;
                    }
                });
            }

            function setColorBackgroundMenu(e){
                var d = e.dataset;
                var i = d['color'];
                switch(i){
                    case '1':
                        $(e).children('.circle').css('background-color', '#0275d8');
                        break;
                    case '2':
                        $(e).children('.circle').css('background-color', '#c9302c');
                        break;
                    case '3':
                        $(e).children('.circle').css('background-color', '#5cb85c');
                        break;
                    case '4':
                        $(e).children('.circle').css('background-color', '#f0ad4e');
                        break;
                    case '5':
                        $(e).children('.circle').css('background-color', '#636c72');
                        break;
                }

                e.addEventListener('click', function(){
                    menu = $(e).parent().parent().parent().children('.menu_color_1');
                    switch(i){
                        case '1':
                            $(menu).css('background-color', '#0275d8');
                            $(menu).css('color', '#fff');
                            $(menu).text(($(e).children('input').val()));
                            break;
                        case '2':
                            $(menu).css('background-color', '#c9302c');
                            $(menu).css('color', '#fff');
                            $(menu).text(($(e).children('input').val()));
                            break;
                        case '3':
                            $(menu).css('background-color', '#5cb85c');
                            $(menu).css('color', '#fff');
                            $(menu).text(($(e).children('input').val()));
                            break;
                        case '4':
                            $(menu).css('background-color', '#f0ad4e');
                            $(menu).css('color', '#fff');
                            $(menu).text(($(e).children('input').val()));
                            break;
                        case '5':
                            $(menu).css('background-color', '#636c72');
                            $(menu).css('color', '#fff');
                            $(menu).text(($(e).children('input').val()));
                            break;
                    }
                });
            }

        })('<?=json_encode($procspendentes);?>');


        $('#edit').click(function(){
            $(this).parent().css('display', 'block');
        });

        $('#pastaProcs').click(function(){
            var ativo = $(this).hasClass('active');
            if (ativo === false){
                $(this).addClass('active');
                $('.casos').toggle('display');
                $('.documentos').toggle('display');
                $('#pastaDocs').removeClass('active');
            }
        });

        $('#pastaDocs').click(function(){
            var ativo = $(this).hasClass('active');
            var docs = $('.documentos');
            if (ativo === false){
                docs.slideToggle('700', function(){
                    docs.toggleClass("open");
                });
            }
        });

        // FIM DA FUNÇÃO DE MUDAR A COR DE FUNDO DA CÉLULA DA TABELA

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
                var siteUrl = 'http://www.celerar.com/home/procedimento/PROCESSOID';
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
        var url = "http://www.celerar.com/home/tokenizador";

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

    var $TABLE = $('#table');
    var $BTN = $('#export-btn');
    var $EXPORT = $('#export');

    $('.table-add').click(function () {
    var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
    $TABLE.find('table').append($clone);
    });

    $('.table-remove').click(function () {
    $(this).parents('tr').detach();
    });

    $('.table-up').click(function () {
    var $row = $(this).parents('tr');
    if ($row.index() === 1) return; // Don't go above the header
    $row.prev().before($row.get(0));
    });

    $('.table-down').click(function () {
    var $row = $(this).parents('tr');
    $row.next().after($row.get(0));
    });

    // A few jQuery helpers for exporting only
    jQuery.fn.pop = [].pop;
    jQuery.fn.shift = [].shift;

    $BTN.click(function () {
    var $rows = $TABLE.find('tr:not(:hidden)');
    var headers = [];
    var data = [];

    // Get the headers (add special header logic here)
    $($rows.shift()).find('th:not(:empty)').each(function () {
    headers.push($(this).text().toLowerCase());
    });

    // Turn all existing rows into a loopable array
    $rows.each(function () {
    var $td = $(this).find('td');
    var h = {};

    // Use the headers from earlier to name our hash keys
    headers.forEach(function (header, i) {
      h[header] = $td.eq(i).text();
    });

    data.push(h);
    });

    // Output the result
    $EXPORT.text(JSON.stringify(data));
    });
</script>
</html>
