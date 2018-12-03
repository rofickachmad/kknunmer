<?php date_default_timezone_set('Asia/Bangkok'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	    <title>
	        <?php echo $title; ?> THEMEBASE 
	    </title>
	    <meta name="description" content="<?php echo $description; ?>">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- Extra metadata -->
	    <?php echo $metadata; ?>
		<?php require_once((THEMESPATH.themes().'/head.php')); ?>
		<!-- Bootstrap CSS -->
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous"> -->
	</head>
<!-- <body class="animsition"> -->
<body class="">
	<?php //print_r(themes_url()); ?>
    <!-- <div class="page-wrapper"> -->
    	<!-- SIDEBAR MENU -->
		<?php (isset($display->sidebar)||!empty($display->sidebar))?$this->load->view($display->sidebar):require_once((THEMESPATH.themes().'/sidebar.php')); ?>
		
		<?php echo $body; ?>
		<?php require_once((THEMESPATH.themes().'/footer.php')); ?>

		<?php echo $css; ?>
		<?php echo $js; ?>
    	<?php echo $assets; ?>
</body>	
</html>