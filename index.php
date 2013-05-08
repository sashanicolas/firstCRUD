<?php
// includes for funtioncs, classes, libraries
include_once 'functions.php';
require_once 'dbconnect.inc.php';

// controller logic
$currentPage = "home";
session_start();

$sql = "select * from movies2013 order by id DESC";
$result = mysql_query($sql);

// View (OUTPUT STARTS HERE)
include_once 'top.inc.php';
if (isset($_SESSION['msg'])) showMessage($_SESSION['msg']);
?>

		<!-- show 3 newest movies-->
        <div id="three-column" class="container">
<?php
      $i=1;
      while(($row = mysql_fetch_assoc($result)) && $i<=3){
?>
			<div id="tbox<?php echo $i; ?>">
				<div class="box-style box-style0<?php echo $i; ?>">
					<div class="content">
						<div class="image">
							<img src="images/<?php echo $row['picture']; ?>"
                                 width="324" height="500" alt="<?php echo htmlspecialchars($row['name']); ?>" />
						</div>
						<h2><!-- title    --><?php echo htmlspecialchars($row['name']); ?></h2>
						<p> <!-- synopsis --><?php echo htmlspecialchars($row['synopsis']); ?></p>
					</div>
				</div>
			</div>
<?php       $i++;
      }
?>
        </div>
<?php
include_once 'bottom.inc.php';
?>