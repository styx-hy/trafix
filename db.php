<?php
// import constant definitions
require_once('./db-conf.php');

// retrive fields(attributes) of a particular table
// to get the general description of a table
function getTableDesc($table) {
    $con = mysql_connect(HOST, USER, PSWD);
    if (!isset($con)) {
        die("cannot connect to database");
    }

    mysql_select_db(DB, $con);
    $query = "DESC $table";
    $result = mysql_query($query);
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $attributes[] = $row;
    }
    mysql_close($con);
    return $attributes;
}

// validate user when a user wants to log in to the system
function validate_user($username, $password) {

	// initial status of whether the account is valid: false
	$valid = false;
	$con = mysql_connect(HOST, USER, PSWD);
	if (!isset($con)) {
		die("cannot connect to database");
	}

	mysql_select_db(DB, $con);
	$query = sprintf("SELECT * FROM user WHERE username='%s' AND password='%s'", mysql_real_escape_string($username), mysql_real_escape_string($password));
	$result = mysql_query($query);
	if (mysql_num_rows($result) == 0) {
		$valid = false;
	} else {
		$valid = true;
	}
	mysql_close($con);
	return $valid;
}

// retrive all drivers
function fetch_all($entity) {
	$con = mysql_connect(HOST, USER, PSWD);
	if (!isset($con)) {
		die("cannot connect to database");
	}

	mysql_select_db(DB, $con);
	$query = sprintf("SELECT * FROM %s", mysql_real_escape_string($entity));
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$drv_list[] = $row;
	}
	mysql_close($con);
	return $drv_list;
}

function add_new($table, $values) {
	$con = mysql_connect(HOST, USER, PSWD);
	if (!isset($con)) {
		die("cannot connect to database");
	}

	mysql_select_db(DB, $con);
	$query = sprintf("INSERT INTO %s values (%s)", $table, join(',', $values));
	$result = mysql_query($query);
	mysql_close($con);
}

function del_entry($id, $id_attr, $table) {
	$con = mysql_connect(HOST, USER, PSWD);
	if (!isset($con)) {
		die("cannot connect to database");
	}

	mysql_select_db(DB, $con);
	$query = sprintf("DELETE FROM %s where %s = %s", $table, $id_attr, $id);	
	mysql_query($query);
	mysql_close($con);
}

function fetch_page($entity, $start_num, $page_num) {
	$con = mysql_connect(HOST, USER, PSWD);
	if (!isset($con)) {
		die("cannot connect to database");
	}

	mysql_select_db(DB, $con);
	$query = sprintf("SELECT * FROM %s LIMIT %d, %d", mysql_real_escape_string($entity), $start_num, $page_num);
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$list[] = $row;
	}
	mysql_close($con);
	return $list;
}

// get one route info by route_id
function getRouteById($route_id) {
    $con = mysql_connect(HOST, USER, PSWD);
    if (!isset($con)) {
        die("cannot connect to database");
    }

    mysql_select_db(DB, $con);
    $query = "SELECT * FROM route WHERE route_id = ".$route_id;
    $result = mysql_query($query);
    $info = mysql_fetch_array($result, MYSQL_ASSOC);
    mysql_close($con);
    return $info;
}

?>