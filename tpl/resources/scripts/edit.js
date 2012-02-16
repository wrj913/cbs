/**
 * 
 */

$(function() {

	$("#edit_tab2").hide();
	var screenwidth, screenheight, mytop, getPosLeft, getPosTop;
	screenwidth = $(window).width();
	screenheight = $(window).height();
	mytop = $(document).scrollTop();
	getPosLeft = screenwidth / 2 - 260;
	getPosTop = screenheight / 2 - 180;
	$("#edit_tab2").css({
		"left" : getPosLeft,
		"top" : getPosTop
	});
	$(window).resize(function() {
		screenwidth = $(window).width();
		screenheight = $(window).height();
		mytop = $(document).scrollTop();
		getPosLeft = screenwidth / 2 - 260;
		getPosTop = screenheight / 2 - 180;
		$("#edit_tab2").css({
			"left" : getPosLeft,
			"top" : getPosTop + mytop
		});
	});
	$(window).scroll(function() {
		screenwidth = $(window).width();
		screenheight = $(window).height();
		mytop = $(document).scrollTop();
		getPosLeft = screenwidth / 2 - 260;
		getPosTop = screenheight / 2 - 180;
		$("#edit_tab2").css({
			"left" : getPosLeft,
			"top" : getPosTop + mytop
		});
	});
	$(".ipqam_edit").click(function() {

		$("#edit_tab2").fadeIn("fast");
		$("body").append("<div id='greybackground'></div>");
		var documentheight = $(document).height();
		$("#greybackground").css({
			"opacity" : "0.5",
			"height" : documentheight
		});
		var aaa = $(this).attr("fff");
		user_edit_tab(aaa);
		return false;
	});
	$(".box_close").click(function() {
		$("#edit_tab2").hide();
		$("#greybackground").remove();
		return false;
	});
});