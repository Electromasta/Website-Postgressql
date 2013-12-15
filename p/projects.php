<?php 
include 'init.php';
include 'header.php'; 

if (isset($_GET['projectname']) === true && empty($_GET['projectname']) === false) {
	$projectname = $_GET['projectname'];
	if (project_exists($projectname, $link) === true)	{
		$project = pg_fetch_assoc(pg_query("SELECT * FROM projects WHERE projectname='$projectname';"));
		
		?>
<div class="container">
	<div class="row-fluid">
		<div class="control-group">
			<div class="controls">
			<legend><?php echo $projectname?> <small><a href="../e/<?php echo $projectname; ?>">Suggest an Edit</a></small></legend>
			</div>
		</div>

		<div class="control-group">
			<div class="controls">
				<p>Started by: <a href="../u/<?php echo $project['leaduser']; ?>"><?php echo $project['leaduser']; ?></a></p>
			</div>
		</div>
		
		<div class="control-group">
			<div class="controls">
				<p><?php echo $project['description'] ;?></p>
			</div>
		</div>
		
		<div class="control-group">
			<div class="controls">
				<p>[<a href="../<?php echo $project['filelocation']; ?>">File</a>]</p>
			</div>
		</div>
		
	</div>
</div>
		<?php
	} else	{
		echo '<div class="alert alert-block">';
		echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
		echo "<h4>Unknown Project</h4>";
		echo "That project does not exist.";
		echo "</div>";
	}
}	else	{
	header('Location: ../index.php');
}



include 'footer.php'; 
?>