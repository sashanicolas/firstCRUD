
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Movies Catalog - Sasha Nicolas</title>
	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
	<div id="wrapper">
		<div id="logo" class="container">
			<h1><a href="#">Movies in 2013</a></h1>
			<p>Don't miss any movie in 2013!</p>
		</div>
		<div id="menu-wrapper">
		<div id="menu" class="container">
			<ul>
				<li <?php if($currentPage=="home") echo 'class="current_page_item"'; ?> ><a href="index.php">Home</a></li>
				<li <?php if($currentPage=="all") echo 'class="current_page_item"'; ?>><a href="all.php">See All Movies</a></li>
				<li <?php if($currentPage=="add") echo 'class="current_page_item"'; ?>><a href="add.php">Add a Movie</a></li>
			</ul>
		</div>
	</div>