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
                    <li><a href="<?php echo base_url();?>">Página Inicial</a></li>
                    <li><a href="<?php echo site_url('home/procedimentos')?>">Procedimentos</a></li>
                    <li class="active"><a href="<?php echo base_url();?>index.php/base">Upload</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo base_url(); ?>index.php/home/logout"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-md-offset-3">
                <h1>Upload e Download</h1>
                <?php if(isset($error)):?>
                    <div class="alert alert-error"><?=$error?></div>
                <?php endif; ?>
                <form action="<?=site_url('base/uploadUpdate');?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Selecione um arquivo (pdf, doc, jpg, png)</label>
                        <input type="file" name="arquivo"/>
                    </div>
                    <div class="form-group">
                        <input name="arqEnv" type="submit" class="btn btn-success" value="Processar" />
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $this->load->view('templates/rodape');?>