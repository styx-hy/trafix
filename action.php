<?php
session_start();
require_once('./db.php');

switch ($_GET['action']) {
	// use case for user login
    case 'login':
        if (validate_user($_POST['username'], $_POST['password'])) {
            $_SESSION['username'] = $_POST['username'];
            header("Location: admin.php");
        }
        break;
    // when administrator logout
    case 'logout':

    	// destroy whole session
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time(),
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        header("Location: index.php");
        break;
    case 'add':
    	foreach ($_GET['data'] as $field) {
    		if (is_numeric($field)) {
    			$field = (int)$field;
    			echo $field;
    		}
    	}
    	add_new($_GET['table'], $_GET['data']);
    	print_r($_GET['data']);
    default: break;
}
#echo session_id();
#$na = session_name("websiteID");
#echo $na;
echo $_POST['username'], $_POST['password'], $_GET['action'];
?>