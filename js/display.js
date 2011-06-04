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

			// set for slideup and slidedown for login menu
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
			
			// set configuration dialog box
			$('#dialog').dialog({
                autoOpen: false,
                width: 600,
                buttons: {
                    "Ok": function() { 
                        $(this).dialog("close"); 
                    }, 
                    "Cancel": function() { 
                        $(this).dialog("close"); 
                    } 
                }
            });
			
			// action for each use case
			$('#mgt-drv').click(function() {
				$('#dialog').load("mgt-drv.php").dialog("option", "title", 'Manage Drivers').dialog('open');
				return false;
			});
			$('#mgt-vhc').click(function() {
				$('#dialog').load("mgt-vhc.php").dialog("option", "title", 'Manage Vehicle').dialog('open');
				return false;
			});
			$('#mgt-rts').click(function() {
				$('#dialog').load("mgt-rts.html").dialog("option", "title", 'Manage Routes').dialog('open');
				return false;
			});
			$('#mgt-dpt').click(function() {
				$('#dialog').load("mgt-dpt.html").dialog("option", "title", 'General Dispatch').dialog('open');
				return false;
			});
			
			$('#drv-list ul li').mouseover(function() {
				$(this).addClass("over");
			}).mouseout(function() {
				$(this).removeClass("over");
			});
		});
		