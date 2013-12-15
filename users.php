<?php

function register_user($registerdata, $link)	{
	array_walk($registerdata, 'arraysanitize');
	$registerdata['password'] = md5($registerdata['password']);
	
	$fields = implode(', ', array_keys($registerdata));
	$data = '\'' . implode('\', \'', $registerdata) . '\'';
	
	pg_query($link, "INSERT INTO users($fields) VALUES($data);");
	//mysql_query("INSERT INTO `users` ($fields) VALUES ($data)");
}

function register_project($registerdata, $temp, $ext, $link)	{
	array_walk($registerdata, 'arraysanitize');
	
	$filepath = 'user/' . substr(md5(time()), 0, 10) . '.' . $ext;
	move_uploaded_file($temp, $filepath);
	
	$registerdata['filelocation'] = $filepath;
	
	$fields = implode(', ', array_keys($registerdata));
	$data = '\'' . implode('\', \'', $registerdata) . '\'';
	
	pg_query($link, "INSERT INTO projects($fields) VALUES($data);");
	//mysql_query("INSERT INTO `projects` ($fields) VALUES ($data)");
}

function change_project($registerdata, $projectname, $link)	{
	array_walk($registerdata, 'arraysanitize');
	
	pg_query($link, "UPDATE projects SET(description, filelocation)=('$registerdata[description]', '$registerdata[filelocation]') WHERE(projectname = '$projectname');");
	//mysql_query("UPDATE `projects` SET `description`='$registerdata[description]',`filelocation`='$registerdata[filelocation]' WHERE `projectname` = '$projectname'");
}

function update_vote($registerdata, $projectname, $link)	{
	array_walk($registerdata, 'arraysanitize');
	
	pg_query($link, "UPDATE votes SET(ratio, votes)=('$registerdata[ratio]', '$registerdata[votes]') WHERE(projectname = '$projectname');");
	//mysql_query("UPDATE `votes` SET `ratio`='$registerdata[ratio]',`votes`='$registerdata[votes]' WHERE `projectname` = '$projectname'");
}

function register_edit($registerdata, $temp, $ext, $link)	{
	array_walk($registerdata, 'arraysanitize');
	
	$filepath = 'user/' . substr(md5(time()), 0, 10) . '.' . $ext;
	move_uploaded_file($temp, $filepath);
	
	$registerdata['filelocation'] = $filepath;
	
	$fields = implode(', ', array_keys($registerdata));
	$data = '\'' . implode('\', \'', $registerdata) . '\'';
	pg_query($link, "INSERT INTO votes($fields) VALUES($data);");
	//mysql_query("INSERT INTO `votes` ($fields) VALUES ($data)");
}

function user_data($link, $user_data)	{
	$data = array();
	$user_data = (int)$user_data;
	
	$nargs = func_num_args();
	$gargs = func_get_args();
	
	if ($nargs > 2) {
		unset($gargs[0]);
		unset($gargs[1]);
		
		
		$fields = implode(', ', $gargs);
		$data = pg_fetch_assoc(pg_query($link, "SELECT $fields FROM users WHERE id='$user_data';"));
		//$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `users` WHERE `id` = $user_data"));
		
		return $data;
	}
}

function logged_in()	{
	return (isset($_SESSION['id'])) ? true : false;
}


function user_exists($username, $link)	{
	$username = sanitize($username);
	$query = pg_query($link, "SELECT COUNT(id) FROM users WHERE username='$username';");
	//$query = mysql_query("SELECT COUNT(`id`) FROM `users` WHERE `username` = '$username'");
	return (pg_result($query, 0) == 1);
}

function project_exists($projectname, $link)	{
	$username = sanitize($projectname);
	$query = pg_query($link, "SELECT COUNT(id) FROM projects WHERE projectname='$projectname';");
	//$query = mysql_query("SELECT COUNT(`id`) FROM `projects` WHERE `projectname` = '$projectname'");
	return (pg_result($query, 0) == 1);
}

function email_exists($email, $link)	{
	$email = sanitize($email);
	$query = pg_query($link, "SELECT COUNT(id) FROM users WHERE email='$email';");
	//$query = mysql_query("SELECT COUNT(`id`) FROM `users` WHERE `email` = '$email'");
	return (pg_result($query, 0) == 1);
}

function user_active($username, $link)	{
	$username = sanitize($username);
	$query = pg_query($link, "SELECT COUNT(id) FROM users WHERE username='$username';");
	//$query = mysql_query("SELECT COUNT(`id`) FROM `users` WHERE `username` = '$username' AND `active` = 1");
	return (pg_result($query, 0) == 1);
}

function user_id_from_username($username, $link)	{
	$username = sanitize($username);
	return pg_result(pg_query($link, "SELECT id FROM users WHERE username='$username';"), 0, 'id');
	//return mysql_result(mysql_query("SELECT `id` FROM `users` WHERE `email` = '$email'"), 0, 'id');
}

function login($username, $password, $link)	{
	$username = sanitize($username);
	$password = sanitize($password);
	$user_id = user_id_from_username($username, $link);
	$password = md5($password);
	return (pg_result(pg_query($link, "SELECT COUNT(id) FROM users WHERE (username, password)=('$username', '$password');"), 0) == 1) ? $user_id : false;
	//return (mysql_result(mysql_query("SELECT COUNT(`id`) FROM `users` WHERE `username` ='$username' AND `password` = '$password'"), 0) == 1) ? $user_id : false;
}
?>