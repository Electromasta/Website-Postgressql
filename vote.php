<?php 
include 'init.php';
include 'header.php'; 

$isEmpty = pg_fetch_row(pg_query($link, "SELECT COUNT(*) FROM votes"));
if ($isEmpty[0]) {
	$query = pg_query($link, "SELECT * FROM votes ORDER BY id ASC LIMIT 1");

	while ($output = pg_fetch_assoc($query))	{
		$projectname = $output['projectname'];
		$description = $output['description'];
		$filelocation = $output['filelocation'];
		$reason = $output['reason'];
		$ratio = $output['ratio'];
		$votes = $output['votes'];
	}

	$project = pg_fetch_assoc(pg_query($link, "SELECT * FROM projects WHERE projectname='$projectname'"));





	if (empty($_POST) === false)	{
		if (isset($_GET['success']) && empty($_GET['success']))	{
			echo '<div class="alert alert-success">';
			echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
			echo '<h4>Voting Successful</h4>';
			echo 'Thank you for Voting. Click <a href="index.php">here</a> to go to the main page.';
			echo '</div>';
		} else {
			if(empty($_POST) === false && empty($errors) === true )	{
				//DO STUFF HERE
				$choice = $_POST['optionsRadios'];
				echo "<script type='text/javascript'>alert('" . $choice . "');</script>";
				$ratio = $ratio * $votes;
				if ($choice == 'option1')	{
					$ratio = $ratio + 0;
				} else if ($choice == 'option2')	{
					$ratio = $ratio + 1;
				}
				$votes++;
				$ratio = $ratio/$votes;
				
				if ($votes >= 5)	{
					$registerdata = array(
						'description'	=> $description,
						'filelocation'	=> $filelocation
					);
					if($ratio >= .5)	{
						change_project($registerdata, $projectname, $link);
					}
					pg_query($link, "DELETE FROM votes WHERE projectname='$projectname'");
					
				} else	{
					$registerdata = array(
						'ratio'	=> $ratio,
						'votes'	=> $votes
					);
					update_vote($registerdata, $projectname, $link);
				}
				
				header('Location: vote.php?success');
				exit();
				
			}
		}
	}
	include 'voteform.php';
} else {
			echo '<div class="alert alert-success">';
			echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
			echo '<h4>No Votes Available</h4>';
			echo 'There are no submitions to vote on at this time. Click <a href="index.php">here</a> to go to the main page.';
			echo '</div>';
}
include 'footer.php'; 
?>