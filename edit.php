<?php 
// includes for funtioncs, classes, libraries

require_once 'dbconnect.inc.php';

// controller logic
$currentPage = "edit";

if(!isset($_GET['id'])){
	header("Location: index.php");
	exit();
}





$id = $_GET['id'];

$idSql = mysql_real_escape_string($id);
$sql = "select id, name, synopsis, picture, trailer from movies2013 where id='$id'";
$result = mysql_query($sql);
// mysql_num_rows($result)


$row = mysql_fetch_assoc($result); 



// View (OUTPUT STARTS HERE)

include_once 'top.inc.php';
?>
<div id="all-column" >	
	<div id="tbox1">
		<div class="box-style">
			<div class="content">
				<h2>Edit Movie</h2>
				<form action="editDo.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo $row['id']; ?>" id="id"/>
					<p>
						<label>Movie Title:</label>
						<input type="text" name="title" value="<?php echo htmlspecialchars($row['name']); ?>" id="title" maxlength="60" size="55"/>
					</p>
					<p>
						<label>Synopsis:</label>
					</p>
					<p>
						<textarea name="synopsis" rows="8" cols="40" ><?php echo htmlspecialchars($row['synopsis']); ?></textarea>
					</p>
					<p>
						<label>Trailer Youtube link:</label>
						<input type="url" name="trailer" value="<?php echo $row['trailer']; ?>" id="trailer" maxlength="300" size="55"/>
					</p>
					<p>
						<label>Select Picture:</label>
						<input type="file" name="file" id="file"><br>
					</p>
					<p>
						<input type="submit" name="submit" value="Edit Movie"/>
					</p>					
				</form>
			</div>
		</div>
	</div>
</div>
<?php
include_once 'bottom.inc.php';
?>
