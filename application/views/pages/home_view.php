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

    <!-- Estilo custom -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/estilowelcome.css')?>"

    <!-- JS Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/89f033c1f5.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="<?php echo base_url('assets/js/cleave.js')?>"></script>

    <style>
        .main{
            margin:50px 15px;
        }
        .form-group{
            margin-bottom: 15px;
        }

        label{
            margin-bottom: 5px;
        }

        input,
        input::-webkit-input-placeholder {
            font-size: 11px;
            padding-top: 3px;
        }
        .form-control {
            height: auto!important;
            padding: 8px 12px !important;
        }
        .input-group {
            -webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
            -moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
            box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
        }
        #button {
            border: 1px solid #ccc;
            margin-top: 28px;
            padding: 6px 12px;
            color: #666;
            text-shadow: 0 1px #fff;
            cursor: pointer;
            -moz-border-radius: 3px 3px;
            -webkit-border-radius: 3px 3px;
            border-radius: 3px 3px;
            -moz-box-shadow: 0 1px #fff inset, 0 1px #ddd;
            -webkit-box-shadow: 0 1px #fff inset, 0 1px #ddd;
            box-shadow: 0 1px #fff inset, 0 1px #ddd;
            background: #f5f5f5;
            background: -moz-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #f5f5f5), color-stop(100%, #eeeeee));
            background: -webkit-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
            background: -o-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
            background: -ms-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
            background: linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f5f5f5', endColorstr='#eeeeee', GradientType=0);
        }
        .main-center{
            margin: 0 auto;
            padding: 20px 60px;
            background: rgba(41, 178, 234, 0.69);
            max-width: 400px;
            color: #FFF;
            text-shadow: none;
            -webkit-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
            -moz-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
            box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);

        }
        span.input-group-addon i {
            color: #009edf;
            font-size: 17px;
        }
        .nav{
            padding-left: 30px;
            padding-right: 30px;
            background-color: #f7f7f7;
        }
        body {
            background-size: auto;
            font-family: 'Merrywheater-Sans', sans-serif;
            font-weight: 500;
        }
        .mr-auto{
            margin-right: 0!important;
            margin-left: auto!important;
        }
        .loginmodal-container {
            padding: 30px;
            max-width: 350px;
            width: 100% !important;
            background-color: #F7F7F7;
            margin: 0 auto;
            border-radius: 2px;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            font-family: 'Merriweather Sans', sans-serif;
        }

        .loginmodal-container h1 {
            text-align: center;
            font-size: 1.8em;
            font-family: 'Merriweather Sans', sans-serif;
        }

        .loginmodal-container input[type=submit] {
            width: 100%;
            display: block;
            margin-bottom: 10px;
            position: relative;
        }

        .loginmodal-container input[type=text], input[type=password] {
            height: 44px;
            font-size: 16px;
            width: 100%;
            margin-bottom: 10px;
            -webkit-appearance: none;
            background: #f7f7f7;
            border-top: 0;
            border-left: 0;
            border-right: 0;
            padding: 0 8px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            border-width: 2px;
        }
        .loginmodal-container input[type=text], input[type=password]:focus{
            background: #f7f7f7;
        }
        .loginmodal-submit{
            position: absolute;
            right: 44px;
            top: 56%;
            background: #ffffff;
            color: #999999;
            padding: 10px 0;
            width: 50px;
            height: 50px;
            margin-top: -25px;
            border: 5px solid rgb(37, 33, 32);
            border-radius: 50%;
            transition: all ease-in-out 500ms;
            cursor: pointer;
        }
        .loginmodal-submit.clicked {
            color: #555555;
        }
        .loginmodal-submit.success {
            color: #2ecc71;
        }
        .loginmodal-submit.error {
            color: #e74c3c;
        }
        .loginmodal-submit:hover {
            color: #555555;
            transform: rotate(450deg);
        }
        .loginmodal-container a {
            text-decoration: none;
            color: #666;
            font-weight: 400;
            text-align: center;
            display: inline-block;
            opacity: 0.6;
            transition: opacity ease 0.5s;
        }

        #login-modal-chevron{
            color: #2caff3;
        }

        .btn-lg.registrar{
            background-color: #2caff3;
            border-color: #2caff3;
            color: white;
        }
    </style>
    <script>
        $(document).ready( function(){
            var cpf_Cleave = new Cleave('#icpf', {
                numericOnly: true,
                delimiters: ['.', '.', '-'],
                blocks: [3, 3, 3, 2]
            });

            $('#eadv').click(function() {
                $("#oab").toggle(700);
            });

        });
    </script>
