<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/Test/wordpress/wp-content/themes/Task/assets/stylesheets/screen.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>




        <title><?php bloginfo('name'); ?></title>

        <?php // wordpress head functions ?>
        <?php wp_head(); ?>
        <?php // end of wordpress head ?>

        <?php // drop Google Analytics Here ?>
        <?php // end analytics ?>

    </head>

    <body <?php body_class(); ?>>

        <div class="container">
            <div class='container-fluid'>
                <nav class="navbar navbar-default" role="navigation"> 
                    <!-- Brand and toggle get grouped for better mobile display --> 
                    <div class="navbar-header"> 
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> 
                            <span class="sr-only">Toggle navigation</span> 
                            <span class="icon-bar"></span> 
                            <span class="icon-bar"></span> 
                            <span class="icon-bar"></span> 
                        </button> 
                        <a class="navbar-brand" href="<?php bloginfo('url') ?>"><?php bloginfo('name') ?></a>
                    </div> 
                    <!-- Collect the nav links, forms, and other content for toggling --> 
                    <div class="collapse navbar-collapse navbar-ex1-collapse"> 
                        <?php
                        /* Primary navigation */
                        wp_nav_menu(array(
                            'menu' => 'top_menu',
                            'depth' => 2,
                            'container' => false,
                            'menu_class' => 'nav',
                            //Process nav menu using our custom nav walker
                            'walker' => new wp_bootstrap_navwalker())
                        );
                        ?>
                    </div>
                </nav>
            </div>
            <header class="site-header">
                <div class="row">

                    <div class="logo col-sm-6">
                        <a href="<?php echo site_url(); ?>"><img src="/Test/wordpress/wp-content/themes/task/assets/logo.png">
                            <span id="name"><?php bloginfo('name'); ?></span></a>
                    </div>
                    <nav class="site-nav col-sm-6">
                        <?php $args = ['theme_location' => 'primary']; ?>
                        <?php echo wp_nav_menu($args); ?>
                    </nav>
                </div>
            </header>
