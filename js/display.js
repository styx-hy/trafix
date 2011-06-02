/**
 * @author nyx
 */

$(document).ready(
		function() {
			// set highlight for menu items
			$("#menu ul li").mouseover(function() {
				$(this).addClass("over");
			}).mouseout(function() {
				$(this).removeClass("over");
			});

			$("#login span a").click(function() {
				if ($("#ribbon-pane").css("display") == "block") {
					$("#ribbon-pane").slideUp("normal", function() {
						$("#ribbon-pane").css("display", "none");
						$("#container").css("height", "670px");
					});
				} else {
					$("#ribbon-pane").slideDown("normal", function() {
						$("#ribbon-pane").css("display", "block");
						$("#container").css("height", "770px");
					});
				}
			})
		});
		