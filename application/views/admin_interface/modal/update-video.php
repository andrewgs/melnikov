<?=form_open($this->uri->uri_string(),array('class'=>'form-horizontal')); ?>
	<input type="hidden" id="videoID" name="vid"/>
	<div id="updateVideo" class="modal hide">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Редактирование видеоконтента</h3>
		</div>
		<div class="modal-body">
			<fieldset>
				<div class="control-group">
					<label for="link" class="control-label">Ссылка на видео: </label>
					<div class="controls">
						<textarea rows="4" id="evLink" class="span4 input-valid" name="link"></textarea>
						<span class="help-inline" style="display:none;">&nbsp;</span>
					</div>
				</div>
				<div class="control-group">
					<label for="title" class="control-label">Название: </label>
					<div class="controls">
						<input type="text" id="evTitle" class="span4 input-valid" name="title" value="">
						<span class="help-inline" style="display:none;">&nbsp;</span>
					</div>
				</div>
				<div class="control-group">
					<label for="date" class="control-label">Дата: </label>
					<div class="controls">
						<input type="text" id="evDate" class="input-small calendar input-valid" name="date" value="" readonly="readonly">
						<span class="help-inline" style="display:none;">&nbsp;</span>
					</div>
				</div>
				<div class="control-group">
					<label for="note" class="control-label">Описание: </label>
					<div class="controls">
						<textarea rows="3" id="evNote" class="span4" name="note"></textarea>
						<span class="help-inline" style="display:none;">&nbsp;</span>
					</div>
				</div>
			</fieldset>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal">Отменить</button>
			<button class="btn btn-success" type="submit" id="send" name="updatevideo" value="send">Сохранить</button>
		</div>
	</div>
<?= form_close(); ?>