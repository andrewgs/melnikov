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
					<h1>Слайд-шоу</h1>
					<p class="intro">
						Семейное видео помогает сохранить память о самых счастливых моментах жизни. Оно будет радовать Вас своим
						оформлением и высоким качеством изготовления.
					</p>
					<?php $this->load->helpers('date');?>
				<?php for($i=0;$i<count($video);$i=$i+2):?>
					<div class="row">
						<div class="span5 video2">
							<?=$video[$i]['link'];?>
							<p class="name">
								<?=$video[$i]['title'];?>
								<span class="name-date"><?=swap_dot_date($video[$i]['date']);?></span>
							</p>
						</div>
						<?php if(isset($video[$i+1]['id'])):?>
						<div class="span4 video2">
							<?=$video[$i+1]['link'];?>
							<p class="name">
								<?=$video[$i+1]['title'];?>
								<span class="name-date"><?=swap_dot_date($video[$i+1]['date']);?></span>
							</p>
						</div>
						<?php endif;?>
					</div>
				<?php endfor;?>
				</div>
			</div>
		</div>
		<?php $this->load->view("users_interface/includes/footer");?>
	</div>
	<?php $this->load->view("users_interface/includes/scripts");?>
</body>
</html>