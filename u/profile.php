<?php 
include 'init.php';
include 'header.php'; 

if (isset($_GET['username']) === true && empty($_GET['username']) === false) {
	$username = $_GET['username'];
	
	if (user_exists($username, $link) === true)	{
		$user_id = user_id_from_username($username, $link);
		$profile_data = user_data($link, $user_id, 'firstname', 'lastname', 'email');
	?>
	

<div class="container">
	<div class="row-fluid">
	<div class="control-group">
		<div class="controls">
			<legend><?php echo $profile_data['firstname'] . ' ' . $profile_data['lastname'];?>'s Profile</legend>
		</div>
	</div>

	<div class="control-group">
		<div class="controls">
			<p>Email: <?php echo $profile_data['email'];?></p>
		</div>
	</div>
	
    <div class="control-group">
		<div class="controls">
			<p>Projects:</p>
		</div>
	</div>

	
	<?php 
	$projects = pg_query("SELECT projectname FROM projects WHERE leaduser='$username'");
	while ($out = pg_fetch_assoc($projects))	{
		echo '<a href="../p/' . $out['projectname'] . '">' . $out['projectname'] . '</a></br>';
	}	
	?>
		</div>
</div>
	<?php
	} else	{
		echo '<div class="alert alert-block">';
		echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
		echo "<h4>Unknown User</h4>";
		echo "That user does not exist.";
		echo "</div>";
	}
}	else	{
	header('Location: ../index.php');
}



include 'footer.php'; 
?>