<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
<?php $this->load->view("users_interface/includes/head");?>
</head>
<body>
	<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
	<![endif]-->
	<!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->
	<div class="container">
		<?php $this->load->view("users_interface/includes/header");?>
		<div class="row">
			<div id="main">
				<div class="span8 offset2">
					<?=form_open('login',array('class'=>'popup-form')); ?>
						<fieldset>
							<label for="feedback-name">Логин <span>*</span></label>
							<input type="text" class="valid-required FieldSend" name="login" id="feedback-login" data-placement="top" role="tooltip" data-original-title="Поле не может быть пустым">
						</fieldset>
						<fieldset>
							<label for="feedback-mail">Пароль <span>*</span></label>
							<input type="password" class="valid-required FieldSend" name="password" id="feedback-password" data-placement="top" role="tooltip" data-original-title="Поле не может быть пустым">
						</fieldset>
						<fieldset class="submit">
							<button type="submit" name="enter" value="send" id="EnterSend">Войти</button>
						</fieldset>
					<?= form_close(); ?>
				</div>
			</div>
		</div>
		<?php $this->load->view("users_interface/includes/footer");?>
	</div>
	<?php $this->load->view("admin_interface/includes/scripts");?>
</body>
</html>