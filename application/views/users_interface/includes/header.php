<header>
	<div class="row">
		<div class="span9">
			<img id="logo" src="<?=site_url('img/logo.jpg');?>">
		</div>
		<div class="span12">
			<nav class="header-nav">
				<ul id="sub_navigation">
				<?php if($this->uri->uri_string() == '' || $this->uri->segment(1) == 'marriage'):?>
					<li class="series-marriage"><?=anchor('marriage/series-marriage','Cерия');?></li>
					<li class="prenuptial"><?=anchor('marriage/prenuptial','Предсвадебное');?></li>
					<li class="wedding"><?=anchor('marriage/wedding','Венчание');?></li>
					<li class="sliders"><?=anchor('marriage/sliders','Слайд-шоу');?></li>
					<li class="poly"><?=anchor('marriage/poly','Полиграфия');?></li>
					<li class="reviews"><?=anchor('marriage/reviews','Отзывы');?></li>
				<?php elseif($this->uri->segment(1) == 'family'):?>
					<li class="children"><?=anchor('family/children','Дети');?></li>
					<li class="series-family"><?=anchor('family/series-family','Серия');?></li>
				<?php endif;?>
				</ul>
			</nav>
		</div>
	</div>
</header>