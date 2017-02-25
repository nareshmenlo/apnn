<style type="text/css">
    .mostpopular_news {
        clear: both;
    }
    .brief_img{
        width: 100px;
        height: 80px;
    }
    .brief_title{
        clear: both;
    }
    #ccr-article-related-post li{
        clear: both;
        margin:2px 0px;
        width: 100%;
        border: 2px solid #9ea89e;
        padding: 2px;
    }
    #ccr-category-1 li:nth-child(2n+2){
        float: left;
    }
    .brief_desc{
        font-size: 18px;
    }
    .mostpopular_news .brief_desc {
        height: 63px;
        overflow: hidden;
    }
</style>
<section id="ccr-left-section" class="col-md-8">

    <div class="current-page">
        <a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> <i class="fa fa-angle-double-right"></i></a> 
        District News <i class="fa fa-angle-double-right"></i>
    </div> <!-- / .current-page -->
    <?php
    if (isset($id)) {
        $districtById = isset($districtById[0]) ? $districtById[0] : header("Location: " . base_url('district/'));
        ?>
        <article id="ccr-article"  class="clearfix">
            <h1><a href="<?php echo base_url('district/single/' . $districtById->id); ?>" ><?php echo $districtById->title; ?></a></h1>
    <?php if ($districtById->image != "") { ?>
                <div class="clearfix" align="center">
                    <img src="<?php echo base_url(); ?>useruploadfiles/postimages/<?php echo $districtById->image; ?>" alt="1st Image">
                </div><?php } ?>
	
            <br/>
    <?php echo $districtById->description; ?>
    
                <?php if ($districtById->video != "") { ?>
                <div class="clearfix" align="center">
                <iframe id="I1" allowfullscreen="" frameborder="0"  height="400px" width="100%" name="I1" src="http://www.youtube.com/embed/<?php echo $districtById->video; ?>"></iframe>
                </div><?php } ?>
    <?php  $this->load->view('addsensecode');?>
    </article> <!-- /#ccr-single-post -->
    <?php } $this->load->view('social_media'); ?>

    <section id="ccr-article-related-post">
<?php if (isset($id)) { ?>	<div class="ccr-gallery-ttile">
                <span class="bottom"></span>
                Related Posts
            </div> <!-- .ccr-gallery-ttile --><?php } ?>
        <ul class="mostpopular_news">
            <?php
            if (count($district) > 0) {
                foreach ($district as $t):
                    $leftdesc = 0;
                    if (isset($id) && $id == $t->id) {
                        continue;
                    }
                    ?>
                    <li>
                        <div class="brief_box">
                            <div class="brief_title">
                                <a class="pull-left" style="font-weight:bold;" href="<?php echo base_url('district/single/' . $t->id); ?>"><?php echo $t->title; ?></a>
                                
                            </div>
                            <div style="" class="pull-left">
                                <?php
                                if ($t->image != '') {
                                    $leftdesc = 120;
                                    ?><a href="<?php echo base_url('district/single/' . $t->id); ?>">
                                        <img style="float:left;" class="brief_img" src="<?php echo base_url(); ?>useruploadfiles/postimages/<?php echo $t->image; ?>" >
                                    </a>
        <?php } ?>
                                <div class="brief_desc" style="margin-left:<?php echo $leftdesc; ?>px">
                    <?php echo trim(strip_tags($t->description)); ?>
                                </div>
                            </div>

                        </div>
                    </li>
    <?php endforeach;
} else { ?>
                <li><a>district News are not available</a></li>
<?php } ?> 
        </ul>

    </section>

    <section class="bottom-border"></section> <!-- /#bottom-border -->

</section>


