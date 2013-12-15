<div class="container">
	<div class="row-fluid">
		<legend>Vote on these Changes</legend>
		<p>Take some time to vote on these changes please!  The reason these changes should go through is: </br><?php echo $reason;?></p>
		<form action="" method='post' class="form-horizontal">
			<label class="radio">
				<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
				Stay with Original
			</label>
			<label class="radio">
				<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
				Keep new Changes
			</label>
			<button type="submit" value="register" class="btn">Submit</button>
		</form>
    </div>
	</div>
</div>
<div class="container">
	<div class="row-fluid">
		<div class="span6">
			<div class="control-group">
				<div class="controls">
					<legend>Current '<?php echo $projectname?>'</legend>
				</div>
			</div>
				<div class="container">
					<div class="row-fluid">
						<div class="control-group">
							<div class="controls">
								<p>Started by: <a href="../u/<?php echo $project['leaduser']; ?>"><?php echo $project['leaduser']; ?></a></p>
							</div>
						</div>
						
						<div class="control-group">
							<div class="controls">
								<p><?php echo $project['description'] ;?></p>
							</div>
						</div>
						
						<div class="control-group">
							<div class="controls">
								<p>[<a href="../<?php echo $project['filelocation']; ?>">File</a>]</p>
							</div>
						</div>
						
					</div>
				</div>
		</div>
		<div class="span6">
			<div class="control-group">
				<div class="controls">
					<legend>Proposed Change '<?php echo $projectname?>'</legend>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<div class="container">
						<div class="control-group">
							<div class="controls">
								<p>Started by: <a href="../u/<?php echo $project['leaduser']; ?>"><?php echo $project['leaduser']; ?></a></p>
							</div>
						</div>
						
						<div class="control-group">
							<div class="controls">
								<p><?php echo $description ;?></p>
							</div>
						</div>
						
						<div class="control-group">
							<div class="controls">
								<p>[<a href="../<?php echo $filelocation; ?>">File</a>]</p>
							</div>
						</div>
						
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>