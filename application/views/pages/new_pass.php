
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

    <style>
        .main{
            margin:50px 15px;
        }
        .form-group{
            margin-bottom: 15px;
        }
        input[type="email"], input[type="password"] {
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
        }
        label{
            margin-bottom: 5px;
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
        .login-container {
            padding: 30px;
            max-width: 350px;
            width: 100% !important;
            background-color: #F7F7F7;
            margin: 0 auto;
            border-radius: 2px;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            font-family:;
            position: absolute;
            left: 0;
            right: 0;
            top: 150px;
        }
        .loginmodal-container h1 {
            text-align: center;
            font-size: 1.8em;
            font-family:;
        }

        .login-container input[type=submit] {
            width: 100%;
            display: block;
            margin-bottom: 10px;
            position: relative;
        }

        .login-submit {
            border: 0px;
            color: #fff;
            text-shadow: 0 1px rgba(0,0,0,0.1);
            background-color: #4d90fe;
            padding: 17px 0px;
            font-family: ;
            font-size: 14px;
            cursor: pointer;
        }

        .login-submit:hover {
            /* border: 1px solid #2f5bb7; */
            border: 0px;
            text-shadow: 0 1px rgba(0,0,0,0.3);
            background-color: #357ae8;
            /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#357ae8)); */
        }

        .login-container a {
            text-decoration: none;
            color: #666;
            font-weight: 400;
            text-align: center;
            display: inline-block;
            opacity: 0.6;
            transition: opacity ease 0.5s;
        }

        .login-help{
            font-size: 14px;
        }
    </style>

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
        </ul>
    </div>
</nav>

<div class="login-container">
    <h1>Nova senha</h1><br>
    <?php echo form_open('user/new_pass' . '/' . $this->uri->segment(3));?>
    <input type="password" name="novasenha" placeholder="Nova Senha">
    <input type="password" name="cnovasenha" placeholder="Confirmação da nova senha">
    <input type="submit" class="login-submit" value="Enviar">
    </form>
</div>
</body>
</html>
