<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
<?php $this->load->view("users_interface/includes/head");?>
</head>
<body>
	<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
	<![endif]-->
	<!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->
	<div class="container">
		<?php $this->load->view("users_interface/includes/header");?>
		<div class="row">
			<?php $this->load->view("users_interface/includes/aside");?>
			
			<div id="main">
				<div class="span8">
				
					<div id="slideshow-1">
						<a href="#" class="cycle-prev">&laquo; prev</a>
						<div id="cycle-1" class="cycle-slideshow" data-cycle-slides="> div" data-cycle-timeout="0" data-cycle-prev="#slideshow-1 .cycle-prev" data-cycle-next="#slideshow-1 .cycle-next" data-cycle-caption="#slideshow-1 .custom-caption" data-cycle-caption-template="Slide {{slideNum}} of {{slideCount}}" data-cycle-fx="fade">
						<?php for($i=0;$i<count($images);$i++):?>
							<div><img src="<?=site_url($images[$i]['link']);?>" title="<?=$images[$i]['title'];?>" /></div>
						<?php endfor;?>
						</div>
						<a href="#" class="cycle-next">next &raquo;</a>
					</div>
					<div id="slideshow-2">
						<div id="cycle-2" class="cycle-slideshow" data-cycle-slides="> div" data-cycle-timeout="0" data-cycle-prev="#slideshow-2 .cycle-prev" data-cycle-next="#slideshow-2 .cycle-next" data-cycle-caption="#slideshow-2 .custom-caption" data-cycle-caption-template="Slide {{slideNum}} of {{slideCount}}" data-cycle-fx="carousel" data-cycle-carousel-visible="5" data-cycle-carousel-fluid=true data-allow-wrap="false">
						<?php for($i=0;$i<count($images);$i++):?>
							<div><img src="<?=site_url($images[$i]['link']);?>" title="<?=$images[$i]['title'];?>" width="150" height="100" /></div>
						<?php endfor;?>
						</div>
					<!-- <p><span class="custom-caption"></span></p> -->
					</div>

				</div>
			</div>
		</div>
		<?php $this->load->view("users_interface/includes/footer");?>
	</div>
	<?php $this->load->view("users_interface/includes/scripts");?>
<script type="text/javascript" src="<?=site_url('js/jquery.mousewheel.js');?>"></script>
<script type="text/javascript" src="<?=site_url('js/jquery.cycle2.min.js');?>"></script>
<script type="text/javascript" src="http://malsup.github.com/jquery.cycle2.carousel.js"></script>
<script type="text/javascript" src="http://malsup.github.com/jquery.cycle2.tile.js"></script>
<script type="text/javascript">
	$(function(){
		var slideshows = $(".cycle-slideshow").on("cycle-next cycle-prev",function(e, opts){slideshows.not(this).cycle('goto', opts.currSlide);});
		$("#cycle-2 .cycle-slide").click(function(){var index = $("#cycle-2").data("cycle.API").getSlideIndex(this);slideshows.cycle('goto', index);});
	});
</script>
</body>
</html>