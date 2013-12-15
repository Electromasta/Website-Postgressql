<?php
include 'init.php';
include 'header.php';

if (empty($_POST) == false) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(empty($username) === true || empty ($password) === true)	{
		$errors[] = 'Re-enter username and password.';
	} else if(user_exists($username, $link) === false)	{
		$errors[] = 'User does not exist.';
	} else if (user_active($username, $link) == false) {
		$errors[] = 'You haven\'t activated your account.';
	} else {
		$login = login($username, $password, $link);
		if ($login === false)	{
			$errors[] = 'Wrong Password combination.';
		} else {
			$_SESSION['id'] = $login;
			header('Location: vote.php');
			exit();
		}
	}
	
	//print_r($errors);
	if (empty($errors) == false)	{
		echo '<div class="alert alert-error">';
		echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
		echo '<h4>Oops, Error</h4>';
		echo '<ul><li>' . implode('</li><li>', $errors) . '</ul></li>';
		echo '</div>';
	}
}

include 'footer.php';
?>