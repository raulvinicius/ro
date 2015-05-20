<!-- CÓDIGO HTML VEM AQUI -->


<?php if ( strpos( $_SERVER[ "REQUEST_URI" ], "frontend" ) ) : ?>

    <!-- 
        NÃO ESQUEÇA DE ADICIONAR UMA PÁGINA FRONTEND/"SUAPAGINA" NO PAINEL ADMIN 
        E DE ALTERAR OS PERMALINKS PARA "NOME DO POST"
    -->
    <?php $frontendUrl = "/frontend"; //variável usada nos urls dentro do ambiente de desenvolvimento frontend?>

<?php endif; ?>


<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo ( $post->post_name != '' ) ? get_the_title() . " | " : ""; ?>Aton Plaza Hotel</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <!--[if IE]><link rel="shortcut icon" href="<?php bloginfo('template_url') ?>/favicon.ico"><![endif]-->
        <link rel="icon" href="<?php bloginfo('template_url') ?>/favicon.ico">
        <link rel="apple-touch-icon" href="<?php bloginfo('template_url') ?>/apple-touch-icon.png">

        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/bootstrap.css">

        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/style.css">

        <script src="<?php bloginfo('template_url') ?>/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

    </head>

    <body>
        <nav class="menu-bottom navbar navbar-fixed-top" role="navigation">
          <div class="container-fluid">
            <div class="row">
                <div class="navbar-header col-md-2">
                    <button type="button" class="ani-02-in-out navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand main-logo" href="<?php bloginfo('url'); echo $frontendUrl ?>"><h1>Raony Oliveira - Car Detail</h1></a>
                </div>

                <div class="col-md-8 ani-02-in-out">
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav verde">
                        <li>
                            <a class="home ani-02-in-out" href="<?php completaUrl(); ?>/">Home</a>
                        </li><li role="presentation" class="dropdown">
                            <a class="servicos ani-02-in-out dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                Serviços
                            </a>

                            <ul class="dropdown-menu ani-02-in-out" role="menu">
                                <li>
                                    <a class="martelinho ani-02-in-out" href="<?php completaUrl( $frontendUrl ); ?>/galeria">Martelinho de Ouro</a>
                                </li><li>
                                    <a class="polimento ani-02-in-out" href="<?php completaUrl( $frontendUrl ); ?>/galeria">Polimento</a>
                                </li><li>
                                    <a class="estetica ani-02-in-out" href="<?php completaUrl( $frontendUrl ); ?>/galeria">Estética Automotiva</a>
                                </li>
                                
                            </ul>
                        </li><li>
                            <a class="galeria ani-02-in-out" href="<?php completaUrl( $frontendUrl ); ?>/galeria">Galeria</a>
                        </li><li>
                            <a class="depoimentos ani-02-in-out" href="<?php completaUrl( $frontendUrl ); ?>/depoimentos">Depoimentos</a>
                        </li><li>
                            <a class="contato ani-02-in-out" href="<?php completaUrl( $frontendUrl ); ?>/contato">Contato</a>
                        </li>
                  </ul>
                </div>
                </div><!--/.navbar-collapse -->
            </div>
          </div>
        </nav>

        <?php wp_path_to_js(); ?>

        <!--[if lt IE 8]>
            <p class="browserupgrade">Você está usando um navegador <strong>desatualizado</strong>. Por favor, <a href="http://browsehappy.com/">atualize seu browser</a> para melhorar sua experiência na internet.</p>
        <![endif]-->

        <?php //$fileN =  basename ( $_SERVER["SCRIPT_NAME"] ); ?>
        <?php $fileN2 = $_SERVER[ "REQUEST_URI" ] ?>
        <!-- ATENÇÃO! Alterar "ignite" pelo nome da pasta WordPress -->
        <?php $fileN2 = str_replace("/raony", '', $fileN2) ?>
        <?php $fileN2 = str_replace("/frontend", '', $fileN2) ?>
        <?php $fileN2 = explode('/', $fileN2) ?>
        <?php $fileN2 = $fileN2[1]; ?>

        <?php

        if ( $fileN2 == "" ) : 
        	$fileN2 = "index";
        endif;

        ?>

        <?php if ( $frontendUrl != "" ) : ?>

            <?php $tUrl = get_bloginfo("template_url"); ?>

            <?php require( "frontend/" . $fileN2 . '.php' ) ?>
            <?php die(); ?>

        <?php endif; ?>


        
