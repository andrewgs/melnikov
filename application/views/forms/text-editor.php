<?=form_open($this->uri->uri_string(),array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="control-group">
			<input type="text" class="span6" name="title" placeholder="Введите название текстового блока" autocomplete="off" value="<?=$title;?>" />
			<input type="text" class="input-small datepicker" name="date" autocomplete="off" placeholder="Введите дату" readonly="readonly" value="<?=$date;?>">
		</div>
		<legend>Используйте форму для управления текстовым блоком</legend>
		<div class="control-group">
			<textarea rows="14" class="span9 ckeditor" name="content"><?=$content;?></textarea>
		</div>
		<div class="form-actions">
			<button class="btn btn-primary" type="submit" name="submit" id="submit" value="submit">Сохранить</button>
			<button class="btn btn-inverse" id="cancel">Отмена</button>
		</div>
	</fieldset>
<?= form_close(); ?>