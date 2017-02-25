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

        ఎడిటర్స్ చాయిస్ <i class="fa fa-angle-double-right"></i>

    </div> <!-- / .current-page -->

    <?php

    if (isset($id)) {

        $editorchoiceById = isset($editorchoiceById[0]) ? $editorchoiceById[0] : header("Location: " . base_url('editorchoice/'));

        ?>

        <article id="ccr-article"  class="clearfix">

            <h1><a href="<?php echo base_url('editorchoice/single/' . $editorchoiceById->id); ?>" ><?php echo $editorchoiceById->title; ?></a></h1>

    <?php if ($editorchoiceById->image != "") { ?>

                <div class="clearfix" align="center">

                    <img src="<?php echo base_url(); ?>useruploadfiles/postimages/<?php echo $editorchoiceById->image; ?>" alt="1st Image">

                </div><?php } ?>	

            <br/>

    <?php echo $editorchoiceById->description; ?>

     <?php if ($editorchoiceById->video != "") { ?>

                <div class="clearfix" align="center">

                <iframe id="I1" allowfullscreen="" frameborder="0"  height="400px" width="100%" name="I1" src="http://www.youtube.com/embed/<?php echo $editorchoiceById->video; ?>"></iframe>

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

            if (count($editorchoice) > 0) {

                foreach ($editorchoice as $t):

                    $leftdesc = 0;

                    if (isset($id) && $id == $t->id) {

                        continue;

                    }

                    ?>

                    <li>

                        <div class="brief_box">

                            <div class="brief_title">

                                <a class="pull-left" style="font-weight:bold;" href="<?php echo base_url('editorchoice/single/' . $t->id); ?>"><?php echo $t->title; ?></a>

                                <div class="date-like-comment pull-right">

                                <?php $ago = time_elapsed_string(strtotime($t->date_time)); ?>

                                    <span class="pull-right" style="color:#00f;"><time datetime="<?php echo $t->date_time; ?>"><?php //echo $ago; ?></time></span>

                                </div>

                            </div>

                            <div style="" class="pull-left">

                                <?php

                                if ($t->image != '' || $t->image != NULL) {

                                    $leftdesc = 120;

                                    ?><a href="<?php echo base_url('editorchoice/single/' . $t->id); ?>">

                                        <img style="float:left;" class="brief_img" src="<?php echo base_url(); ?>useruploadfiles/postimages/<?php echo $t->image; ?>" >

                                    </a>

        <?php } ?>

                                <div class="brief_desc" >

                    <?php echo trim(strip_tags($t->description)) . "..."; ?>

                                </div>

                            </div>



                        </div>

                    </li>

    <?php endforeach;

} else { ?>

                <li><a>editorchoice News are not available</a></li>

<?php } ?> 

        </ul>



    </section>



    <section class="bottom-border"></section> <!-- /#bottom-border -->



</section>





