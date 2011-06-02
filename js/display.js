/**
 * @author nyx
 */

$(document).ready(
		function() {
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
		