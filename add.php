<?php
// includes for funtioncs, classes, libraries
session_start();
require_once 'dbconnect.inc.php';
include_once 'functions.php';

// controller logic
$currentPage = "add";

$movie_title = "";
$movie_synopsis = "";
$movie_trailer = "";
if(isset($_SESSION['movie_title'])){
    $movie_title = $_SESSION['movie_title'];
    unset($_SESSION['movie_title']);
}
if(isset($_SESSION['movie_synopsis'])){
    $movie_synopsis = $_SESSION['movie_synopsis'];
    unset($_SESSION['movie_synopsis']);
}
if(isset($_SESSION['movie_trailer'])){
    $movie_trailer = $_SESSION['movie_trailer'];
    unset($_SESSION['movie_trailer']);
}

// View (OUTPUT STARTS HERE)
include_once 'top.inc.php';
//echo $_COOKIE['test'];
if (isset($_SESSION['msg'])) showMessage($_SESSION['msg']);
?>
    <div id="add-movie">
        <h2>Add a new Movie</h2>
        <form action="addDo.php" method="post" enctype="multipart/form-data">
            <p>
                <label>Movie Title:</label><br>
                <input type="text" name="title" value="<?php echo htmlspecialchars($movie_title); ?>" id="title" maxlength="60" size="55"/>
            </p>
            <p>
                <label>Synopsis:</label><br>
                <textarea name="synopsis" rows="15" cols="40"><?php echo htmlspecialchars($movie_synopsis); ?></textarea>
            </p>
            <p>
                <label>Trailer Youtube link:</label><br>
                <input type="url" name="trailer" value="<?php echo $movie_trailer; ?>" id="trailer" maxlength="60" size="55"/>
            </p>
            <p>
                <label>Select Picture:</label><br>
                <input type="file" name="file" id="file"><br>
            </p>
            <p>
                <br><input type="submit" name="submit" value="Add Movie"/>
            </p>
        </form>
    </div>
<?php
include_once 'bottom.inc.php';
?>