<?php
session_start();
require_once('./db.php');

switch ($_GET['action']) {
    case 'login':
        if (validate_user($_POST['username'], $_POST['password'])) {
            $_SESSION['username'] = $_POST['username'];
            header("Location: admin.php");
        }
        break;
    case 'logout':
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
    default: break;
}
#echo session_id();
#$na = session_name("websiteID");
#echo $na;
echo $_POST['username'], $_POST['password'], $_GET['action'];
?>