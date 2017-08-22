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
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,400i" rel="stylesheet">


    <!-- Estilo custom da dashboard -->
    <link href="<?=base_url('assets/css/estilodash.css')?>" rel="stylesheet">

    <!-- JS Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/89f033c1f5.js"></script>

    <script>
        $(document).ready(function(){
            $("[data-tSidebar]").click(function(){
                var e = $(".sidebar");
                e.fadeToggle(1200);
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
            <a class="nav-link" href="<?= site_url('home/procedimentos')?>"><i class="fa fa-desktop" aria-hidden="true"></i> Procedimentos</a>
            <a class="nav-link active" href="#"><i class="fa fa-handshake-o" aria-hidden="true"></i> Acordos</a>
        </nav>
    </aside>

    <div class="page-wrapper">

        <!-- Barra de navegação interna -->

        <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#"><i class="fa fa-handshake-o" aria-hidden="true"></i> Acordos</a>
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

        <!-- Conteúdo da pagina -->

        <div class="content">
            <div class="container-fluid maincontent">
                <div class="row">
                    <div class="col-md-6">aaaaaaaaaa</div>
                    <div class="col-md-6">bbbbbbbbbb</div>
                </div>
            </div>

            <div class="footer"><p class="text-alert">Place sticky footer content here.</p></div>
        </div>
    </div>
</div>
</body>
</html>