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


<div id="header_holder" class="container-fluid">


    <svg class="bottom 195deg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" preserveAspectRatio="none">
    <polygon fill="white" points="0,50 50,0 50,50"/>
    </svg> 


    <div class="overlay container-fluid" style="<?php if(get_field('overlay_color')) { ?>background:<?php the_field('overlay_color');?>;<?php } ?><?php if(get_field('overlay_opacity')) { ?>opacity:<?php the_field('overlay_opacity');?>;<?php } ?>"></div>


    <div id="anfrage" class="d-flex flex-column justify-content-center">
        <a href="mailto:ghwg-abholung@grieshaberlog.com">ANFRAGE</a>
    </div>


    <div class="bg">
        <?php 
        $header_media = get_field('header_media');
        if($header_media == "Image"):

        $image = get_field('header_image');
        $tablet_image = get_field('tablet_header_image');
        $mobile_image = get_field('mobile_header_image'); ?>

               
        <img class="d-none d-lg-block d-xl-block" src="<?php echo $image['url']; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" />

        <img class="d-none d-sm-block d-lg-none" src="<?php echo $tablet_image['url']; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" />

        <img class="d-block d-sm-none" src="<?php echo $mobile_image['url']; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" />


        <?php else: ?>

        <video id="bg__video" autoplay loop muted playsinline preload="metadata"></video>
        <script type="text/javascript">
        var videos = [
         "<?php the_field('header_video'); ?>"
        ];

        videos = videos.sort(function() { return 0.5 - Math.random() });

        var videoId =0;
        var elemVideo = document.getElementById('bg__video');
        var elemSource = document.createElement('source');
        elemVideo.appendChild(elemSource);
        elemSource.setAttribute('src', videos[videoId]);
            elemVideo.load();
            elemVideo.play();    
        </script>

        <?php endif;?>    
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







    <div id="heroimage" class="container">
    <div class="row justify-content-between">


        <?php 
        $content_width = get_field('content_width');
        if($content_width == "50%"):
            $cwidth = "col-lg-6 col-md-6 col-sm-12 col-12";
        else:
            $cwidth = "col-lg-12 col-md-12 col-sm-12 col-12";
        endif;
        ?>   


        <div class="<?php echo $cwidth;?> goright"> 

        <h1><?php the_field('header_headline');?></h1>

        <?php if(get_field('header_text')): ?>
        <p><?php the_field('header_text');?></p>
        <?php endif;?>

        <?php if(get_field('header_button_text')): ?>
        <a href="<?php the_field('header_button_link');?>" class="button red"><?php the_field('header_button_text');?></a>
        <?php endif;?>

        </div>

        <?php $header_content_image = get_field('header_content_image'); ?>
        <?php if($header_content_image): ?>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 d-flex justify-content-lg-end justify-content-center goleft">
        <img src="<?php echo $header_content_image['url']; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" />
        </div>
        <?php endif;?>



        <?php if(is_front_page()):?>
        <?php get_template_part('templates/search'); ?>
        <?php endif;?>

    </div>
    </div>


</div>



<div id="content">