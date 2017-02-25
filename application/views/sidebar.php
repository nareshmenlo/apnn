<aside id="ccr-right-section" class="col-md-4 ccr-home">
    
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
        <!-- <img  src="<?php echo asset_url(); ?>img/add3.jpg"  /> -->
        <div data-WRID="WRID-147339406758692389" data-widgetType="staticBanner" data-responsive="yes" data-class="affiliateAdsByFlipkart" height="250" width="300"></div><script async src="//affiliate.flipkart.com/affiliate/widgets/FKAffiliateWidgets.js"></script>


        </div> 
    </section>
        <section id="ccr-sidebar-add-place">
 <div class="ccr-gallery-ttile">
            <span></span> 
            <p class="title_color" style="background:darkorchid;">Gallery</p>
        </div>
               <?php $images=latestGallery(); ?>
                <div class="col-md-12 padding0">
                    <?php if (count($images)>0){foreach ($images as $image): ?>
                    <div class="col-md-6 padding0">
                    <div class="view-img">
                        <a title="<?php echo $image->title; ?>" rel="bookmark" href="<?php echo base_url(); ?>gallery/photos/<?php echo $image->id; ?> " class="video_thumb">
                            <img src="<?php echo base_url(); ?>useruploadfiles/galleryimages/<?php echo $image->image; ?>" onError="this.onerror=null;this.src='<?php echo asset_url(); ?>img/noimage.png';">
                        </a>
                    </div>
                    <div class="view-desc">
                        <h6>
                        <a title="<?php echo $image->title; ?>" href="<?php echo base_url(); ?>videos/index/<?php echo $image->id; ?>"><?php echo (strlen($image->title)>35)?substr($image->title,0, 35).'..':$image->title;  ?> </a></h6>
                        <span class="byline"> 
                        </span>
                    </div>
                </div>
            <?php endforeach;} ?>
</div>
</section>
<section id="ccr-sidebar-add-place1" style="clear:both;">
<div class="ccr-gallery-ttile">
            <span></span> 
            <p class="title_color" style="background:firebrick;">Videos</p>
        </div>
    <?php $videos=latestVideos(); ?>
    <div class="col-md-12 padding0" style="padding-top:15px;">
    <?php if (count($videos)>0){foreach ($videos as $video): ?>
        <div class="col-md-6 padding0">
            <div class="view-img view-img1">
                <a href="<?php echo base_url('videos/index/' . $video->id.'/'.url_title($video->vedio_name)); ?>">
                    <div class="ytp-thumbnail-overlay ytp-cued-thumbnail-overlay" data-layer="4" style="background-image: url('https://i.ytimg.com/vi/<?php echo $video->vedio; ?>/hqdefault.jpg');">
                        <img class="youtubeplaybtn_sidebar"  src="<?php echo  asset_url().'/img/youtubeplayas.png'; ?>">
                    </div>
                </a>
            </div>
            <div class="view-desc">
                <h6><a href="<?php echo base_url(); ?>videos/index/<?php echo $video->id.'/'.url_title($video->vedio_name); ?>"><?php echo $video->vedio_name; ?></a></h6>
                <span class="byline"> 
                </span>
            </div>
        </div>
        <?php endforeach;} ?>
    </div> 
</section>
<section id="ccr-sidebar-add-place">
        <img  src="<?php echo asset_url(); ?>img/APNN.JPG"  />
    </section>
<!--<section id="ccr-sidebar-add-place">
    <div class="sidebar-add-place">
        370x250 px
    </div> 
</section> -->
</aside><!-- / .col-md-4  / #ccr-right-section -->