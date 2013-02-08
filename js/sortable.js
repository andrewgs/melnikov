/*  Author: Grapheme Group
 *  http://grapheme.ru/
 */
 
$(function(){

	$(".thumbnails").sortable({
		connectWith: ".thumbnails",
		update : function(event,ui){
			var list = $(".thumbnails").sortable('serialize',{attribute :'data-item'});
			var page = $(".thumbnails").attr('data-page'); var content = $(".thumbnails").attr('data-content');
			$.post(mt.baseURL+"admin/change-position",{'list':list,'page':page,'content':content});
		}
	});

	$(".portlet").addClass("ui-widget ui-widget-content ui-helper-clearfix ui-corner-all")
		.find(".portlet-header" )
			.addClass("ui-widget-header ui-corner-all")
			.prepend("<span class='ui-icon ui-icon-minusthick'></span>")
			.end()
		.find(".portlet-content");

	$(".portlet-header .ui-icon").click(function(){
		$(this).toggleClass("ui-icon-minusthick").toggleClass("ui-icon-plusthick");
		$(this).parents(".portlet:first").find(".portlet-content").toggle();
	});

	$(".thumbnails").disableSelection();
});