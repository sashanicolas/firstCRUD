<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Movies Catalog - Sasha Nicolas</title>
    <link href="new_style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="header">
    <h1>Movies in 2013</h1>
    <p>Don't miss any movie in 2013!</p>
</div>
<div id="menu">
    <ul>
        <li <?php if ($currentPage == "home") echo 'class="current_page_item"'; ?> ><a href="index.php">Home</a></li>
        <li <?php if ($currentPage == "all") echo 'class="current_page_item"'; ?>><a href="all.php">See All Movies</a>
        </li>
        <li <?php if ($currentPage == "add") echo 'class="current_page_item"'; ?>><a href="add.php">Add a Movie</a></li>
    </ul>
</div>
<div id="page-content">
