<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//$this->load->view('templates/cabecalho');
// da reload logo
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

    <!-- JS Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/89f033c1f5.js"></script>

    <!-- Animate.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/external_pages.css')?>">

</head>
<body>
<div class="wrapper">
    <div class="top-wrapper">
        <!-- Photo by Diego Hernandez on Unsplash -->
        <nav class="nav navbar-toggleable-md navbar-light bg-faded sticky-top" id="topnav">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class=container>
                <a class="navbar-brand" href="#" id="titulo">CELERAR</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <span class="navbar-text">- Solução simples, acessível e online de disputas</span>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Página inicial <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contato</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-sm btnlogin" href="#" data-toggle="modal" data-target="#login-modal" id="bloginModal">Entrar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="jumbotron">
            <div class="hero-content">
                <h1 class="display-3" id="topreset">CELERAR</h1>
                <p class="lead">Solução simples, acessível e online de disputas</p>
                <hr class="my-4">
                <p class="lead">
                    <a class="btn btn-lg registrar" href="<?php echo base_url('registro'); ?>">Registrar</a>
                </p>
            </div>
        </div>
    </div>
    <section id="conteudo">
        <section id="servicos">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading" id="sections">Nossas qualidades</h2>
                        <hr class="primary">
                    </div>
                </div>
            </div>
            <div class="container-fluid icons" id="iconesDescricao">
                <div class="row">
                    <div class="col-sm-4 text-center">
                        <div class="service-box check">
                            <i class="fa fa-4x fa-gavel text-primary sr-icons"></i>
                            <h3>Solução</h3>
                            <small>A plataforma Celerar vai solucionar definitivamente o seu problema,
                                seja pela conciliação, mediação ou arbitragem.</small>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                        <div class="service-box simples">
                            <i class="fa fa-4x fa-heart text-primary sr-icons"></i>
                            <h3>Simples</h3>
                            <small>A plataforma foi pensada em todos os detalhes para ser o mais
                                simples e intuitiva possível</small>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                        <div class="service-box access">
                            <i class="fa fa-4x fa-usd text-primary sr-icons"></i>
                            <h3>Acessível</h3>
                            <small>Burocracia e tempo perdido custam dinheiro. Por isso,
                                nossa plataforma foi desenhada para funcionar da maneira mais eficiente possível,
                                tornando-a mais célere e barata.</small>
                        </div>
                    </div>
                </div>
                <div class="separador"></div>
                <div class="row">
                    <div class="col-sm-4 text-center">
                        <div class="service-box secret">
                            <i class="fa fa-4x fa-user-secret text-primary sr-icons"></i>
                            <h3>Privacidade</h3>
                            <small>Não se preocupe com a privacidade, todos os seus dados
                                são tratados com confidencialidade e só quem pode ter acesso
                                aos procedimentos são as partes envolvidas e seus advogados. </small>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                        <div class="service-box shield">
                            <i class="fa fa-4x  fa-university text-primary sr-icons" aria-hidden="true"></i>
                            <h3>Pacificação Social</h3>
                            <small>A Celerar é uma ferramenta que se utiliza de modernos métodos de
                                resolução de conflitos baseados nos mais avançados estudos do mundo.</small>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                        <div class="service-box desktop">
                            <i class="fa fa-4x  fa-desktop text-primary sr-icons"></i>
                            <h3>Online</h3>
                            <small>A Celerar é uma solução 100% online, o que significa
                                que você pode acessá-la de qualquer lugar, inclusive da sua casa,
                                trabalho ou até mesmo pelo celular.</small>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="comofunciona">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading" id="sections">Como funciona</h2>
                        <hr class="primary">
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4 offset-sm-2" id="comofesq">
                        <p style="text-align: justify">Tudo começa quando você percebe que
                             <strong>resolver seu problema no Judiciário é um transtorno.</strong>
                              A Justiça é lenta e muito burocrática. <strong>Mas há uma alternativa!</strong></p><br><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 offset-sm-6">
                        <p style="text-align: justify">Aí você decide optar pela
                             <strong>conciliação, mediação e arbitragem com a Celerar.</strong>
                              Seu advogado faz um <strong>cadastro no nosso sistema</strong>,
                               informando os seus dados e os do réu e apresentando sua petição inicial.</p><br><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 offset-sm-2" id="comofesq">
                        <p style="text-align: justify">Nós <strong>entraremos em contato com o réu e ele
                             será convidado</strong> para aceitar a sua proposta de <strong>resolver a disputa aqui,
                                  na Celerar</strong>, de forma simples e sem burocracia.</p><br><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 offset-sm-6">
                        <p style="text-align: justify">Vocês podem tentar um acordo, desde o primeiro momento até o final,
                             mas, caso as partes não cheguem a um entendimento,
                             <strong>o árbitro que foi encontrado pelo sistema julgará a disputa</strong>
                              e proferirá uma sentença.</p><br><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 offset-sm-2" id="comofesq">
                        <p style="text-align: justify">Esse árbitro é um <strong>advogado, imparcial, independente
                             e capacitado para resolver o conflito</strong>, seja mediando
                              uma negociação entre vocês ou proferindo a sentença.</p><br><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 offset-sm-6">
                        <p style="text-align: justify">Mas pode ficar tranquilo! Essa sentença tem a
                            <strong>mesma força de uma sentença dada por um Juiz.</strong></p>
                    </div>
                </div>
            </div>
        </section>

        <section id="msolucao">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading" id="sections">A melhor solução</h2>
                        <hr class="primary">
                    </div>
                </div>
            </div>
            <div class="container-fluid icons">
                <div class="row">
                    <div class="col-sm-6 offset-sm-3">
                        <h6 class="fazemos">Acreditamos que a melhor resolução é aquela que nasce do entendimento das partes e,
                        caso isso não seja possível, da atividade de um árbitro,
                        que acompanha o desenvolvimento do processo, então não
                        há motivo para nós interferirmos na resolução do conflito. Por isso:
                        </h6>
                    </div>
                </div>
            </div>
        </section>

        <section id="fazemos">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading" id="sections">O que fazemos</h2>
                        <hr class="primary">
                    </div>
                </div>
            </div>
            <div class="container-fluid icons">
                <div class="row">
                    <div class="col-sm-2 offset-sm-1 text-center">
                        <i class="fa fa-check" aria-hidden="true"></i>
                    </div>
                    <div class="col-sm-6 offset-sm-1 text-center fazemos">
                        <div class="row">
                            <div class="box">
                                <h6 class="fazemos">Nós oferecemos uma plataforma desenvolvida para propiciar
                                    a resolução da sua disputa, seja por meio da conciliação,
                                    da mediação ou por arbitragem.
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2 offset-sm-1 text-center">
                        <i class="fa fa-check" aria-hidden="true"></i>
                    </div>
                    <div class="col-sm-6 offset-sm-1 text-center fazemoslow">
                        <div class="row">
                            <div class="box">
                                <h6 class="fazemos">Nosso trabalho é organizar tudo para que o processo
                                    caminhe da melhor forma possível, de maneira
                                    eficiente e rápida. Nós vamos encontrar um árbitro
                                    independente e imparcial que esteja disposto a
                                    cuidar do caso de vocês. Nós também tivemos o cuidado
                                    de elaborar um regulamento para que tudo aconteça
                                    conforme regras estabelecidas previamente e de forma justa.
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="naofazemos">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading" id="sections">O que não fazemos</h2>
                        <hr class="primary">
                    </div>
                </div>
            </div>
            <div class="container-fluid icons">
                <div class="row">
                    <div class="col-sm-2 offset-sm-1 text-center">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                    <div class="col-sm-6 offset-sm-1 text-center fazemos">
                        <div class="row">
                            <div class="box">
                                <h6 class="fazemos">
                                    O sistema Celerar não é uma câmara ou órgão de arbitragem.
                                    Nós não somos árbitros e os árbitros que encontramos não são nossos empregados.
                                    Eles são terceiros que concordaram em resolver o conflito segundo as regras
                                    estabelecidas na plataforma. Também é importante insistir para que fique
                                    claro que nós não oferecemos o serviço de arbitragem em si.
                                    Esta é responsabilidade do árbitro.
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <div class="footer">
        <p class="text-alert">CELERAR &copy; 2017</p>
    </div>
