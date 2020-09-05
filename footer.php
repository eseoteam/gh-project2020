
<div id="footer" class="bluebox container-fluid">

    <svg class="top -15deg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" preserveAspectRatio="none">
    <polygon fill="white" points="0,0 50,0 50,50"/>
    </svg> 


	<!-- widget_newsletter -->
	<section class="widget_newsletter container">
	<div class="container">	
		<div class="row justify-content-between">
		    <div class="col-12">
			    <h2>Footer</h2>

			</div>		
		</div>
	</div>
	</section>


</div>





<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/bootstrap/dist/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/animate.css" />


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/js/slick/slick.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/js/slick/slick-theme.css" />
<script src="<?php bloginfo('template_directory'); ?>/js/slick/slick.js"></script>

<script src="<?php bloginfo('template_directory'); ?>/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.viewportchecker.js"></script>
 
<?php wp_footer(); ?>


<script type="text/javascript">


    $(document).ready(function(){


		$('#hoverfun .play').on('click', function() {
		$('#hoverfun').css('display','none');
		var element = $('#hoverfun ~ div.embed-container iframe');    
		var videoSRC = element.attr('src');
		var videoSRC = videoSRC.replace("autoplay=0", "autoplay=1");	
		var element = element.attr( "src", videoSRC);		
		$('#hoverfun ~ div.embed-container').css('display','block');
		}); 

		$('.textslider').slick({
		  dots: false,
		  infinite: true,
		  arrows: false,
		  speed: 1500,
		  fade: true,
		  adaptiveHeight: true,
		  autoplay: true,
		  cssEase: 'linear'
		});

 		$('.testemonial_slider').slick({
		  dots: true,
		  infinite: true,
		  arrows: true,
		  speed: 1000,
		  fade: true,
		  adaptiveHeight: true,
		  autoplay: true,
		  cssEase: 'linear',
		  prevArrow: $('.prev'),
		  nextArrow: $('.next')
		});



		$('.ansprechpartner, .logo, .gal img').hover(
		       function(){ $(this).addClass('over') },
		       function(){ $(this).removeClass('over') }
		)

		/*$('.logo').hover(
		       function(){ $(this).addClass('over') },
		       function(){ $(this).removeClass('over') }
		)

		$('.gal img').hover(
		       function(){ $(this).addClass('over') },
		       function(){ $(this).removeClass('over') }
		)*/




		$('.goup').addClass("hidden").viewportChecker({
		classToAdd: 'visible animated fadeInUp',
		classToRemove : 'hidden',
		removeClassAfterAnimation: true,
		offset: 50
		});

		$('.goleft').addClass("hidden").viewportChecker({
		classToAdd: 'visible animated fadeInRight',
		classToRemove : 'hidden',
		removeClassAfterAnimation: true,
		offset: 50
		});

		$('.goright').addClass("hidden").viewportChecker({
		classToAdd: 'visible animated fadeInLeft',
		classToRemove : 'hidden',
		removeClassAfterAnimation: true,
		offset: 50
		});





    });




</script>



</body>
</html>