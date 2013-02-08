<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view("admin_interface/includes/head");?>
<link rel="stylesheet" href="<?=site_url('css/jquery-ui/jquery.ui.all.css');?>" />
</head>
<body>
	<?php $this->load->view("admin_interface/includes/header");?>
	<div class="container">
		<div class="row">
			<div class="span9">
				<div class="navbar">
					<div class="navbar-inner">
						<?=anchor($this->uri->uri_string(),'',array('class'=>'brand','id'=>'BrandLink'));?>
						<ul class="nav TopNavigation">
						<?php if($this->uri->segment(3) == 'marriage'):?>
							<li num="series-marriage"><?=anchor('control-panel/pages/marriage/series-marriage','Серия');?></li>
							<li num="prenuptial"><?=anchor('control-panel/pages/marriage/prenuptial','Предсвадебное');?></li>
							<li num="wedding"><?=anchor('control-panel/pages/marriage/wedding','Венчание');?></li>
							<li num="sliders"><?=anchor('control-panel/pages/marriage/sliders','Слайд-шоу');?></li>
							<li num="poly"><?=anchor('control-panel/pages/marriage/poly','Полиграфия');?></li>
							<li num="reviews"><?=anchor('control-panel/pages/marriage/reviews','Отзывы');?></li>
						<?php elseif($this->uri->segment(3) == 'family'):?>
							<li num="children"><?=anchor('control-panel/pages/family/children','Дети');?></li>
							<li num="series-family"><?=anchor('control-panel/pages/family/series-family','Серия');?></li>
						<?php endif;?>
						</ul>
					</div>
				</div>
				<?php $this->load->view("forms/text-editor");?>
			</div>
		<?php $this->load->view("admin_interface/includes/rightbar");?>
		</div>
	</div>
	<?php $this->load->view('admin_interface/includes/footer');?>
	<?php $this->load->view("admin_interface/includes/scripts");?>
	<script type="text/javascript" src="<?=site_url('ckeditor/ckeditor.js');?>"></script>
	<script type="text/javascript" src="<?=site_url('js/datepicker/jquery.ui.core.js');?>"></script>
	<script type="text/javascript" src="<?=site_url('js/datepicker/jquery.ui.datepicker-ru.js');?>"></script>
	<script type="text/javascript" src="<?=site_url('js/datepicker/jquery.ui.widget.js');?>"></script>
	<script type="text/javascript" src="<?=site_url('js/datepicker/jquery.ui.datepicker.js');?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".TopNavigation li[num='<?=$this->uri->segment(4);?>']").addClass('active');
			$(".datepicker").datepicker($.datepicker.regional['ru']);
			$("#cancel").click(function(event){event.preventDefault();mt.redirect("<?=site_url($this->session->userdata('backpath'));?>")});
		});
	</script>
</body>
</html>
