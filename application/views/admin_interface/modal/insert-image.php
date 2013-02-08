<?=form_open_multipart($this->uri->uri_string(),array('class'=>'form-horizontal')); ?>
	<div id="InsertImage" class="modal hide" style="left: 40%; width: 750px;">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Добавление изображений</h3>
		</div>
		<div class="modal-body">
			<fieldset>
				<div class="control-group">
					<label for="image" class="control-label">Изображение #1: </label>
					<div class="controls">
						<input type="file" class="span4" name="image[]" size="30">
						<input type="text" class="span3" name="title[]" value="">
					</div>
				</div>
				<div class="control-group">
					<label for="image" class="control-label">Изображение #2: </label>
					<div class="controls">
						<input type="file" class="span4" name="image[]" size="30">
						<input type="text" class="span3" name="title[]" value="">
					</div>
				</div>
				<div class="control-group">
					<label for="image" class="control-label">Изображение #3: </label>
					<div class="controls">
						<input type="file" class="span4" name="image[]" size="30">
						<input type="text" class="span3" name="title[]" value="">
					</div>
				</div>
				<div class="control-group">
					<label for="image" class="control-label">Изображение #4: </label>
					<div class="controls">
						<input type="file" class="span4" name="image[]" size="30">
						<input type="text" class="span3" name="title[]" value="">
					</div>
				</div>
				<div class="control-group">
					<label for="image" class="control-label">Изображение #5: </label>
					<div class="controls">
						<input type="file" class="span4" name="image[]" size="30">
						<input type="text" class="span3" name="title[]" value="">
					</div>
				</div>
			</fieldset>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal">Отменить</button>
			<button class="btn btn-success" type="submit" name="insimage" value="send">Добавить</button>
		</div>
	</div>
<?= form_close(); ?>