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
				<div class="span9">
					<div class="fotorama" data-width="700" data-height="467" data-fullscreenIcon="true" data-loop="true" data-transition="fade" data-autoplay="true" data-cropToFit="false">
					<?php for($i=0;$i<count($images);$i++):?>
						<a rel='<?=site_url($images[$i]['link']);?>'><img height="100px" src='<?=site_url($images[$i]['link']);?>'></a>
					<?php endfor;?>
					</div>
				</div>
			</div>
		</div>
		<?php $this->load->view("users_interface/includes/footer");?>
	</div>
	<?php $this->load->view("users_interface/includes/scripts");?>
	<!-- Fotorama -->
	<!-- Please, do not hotlink to theese files! -->
	<!-- Download your copy at http://fotoramajs.com/download/ -->
	<link rel="stylesheet" href="http://fotoramajs.com/fotorama/jsfiddle/fotorama.css">
	<script src="http://fotoramajs.com/fotorama/jsfiddle/fotorama.js"></script>
	<!-- Please, do not hotlink to theese files! -->
</body>
</html>