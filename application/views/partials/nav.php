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
                    <!-- <li><a class="<?php echo active_link('apnews'); ?> " href="<?php echo base_url('apnews'); ?>">AP NEWS</a></li> -->
                    <li><a data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="<?php echo active_link('links'); ?>  dropdown-toggle" href="<?php echo base_url('apnews'); ?>">ANDHRA PRADESH <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a  href="<?php echo base_url('district/sd/anantapur'); ?>">Anantapur</a></li>
                            <li><a  href="<?php echo base_url('district/sd/chittoor'); ?>">Chittoor</a></li>
                            <li><a  href="<?php echo base_url('district/sd/kadapa'); ?>">Kadapa</a></li>
                            <li><a  href="<?php echo base_url('district/sd/karnool'); ?>">Karnool</a></li>
                            <li><a  href="<?php echo base_url('district/sd/guntur'); ?>">Guntur</a></li>
                            <li><a  href="<?php echo base_url('district/sd/krishna'); ?>">Krishna</a></li>
                            <li><a  href="<?php echo base_url('district/sd/prakasam'); ?>">Prakasam</a></li>
                            <li><a  href="<?php echo base_url('district/sd/nellore'); ?>">Nellore</a></li>
                            <li><a  href="<?php echo base_url('district/sd/srikakulam'); ?>">Srikakulam</a></li>
                            <li><a  href="<?php echo base_url('district/sd/visakhapatnam'); ?>">Visakhapatnam</a></li>
                            <li><a  href="<?php echo base_url('district/sd/vizianagaram'); ?>">Vizianagaram</a></li>
                            <li><a  href="<?php echo base_url('district/sd/westgodavari'); ?>">West Godavari</a></li>
                            <li><a  href="<?php echo base_url('district/sd/eastgodavari'); ?>">Eest Godavari</a></li>    
                        </ul>
                    </li>
                    <li><a data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="<?php echo active_link('tnews'); ?>  dropdown-toggle" href="<?php echo base_url('tnews'); ?>">TELANGANA <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a  href="<?php echo base_url('district/sd/adilabad'); ?>">Adilabad</a></li>
                            <li><a  href="<?php echo base_url('district/sd/karimnagar'); ?>">Karimnagar</a></li>
                            <li><a  href="<?php echo base_url('district/sd/khammam'); ?>">Khammam</a></li>
                            <li><a  href="<?php echo base_url('district/sd/hyderbad'); ?>">Hyderbad</a></li>
                            <li><a  href="<?php echo base_url('district/sd/nalgonda'); ?>">Nalgonda</a></li>
                            <li><a  href="<?php echo base_url('district/sd/mahbubnagar'); ?>">Mahbubnagar</a></li>
                            <li><a  href="<?php echo base_url('district/sd/medak'); ?>">Medak</a></li>
                            <li><a  href="<?php echo base_url('district/sd/nizamabad'); ?>">Nizamabad</a></li>
                            <li><a  href="<?php echo base_url('district/sd/rangareddy'); ?>">Ranga Reddy</a></li>
                            <li><a  href="<?php echo base_url('district/sd/warangal'); ?>">Warangal</a></li>    
                        </ul>
                    </li>
                    <!-- <li><a class="<?php echo active_link('tnews'); ?> " href="<?php echo base_url('tnews'); ?>">TELANGANA</a></li> -->
                    <li><a class="<?php echo active_link('political'); ?> " href="<?php echo base_url('political'); ?>">POLITICS</a></li>
                    <li><a class="<?php echo active_link('movienews'); ?> " href="<?php echo base_url('movienews'); ?>">MOVIE NEWS</a></li>
                    <li><a class="<?php echo active_link('moviereviews'); ?> " href="<?php echo base_url('moviereviews'); ?>">MOVIE REVIEWS</a></li>
                    <li><a class="<?php echo active_link('gallery'); ?> " href="<?php echo base_url('gallery'); ?>">GALLERY</a></li>
                    <li><a class="<?php echo active_link('education'); ?> " href="<?php echo base_url('education'); ?>">EDUCATION</a></li>
                    <!-- <li><a class="<?php echo active_link('aboutus'); ?> " href="<?php echo base_url('home/aboutus'); ?>">ABOUT US</a></li> -->
                    <li><a class="<?php echo active_link('contactus'); ?> " href="<?php echo base_url('home/contactus'); ?>">CONTACT US</a></li>
               </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>     
</div>