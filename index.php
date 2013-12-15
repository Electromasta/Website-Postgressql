<?php 
include 'init.php';
include 'header.php'; 
?>


<?php 
	if (logged_in() == true)	{
		echo '</br>';
	} else {
		include 'form.php';
	}
?>



<div class="container">
	<div class="row-fluid">
		<div class="span6">
			<div class="control-group">
				<div class="controls">
					<legend>Popular Projects</legend>
				</div>
			</div>
			<?php include 'tennewest.php'; ?>
		</div>
		<div class="span6">
		<div class="control-group">
				<div class="controls">
					<legend>Latest Projects</legend>
				</div>
			</div>
			<?php include 'tennewest.php'; ?>
		</div>
	</div>
</div>


<?php
include 'footer.php'; 
?>