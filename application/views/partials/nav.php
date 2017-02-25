<?php
$controller = (strlen($this->uri->segment(1)) > 0) ? $this->uri->segment(1) : "";
?>
   
<div id="great_main_menu_panel"  style="z-index: 2;"><!-- great_main_menu_panel -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse padding0" id="bs-example-navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a class="<?php echo active_link('home'); ?>" href="<?php echo base_url(); ?>"><i class="fa fa-home fa-lg"></i></a></li>
                    <li><a class="<?php echo active_link('latestupdates'); ?> " href="<?php echo base_url('latestupdates'); ?>">Latest News</a></li>
                    <li><a class="<?php echo active_link('videos'); ?> " href="<?php echo base_url('videos'); ?>">Video News</a></li>
                    <li><a class="<?php echo active_link('political'); ?> " href="<?php echo base_url('political'); ?>">Politics</a></li>
                    <li><a class="<?php echo active_link('movienews'); ?> " href="<?php echo base_url('movienews'); ?>">Movie News</a></li>
                    <li><a class="<?php echo active_link('moviereviews'); ?> " href="<?php echo base_url('moviereviews'); ?>">Movie Reviews</a></li>
                    <li><a class="<?php echo active_link('gallery'); ?> " href="<?php echo base_url('gallery'); ?>">Gallery</a></li>
                    <li><a class="<?php echo active_link('editorchoice'); ?> " href="<?php echo base_url('editorchoice'); ?>">Editorial News</a></li>
                    <li><a class="<?php echo active_link('contactus'); ?> " href="<?php echo base_url('home/contactus'); ?>">Contact Us</a></li>
               </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>     
</div>