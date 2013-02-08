<?=form_open($this->uri->uri_string(),array('class'=>'form-horizontal')); ?>
	<input type="hidden" value="" name="imgid" id="imgID" />
	<div id="EditImage" class="modal hide">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Редактирование подписи</h3>
		</div>
		<div class="modal-body">
			<fieldset>
				<div class="control-group">
					<label for="image" class="control-label">Подпись: </label>
					<div class="controls">
						<input type="text" id="imgTitle" class="span3" name="title" value="">
					</div>
				</div>
			</fieldset>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal">Отменить</button>
			<button class="btn btn-success" type="submit" name="editimage" value="send">Сохранить</button>
		</div>
	</div>
<?= form_close(); ?>