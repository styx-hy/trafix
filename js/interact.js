/**
 * @author nyx
 */

$(document).ready(
		function() {
			$("#logout span a").click(function() {
				window.location.href='action.php?action=logout';
			});
		});