<?php

    session_start();
    $title = $_SESSION['title'];
    $class = $_SESSION['class'];

?>


<html>
    <head>
        <title><?php echo($title) ?></title>
	    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	    <link rel="stylesheet" href="//cdnjs.loli.net/ajax/libs/mdui/0.4.3/css/mdui.min.css">
	    <link rel="stylesheet" href="all-a.css">
        <script src="//cdnjs.loli.net/ajax/libs/mdui/0.4.3/js/mdui.min.js"></script>
    </head>
    <body></body>
</html>