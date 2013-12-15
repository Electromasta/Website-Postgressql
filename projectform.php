

<form action="" method='post' enctype="multipart/form-data" class="form-horizontal">
	<div class="control-group">
		<div class="controls">
			<legend>Create Project</legend>
		</div>
	</div>

    <div class="control-group">
		<label class="control-label" for="inputname">Project Name</label>
		<div class="controls">
			<input type="text" name="projectname" placeholder="Project Name">
		</div>
	</div>
	
    <div class="control-group">
		<label class="control-label" for="inputdescription">Description</label>
		<div class="controls">
			<textarea rows="3" name="description" placeholder="Description"></textarea>
		</div>
    </div>
	
	<div class="control-group">
		<label class="control-label" for="inputfile">File Location</label>
		<div class="controls">
			<input type="file" name="filelocation" placeholder="File Location">
		</div>
    </div>
	
    <div class="control-group">
		<div class="controls">
			<button type="submit" value="register" class="btn">Submit</button>
		</div>
    </div>
</form>

