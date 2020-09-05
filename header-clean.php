<!doctype html>
<html lang="de">
<head>

<title><?php wp_title();?></title>

<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('siteurl'); ?>/favicon.ico" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>


<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_home_url(); ?>/favicons/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_home_url(); ?>/favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_home_url(); ?>/favicons/favicon-16x16.png">
<link rel="manifest" href="<?php echo get_home_url(); ?>/favicons/site.webmanifest">


</head>

<body>


<div id="header_holder" class="container-fluid" style="height: auto; padding-bottom: 0">




    <div id="anfrage" class="d-flex flex-column justify-content-center">
        <a href="<?php echo get_permalink();?>">ANFRAGE</a>
    </div>

    <div id="header" class="container-fluid">
       <div id="topheader" class="container">
            <div class="row justify-content-between">

                <div class="col-lg-4 col-md-4 col-sm-12 col-12"></div>
                <div id="info" class="col-lg-8 col-md-8 col-sm-12 col-12">
                    <span><a href="tel:<?php the_field('telefon', 'options'); ?>"><?php the_field('telefon', 'options'); ?></a></span>
                    <span><a href="mailto:<?php the_field('e-mail', 'options'); ?>"><?php the_field('e-mail', 'options'); ?></a></span>
                    <span><a href="">DE</a> | <a href="">EN</a> | <a href="">SLO</a></span> 
                </div>

                <div id="logo" class="col-lg-4 col-md-4 col-sm-12 col-md-12">
                <?php $logo = get_field('logo', 'options'); ?>    
                <a href="<?php echo get_home_url(); ?>">
                <img src="<?php echo $logo['url']; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" />
                </a>
                </div>

                <nav class="navbar col-lg-8 col-md-12 col-sm-12">
                        <?php wp_nav_menu( array( 
                        'theme_location' => 'main_menu', 
                        'depth' => '2',
                        'container_class' => '', 
                        'container'    => '',
                        'menu_class'      => 'nav navbar-nav'
                        ));
                        ?>
                </nav>
          
            </div>
        </div>


        <div id="redline">
        <div class="rline container"><?php the_field('red_line_text', 'options'); ?></div>
        </div>

    </div>




</div>






<div id="content" class="clean" >