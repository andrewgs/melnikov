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
					<div class="review">
					<?php $this->load->helpers('date');?>
					<?php $this->load->helper('text');?>
					<?php for($i=0;$i<count($reviews);$i++):?>
						<div class="row">
						<?php $result=$reviews[$i]['id']%2; ?>
						<?php if($result!=0): ?>
							<div class="span3">
								<div class="review-wrapper">
									<img id="review-pic-1" src="<?=site_url($reviews[$i]['photo']);?>">
									<div class="review-frame"> </div>
								</div>
							</div>
						<?php endif;?>
							<div class="span6">
								<p class="review-pic-text">
									<?=blog_limiter($reviews[$i]['text']);?>
									<p class="review-pic-id"><?=$reviews[$i]['name'];?> <?=swap_dot_date($reviews[$i]['date']);?> <?=$reviews[$i]['city'];?></p>
								</p>
							</div>
						<?php if($result===0): ?>
							<div class="span3">
								<div class="review-wrapper" style="float: right;">
									<img id="review-pic-1" src="<?=site_url($reviews[$i]['photo']);?>">
									<div class="review-frame"> </div>
								</div>
							</div>
						<?php endif;?>
						</div>
					<?php endfor;?>
					</div>
				</div>
			</div>
		</div>
		<?php $this->load->view("users_interface/includes/footer");?>
	</div>
	<?php $this->load->view("users_interface/includes/scripts");?>
</body>
</html>