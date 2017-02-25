
<div id="great_main_menu_panel"  style="z-index: 2;" ><!-- great_main_menu_panel -->

<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
    
      <div class="container">
         
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url('dashboard'); ?>" style="padding: 0px 15%;margin-top: 15px;" >
            <img style="width: 40px;" src="<?php echo asset_url(); ?>img/APNN copy.png" alt="Site Logo" />
          </a>
        </div>
          
        <div id="navbar" class="navbar-collapse collapse" style="margin-top: 18px;">
          <ul class="nav navbar-nav">
                    <li><a class="<?php echo active_link('dashboard'); ?>" href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
                    <!-- <li><a class="<?php echo active_link('postnames'); ?> " href="<?php echo base_url('postnames'); ?>">Postnames</a></li> -->
                    <li><a class="<?php echo active_link('cms'); ?> " href="<?php echo base_url('cms'); ?>">CMS</a></li>
                    <li><a class="<?php echo active_link('banners'); ?> " href="<?php echo base_url('banners'); ?>">Banners</a></li>
                    <li><a class="<?php echo active_link('admingallery'); ?> " href="<?php echo base_url('admingallery'); ?>">Gallery</a></li>
                    <li><a class="<?php echo active_link('adminvedios'); ?> " href="<?php echo base_url('adminvedios'); ?>">Vedios</a></li>
                </ul>
                <a href="<?php echo base_url('admin/logout'); ?>" class="pull-right logout"><i class="glyphicon glyphicon-log-out" ></i> logout</a>
        </div><!--/.nav-collapse -->
      </div>
    </nav>  
</div>