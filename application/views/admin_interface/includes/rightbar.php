<div class="span3">
	<div class="well sidebar-nav">
		<ul class="nav nav-pills nav-stacked">
			<li class="nav-header">Разделы сайта</li>
			<li num="marriage"><?=anchor('control-panel/pages/marriage','Свадьба');?></li>
			<li num="family"><?=anchor('control-panel/pages/family','Семья');?></li>
			<li num="portrait"><?=anchor('control-panel/pages/portrait','Портрет');?></li>
			<li num="fashion"><?=anchor('control-panel/pages/fashion','Fashion');?></li>
			<li num="landscape"><?=anchor('control-panel/pages/landscape','Природа');?></li>
			<li num="reportage"><?=anchor('control-panel/pages/reportage','Репортаж');?></li>
			<li num="genre"><?=anchor('control-panel/pages/genre','Жанр');?></li>
			<li num="photographer"><?=anchor('control-panel/pages/photographer','О фотографе');?></li>
			<li class="nav-header">Управление</li>
			<li><?=anchor('control-panel','Панель управления');?></li>
			<li><?=anchor('','Показать сайт',array('target'=>'_blank'));?></li>
			<li><?=anchor('control-panel/profile','Смена пароля');?></li>
			<li><?=anchor('logoff','Завершить сеанс');?></li>
		</ul>
	</div>
</div>