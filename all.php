<?php
// includes for funtioncs, classes, libraries
session_start();
require_once 'dbconnect.inc.php';
include_once 'functions.php';

// controller logic
$currentPage = "all";
$sql = "SELECT * FROM movies2013 ORDER BY id DESC";
$result = mysql_query($sql);
$msg = "";

// View (OUTPUT STARTS HERE)
include_once "top.inc.php";
if (isset($_SESSION['msg'])) showMessage($_SESSION['msg']);

?>
    <div id="one-column">
<?php
        while ($row = mysql_fetch_assoc($result)) {
            ?>
            <div class="horizontal-box">
                <div class="column1">
                    <img src="images/<?php echo htmlspecialchars($row['picture']); ?>" width="162"
                         height="250" alt=""/>
                </div>
                <div class="column2">
                    <h2><!--  title --><?php echo htmlspecialchars($row['name']); ?></h2>

                    <p><!--  synopsis --><?php echo htmlspecialchars($row['synopsis']); ?></p>
                </div>
                <div class="column3">
                    <p><!--  trailer -->
                        <embed
                            width="auto" height="auto"
                            src="<?php echo htmlspecialchars($row['trailer']); ?>"
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
<?php } ?>
    </div>
<?php
include_once 'bottom.inc.php';
?>