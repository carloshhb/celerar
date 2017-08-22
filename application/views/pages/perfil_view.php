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
            <a class="nav-link active" href="#"><i class="fa fa-id-badge fa-fw" aria-hidden="true"></i>&nbsp; Perfil</a>
        </nav>
    </aside>

    <div class="page-wrapper">
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#"><i class="fa fa-user-circle" aria-hidden="true"></i> Perfil de Usuário</a>
            <div class="collapse navbar-collapse" id="navbarText">
                <span class="navbar-text">Bem vindo(a) <?= $_SESSION['nome'].' '.$_SESSION['unome']?></span>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="fa fa-id-badge" aria-hidden="true"></i> PERFIL <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('home/logout')?>"><i class="fa fa-sign-out" aria-hidden="true"></i> SAIR</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid maincontent">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Meu perfil</h4>
                            <h6 class="card-subtitle">Visualizar e alterar informações</h6>
                        </div>
                        <div class="card-block">
                            <?php echo form_open('user/editarPerfil'); ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nomeinput">Nome</label>
                                        <input type="text" id="nomeinput" name="nome" class="form-control" placeholder="" value="<?php echo set_value('nome'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="sobrenomeinput">Sobrenome</label>
                                        <input type="text" id="sobrenomeinput" name="unome" class="form-control" placeholder="" value="<?php echo set_value('unome'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="emailinput">Email</label>
                                        <input type="email" id="emailinput" name="email" class="form-control" placeholder="" value="<?php echo set_value('email'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="cpfinput">CPF</label>
                                        <input type="text" id="cpfinput" name="cpf" class="form-control" placeholder="" value="<?php echo set_value('cpf'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="telinput">Telefone</label>
                                        <input type="email" id="telinput" class="form-control" placeholder="Telefone para contato">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="endinput">Endereço</label>
                                        <input type="text" id="endinput" class="form-control" placeholder="Endereço">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="passwinput">Nova senha</label>
                                        <input type="password" id="passwinput" name="password" class="form-control" placeholder="Nova senha" value="<?php echo set_value('password'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="cpasswinput">Confirmação da nova senha</label>
                                        <input type="password" id="cpassword" name="cpassword" class="form-control" placeholder="Confirme nova senha" value="<?php echo set_value('cpassword'); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <button type="submit" name="updateUser" class="btn btn-success">Atualizar</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer"><p class="text-alert">Place sticky footer content here.</p></div>
    </div>
</div>
</body>
</html>
