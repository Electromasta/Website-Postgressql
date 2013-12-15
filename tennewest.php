<table class="table table-striped">
<?php
	$query = pg_query($link, "SELECT * FROM projects ORDER BY id DESC LIMIT 10;");
	//$query = mysql_query("SELECT * FROM `projects` ORDER BY `id` DESC LIMIT 10");

	while ($output = pg_fetch_assoc($query))	{
		print_r('<tr><td><a href="p/' . $output['projectname'] . '">' . $output['projectname'] .   '</a>  [<a href="' . $output['filelocation'] . '">file</a>]</td></tr></br>');
	}
?>
</table>