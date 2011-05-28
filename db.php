<?php
// import constant definitions
require_once('./db-conf.php');

// validate user when a user wants to log in to the system
function validate_user($username, $password) {

  // initial status of whether the account is valid: false
  $valid = false;
  $con = mysql_connect(HOST, USER, PSWD);
  if (!isset($con)) {
    die("cannot connect to database");
  }
    
  mysql_select_db(DB, $con);
  $query = sprintf("SELECT * FROM user WHERE username='%s' AND password='%s'",
		   mysql_real_escape_string($username),
		   mysql_real_escape_string($password));
  $result = mysql_query($query);
  if (mysql_num_rows($result) == 0) {
    $valid = false;
  } else {
    $valid = true;
  }
  mysql_close($con);
  return $valid;
}
?>