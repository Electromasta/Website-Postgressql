<?php 
include 'init.php';
include 'header.php'; 

if (empty($_POST) === false)	{
	$required_fields = array('username', 'password', 'password2', 'firstname', 'lastname', 'email');
	foreach($_POST as $key=>$value)	{
		if (empty($value) && in_array($key, $required_fields) === true)	{
			$errors[] = 'Missing Field required';
			break 1;
		}
	}
	
	if (empty($errors)	=== true)	{
		//Check everything is filled
		if (user_exists($_POST['username'], $link) === true)	{
			$errors[] = 'Sorry, the username \'' . htmlentities($_POST['username']) . '\' is already taken.';
		}
		if (preg_match("/\\s/", $_POST['username']) == true)	{
			$errors[] = 'Username contains spaces.';
		}
		//Password checking, needs more work
		if (strlen($_POST['password']) < 6)	{
			$errors[] = 'Password too short, must be 6+';
		}
		if ($_POST['password'] !== $_POST['password2'])	{
			$errors[] = 'Passwords don\'t match.';
		}
		if (filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL) === false)	{
			$errors[] = 'That is not a valid email address';
		}
		if (email_exists($_POST['email'], $link) === true)		{
			$errors[] = 'That email is taken.';
		}
	}
}


if (isset($_GET['success']) && empty($_GET['success']))	{
    echo '<div class="alert alert-success">';
    echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
    echo '<h4>Registration Successful</h4>';
    echo 'Thank you for Registering';
    echo '</div>';
} else {

if(empty($_POST) === false && empty($errors) === true )	{
	$registerdata = array(
		'username'	=> $_POST['username'],
		'password'	=> $_POST['password'],
		'firstname'	=> $_POST['firstname'],
		'lastname'	=> $_POST['lastname'],
		'email'		=> $_POST['email'],
	);
	
	register_user($registerdata, $link);
	header('Location: register.php?success');
	exit();
	
} else if (empty($errors) === false){
    echo '<div class="alert alert-error">';
    echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
    echo '<h4>Oops, Error</h4>';
    print_r($errors);
    echo '</div>';
}
?>


<form action="" method='post' class="form-horizontal">
	</br>
	<fieldset>			
	<div class="control-group">
		<div class="controls">
			<legend>Register</legend>
		</div>
	</div>
	
    <div class="control-group">
		<label class="control-label" for="inputEmail">Username</label>
		<div class="controls">
			<input type="text" name="username" placeholder="Username">
		</div>
	</div>
	
    <div class="control-group">
		<label class="control-label" for="inputPassword">Password</label>
		<div class="controls">
			<input type="password" name="password" placeholder="Password">
		</div>
    </div>
	
	<div class="control-group">
		<label class="control-label" for="inputPassword">Retype Password</label>
		<div class="controls">
			<input type="password" name="password2" placeholder="Retype Password">
		</div>
    </div>
	
	<div class="control-group">
		<label class="control-label" for="inputFName">First Name</label>
		<div class="controls">
			<input type="text" name="firstname" placeholder="First Name">
		</div>
    </div>
	
	<div class="control-group">
		<label class="control-label" for="inputLName">Last Name</label>
		<div class="controls">
			<input type="text" name="lastname" placeholder="Last Name">
		</div>
    </div>
	
	<div class="control-group">
		<label class="control-label" for="inputemail">Email</label>
		<div class="controls">
			<input type="text" name="email" placeholder="Email">
		</div>
    </div>
	
    <div class="control-group">
		<div class="controls">
			<button type="submit" value="Register" class="btn">Register</button>
		</div>
    </div>
	</fieldset>
</form>

<?php 

}


include 'footer.php'; 
?>