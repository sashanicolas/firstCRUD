<?php
// includes for funtioncs, classes, libraries
include_once 'functions.php';
require_once 'dbconnect.inc.php';

setcookie('test', 'testing cookies');
// controller logic
$currentPage = "home";
session_start();

$sql = "SELECT * FROM movies2013 ORDER BY id DESC";
$result = mysql_query($sql);

// View (OUTPUT STARTS HERE)
include_once 'top.inc.php';
if (isset($_SESSION['msg'])) showMessage($_SESSION['msg']);
?>
    <!-- show 3 newest movies-->
    <div id="three-column">
<?php
        $i = 1;
        while (($row = mysql_fetch_assoc($result)) && $i <= 3) {
?>
        <div class="vertical-box">
                <div class="vertical-poster">
                    <img src="images/<?php echo $row['picture']; ?>"
                          alt="<?php echo htmlspecialchars($row['name']); ?>"/>
                </div>
                <div class="title">
                    <h2><?php echo htmlspecialchars($row['name']); ?></h2>
                </div>
                <div class="synopsis">
                    <p><?php echo htmlspecialchars($row['synopsis']); ?></p>
                </div>
        </div>
<?php       $i++;
        }
?>
    </div>
<?php
include_once 'bottom.inc.php';
?>