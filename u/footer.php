		
		</br></br></br></br>
		<div class="btn-toolbar pagination-centered navbar-fixed-bottom">
		<div class="btn-group">

<?php 
if (logged_in() ==true)	{
	echo '<button class="btn">Logged in</button>';
} else {
	echo '<button class="btn">Not Logged in</button>';
}

$users = pg_fetch_result(pg_query($link, "SELECT COUNT(id) FROM users;"), 0, 0);
//$users = mysql_result(mysql_query("SELECT COUNT('id') FROM `users`"), 0);
echo '<button class="btn">' . $users . ' users registered</button>';

$projects = pg_fetch_result(pg_query($link, "SELECT COUNT(id) FROM projects;"), 0, 0);
//$projects = mysql_result(mysql_query("SELECT COUNT('id') FROM `projects`"), 0);
echo '<button class="btn">' . $projects . ' projects opened</button>';

echo '<button class="btn">Connection OK</button>'; pg_close($link); 

?>

		</div>
		</div>

	</body>
	
</html> 