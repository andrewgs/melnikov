<?=form_open_multipart($this->uri->uri_string(),array('class'=>'form-horizontal','id'=>'FormUpdate')); ?>
	<input type="hidden" id="reviewID" name="rid"/>
	<div id="updateReview" class="modal hide">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Редактирование отзывов</h3>
		</div>
		<div class="modal-body">
			<fieldset>
				<div class="control-group">
					<label for="image" class="control-label">Изображение: </label>
					<div class="controls">
						<input type="file" class="span3" name="image" size="34">
						<p class="help-block">Поддерживаются форматы: JPG,PNG,GIF</p>
					</div>
				</div>
				<div class="control-group">
					<label for="name" class="control-label">Имя: </label>
					<div class="controls">
						<input type="text" id="erName" class="span4 input-valid" name="name" value="">
						<span class="help-inline" style="display:none;">&nbsp;</span>
					</div>
				</div>
				
				<div class="control-group">
					<label for="date" class="control-label">Дата: </label>
					<div class="controls">
						<input type="text" id="erDate" class="input-small calendar input-valid" name="date" value="" readonly="readonly">
						<span class="help-inline" style="display:none;">&nbsp;</span>
					</div>
				</div>
				<div class="control-group">
					<label for="city" class="control-label">Город: </label>
					<div class="controls">
						<input type="text" id="erCity" class="span4 input-valid" name="city" value="">
						<span class="help-inline" style="display:none;">&nbsp;</span>
					</div>
				</div>
				<div class="control-group">
					<label for="text" class="control-label">Текст отзыва: </label>
					<div class="controls">
						<textarea rows="5" id="erText" class="span4 input-valid" name="text"></textarea>
						<span class="help-inline" style="display:none;">&nbsp;</span>
					</div>
				</div>
			</fieldset>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal">Отменить</button>
			<button class="btn btn-success" type="submit" id="UpdSend" name="updreview" value="send">Сохранить</button>
		</div>
	</div>
<?= form_close(); ?>