<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view("admin_interface/includes/head");?>
</head>
<body>
	<?php $this->load->view("admin_interface/includes/header");?>
	<div class="container">
		<div class="row">
			<div class="span9">
				<ul class="thumbnails">
					<li class="span2">
						<div class="thumbnail">
							<?=anchor('control-panel/pages/marriage','<img src="'.site_url($images['marriage']).'" alt="" />',array('class'=>'thumbnail'));?>
							<h6>Раздел &laquo;Свадьба&raquo;</h6>
							<p>Раздел содержит фотографии свадеб</p>
						</div>
					</li>
					<li class="span2">
						<div class="thumbnail">
							<?=anchor('control-panel/pages/family','<img src="'.site_url($images['family']).'" alt="" />',array('class'=>'thumbnail'));?>
							<h6>Раздел &laquo;Семья&raquo;</h6>
							<p>Раздел содержит семейные фотографии</p>
						</div>
					</li>
					<li class="span2">
						<div class="thumbnail">
							<?=anchor('control-panel/pages/portrait','<img src="'.site_url($images['portrait']).'" alt="" />',array('class'=>'thumbnail'));?>
							<h6>Раздел &laquo;Портрет&raquo;</h6>
							<p>Раздел содержит портретные фотографии</p>
						</div>
					</li>
					<li class="span2">
						<div class="thumbnail">
							<?=anchor('control-panel/pages/fashion','<img src="'.site_url($images['fashion']).'" alt=""/>',array('class'=>'thumbnail'));?>
							<h6>Раздел &laquo;Fashion&raquo;</h6>
							<p>Раздел содержит ...</p>
						</div>
					</li>
				</ul>
				<div class="clear"></div>
				<ul class="thumbnails">
					<li class="span2">
						<div class="thumbnail">
							<?=anchor('control-panel/pages/landscape','<img src="'.site_url($images['landscape']).'" alt="" />',array('class'=>'thumbnail'));?>
							<h6>Раздел &laquo;Пейзаж&raquo;</h6>
							<p>Раздел содержит фотографии пейзажей</p>
						</div>
					</li>
					<li class="span2">
						<div class="thumbnail">
							<?=anchor('control-panel/pages/reportage','<img src="'.site_url('images/cpanel/reportage.jpg').'" alt="" />',array('class'=>'thumbnail'));?>
							<h6>Раздел &laquo;Репортаж&raquo;</h6>
							<p>Раздел содержит ....</p>
						</div>
					</li>
					<li class="span2">
						<div class="thumbnail">
							<?=anchor('control-panel/pages/genre','<img src="'.site_url($images['genre']).'" alt="" />',array('class'=>'thumbnail'));?>
							<h6>Раздел &laquo;Жанр&raquo;</h6>
							<p>Раздел содержит ....</p>
						</div>
					</li>
					<li class="span2">
						<div class="thumbnail">
							<?=anchor('control-panel/pages/photographer','<img src="'.site_url('images/cpanel/photographer.jpg').'" alt="" />',array('class'=>'thumbnail'));?>
							<h6>&laquo;О фотографе&raquo;</h6>
							<p>Раздел содержит информацию о фотографе</p>
						</div>
					</li>
					<div class="clear"></div>
				</ul>
			</div>
		<?php $this->load->view("admin_interface/includes/rightbar");?>
		</div>
	</div>
	<?php $this->load->view('admin_interface/includes/footer');?>
	<?php $this->load->view("admin_interface/includes/scripts");?>
</body>
</html>
