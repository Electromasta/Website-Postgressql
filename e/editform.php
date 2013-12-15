<div class="container">
	<div class="row-fluid">
		<div class="control-group">
			<div class="controls">
			<legend><?php echo $projectname?> <small><a href="../p/<?php echo $projectname; ?>">Back to Project</a></small></legend>
			</div>
		</div>

		<div class="control-group">
			<div class="controls">
				<p>Started by: <a href="../u/<?php echo $project['leaduser']; ?>"><?php echo $project['leaduser']; ?></a></p>
			</div>
		</div>
	</div>
</div>


<form action="" method='post' enctype="multipart/form-data" class="form-horizontal">
    <div class="control-group">
		<label class="control-label" for="inputdescription">Change Description</label>
		<div class="controls">
			<textarea rows="3" name="description"><?php echo $project['description'] ;?></textarea>
		</div>
    </div>
	
	<div class="control-group">
		<label class="control-label" for="inputfile">Change File</label>
		<div class="controls">
			<input type="file" name="filelocation" placeholder="File Location">
		</div>
    </div>
	
	<div class="control-group">
		<label class="control-label" for="inputfile">Reason</label>
		<div class="controls">
			<textarea rows="3" name="reason" placeholder="Reasoning for Change"></textarea>
		</div>
    </div>
	
    <div class="control-group">
		<div class="controls">
			<button type="submit" value="register" class="btn">Submit</button>
		</div>
    </div>
</form>