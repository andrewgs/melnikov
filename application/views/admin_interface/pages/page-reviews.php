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
			<?php for($i=0;$i<count($reviews);$i++):?>
					<li class="span9">
						<div class="media">
							<div class="media-body">
								<h4 class="media-heading" id="rName<?=$reviews[$i]['id'];?>"><?=$reviews[$i]['name'];?></h4>
								<p class="span8"><?=word_limiter($reviews[$i]['text'],30);?></p>
								<p class="span8" id="rText<?=$reviews[$i]['id'];?>" style="display:none;"><?=$reviews[$i]['text'];?></p>
								<div class="clear"></div>
								<div class="span5 pull-left">
									<span id="rDate<?=$reviews[$i]['id'];?>"><?=swap_dot_date($reviews[$i]['date']);?></span>
									<span id="rCity<?=$reviews[$i]['id'];?>"><?=$reviews[$i]['city'];?></span>
								</div>
								<div class="span3 pull-right">
									<button class="btn btn-success EditReview" data-reviewid="<?=$reviews[$i]['id'];?>" data-date="<?=swap_dot_date($reviews[$i]['date']);?>" data-toggle="modal" href="#updateReview" ><i class="icon-edit icon-white"></i> Ред.</button>
									<button class="btn btn-danger DeleteItem" data-item="<?=$reviews[$i]['id'];?>" data-toggle="modal" href="#deleteItem" ><i class="icon-trash icon-white"></i> Удал.</button>
								</div>
							</div>
						</div>
					</li>
			<?php endfor;?>
				</ul>
				<?php if($pages): ?>
					<?=$pages;?>
				<?php endif;?>
			<hr/>
			<button class="btn btn-primary" data-toggle="modal" href="#InsertReview" ><i class="icon-comment icon-white"></i> Добавить</button>
			<hr/>
			</div>
		<?php $this->load->view("admin_interface/includes/rightbar");?>
		<?php $this->load->view("admin_interface/modal/insert-review");?>
		<?php $this->load->view("admin_interface/modal/update-review");?>
		<?php $this->load->view("admin_interface/modal/delete-item");?>
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
			var itemID = 0;
			$(".DeleteItem").click(function(){itemID = $(this).attr("data-item"); $.cookie('operation',true);});
			$("#DelItem").click(function(){location.href="<?=site_url('control-panel/review/delete/id/');?>/"+itemID;});
			$("#deleteItem").on('hidden',function(){$.cookie('operation',null)});
			$("input.calendar").datepicker($.datepicker.regional['ru']);
			$(".EditReview").click(function(){
				var reviewid = $(this).attr("data-reviewid");
				$("#reviewID").val(reviewid);
				$("#erName").val($("#rName"+reviewid).html());
				$("#erDate").val($("#rDate"+reviewid).html());
				$("#erCity").val($("#rCity"+reviewid).html());
				$("#erText").val($("#rText"+reviewid).html());
			});
			
		});
	</script>
</body>
</html>
