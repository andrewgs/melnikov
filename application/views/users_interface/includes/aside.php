<aside>
	<div class="span3">
		<nav>
			<ul>
				<li class="home"><?=anchor('','Свадьба');?></li>
				<li class="family"><?=anchor('family','Семья');?></li>
				<li class="portrait"><?=anchor('portrait','Портрет');?></li>
				<li class="fashion"><?=anchor('fashion','Fashion');?></li>
				<li class="landscape"><?=anchor('landscape','Природа');?></li>
				<li class="reportage"><?=anchor('reportage','Репортаж');?></li>
				<li class="genre"><?=anchor('genre','Жанр');?></li>
				<li class="blog"><a href="http://melnikof.livejournal.com/" target="_blank"> Блог</a></li>
				<li class="photographer"><?=anchor('photographer','О фотографе');?></li>
			</ul>
		</nav>
		<div class="aside-text">
			<p>Контакты</p>
			<p class="tel">Т. +7 (951) 49-000-99</p>
			<p class="email"><?=safe_mailto('melnikofd@yandex.ru','melnikofd@yandex.ru');?></p>
		</div>
		<div class="pict">
			<?=anchor('http://500px.com/Melnikof','500px', array('class' => 'social 500px'));?> 
			<?=anchor('http://www.facebook.com/profile.php?id=100000587533040','Facebook', array('class' => 'social fb'));?> 
			<?=anchor('','Google+', array('class' => 'social gplus'));?>
			<?=anchor('','Одноклассники', array('class' => 'social classmates'));?> 
			<?=anchor('http://vkontakte.ru/melnikof_foto','Вконтакте', array('class' => 'social vk'));?>
		</div>
	</div>
</aside>