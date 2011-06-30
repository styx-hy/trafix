<?php
session_start();
#echo session_id();
#echo ini_get("session.use_cookies");
#print_r( session_get_cookie_params());
#print_r(session_name());
#echo time();
#if (ini_get("session.use_cookies")) {
#    $params = session_get_cookie_params();
#    setcookie(session_name(), '', time(),
#        $params["path"], $params["domain"],
#        $params["secure"], $params["httponly"]
#    );
#}
#session_destroy();
?>
<html>
    <head>
        <title>Administration</title>
        <link rel="stylesheet" type="text/css" href="css/base.css">
        <link rel="stylesheet" type="text/css" href="css/admin.css">
        <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.13.custom.mod.css">
        <script language="javascript" type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
        <script language="javascript" type="text/javascript" src="js/jquery-ui-1.8.13.custom.min.js"></script>
        <script language="javascript" type="text/javascript" src="js/compatible.js"></script>
        <script language="javascript" type="text/javascript" src="js/display.js"></script>
        <script language="javascript" type="text/javascript" src="js/interact.js"></script>
<!--        <script language="javascript" type="text/javascript">-->
<!--        $(document).ready(function() {-->
<!--		$('#dialog').dialog({-->
<!--			autoOpen: false,-->
<!--			width: 600,-->
<!--			buttons: {-->
<!--				"Ok": function() { -->
<!--					$(this).dialog("close"); -->
<!--				}, -->
<!--				"Cancel": function() { -->
<!--					$(this).dialog("close"); -->
<!--				} -->
<!--			}-->
<!--		});-->
<!--		$('#manageDrvs').click(function() {-->
<!--			$('#dialog').dialog('open');-->
<!--			return false;-->
<!--		});-->
<!--        });-->
<!--        </script>-->
    </head>
    <body>
        <div id="wrapper" align="center">
            <div id="container">
                <div id="header">
                    <div id="logo">
                        <span>Trafix Control Center (Administrator)</span>
                    </div>
                    <div id="logout">
                        <span>
                            <a href="javascript:void(0);">Logout</a>
                        </span>
                    </div>
                </div>
                <div id="menu">
                    <ul>
                        <li>
                            <a href="#" id="mgt-drv" class="menu-entry">Manage Drivers</a>
                        </li>
                        <li>
                            <a href="#" id="mgt-vhc" class="menu-entry">Manage Vehicle</a>
                        </li>
                        <li>
                            <a href="#" id="mgt-rts">Manage Routes</a>
                        </li>
                        <li>
                            <a href="#" id="mgt-dpt">General Dispatch</a>
                        </li>
                    </ul>
                </div>
                <div id="content">
                    <div id="recent-op">
                        <div id="recent-op-title">Recent Dispatch Operation
                        </div>
                    </div>
                    <div id="overall-status">
                        <div id="status-title">Overall Status
                        </div>
                    </div>
                    <div id="dialog" title="lala" style="display: none;"></div>
                </div>
            </div>
        </div>
    </body>
</html>