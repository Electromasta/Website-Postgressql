<?php
function arraysanitize(&$data)	{
	$item = pg_escape_string($data);
}

function sanitize($data)	{
	return pg_escape_string($data);
}
?>