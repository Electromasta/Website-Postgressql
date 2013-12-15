<?php
include 'init.php';

$registerdata = array(
	'projectname'	=> "test2",
	'description'	=> "adsffds",
	'filelocation'	=> "user/729af7aaee.png",
	'leaduser'		=> "me"
);
$fields = '`' . implode('`, `', array_keys($registerdata)) . '`';
$data = '\'' . implode('\', \'', $registerdata) . '\'';
$sql = mysql_query("INSERT INTO `projects` ($fields) VALUES ($data)");
print_r("dfskljfdakljsdf");
echo $sql;
?>