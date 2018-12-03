<!-- <div class="page-wrapper"> -->
<?php (isset($display->sidebar)||!empty($display->sidebar))?$this->load->view($display->sidebar):require_once((THEMESPATH.themes().'/sidebar.php')); ?>
<?php echo $header; ?>

<div class="page-container2">
            <!-- HEADER DESKTOP-->

            <?php require_once((THEMESPATH.themes().'/breadcrumb.php')); ?>
            <?php require_once((THEMESPATH.themes().'/sidebar2.php')); ?>
            
            <!-- END HEADER DESKTOP-->

           

           

            <?php //require_once((THEMESPATH.themes().'/widget.php')); ?>





<!-- <div class="container"> -->
    <?php echo $main_content; ?>
<!-- </div>/.container -->

<?php echo $footer; ?>