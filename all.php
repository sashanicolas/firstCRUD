<?php 
$currentPage = "all";
session_start();
require_once 'dbconnect.inc.php';
include_once 'functions.php';

$sql = "select * from movies2013 order by id DESC";
$result = mysql_query($sql);

include_once 'top.inc.php';
?>
<div id="msg">
    <?php echo strip_tags($_SESSION['msg'],"<b><i>"); ?>
</div>
<div id="all-column" >
<?php 
	while($row = mysql_fetch_assoc($result)){		
?>
			<div id="tbox1">
				<div class="box-style">
					<div class="content2">
							<div id="footer-bg">
								<div id="footer-content" class="container2">
									<div id="column1">
										<img src="images/<?php echo htmlspecialchars($row['picture']); ?>" width="162" height="250" alt="" />
									</div>
									<div id="column2">
										<h2><!--  title --><?php echo htmlspecialchars($row['name']); ?></h2>
										<p><!--  synopsis --><?php echo htmlspecialchars($row['synopsis']); ?></p>
									</div>
									<div id="column3">
										<p><!--  trailer -->
											<embed
												width="auto" height="auto"
												src="<?php  echo htmlspecialchars($row['trailer']);?>"
												type="application/x-shockwave-flash">
											</embed>
										</p>
									</div>
									<div class="options">
										<p><!--  options -->
											<ul>
											    <li><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></li>
											    <li><a href="deleteDo.php?id=<?php echo $row['id']; ?>">Delete</a></li>
											</ul>
										</p>
									</div>
								</div>
							</div>		
					</div>
				</div>
			</div>
<?php } ?>
</div>
<?php
include_once 'bottom.inc.php';
?>