<?php 
$currentPage = "add";
require_once 'dbconnect.inc.php';
include_once 'functions.php';

include_once 'top.inc.php';
?>
<div id="all-column" >	
	<div id="tbox1">
		<div class="box-style">
			<div class="content">
				<h2>Add a new Movie</h2>
				<form action="addDo.php" method="post" enctype="multipart/form-data">
					<p>
						<label>Movie Title:</label>
						<input type="text" name="title" value="" id="title" maxlength="60" size="55"/>
					</p>
					<p>
						<label>Synopsis:</label>
					</p>
					<p>
						<textarea name="synopsis" rows="15" cols="40"></textarea>
					</p>
					<p>
						<label>Trailer Youtube link:</label>
						<input type="url" name="trailer" value="" id="trailer" maxlength="60" size="55"/>
					</p>
					<p>
						<label>Select Picture:</label>
						<input type="file" name="file" id="file"><br>
					</p>
					<p>
						<input type="submit" name="submit" value="Add Movie"/>
					</p>
					
				</form>
			</div>
		</div>
	</div>
</div>
<?php
include_once 'bottom.inc.php';
?>