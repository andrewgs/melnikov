/*  Author: Grapheme Group
 *  http://grapheme.ru/
 */
 
$(function(){
	
	$("#InsSend").click(function(event){
		var err = false;$("#FormInsert .control-group").removeClass('error');$("#FormInsert .help-inline").hide();
		$("#FormInsert .input-valid").each(function(i,element){if($(this).val()==''){$(this).parents("#FormInsert .control-group").addClass('error');$(this).siblings("#FormInsert .help-inline").html("Поле не может быть пустым").show();err = true;}});if(err){event.preventDefault();}
	});
	
	$("#UpdSend").click(function(event){
		var err = false;$("#FormUpdate .control-group").removeClass('error');$("#FormUpdate .help-inline").hide();
		$("#FormUpdate .input-valid").each(function(i,element){if($(this).val()==''){$(this).parents("#FormUpdate .control-group").addClass('error');$(this).siblings("#FormUpdate .help-inline").html("Поле не может быть пустым").show();err = true;}});if(err){event.preventDefault();}
	});
	
	$("#EnterSend").click(function(event){
		var err = false;
		event.preventDefault();
		$(".valid-required").tooltip("destroy");
		$(".valid-required").each(function(i,element){if($(element).emptyValue()){$(element).tooltip('show');err = true;}});
		if(!err){
			var postdata = mt.formSerialize($(".FieldSend"));
			$.post(mt.baseURL+"admin/auth",{'postdata':postdata},function(data){if(data.status){$(".valid-required").tooltip("destroy"); mt.redirect(data.redirect);
			}else{alert(data.message);}},"json");
		}
	});
	if($.cookie('operation') != null){$.jGrowl('<img src="'+mt.baseURL+'images/check.png" alt="" /> <span class="text-info">Операция выполнена</span>',{life:2000});$.cookie('operation',null);}
});