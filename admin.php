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
        <script language="javascript" type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
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
                            <a href="javascript:void(0);">Notice</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">Timetable</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">News Online</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">Ticket Booking</a>
                        </li>
                    </ul>
                </div>
                <div id="content">
                    <div id="news">
                         <div id="news-title">
                        </div>
                    </div>
                    <div id="intro">
                        <div id="intro-title">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>