<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view("admin_interface/includes/head");?>
<link rel="stylesheet" href="<?=site_url('css/jgrowl.css');?>" />
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
				<hr/>
				<button id="btn-insert-images" class="btn btn-primary" data-toggle="modal" href="#InsertImage" ><i class="icon-picture icon-white"></i> Добавить</button>
				<hr/>
				<div class="thumbnails" data-page="<?=$this->uri->segment(3);?>" data-content="images">
				<?php for($i=0;$i<count($images);$i++):?>
					<div class="span2 portlet" data-item="images_<?=$images[$i]['id'];?>">
						<div class="thumbnail hw130 m30">
							<div class="portlet-header"><?=$images[$i]['title'];?></div>
							<div class="portlet-content">
								<?=anchor('','<img src="'.site_url($images[$i]['link']).'" alt="'.$images[$i]['title'].'" title="'.$images[$i]['title'].'" />',array('class'=>'thumbnail none'));?>
								<button class="btn btn-success EditImage" data-imageid="<?=$images[$i]['id'];?>" data-title="<?=$images[$i]['title'];?>" data-toggle="modal" href="#EditImage" ><i class="icon-pencil icon-white"></i></button>
								<button class="btn btn-danger DeleteImage" data-imageid="<?=$images[$i]['id'];?>" data-toggle="modal" href="#deleteImage" ><i class="icon-trash icon-white"></i></button>
							</div>
						</div>
					</div>
				<?php endfor;?>
				</div>
			</div>
		<?php $this->load->view("admin_interface/includes/rightbar");?>
		<?php $this->load->view("admin_interface/modal/insert-image");?>
		<?php $this->load->view("admin_interface/modal/edit-image");?>
		<?php $this->load->view("admin_interface/modal/delete-image");?>
		</div>
	</div>
	<?php $this->load->view('admin_interface/includes/footer');?>
	<?php $this->load->view("admin_interface/includes/scripts");?>
	<script type="text/javascript" src="<?=site_url('js/libs/jquery-ui-min.js');?>"></script>
	<script type="text/javascript" src="<?=site_url('js/sortable.js');?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			var imageID = 0;
			$(".TopNavigation li[num='<?=$this->uri->segment(4);?>']").addClass('active');
			$("#btn-insert-images").click(function(){$.cookie('operation',true)});
			$(".EditImage").click(function(){$("#imgTitle").val($(this).attr('data-title'));$("#imgID").val($(this).attr('data-imageid'));$.cookie('operation',true);})
			
			$(".DeleteImage").click(function(){imageID = $(this).attr("data-imageid"); $.cookie('operation',true);});
			$("#DelImage").click(function(){location.href="<?=site_url('control-panel/images/delete/id');?>/"+imageID;});
			$("#EditImage").on('hidden',function(){$.cookie('operation',null)});
			$("#deleteImage").on('hidden',function(){$.cookie('operation',null)});
			$("#InsertImage").on('hidden',function(){$.cookie('operation',null)});
		});
	</script>
</body>
</html>
