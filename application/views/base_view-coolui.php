<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
	    <meta name="author" content="Łukasz Holeczek">
	    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
		<title>Page Title</title>

		<?php require_once((THEMESPATH.themes().'/head.php')); ?>
		<!-- Bootstrap CSS -->
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous"> -->
	</head>
<body class="animsition">
	<?php //print_r(themes_url()); ?>
    <div class="page-wrapper">
    	<!-- SIDEBAR MENU -->
		<?php (isset($display->sidebar)||!empty($display->sidebar))?$this->load->view($display->sidebar):require_once((THEMESPATH.themes().'/sidebar.php')); ?>
		<?php require_once((THEMESPATH.themes().'/content_wrapper.php')); ?>
		<?php 
		// $display=json_decode($display);
		// print_r($display->views);
		// $this->load->view($display->views);
		if(isset($display) && !empty($display)):
			$this->load->view($display->views);
		endif;
		?>
		<?php require_once((THEMESPATH.themes().'/footer.php')); ?>
</body>	
</html>