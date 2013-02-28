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
						<?php elseif($this->uri->segment(3) == 'landscape'):?>
							<li num="architecture"><?=anchor('control-panel/pages/landscape/architecture','Архитектура');?></li>
						<?php endif;?>
						</ul>
					</div>
				</div>
				<div class="clear"></div>
				<p class="clearfix">
					<a class="btn btn-info pull-right" href="<?=site_url($current_uri);?>/insert-item"><i class="icon-plus icon-white"></i> Новая запись</a>
				</p>
				<div class="clear"></div>
				<table class="table table-condensed">
					<thead>
						<tr>
							<th class="span1">№</th>
							<th class="span6">Название</th>
							<th class="span2">Дата</th>
							<th class="span3">Управление</th>
						</tr>
					</thead>
					<tbody>
					<?php $this->load->helper('date');?>
					<?php for($i=0;$i<count($list);$i++):?>
						<tr>
							<td><?=$this->uri->segment(6)+$i+1;?></td>
							<td><?=$list[$i]['title']?></td>
							<td><?=swap_dot_date($list[$i]['date']);?></td>
							<td>
								<a class="btn btn-success" href="<?=site_url($current_uri);?>/update-item/<?=$list[$i]['id'];?>"><i class="icon-edit icon-white"></i></a>
								<button class="btn btn-danger DeleteItem" data-item="<?=$list[$i]['id'];?>" data-toggle="modal" href="#deleteItem" ><i class="icon-trash icon-white"></i></button>
							</td>
						</tr>
					<?php endfor;?>
					</tbody>
				</table>
				<?php if($pages): ?>
					<?=$pages;?>
				<?php endif;?>
			</div>
		<?php $this->load->view("admin_interface/includes/rightbar");?>
		<?php $this->load->view("admin_interface/modal/delete-item");?>
		</div>
	</div>
	<?php $this->load->view('admin_interface/includes/footer');?>
	<?php $this->load->view("admin_interface/includes/scripts");?>
	<script type="text/javascript" src="<?=site_url('ckeditor/ckeditor.js');?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			var itemID = 0;
			$(".TopNavigation li[num='<?=$this->uri->segment(4);?>']").addClass('active');
			$(".btn-insert-images").click(function(){$.cookie('operation',true)});
			$(".DeleteItem").click(function(){itemID = $(this).attr("data-item"); $.cookie('operation',true);});
			$("#DelItem").click(function(){location.href="<?=site_url('control-panel/delete-item/id');?>/"+itemID;});
			$("#deleteItem").on('hidden',function(){$.cookie('operation',null)});
		});
	</script>
</body>
</html>
