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

        <a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> <i class="fa fa-angle-double-right"></i></a> ఎడిటర్స్ చాయిస్

    </div> <!-- / .current-page -->



    <section id="ccr-category-1">

        <ul class="mostpopular_news">

            <?php

            if (count($editorchoice) > 0) {

                foreach ($editorchoice as $t):

                    $leftdesc = 0;

                $articletitle = url_title($t->title, 'dash', TRUE);

                    ?>

                    <li>

                        <div class="brief_box">

                            <div class="brief_title">

                                <a class="pull-left" style="font-weight:bold;" href="<?php echo base_url('editorchoice/single/' . $t->id.'/'.$articletitle); ?>"><?php echo $t->title; ?></a>

                                

                            </div>

                            <div style="" class="pull-left">

                                <?php

                                if ($t->image != '') {

                                    $leftdesc = 120;

                                    ?>

                                    <a href="<?php echo base_url('editorchoice/single/' . $t->id.'/'.$articletitle); ?>">

                                        <img style="float:left;" class="brief_img" src="<?php echo base_url(); ?>useruploadfiles/postimages/<?php echo $t->image; ?>" >

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

            } else {

                ?>

                <li>editorchoice News are not available</li>

        <?php } ?> 

        </ul>

        <?php  $this->load->view('addsensecode');?> 

        <nav class="nav-paging">

            <ul> <?php echo $pagination_helper->create_links(); ?> 



            </ul>

        </nav>

    </section> 





</section>