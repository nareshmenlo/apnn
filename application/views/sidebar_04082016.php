<aside id="ccr-right-section" class="col-md-4 ccr-home">
    <section id="ccr-sidebar-add-place">
        <img  src="<?php echo asset_url(); ?>img/add4.jpg"  />
    </section>

    <section id="ccr-sidebar-add-place" style="margin-top: 5px;">
        <div class="ccr-gallery-ttile">
            <span></span> 
            <p class="title_color">Latest Updates</p>
        </div> <!-- .ccr-gallery-ttile -->
        <?php $popularnews = getLatestUpdates(); ?>
        <ul class="mostpopular_news sidebar_news ">

            <?php if (count($popularnews) > 0) { ?> 
                <?php foreach ($popularnews as $popular):
                    $articletitle = url_title($popular->title, 'dash', TRUE); 

                 ?>
                    <li style="line-height:40px;">
                        <a style="font-weight:bold;" href="<?php echo base_url('latestupdates/single/' . $popular->id.'/'.$articletitle); ?>">            <i class="fa fa-caret-right " style="margin-top: 8px;"></i>
<?php echo $popular->title; ?></a>
                    </li>
                <?php endforeach; ?>
                <!-- </marquee> -->
            <?php }else { ?>
                <li><a>Latest New are not available</as></li>
            <?php } ?> 


        </ul>
    </section>
    <!-- /#sidebar-older-post -->
    <!-- /#sidebar-entertainment-post -->
    <section id="ccr-sidebar-add-place">
        <div class="sidebar-add-place" style="background:none;max-height:600px;">
        <img  src="<?php echo asset_url(); ?>img/add3.jpg"  />
        </div> 
    </section>

<!--<section id="ccr-sidebar-add-place">
    <div class="sidebar-add-place">
        370x250 px
    </div> 
</section> -->
</aside><!-- / .col-md-4  / #ccr-right-section -->