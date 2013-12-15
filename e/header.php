<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Website Test</title>
		<link rel="stylesheet" href="../css/bootstrap.css?v=1">
		<link rel="stylesheet" href="../css/bootstrap-responsive.css?v=1">
	</head>
	<body>
	
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar pull-left" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-th-list"></span>
					</a>
					<a href="../index.php" class="brand">Project Site</a>
					<div class="nav-collapse collapse">
						<ul class="nav pull-left">
							<li><a href="../browse.php">Browse</a></li>
							<li><a href="../create.php">Create</a></li>
							
<?php
if (logged_in() ==true)	{
	echo '<li><a href="/u/' . $user_data['username'] . '">Profile</a></li>';
	echo '<li><a href="../logout.php">Logout</a></li>';
	echo '<li><a href="#">Hello, ' . $user_data['firstname'] . '.</a></li>';
} else {
	echo '<li><a href="#">Profile</a></li>';
	echo '<li><a href="../index.php">Login</a></li>';
}
?>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		<script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
		<script src="../js/bootstrap.js"></script>