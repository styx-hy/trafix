/**
 * @author styx_hy
 */
$(document).ready(
		function() {
			$("#menu ul li").mouseover(function() {
				$(this).addClass("over");
			}).mouseout(function() {
				$(this).removeClass("over");
			});
			if (navigator.userAgent.match(/Firefox/)) {
				$("#menu ul li").css(
						"padding-bottom",
						eval("40-"
								+ $("#menu ul li").css("height").substr(0, 2))
								+ "px");
				$("#menu ul").css("height", "20px");
			} else if (navigator.userAgent.match(/Chrome/)
					|| navigator.userAgent.match(/Safari/)) {
				$("#menu ul li").css(
						"padding-bottom",
						eval("40-"
								+ $("#menu ul li").css("height").substr(0, 2))
								+ "px");
				$("#menu ul").css("height", "20px");
			}
		});
