<?php 
include 'init.php';
include 'header.php'; 

if (isset($_GET['projectname']) === true && empty($_GET['projectname']) === false) {
	$projectname = $_GET['projectname'];
	if (project_exists($projectname, $link) === true)	{
		$project = pg_fetch_assoc(pg_query("SELECT * FROM projects WHERE projectname='$projectname'"));
//
//

		if (empty($_POST) === false)	{
			$required_fields = array('description', 'filelocation', 'reason');
			foreach($_POST as $key=>$value)	{
				if (empty($value) && in_array($key, $required_fields) === true)	{
					$errors[] = 'Missing Field required';
					break 1;
				}
			}
		}


		if (isset($_GET['success']) && empty($_GET['success']))	{
			echo 'Submition Successful';
		} else {

			if(empty($_POST) === false && empty($errors) === true )	{
				$registerdata = array(
					'projectname'	=> $projectname,
					'description'	=> $_POST['description'],
					'filelocation'	=> $_FILES['filelocation']['name'],
					'reason'		=> $_POST['reason'],
					'ratio'			=> 1.0,
					'votes'			=>	1
				);
			
			if (isset($_FILES['filelocation']) === true)	{
				if (empty($_FILES['filelocation']['name']) === true)	{
					echo 'Please choose a file!';
				} else {
					$allowed = array('jpg', 'jpeg', 'gif', 'png', 'zip');
					$file_name = $_FILES['filelocation']['name'];
					$stringexplode = explode('.', $file_name);
					$endofarray = end($stringexplode);
					$file_extn = strtolower($endofarray);
					$file_temp = $_FILES['filelocation']['tmp_name'];
					
					if (in_array($file_extn, $allowed) !== true)	{
						$errors[] = 'Wrong file type.  Please use:  jpg, jpeg, gif, png, zip';
					}
				}
			}
			register_edit($registerdata, $file_temp, $file_extn, $link);
			header('Location: /e/' . $projectname . '?success');
			exit();
			
			} else if (empty($errors) === false){
				echo '<div class="alert alert-error">';
				echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
				echo '<h4>Oops, Error</h4>';
				print_r($errors);
				echo '</div>';
			}


			

			
			if (logged_in() == true)	{
				include 'editform.php'; 
			}
			else	{
				echo '<div class="alert alert-block">';
				echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
				echo "<h4>Please Login</h4>";
				echo "You have to login to suggest an edit.";
				echo "</div>";
			}
		}

//
//	

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