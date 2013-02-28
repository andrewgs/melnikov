<?php require_once(PATH_PAGE_VARIABLE);
if(uri_string() == ''):
	$uri = 'home';
else:
	$uri = to_underscore(uri_string());
endif;?>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title><?=$head_variable[$uri]['title'];?></title>
<meta name="description" content="<?=$head_variable[$uri]['description'];?>" />
<meta name="keywords" content="<?=$head_variable[$uri]['keywords'];?>" />
<meta name="viewport" content="width=device-width" />
<link rel="shortcut icon" href="<?=site_url('images/favicon.ico');?>images/favicon.ico" />
<link rel="stylesheet" href="<?=site_url('css/bootstrap.min.css');?>" />
<link rel="stylesheet" href="<?=site_url('css/main.css');?>" />
<link rel="stylesheet" href="<?=site_url('css/skin.css');?>" />
<link rel="stylesheet" href="<?=site_url('css/style.css');?>"/>
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="//use.typekit.net/yft1rwc.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>