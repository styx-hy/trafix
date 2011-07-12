<?php
session_start();
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
                        <div id="recent-op-title">Overall Status
                        </div>
                        <div id="status">
                        	<script type="text/javascript">
                        		$('#status').load("assign_status.php");
                        	</script>
                        </div>
                        <div id="popdes">
                        	<script type="text/javascript">
                        		$('#popdes').load("pop_des.php");
                        	</script>
                        </div>
                    </div>
                    <div id="overall-status">
                        <div id="status-title">Recent Dispatch Operation
                        </div>
                        <div id="Coach status">
                        	<script type="text/javascript">
                        		$('#status-title').load("avl_status.php");
                        	</script>
                        </div>
                    </div>
                    <div id="dialog" title="lala" style="display: none;"></div>
                </div>
            </div>
        </div>
    </body>
</html>