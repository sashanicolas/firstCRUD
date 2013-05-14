<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Movies Catalog - Sasha Nicolas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="new_style.css" rel="stylesheet" type="text/css" media="screen" />
    <script type="text/javascript" src="jquery-1.2.6.min.js"></script>
</head>
<body>
<script type="text/javascript">

    $(function() {
        var pull        = $('#pull');
        menu        = $('#menu ul');
        menuHeight  = menu.height();

        $(pull).on('click', function(e) {
            e.preventDefault();
            menu.slideToggle();
        });
    });

    $(window).resize(function(){
        var w = $(window).width();
        if(w > 320 && menu.is(':hidden')) {
            menu.removeAttr('style');
        }
    });

</script>
<div id="header">
    <h1>Movies in 2013</h1>
    <p>Don't miss any movie in 2013!</p>
</div>
<div id="menu">
    <ul>
        <li <?php if ($currentPage == "home") echo 'class="current_page_item"'; ?> ><a href="index.php">Home</a></li>
        <li <?php if ($currentPage == "all") echo 'class="current_page_item"'; ?>><a href="all.php">See All Movies</a></li>
        <li <?php if ($currentPage == "add") echo 'class="current_page_item"'; ?>><a href="add.php">Add a Movie</a></li>
        <li <?php if ($currentPage == "remove") echo 'class="current_page_item"'; ?>><a href="#">Remove Movie</a></li>
        <li <?php if ($currentPage == "login") echo 'class="current_page_item"'; ?>><a href="#">Login</a></li>
        <li <?php if ($currentPage == "login") echo 'class="current_page_item"'; ?>><a href="#">Help</a></li>
    </ul>
    <a href="#" id="pull">Menu</a>
</div>
<div id="page-content">
