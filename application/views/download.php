<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/cabecalho');
?>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">CELERAR</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="<?php echo base_url();?>">Home</a></li>
                    <li><a href="#processos">Processos</a></li>
                    <li><a href="<?php echo base_url();?>index.php/base">Upload</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo base_url(); ?>index.php/home/logout"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
                </ul>
            </div>
        </div>
    </nav>
<div class="container-fluid">
    <h1>Upload e Download</h1>
	<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
            <h3>Informações do arquivo</h3>
            <?php
            foreach($dadosArquivo as $key => $value):
                if($value): ?>
                    <p><strong><?=$key?></strong>: <?=$value?></p>
                    <?php
                endif;
            endforeach;
            ?>
            <hr />
            <p><a href="<?=site_url('base');?>" class="btn btn-success pull-left">Novo arquivo</a>
                <a href="<?=$urlDownload?>" class="btn btn-default pull-right">Download</a></p>
        </div>
    </div>
</div>
<?php $this->load->view('templates/rodape');?>