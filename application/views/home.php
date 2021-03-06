
<style type="text/css">
    .brief_desc{
        font-size: 18px;
    }
    .mostpopular_news .brief_desc {
        height: 63px;
        overflow: hidden;
    }
</style>
<section  id="ccr-left-section" class="col-md-8"> 
   <section class="col-md-12 padding0"  id="ccr-slide-main" class="carousel slide" data-ride="carousel">
    <!-- Carousel items -->
    <div class="carousel-inner">
        <?php
        $banners=getHeaderBanners();
        $i = 1;
        if(isset($banners)){
        foreach ($banners as $banner): if ($i == 1) {
                ?>
                <div class="active item">
                <?php } else { ?>
                    <div class="item">
                    <?php } $i++; ?>
                    <div class="container slide-element">
                        <img src="<?php echo base_url(); ?>useruploadfiles/postimages/<?php echo $banner->image; ?>"
                             class="img-responsive">
                        <p><a  href="<?php echo base_url('banner/single/' . $banner->id.'/'.url_title($banner->title)); ?>"><?php echo $banner->title; ?></a></p>
                    </div> <!-- /.slide-element -->
                </div> <!--/.active /.item -->

                <!-- /.item -->
            <?php endforeach; } ?>

        </div> <!-- /.carousel-inner -->

        <!-- /.carousel-indicators -->

        <!-- slider nav -->
        <a class="carousel-control left" href="#ccr-slide-main" data-slide="prev"><i class="fa fa-arrow-left"></i></a>
        <a class="carousel-control right" href="#ccr-slide-main" data-slide="next"><i class="fa fa-arrow-right"></i></a>
    </section>
      
    <div class="row"  >
        <div class="col-md-12 padding0">
        <section id="sidebar-popular-post"   >
                <div class="ccr-gallery-ttile" >
                    <span></span> 
                    <p class="title_color text-left" style="background: crimson;"><strong>Politics</strong></p>
                </div> <!-- .ccr-gallery-ttile -->
                 <div class="col-md-12 padding0">
                   <?php
                    if (count($political) > 0) { 
                            $articletitle = url_title($political[0]->title, 'dash', TRUE);

                        ?> 
                <div class="col-md-6 padding0">
                <a class="pull-left singleTitle" style="font-weight:bold;font-size:20px;padding-top:5px;color:#000;" href="<?php echo base_url('political/single/' . $political[0]->id.'/'.$articletitle); ?>"><?php echo $political[0]->title; ?>
                </a> <?php if ($political[0]->image != '') { ?>
                        <a href="<?php echo base_url('political/single/' .$political[0]->id.'/'.$articletitle); ?>">
                            <img style="float:left;height: 180px;" src="<?php echo base_url(); ?>useruploadfiles/postimages/<?php echo $political[0]->image; ?>" >
                        </a>
                    <?php } ?>                   
                        <div style="height:157px;width: 100%;text-align: justify;padding-top:15px;overflow:hidden;" class="pull-left" >
                            <div class="brief_desc">
                                <?php echo trim(strip_tags($political[0]->description)) . "..."; ?>
                            </div>
                        </div>
                </div>
                 <div class="col-md-6 padding0" style="float:right;">
                <ul class="mostpopular_news">
                    <?php
                       foreach ($political as $k => $t):
                            if($k==0){
                                continue;
                            }if($k==4){
                                break;
                            }
                            $articletitle = url_title($t->title, 'dash', TRUE);
                            ?>
                            <li>
                                <div class="brief_box">
                                    <div class="brief_title">
                                        <a class="pull-left" style="font-weight:bold;" href="<?php echo base_url('political/single/' . $t->id.'/'.$articletitle); ?>"><?php echo $t->title; ?></a>
                                    </div>
                                    <div style="width: 100%;" class="pull-left">
                                        <?php if ($t->image != '') { ?>
                                            <a href="<?php echo base_url('political/single/' . $t->id.'/'.$articletitle); ?>">
                                                <img style="float:left;" class="brief_img" src="<?php echo base_url(); ?>useruploadfiles/postimages/<?php echo $t->image; ?>"  style="width:70px; height:70px;">
                                            </a>
                                        <?php } ?>
                                        <div class="brief_desc">
                                            <?php echo trim(strip_tags($t->description)) . "..."; ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php
                        endforeach;
                    ?>
                </ul>
                </div> <?
                } else {
                        ?>
                    <?php } ?> 
                    </div>
            </section>
        </div>

        <div class="col-md-12 padding0"><section id="sidebar-popular-post">
                <div class="ccr-gallery-ttile" >
                    <span></span> 
                    <p class="title_color text-left" style="background: darkgreen;"><strong>Movie News</strong></p>
                </div> <!-- .ccr-gallery-ttile -->
                <div class="col-md-12 padding0">
                   <?php
                    if (count($cinema) > 0) { 
                            $articletitle = url_title($cinema[0]->title, 'dash', TRUE);

                        ?> 
                <div class="col-md-6 padding0">
                <a class="pull-left singleTitle" style="font-weight:bold;font-size:20px;padding-top:5px;color:#000;" href="<?php echo base_url('movienews/single/' . $cinema[0]->id.'/'.$articletitle); ?>"><?php echo $cinema[0]->title; ?>
                </a> <?php if ($cinema[0]->image != '') { ?>
                        <a href="<?php echo base_url('movienews/single/' .$cinema[0]->id.'/'.$articletitle); ?>">
                            <img style="float:left;height: 180px;" src="<?php echo base_url(); ?>useruploadfiles/postimages/<?php echo $cinema[0]->image; ?>" >
                        </a>
                    <?php } ?>                   
                        <div style="height:157px;width: 100%;text-align: justify;padding-top:15px;overflow:hidden;" class="pull-left" >
                            <div class="brief_desc">
                                <?php echo trim(strip_tags($cinema[0]->description)) . "..."; ?>
                            </div>
                        </div>
                </div>
                 <div class="col-md-6 padding0" style="float:right;">
                <ul class="mostpopular_news">
                    <?php
                       foreach ($cinema as $k => $t):
                            if($k==0){
                                continue;
                            }if($k==4){
                                break;
                            }
                            $articletitle = url_title($t->title, 'dash', TRUE);
                            ?>
                            <li>
                                <div class="brief_box">
                                    <div class="brief_title">
                                        <a class="pull-left" style="font-weight:bold;" href="<?php echo base_url('movienews/single/' . $t->id.'/'.$articletitle); ?>"><?php echo $t->title; ?></a>
                                    </div>
                                    <div style="width: 100%;" class="pull-left">
                                        <?php if ($t->image != '') { ?>
                                            <a href="<?php echo base_url('movienews/single/' . $t->id.'/'.$articletitle); ?>">
                                                <img style="float:left;" class="brief_img" src="<?php echo base_url(); ?>useruploadfiles/postimages/<?php echo $t->image; ?>"  style="width:70px; height:70px;">
                                            </a>
                                        <?php } ?>
                                        <div class="brief_desc">
                                            <?php echo trim(strip_tags($t->description)) . "..."; ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php
                        endforeach;
                    ?>
                </ul>
                </div> <?
                } else {
                        ?>
                    <?php } ?> 
                    </div>
            </section></div>
    </div>
            <?php  $this->load->view('addsensecode');?>

    <div class="row"  >
        <div class="col-md-12 padding0"><section id="sidebar-popular-post"  >
                <div class="ccr-gallery-ttile" >
                    <span></span> 
                    <p class="title_color text-left" style="background: darkgoldenrod;"><strong>Andhra Pradesh</strong></p>
                </div> <!-- .ccr-gallery-ttile -->
                  <div class="col-md-12 padding0">
                   <?php
                    if (count($apnews) > 0) { 
                            $articletitle = url_title($apnews[0]->title, 'dash', TRUE);

                        ?> 
                <div class="col-md-6 padding0">
                <a class="pull-left singleTitle" style="font-weight:bold;font-size:20px;padding-top:5px;color:#000;" href="<?php echo base_url('apnews/single/' . $apnews[0]->id.'/'.$articletitle); ?>"><?php echo $apnews[0]->title; ?>
                </a> <?php if ($apnews[0]->image != '') { ?>
                        <a href="<?php echo base_url('apnews/single/' .$apnews[0]->id.'/'.$articletitle); ?>">
                            <img style="float:left;height: 180px;" src="<?php echo base_url(); ?>useruploadfiles/postimages/<?php echo $apnews[0]->image; ?>" >
                        </a>
                    <?php } ?>                   
                        <div style="height:157px;width: 100%;text-align: justify;padding-top:15px;overflow:hidden;" class="pull-left" >
                            <div class="brief_desc">
                                <?php echo trim(strip_tags($apnews[0]->description)) . "..."; ?>
                            </div>
                        </div>
                </div>
                 <div class="col-md-6 padding0" style="float:right;">
                <ul class="mostpopular_news">
                    <?php
                       foreach ($apnews as $k => $t):
                            if($k==0){
                                continue;
                            }if($k==4){
                                break;
                            }
                            $articletitle = url_title($t->title, 'dash', TRUE);
                            ?>
                            <li>
                                <div class="brief_box">
                                    <div class="brief_title">
                                        <a class="pull-left" style="font-weight:bold;" href="<?php echo base_url('apnews/single/' . $t->id.'/'.$articletitle); ?>"><?php echo $t->title; ?></a>
                                    </div>
                                    <div style="width: 100%;" class="pull-left">
                                        <?php if ($t->image != '') { ?>
                                            <a href="<?php echo base_url('apnews/single/' . $t->id.'/'.$articletitle); ?>">
                                                <img style="float:left;" class="brief_img" src="<?php echo base_url(); ?>useruploadfiles/postimages/<?php echo $t->image; ?>"  style="width:70px; height:70px;">
                                            </a>
                                        <?php } ?>
                                        <div class="brief_desc">
                                            <?php echo trim(strip_tags($t->description)) . "..."; ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php
                        endforeach;
                    ?>
                </ul>
                </div> <?
                } else {
                        ?>
                    <?php } ?> 
                    </div>
                
            </section>
        </div>
        <div class="col-md-12 padding0"><section id="sidebar-popular-post"  >
                <div class="ccr-gallery-ttile" >
                    <span></span> 
                    <p class="title_color text-left" style="background: deeppink;"><strong>Telangana</strong></p>
                </div> <!-- .ccr-gallery-ttile -->
                  <div class="col-md-12 padding0">
                   <?php
                    if (count($tnews) > 0) { 
                            $articletitle = url_title($tnews[0]->title, 'dash', TRUE);

                        ?> 
                <div class="col-md-6 padding0">
                <a class="pull-left singleTitle" style="font-weight:bold;font-size:20px;padding-top:5px;color:#000;" href="<?php echo base_url('tnews/single/' . $tnews[0]->id.'/'.$articletitle); ?>"><?php echo $tnews[0]->title; ?>
                </a> <?php if ($tnews[0]->image != '') { ?>
                        <a href="<?php echo base_url('tnews/single/' .$tnews[0]->id.'/'.$articletitle); ?>">
                            <img style="float:left;height: 180px;" src="<?php echo base_url(); ?>useruploadfiles/postimages/<?php echo $tnews[0]->image; ?>" >
                        </a>
                    <?php } ?>                   
                        <div style="height:157px;width: 100%;text-align: justify;padding-top:15px;overflow:hidden;" class="pull-left" >
                            <div class="brief_desc">
                                <?php echo trim(strip_tags($tnews[0]->description)) . "..."; ?>
                            </div>
                        </div>
                </div>
                 <div class="col-md-6 padding0" style="float:right;">
                <ul class="mostpopular_news">
                    <?php
                       foreach ($tnews as $k => $t):
                            if($k==0){
                                continue;
                            }if($k==4){
                                break;
                            }
                            $articletitle = url_title($t->title, 'dash', TRUE);
                            ?>
                            <li>
                                <div class="brief_box">
                                    <div class="brief_title">
                                        <a class="pull-left" style="font-weight:bold;" href="<?php echo base_url('tnews/single/' . $t->id.'/'.$articletitle); ?>"><?php echo $t->title; ?></a>
                                    </div>
                                    <div style="width: 100%;" class="pull-left">
                                        <?php if ($t->image != '') { ?>
                                            <a href="<?php echo base_url('tnews/single/' . $t->id.'/'.$articletitle); ?>">
                                                <img style="float:left;" class="brief_img" src="<?php echo base_url(); ?>useruploadfiles/postimages/<?php echo $t->image; ?>"  style="width:70px; height:70px;">
                                            </a>
                                        <?php } ?>
                                        <div class="brief_desc">
                                            <?php echo trim(strip_tags($t->description)) . "..."; ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php
                        endforeach;
                    ?>
                </ul>
                </div> <?
                } else {
                        ?>
                    <?php } ?> 
                    </div>
                
            </section>
        </div>


        <div class="col-md-12 padding0"><section id="sidebar-popular-post" >
                <div class="ccr-gallery-ttile" >
                    <span></span> 
                    <p class="title_color text-left" style="background: chocolate;"><strong>Moviereviews</strong></p>
                </div> <!-- .ccr-gallery-ttile -->
                    <div class="col-md-12 padding0">
                   <?php
                    if (count($moviereviews) > 0) { 
                            $articletitle = url_title($moviereviews[0]->title, 'dash', TRUE);

                        ?> 
                <div class="col-md-6 padding0">
                <a class="pull-left singleTitle" style="font-weight:bold;font-size:20px;padding-top:5px;color:#000;" href="<?php echo base_url('moviereviews/single/' . $moviereviews[0]->id.'/'.$articletitle); ?>"><?php echo $moviereviews[0]->title; ?>
                </a> <?php if ($moviereviews[0]->image != '') { ?>
                        <a href="<?php echo base_url('moviereviews/single/' .$moviereviews[0]->id.'/'.$articletitle); ?>">
                            <img style="float:left;height: 180px;" src="<?php echo base_url(); ?>useruploadfiles/postimages/<?php echo $moviereviews[0]->image; ?>" >
                        </a>
                    <?php } ?>                   
                        <div style="height:157px;width: 100%;text-align: justify;padding-top:15px;overflow:hidden;" class="pull-left" >
                            <div class="brief_desc">
                                <?php echo trim(strip_tags($moviereviews[0]->description)) . "..."; ?>
                            </div>
                        </div>
                </div>
                 <div class="col-md-6 padding0" style="float:right;">
                <ul class="mostpopular_news">
                    <?php
                       foreach ($moviereviews as $k => $t):
                            if($k==0){
                                continue;
                            }
                             if($k==4){
                                break;
                            }
                            $articletitle = url_title($t->title, 'dash', TRUE);
                            ?>
                            <li>
                                <div class="brief_box">
                                    <div class="brief_title">
                                        <a class="pull-left" style="font-weight:bold;" href="<?php echo base_url('moviereviews/single/' . $t->id.'/'.$articletitle); ?>"><?php echo $t->title; ?></a>
                                    </div>
                                    <div style="width: 100%;" class="pull-left">
                                        <?php if ($t->image != '') { ?>
                                            <a href="<?php echo base_url('moviereviews/single/' . $t->id.'/'.$articletitle); ?>">
                                                <img style="float:left;" class="brief_img" src="<?php echo base_url(); ?>useruploadfiles/postimages/<?php echo $t->image; ?>"  style="width:70px; height:70px;">
                                            </a>
                                        <?php } ?>
                                        <div class="brief_desc">
                                            <?php echo trim(strip_tags($t->description)) . "..."; ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php
                        endforeach;
                    ?>
                </ul>
                </div> <?
                } else {
                        ?>
                    <?php } ?> 
                    </div>
            </section></div>
    </div>
</section>

