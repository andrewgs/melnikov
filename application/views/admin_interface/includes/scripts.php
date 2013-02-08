<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.js"></script>
<script>window.jQuery || document.write('<script src="<?=site_url("js/libs/jquery-1.9.0.min.js");?>"><\/script>')</script>
<script type="text/javascript" src="<?=site_url('js/bootstrap.js');?>"></script>
<script type="text/javascript" src="<?=site_url('js/libs/jquery.jgrowl.js');?>"></script>
<script type="text/javascript" src="<?=site_url('js/libs/jquery.cookie.js');?>"></script>
<script type="text/javascript" src="<?=site_url('js/scripts.js');?>"></script>
<script type="text/javascript" src="<?=site_url('js/base-admin.js');?>"></script>
<script type="text/javascript">
	$("li[num='<?=$this->uri->segment(3);?>']").addClass('active');
	$("#BrandLink").attr("href",$("li[num='<?=$this->uri->segment(3);?>'] a").attr("href"));
	$("#BrandLink").html($("li[num='<?=$this->uri->segment(3);?>'] a").html());
	$(".backpath").click(function(){mt.redirect("<?=$this->session->userdata('backpath');?>")})
</script>