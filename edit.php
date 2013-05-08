<?php 
// includes for funtioncs, classes, libraries
include_once 'functions.php';
require_once 'dbconnect.inc.php';

// controller logic
session_start();
$currentPage = "edit";

/*
 * Verify ID
 * */
if (!isset($_GET['id'])) {
    $_SESSION['msg'] = "Missing ID!";
    redirect("index.php");
}
if(!is_numeric($_GET['id'])){
    $_SESSION['msg'] = "ID not numerical or null!";
    redirect("index.php");
}elseif ($_GET['id'] < 1){
    $_SESSION['msg'] = "ID negative!";
    redirect("index.php");
}
//verify if there's a entry with id
$id = mysql_real_escape_string($_GET['id']);
$sql = "select * from movies2013 WHERE `id`='$id'";
$result = mysql_query($sql);
if(mysql_num_rows($result)<1){
    $_SESSION['msg'] = "ID not found!";
    redirect("index.php");
}
//take the row
$row = mysql_fetch_assoc($result); 

// View (OUTPUT STARTS HERE)
include_once 'top.inc.php';
if (isset($_SESSION['msg'])) showMessage($_SESSION['msg']);

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
						<input type="url" name="trailer" value="<?php echo htmlspecialchars($row['trailer']); ?>" id="trailer" maxlength="300" size="55"/>
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
