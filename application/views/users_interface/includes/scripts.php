<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?=site_url('js/libs/jquery-1.9.0.js');?>"><\/script>')</script>
<script type="text/javascript" src="<?=site_url('js/cufon-yui.js');?>"></script>
<script type="text/javascript" src="<?=site_url('js/Franklin_Gothic_Book_400.font.js');?>"></script>
<script type="text/javascript" src="<?=site_url('js/scripts.js');?>"></script>
<script type="text/javascript">
	$(function(){
		$(".backpath").click(function(){backpath("<?=$this->session->userdata('backpath');?>")});
	<?php if($this->uri->uri_string() == '' || $this->uri->segment(1) == 'marriage'):?>
		$("li[class='home']").addClass('active');
	<?php else:?>
		$("li[class='<?=$this->uri->segment(1);?>']").addClass('active');
	<?php endif;?>
	<?php if($this->uri->segment(1) == 'marriage' || $this->uri->segment(1) == 'family'):?>
		$("#sub_navigation li[class='<?=$this->uri->segment(2);?>']").addClass('active');
	<?php endif;?>
	});
</script>