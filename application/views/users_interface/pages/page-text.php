<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
<?php $this->load->view("users_interface/includes/head");?>
<link rel="stylesheet" href="<?=site_url('css/jquery.jscrollpane.css');?>"/>
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
					<?php $this->load->helper('text');?>
					<div class="infinite-scroll">
					<?php for($i=0;$i<count($content);$i++):?>
						<h2><?=$content[$i]['title'];?></h2>
						<?=blog_limiter($content[$i]['content']);?>
					<?php endfor;?>
					<?php if($this->uri->total_segments() == 2):?>
						<?php $page = $this->uri->segment(2);?>
					<?php else:?>
						<?php $page = $this->uri->segment(1);?>
					<?php endif;?>
					<?php if($next_items):?>
						<?php $offset = $this->per_page+$this->offset;?>
						<div class="next">
							<a href="<?=site_url("text-load/$page/from/$offset");?>">Еще ...</a>
						</div>
					<?php endif;?>
					</div>
				</div>
			</div>
		</div>
		<?php $this->load->view("users_interface/includes/footer");?>
	</div>
	<?php $this->load->view("users_interface/includes/scripts");?>
<?php if($next_items):?>
	<script type="text/javascript" src="<?=site_url('js/libs/jquery.jscroll.min.js');?>"></script>
<?php endif;?>
	<script type="text/javascript">
		$(function(){
		<?php if($next_items):?>
			$(".infinite-scroll").jscroll({
				loadingHtml: '<img src="<?=site_url("/images/loader.gif/")?>" alt="Loading />',
				padding: 40,
				nextSelector: '.next a:last',
				contentSelector: ''
			});
		<?php endif;?>
		})
	</script>
</body>
</html>