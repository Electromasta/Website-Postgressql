<?php
$link = pg_connect("host=localhost dbname=project user=postgres password=root"); 
if (!$link) { 
	die('Well, it\'s broke: ' . pg_last_error($link)); 
} 
?>