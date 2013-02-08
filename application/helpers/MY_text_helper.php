<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

	function blog_limiter($content){
		
		if(!empty($content)):
			$pattern = '/\<cut\>/i';
			$replacement = '<a href="#" class="none advanced muted">Подробнее ...</a> <cut>';
			return preg_replace($pattern, $replacement,$content);
		else:
			return '';
		endif;
	}
?>