</head>
<body>
<nav class="nav navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="<?php echo base_url()?>">CELERAR</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <span class="navbar-text">- Solução simples, acessível e online de disputas</span>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>">Página inicial</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contato</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-sm btnlogin" href="#" data-toggle="modal" data-target="#login-modal">Entrar</a>
            </li>
        </ul>
    </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <?php if(isset($msg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $msg; ?> </div><?php } ?>
            <h1>Entrar</h1><br>
            <?php echo form_open('login');?>
            <input type="text" id="usr" name="username" class="form-control" placeholder="Nome de usuário" required value="<?php echo set_value('username'); ?>">
            <span class="text-danger"><?php echo form_error('username'); ?></span>
            <input type="password" id="pwd" name="password" class="form-control" required placeholder="Senha">
            <span class="text-danger"><?php echo form_error('password'); ?></span>
            <button type="submit" name="login" class="login loginmodal-submit" value=""><i class="fa fa-chevron-right"></i></button>
            </form>
            <div class="login-help">
                <a href="<?php echo base_url('forgotpassword')?>">Esqueceu a senha?</a>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row main">
        <div class="main-login main-center">
            <h5>Registre-se</h5>
            <?php echo form_open('user'); ?>
            <div class="form-group">
                <div class="cols-sm-10">
                    <label for="usr" class="cols-sm-2 control-label">Nome de usuário</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                        <input type="text" id="usr" name="username" class="form-control" placeholder="Nome de usuário" value="<?php echo set_value('username'); ?>">
                    </div>
                    <span class="text-danger"><?php echo form_error('username'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <div class="cols-sm-10">
                    <label for="inputPNome" class="cols-sm-2 control-label">Nome</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-keyboard-o fa-fw" aria-hidden="true"></i></span>
                        <input type="text" id="inputPNome" name="pnome" class="form-control" placeholder="Nome" value="<?php echo set_value('pnome'); ?>">
                    </div>
                    <span class="text-danger"><?php echo form_error('pnome'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <div class="cols-sm-10">
                    <label for="inputUNome" class="cols-sm-2 control-label">Sobrenome</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-keyboard-o fa-fw" aria-hidden="true"></i></span>
                        <input type="text" id="inputUNome" name="unome" class="form-control" placeholder="Sobrenome" value="<?php echo set_value('uname'); ?>">
                    </div>
                    <span class="text-danger"><?php echo form_error('unome'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <div class="cols-sm-10">
                    <label for="icpf" class="cols-sm-2 control-label">CPF</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-address-card fa-fw" aria-hidden="true"></i></span>
                        <input type="text" id="icpf" name="cpf" class="form-control input-5" placeholder="CPF" required value="<?php echo set_value('cpf'); ?>">
                    </div>
                    <span class="text-danger"><?php echo form_error('cpf'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <div class="cols-sm-10">
                    <label for="inputEmail" class="cols-sm-2 control-label">Endereço de E-mail</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i></span>
                        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Endereço de e-mail" required value="<?php echo set_value('email'); ?>">
                    </div>
                    <span class="text-danger"><?php echo form_error('email'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <div class="cols-sm-10">
                    <label for="inputPassword" class="cols-sm-2 control-label">Senha</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock fa-fw" aria-hidden="true"></i></span>
                        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Senha">
                    </div>
                    <span class="text-danger"><?php echo form_error('password'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <div class="cols-sm-10">
                    <label for="inputPasswordCheck" class="cols-sm-2 control-label">Confirmação da Senha</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock fa-fw" aria-hidden="true"></i></span>
                        <input type="password" id="inputPasswordCheck" name="passwordCheck" class="form-control" placeholder="Confirmação da senha">
                    </div>
                    <span class="text-danger"><?php echo form_error('passwordCheck'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <div class="cols-sm-10">
                    <label class="custom-control custom-checkbox collapse" >
                        <input type="checkbox" name="eadv" id="eadv" class="custom-control-input" value="1" <?php echo set_checkbox('eadv')?>>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Sou advogado</span>
                    </label>
                </div>
            </div>

            <div class="form-group" style="display: none" id="oab">
                <div class="cols-sm-10">
                    <label for="noab" class="cols-sm-2 control-label">OAB</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-id-card-o fa-fw" aria-hidden="true"></i></span>
                        <input type="text" id="noab" name="noab" class="form-control" placeholder="Número da OAB" value="<?php echo set_value('noab');?>">
                    </div>
                    <span class="text-danger"><?php echo form_error('noab'); ?></span>
                </div>
                <div class="cols-sm-10">
                    <label for="secoab">Seccional</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i></span>
                        <select class="form-control" name="secoab" id="secoab" <?php echo set_select('secoab')?>>
                            <option value="AC" <?php set_select('secoab', 'AC')?>>AC</option>
                            <option value="AL" <?php set_select('secoab', 'AL')?>>AL</option>
                            <option value="AM" <?php set_select('secoab', 'AM')?>>AM</option>
                            <option value="AP" <?php set_select('secoab', 'AP')?>>AP</option>
                            <option value="BA" <?php set_select('secoab', 'BA')?>>BA</option>
                            <option value="CE" <?php set_select('secoab', 'CE')?>>CE</option>
                            <option value="DF" <?php set_select('secoab', 'DF')?>>DF</option>
                            <option value="ES" <?php set_select('secoab', 'ES')?>>ES</option>
                            <option value="GO" <?php set_select('secoab', 'GO')?>>GO</option>
                            <option value="MA" <?php set_select('secoab', 'MA')?>>MA</option>
                            <option value="MG" <?php set_select('secoab', 'MG')?>>MG</option>
                            <option value="MS" <?php set_select('secoab', 'MS')?>>MS</option>
                            <option value="MT" <?php set_select('secoab', 'MT')?>>MT</option>
                            <option value="PA" <?php set_select('secoab', 'PA')?>>PA</option>
                            <option value="PB" <?php set_select('secoab', 'PB')?>>PB</option>
                            <option value="PE" <?php set_select('secoab', 'PE')?>>PE</option>
                            <option value="PI" <?php set_select('secoab', 'PI')?>>PI</option>
                            <option value="RJ" <?php set_select('secoab', 'RJ')?>>RJ</option>
                            <option value="RN" <?php set_select('secoab', 'RN')?>>RN</option>
                            <option value="RS" <?php set_select('secoab', 'RS')?>>RS</option>
                            <option value="SE" <?php set_select('secoab', 'SE')?>>SE</option>
                            <option value="SP" <?php set_select('secoab', 'SP')?>>SP</option>
                            <option value="TO" <?php set_select('secoab', 'TO')?>>TO</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="g-recaptcha" data-sitekey="6LdTSCQUAAAAAF2eybrAVbNMJTnjcibg4nmnFKzc"></div>
            <div class="cols-sm-10">
                <button class="btn btn-primary btn-block" id="button" name='regSubmit' type="submit" role="button">Registrar</button>
            </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
