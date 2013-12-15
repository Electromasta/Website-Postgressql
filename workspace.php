		<div class="hero-unit">
			<h4>A central place for projects.</h4>
			<?php 
			if (logged_in() == true)	{
			
			} else {
				include 'form.php';
			}
			?>

		</div>
		
		
		
		<form action='login.php' method='post'>
	<ul id="login">
		<li>Username:<input type="text" name="username"></li>
		<li>Password:<input type="password" name="password"></li>
		<li><input type="submit" value="Log in"></li>
		<li><a href="register.php">Register</a></li>
	</ul>
</form>


<form action="" method="post">
	<ul>
		<li>Username:<input type="text" name="username"></li>
		<li>Password:<input type="password" name="password"></li>
		<li>Repeat Password:<input type="password" name="password2"></li>
		<li>Name:<input type="text" name="firstname"></li>
		<li>Last Name:<input type="text" name="lastname"></li>
		<li>Email:<input type="text" name="email"></li>
		<li><input type="submit" value="Register"></li>
	</ul>
</form>

<form action="" method="post" enctype="multipart/form-data">
	<ul>
		<li>Project Name:<input type="text" name="projectname"></li>
		<li>Description:<input type="text" name="description"></li>
		<li>File Location:<input type="file" name="filelocation"></li>
		<li><input type="submit" value="Register"></li>
	</ul>
</form>

