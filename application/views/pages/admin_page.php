<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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

    <script>
        $(document).ready(function(){

        });
    </script>
    <style>
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
    </style>
    <script>
        $(document).ready(function(){
           $('#toggle-sidebar').click(function(){
               var e = $('#sidebar');
               e.fadeToggle(1200);
           });
        });
    </script>
</head>
<body>
<div class="wrapper">
    <aside class="sidebar" id="sidebar" style="display: block">
        <div class="sidebar_header">
            <a class="header-text" href="<?= base_url()?>"> ADMIN</a>
        </div>

        <ul class="nav flex-column">
            <li class="nav-item dropdown">
                <a class="nav-link active"><i class="fa fa-desktop fa-fw" aria-hidden="true"></i>&nbsp; Procedimentos</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-item dropdown-toggle"><i class="fa fa-users fa-fw" aria-hidden="true"></i>&nbsp; Usuários</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Editar usuário</a>
                    <a class="dropdown-item" href="#">Editar partes</a>
                </div>
            </li>
        </ul>
    </aside>

    <div class="page-wrapper">
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" id="toggle-sidebar" href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('home/logout')?>"><i class="fa fa-sign-out" aria-hidden="true"></i> SAIR</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid maincontent">
        </div>

    </div>
</div>
</body>
</html>
