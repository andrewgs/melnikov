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
						<?=anchor('control-panel/pages/marriage','Свадьба',array('class'=>'brand'));?>
						<ul class="nav TopNavigation">
							<li num="series-marriage"><?=anchor('control-panel/pages/marriage/series-marriage','Серия');?></li>
							<li num="prenuptial"><?=anchor('control-panel/pages/marriage/prenuptial','Предсвадебное');?></li>
							<li num="wedding"><?=anchor('control-panel/pages/marriage/wedding','Венчание');?></li>
							<li num="sliders"><?=anchor('control-panel/pages/marriage/sliders','Слайд-шоу');?></li>
							<li num="poly"><?=anchor('control-panel/pages/marriage/poly','Полиграфия');?></li>
							<li num="reviews"><?=anchor('control-panel/pages/marriage/reviews','Отзывы');?></li>
						</ul>
					</div>
				</div>
				<ul class="thumbnails">
				<?php $this->load->helper('date')?>
			<?php for($i=0;$i<count($video);$i++):?>
					<li class="span7">
						<div class="thumbnail">
							<span class="thumbnail" id="vThumb<?=$video[$i]['id'];?>"><?=$video[$i]['link'];?></span>
							<p id="vTitle<?=$video[$i]['id'];?>"><?=$video[$i]['title'];?></p>
							<p id="vNote<?=$video[$i]['id'];?>"><?=$video[$i]['note'];?></p>
							<button class="btn btn-success EditVideo" data-videoid="<?=$video[$i]['id'];?>" data-date="<?=swap_dot_date($video[$i]['date']);?>" data-toggle="modal" href="#updateVideo" ><i class="icon-edit icon-white"></i> Редактировать</button>
							<button class="btn btn-danger DeleteVideo" data-videoid="<?=$video[$i]['id'];?>" data-toggle="modal" href="#deleteVideo" ><i class="icon-trash icon-white"></i> Удалить</button>
						</div>
					</li>
			<?php endfor;?>
				</ul>
			<hr/>
			<button class="btn btn-primary" data-toggle="modal" href="#InsertVideo" ><i class="icon-film icon-white"></i> Добавить</button>
			<hr/>
			</div>
		<?php $this->load->view("admin_interface/includes/rightbar");?>
		<?php $this->load->view("admin_interface/modal/insert-video");?>
		<?php $this->load->view("admin_interface/modal/update-video");?>
		<?php $this->load->view("admin_interface/modal/delete-video");?>
		</div>
	</div>
	<?php $this->load->view('admin_interface/includes/footer');?>
	<?php $this->load->view("admin_interface/includes/scripts");?>
	<script type="text/javascript" src="<?=site_url('js/datepicker/jquery.ui.core.js');?>"></script>
	<script type="text/javascript" src="<?=site_url('js/datepicker/jquery.ui.datepicker-ru.js');?>"></script>
	<script type="text/javascript" src="<?=site_url('js/datepicker/jquery.ui.widget.js');?>"></script>
	<script type="text/javascript" src="<?=site_url('js/datepicker/jquery.ui.datepicker.js');?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".TopNavigation li[num='<?=$this->uri->segment(4);?>']").addClass('active');
			$("input.calendar").datepicker($.datepicker.regional['ru']);
			var videoID = 0;
			$(".DeleteVideo").click(function(){videoID = $(this).attr("data-videoid");});
			$("#DelVideo").click(function(){location.href="<?=site_url('control-panel/video/delete/id');?>/"+videoID;});
			
			$(".EditVideo").click(function(){
				var videoid = $(this).attr("data-videoid");
				$("#videoID").val(videoid);
				$("#evLink").val($("#vThumb"+videoid).html());
				$("#evTitle").val($("#vTitle"+videoid).html());
				$("#evDate").val($(this).attr("data-date"));
				$("#evNote").val($("#vNote"+videoid).html());
			});
			
		});
	</script>
</body>
</html>
