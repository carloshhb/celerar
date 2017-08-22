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
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">


    <!-- Estilos customs-->
    <link href="<?=base_url('assets/css/estilodash.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/jquery-ui.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/jquery.fileupload.css')?>">

    <!-- JS Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/89f033c1f5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/js/fileuploader.js')?>"></script>

    <style>
        .content{
            min-height: inherit;
            height: 120vh;
        }
        body{
            margin-bottom: 0 !important;
        }
        .nav-tabs{
            border-bottom: 0 !important;
        }
        .liner {
            height: 2px;
            background: #ddd;
            position: absolute;
            width: 55%;
            left: 0;
            margin-left: 212px;
            margin-top: 2px;
            right: 0;
            top: 2%;
            z-index: 1;
        }
        .nav-tabs .nav-item {
            margin-bottom: -1px;
            z-index: 2;
        }
        .tab-content {
            padding-top: 10px;
        }

        a.nav-link.procs {
            background-color: #ffffff;
            color: black;
            border: 1px solid;
            border-color: rgba(44, 175, 243, 0.2);
            border-radius: 50px;
            margin-left: 60px;
        }

        a.nav-link.procs.active {
            color: #ffffff;
            background-color: #2caff3;
            /* border-color: #ddd #ddd #fff; */
        }

        a.nav-link.procs:hover {
            background-color: #2caff3;
            color: white;
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

        p#submitAll ,p#removeAll {
            margin-top: 5px;
            cursor: pointer;
        }

        a.nav-link.topnav:hover {
            background-color: transparent;
        }
    </style>
    <script>
        $(document).ready(function() {

            (function(jsonString){
                // VALOR DINAMICO
                var json = JSON.parse(jsonString);
                var seletor = "[data-tabelaId]";

                function mountRow(docString, downloadString){
                    var tr = $(document.createElement("tr"));
                    var tdDoc = $(document.createElement("td"));
                    var tdDown = $(document.createElement("td"));
                    var aDown = $(document.createElement("a"));
                    var iDown = $(document.createElement("i"));

                    iDown.attr("class", "fa fa-download");
                    aDown.attr("href", downloadString);

                    aDown.append(iDown);
                    tdDown.append(aDown);

                    tr.append(tdDoc);
                    tr.append(tdDown);

                    tdDoc.html(docString);

                    return tr;
                }

                $(seletor).each(function(index, item){
                    var table = $(item);
                    var tableId = table.data("tabelaid");
                    var tableItems;

                    //TODO: DownloadURL aqui
                    var downloadUrlBase = "<?php echo base_url('base/download'). "/" . $procid ?>";
                    if(tableId === "Autor")
                        var downloadUrlBase = "<?php echo base_url('base/download') . "/". $procid . "/Autor" ?>";
                    else if (tableId === "Reu")
                        var downloadUrlBase = "<?php echo base_url('base/download') . "/" . $procid . "/Reu" ?>";
                    else if (tableId === "Arb")
                        var downloadUrlBase = "<?php echo base_url('base/download') . "/" .$procid . "/Arb" ?>";

                    if(tableId === "Todos") tableItems = json;
                    else tableItems = json[tableId];

                    for(var tIndex in tableItems)
                    {
                        if(tableItems.hasOwnProperty(tIndex))
                        {
                            if(typeof(tableItems[tIndex]) === "string")
                                table.append(mountRow(tableItems[tIndex], downloadUrlBase + "/" + tableItems[tIndex]));
                            else
                            {
                                var arrItem = tableItems[tIndex];
                                for(var aIndex in arrItem)
                                {
                                    if(arrItem.hasOwnProperty(aIndex)){
                                        if (typeof(tIndex) === "string")
                                        table.append(mountRow(arrItem[aIndex], downloadUrlBase + "/" + tIndex + "/" + arrItem[aIndex]));
                                    }
                                }
                            }
                        }
                    }

                    table.parent().DataTable({ "pagingType": "full_numbers",
                        language:{
                            "sEmptyTable": "Nenhum registro encontrado",
                            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                            "sInfoPostFix": "",
                            "sInfoThousands": ".",
                            "sLengthMenu": "_MENU_ resultados por página",
                            "sLoadingRecords": "Carregando...",
                            "sProcessing": "Processando...",
                            "sZeroRecords": "Nenhum registro encontrado",
                            "sSearch": "Pesquisar",
                            "oPaginate": {
                                "sNext": "Próximo",
                                "sPrevious": "Anterior",
                                "sFirst": "Primeiro",
                                "sLast": "Último"
                            },
                            "oAria": {
                                "sSortAscending": ": Ordenar colunas de forma ascendente",
                                "sSortDescending": ": Ordenar colunas de forma descendente"
                            }
                        }
                    });
                });
            })('<?=json_encode($todos);?>');
        } );
    </script>
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
            <?php if ($tipoadv){ ?>
                <a class="nav-link" href="<?= site_url()?>"><i class="fa fa-file-pdf-o fa-fw" aria-hidden="true"></i>&nbsp; Declaração + Procuração</a>
            <?php } ?>
            <a class="nav-link" href="<?= site_url('home/procedimentos')?>"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i>&nbsp; Retornar</a>
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
                <div class="col-md-8">
                    <ul class="nav nav-tabs" role="tablist">
                        <div class="liner"></div>
                        <li class="nav-item">
                            <a class="nav-link procs active" data-toggle="tab" href="#home" role="tab">Todos documentos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link procs" data-toggle="tab" href="#profile" role="tab">Docs. Requerente</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link procs" data-toggle="tab" href="#messages" role="tab">Docs. Requerido</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link procs" data-toggle="tab" href="#settings" role="tab">Docs. Árbitro</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-block">
                                        <h4 class="card-title">Informações sobre o procedimento - <?=$procid?></h4>
                                        <h6 class="card-subtitle"><?php if (isset($data_entrada)) echo "Data de início do procedimento: ".$data_entrada?></h6><br>
                                        <h6 class="card-subtitle">Última atualização: <?php echo $lupdate?></h6><br>
                                        <h6 class="card-subtitle">Última visualização do requerente: <?php echo $lviewautor?></h6>
                                        <h6 class="card-subtitle">Última visualização do requerido:</h6>
                                        <h6 class="card-subtitle">Última visualização do advogado do requerente:</h6>
                                        <h6 class="card-subtitle">Última visualização do advogado do requerido:</h6>
                                        <h6 class="card-subtitle">Última visualização do árbitro:</h6>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Documento</th>
                                                <th>Baixar</th>
                                            </tr>
                                            </thead>
                                            <tbody data-tabelaId="Todos"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-block">
                                        <h4 class="card-title">Informações sobre o procedimento - <?=$procid?></h4>
                                        <h6 class="card-subtitle"><?php if (isset($data_entrada)) echo "Data de início do procedimento: ".$data_entrada?></h6>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Documento</th>
                                                <th>Baixar</th>
                                            </tr>
                                            </thead>
                                            <tbody data-tabelaId="Autor"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="messages" role="tabpanel">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-block">
                                        <h4 class="card-title">Informações sobre o procedimento - <?=$procid?></h4>
                                        <h6 class="card-subtitle"><?php if (isset($data_entrada)) echo "Data de início do procedimento: ".$data_entrada?></h6>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Documento</th>
                                                <th>Baixar</th>
                                            </tr>
                                            </thead>
                                            <tbody data-tabelaId="Reu"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="settings" role="tabpanel">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-block">
                                        <h4 class="card-title">Informações sobre o procedimento - <?=$procid?></h4>
                                        <h6 class="card-subtitle"><?php if (isset($data_entrada)) echo "Data de início do procedimento: ".$data_entrada?></h6><br>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Documento</th>
                                                <th>Baixar</th>
                                            </tr>
                                            </thead>
                                            <tbody data-tabelaId="Arb"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Partes do procedimento</h4>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Parte</th>
                                        <th>Nome</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $head = "";
                                    foreach ($nomes as $key => $v):?>
                                        <tr>
                                            <?php if($v):?>
                                                <td>
                                                    <?php if($key == "AdvAutor") echo "Adv. Autor";
                                                    else if ($key == "AdvRequerido") echo "Adv. Requerido";
                                                    else if ($key == "Arbitro") echo "Árbitro";
                                                    else echo $key;
                                                     ?>
                                                </td>
                                                <td>
                                                    <?= $v ?>
                                                </td>
                                            <?php endif;?>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php //mostrar o protocolo apenas se o usuario for advogado
            if($_SESSION['adv'] == 1){?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Protocolo</h4>
                            <h6 class="card-subtitle">Enviar arquivos para o procedimento</h6>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="custom-file">
                                        <input id="fileupload" class="custom-file-input" type="file" name="files"
                                               data-url="<?php echo base_url('base/uploadUpdate')."/".$this->uri->segment(3)?>" multiple>
                                        <span class="custom-file-control"></span>
                                    </label>
                                    <ul class="list-group" id="fileUpload_files"></ul>
                                    <p id="submitAll" class="btn btn-success">Enviar todos</p>
                                    <p id="removeAll" class="btn btn-danger">Remover arquivos</p>
                                    <div style="display: flex; justify-content: space-between">
                                        <span>Upload Speed: <span id="upSpeed">0.00</span> kb/s</span>
                                        <span><span id="upFilesRemain">0 de 0</span> arquivos restantes</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <?php } ?>
        </div>
        <div class="footer"><p class="text-alert">CELERAR.COM</p></div>
    </div>
</div>

<script src="<?= base_url('assets/js/jquery-ui.js')?>"></script>
<script src="<?= base_url('assets/js/vendor/jquery.ui.widget.js')?>"></script>
<script src="<?= base_url('assets/js/jquery.iframe-transport.js')?>"></script>
<script src="<?= base_url('assets/js/jquery.fileupload.js')?>"></script>
<script src="<?= base_url('assets/js/jquery.fileupload-process.js')?>"></script>
<script src="<?= base_url('assets/js/jquery.fileupload-validate.js')?>"></script>
<script src="<?= base_url('assets/js/jquery.fileupload-ui.js')?>"></script>
<script src="<?= base_url('assets/js/jquery.fileupload-jquery-ui.js')?>"></script>
</body>
</html>
