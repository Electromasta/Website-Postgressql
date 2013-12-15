<?php 
include 'init.php';
include 'header.php'; 

if (empty($_POST) === false)	{
	$required_fields = array('name', 'description', 'filelocation');
	foreach($_POST as $key=>$value)	{
		if (empty($value) && in_array($key, $required_fields) === true)	{
			$errors[] = 'Missing Field required';
			break 1;
		}
	}
	
	if (project_exists($_POST['projectname'], $link) === true)	{
		$errors[] = 'Sorry, that project name \'' . htmlentities($_POST['projectname']) . '\' is already taken.';
	}
}


if (isset($_GET['success']) && empty($_GET['success']))	{
	echo 'Creation Successful';
} else {

	if(empty($_POST) === false && empty($errors) === true )	{
		$registerdata = array(
			'projectname'	=> $_POST['projectname'],
			'description'	=> $_POST['description'],
			'filelocation'	=> $_FILES['filelocation']['name'],
			'leaduser'		=> $user_data['username']
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
	register_project($registerdata, $file_temp, $file_extn, $link);
	header('Location: create.php?success');
	exit();
	
	} else if (empty($errors) === false){
		echo '<div class="alert alert-error">';
		echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
		echo '<h4>Oops, Error</h4>';
		print_r($errors);
		echo '</div>';
	}


	

	
	if (logged_in() == true)	{
		include 'projectform.php'; 
	}
	else	{
		echo '<div class="alert alert-block">';
		echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
		echo "<h4>Please Login</h4>";
		echo "You have to login to make a new project.";
		echo "</div>";
	}
}


include 'footer.php'; 
?>