</div>

<script>
    function isElementInViewport(elem) {
        var $elem = $(elem);

        // Get the scroll position of the page.
        var scrollElem = ((navigator.userAgent.toLowerCase().indexOf('webkit') != -1) ? 'body' : 'html');
        var viewportTop = $(scrollElem).scrollTop();
        var viewportBottom = viewportTop + $(window).height();

        // Get the position of the element on the page.
        var elemTop = Math.round( $elem.offset().top );
        var elemBottom = elemTop + $elem.height();

        return ((elemTop < viewportBottom) && (elemBottom > viewportTop));
    }
    // Check if it's time to start the animation.
    function checkAnimationcheck() {
        var $elem = $('.service-box.check');

        // If the animation has already been started
        if ($elem.hasClass('animated')) return;
        $.each($('.service-box'),function(index, value){

        });
        if (isElementInViewport($elem)) {
            // Start the animation
            $elem.addClass('animated bounceInLeft');
        }
    }
    function checkAnimationsecret() {
        var $elem = $('.service-box.secret');

        // If the animation has already been started
        if ($elem.hasClass('animated')) return;
        $.each($('.service-box'),function(index, value){

        });
        if (isElementInViewport($elem)) {
            // Start the animation
            $elem.addClass('animated bounceInLeft');
        }
    }
    function checkAnimationshield() {
        var $elem = $('.service-box.shield');

        // If the animation has already been started
        if ($elem.hasClass('animated')) return;
        $.each($('.service-box'),function(index, value){

        });
        if (isElementInViewport($elem)) {
            // Start the animation
            $elem.addClass('animated bounceInUp');
        }
    }
    function checkAnimationsimples() {
        var $elem = $('.service-box.simples');

        // If the animation has already been started
        if ($elem.hasClass('animated')) return;
        $.each($('.service-box'),function(index, value){

        });
        if (isElementInViewport($elem)) {
            // Start the animation
            $elem.addClass('animated bounceInDown');
        }
    }
    function checkAnimationdesktop() {
        var $elem = $('.service-box.desktop');

        // If the animation has already been started
        if ($elem.hasClass('animated')) return;
        $.each($('.service-box'),function(index, value){

        });
        if (isElementInViewport($elem)) {
            // Start the animation
            $elem.addClass('animated bounceInRight');
        }
    }
    function checkAnimationaccess() {
        var $elem = $('.service-box.access');

        // If the animation has already been started
        if ($elem.hasClass('animated')) return;
        $.each($('.service-box'),function(index, value){

        });
        if (isElementInViewport($elem)) {
            // Start the animation
            $elem.addClass('animated bounceInRight');
        }
    }
    function checkNavMove(){
        var id = $('#conteudo');
        var idnav = $('#topnav');
        var idreset = $('#topreset');

        if (isElementInViewport(id)){
            if(idnav.hasClass('affix-top')) return;
            idnav.addClass('affix-top');
        }
        else if (isElementInViewport(idreset))
            idnav.removeClass('affix-top');
    }

    $(window).scroll(function(){
        checkAnimationcheck();
        checkAnimationaccess();
        checkAnimationshield();
        checkAnimationsecret();
        checkAnimationsimples();
        checkAnimationdesktop();
        checkNavMove();
    });

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-100547600-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
<!-- Modal -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <?php if(isset($msg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $msg; ?> </div><?php } ?>
            <h1>Entrar</h1><br>
            <?php echo form_open('login');?>
            <input type="text" id="usr" name="username" class="form-control" placeholder="Usuário ou email" required value="<?php echo set_value('username'); ?>">
            <span class="text-danger"><?php echo form_error('username'); ?></span>
            <input type="password" id="pwd" name="password" class="form-control" required placeholder="Senha">
            <span class="text-danger"><?php echo form_error('password'); ?></span>
            <button type="submit" name="login" class="login loginmodal-submit" value=""><i id="login-modal-chevron" class="fa fa-chevron-right"></i></button>
            </form>
            <div class="login-help">
                <a href="<?php echo base_url('registro');?>">Registrar</a> - <a href="<?php echo base_url('forgotpassword')?>">Esqueceu a senha?</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="contato-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <?php if(isset($msg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $msg; ?> </div><?php } ?>
            <h1>Contato</h1><br>
            <?php echo form_open('login');?>
            <input type="text" id="usr" name="username" class="form-control" placeholder="Usuário ou email" required value="<?php echo set_value('username'); ?>">
            <span class="text-danger"><?php echo form_error('username'); ?></span>
            <input type="password" id="pwd" name="password" class="form-control" required placeholder="Senha">
            <span class="text-danger"><?php echo form_error('password'); ?></span>
            <button type="submit" name="login" class="login loginmodal-submit" value=""><i id="login-modal-chevron" class="fa fa-chevron-right"></i></button>
            </form>
            <div class="login-help">
                <a href="<?php echo base_url('registro');?>">Registrar</a> - <a href="<?php echo base_url('forgotpassword')?>">Esqueceu a senha?</a>
            </div>
        </div>
    </div>
</div>

</html>
