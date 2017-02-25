<style type="text/css">

    .mT20{

        margin-top: 20px;

    }

</style>

<section id="ccr-left-section" class="col-md-8">

    <?php if(isset($single)){?>

 <article>

     <h2 class="singlevideo_title"><?php echo $single->vedio_name; ?></h2>

        <ul class="ccr-category-post videosUl">

                <li>

                    <div class="ccr-thumbnail">

                        <iframe id="I1" allowfullscreen="" frameborder="0" height="400" width="100%" name="I1" src="http://www.youtube.com/embed/<?php echo $single->vedio; ?>?autoplay=1"></iframe>

                    </div>

                   

                </li>

        </ul>

       <?php  $this->load->view('addsensecode');?>

    </article> <!-- / #ccr-category -->

    <?php }else{?>

        

        There is no Videos to View..

    <?php } ?>

    <article class="row">

        <section>

            <div class="latest_video" >

                <h3 class="title h2">Latest Videos</h3>		 <!-- Article start -->

                <div class="col-md-12">

                    <?php if(count($videos)>0){ foreach ($videos as $video):

                            

                     ?>

                        <div class="col-md-4 mT20">

                            <a href="<?php echo base_url('videos/index/' . $video->id.'/'.url_title($video->vedio_name)); ?>">

                                        <div class="ytp-thumbnail-overlay ytp-cued-thumbnail-overlay" data-layer="4" style="background-image: url('https://i.ytimg.com/vi/<?php echo $video->vedio; ?>/hqdefault.jpg');">

                            <img class="youtubeplaybtn"  src="<?php echo  asset_url().'/img/youtubeplayas.png'; ?>">

                                        </div></a><br/>

                            <div class="view-desc">

                                <h6><a href="<?php echo base_url(); ?>videos/index/<?php echo $video->id.'/'.url_title($video->vedio_name); ?>"><?php echo $video->vedio_name; ?></a></h6>

                                <span class="byline"> 

                                </span>

                            </div>

                        </div>

                    <?php endforeach; }else{ ?>

                    There is no latest Videos

                    <?php } ?>

                </div>

            </div>

        </section>

    </article>

    <!--    <nav class="nav-paging ">

            <ul> <?php //echo $pagination_helper->create_links();       ?>    </ul>

        </nav>-->



</section>