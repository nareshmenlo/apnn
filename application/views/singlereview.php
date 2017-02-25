<section id="ccr-left-section" class="col-md-8">

    <div class="current-page">
        <a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> <i class="fa fa-angle-double-right"></i></a> 
        సినీ'మా'రివ్వూ <i class="fa fa-angle-double-right"></i>
    </div> <!-- / .current-page -->
    <?php
    /*  if(isset($id)){
      $popularNewsbyId=isset($popularnewsById[0])?$popularnewsById[0]:header("Location: ".base_url('popularnews/')); */
    if (isset($id)) {
        $moviereviewsById = isset($moviereviewsById[0]) ? $moviereviewsById[0] : header("Location: " . base_url('moviereviews/'));
        $articletitle = url_title($moviereviewsById->title, 'dash', TRUE);
        ?>
        <article id="ccr-article"  class="clearfix">
            <h1><a href="<?php echo base_url('movienews/single/' . $moviereviewsById->id.'/'.$articletitle); ?>" ><?php echo $moviereviewsById->title; ?></a></h1>

            <img class="reviewimg img-responsive" src="<?php echo base_url(); ?>useruploadfiles/postimages/<?php echo  $moviereviewsById->image; ?>" alt="1st Image">
            <?php echo $moviereviewsById->description; ?>
              <?php if ($moviereviewsById->video != "") { ?>
                <div class="clearfix" align="center">
                <iframe id="I1" allowfullscreen="" frameborder="0"  height="400px" width="100%" name="I1" src="http://www.youtube.com/embed/<?php echo $moviereviewsById->video; ?>"></iframe>
                </div><?php } ?>
<?php  $this->load->view('addsensecode');?>
        </article> <!-- /#ccr-single-post -->
    <?php } $this->load->view('social_media');?>

    <section id="ccr-article-related-post">
        <?php if (isset($id)) { ?>	<div class="ccr-gallery-ttile">
                <span class="bottom"></span>
                Related Posts
            </div> <!-- .ccr-gallery-ttile --><?php } ?>
        <ul>
            <?php
            //$k=0;
            foreach ($moviereviews as $review):
        $articletitle = url_title($review->title, 'dash', TRUE);

                if (isset($id) && $id == $review->id) {
                    continue;
                }
                ?>
                <li style="height:170px;">

                    <div class="ccr-thumbnail">
                        <img src="<?php echo base_url(); ?>useruploadfiles/postimages/<?php echo  $review->image; ?>" >
                        <p><a href="<?php echo base_url('moviereviews/single/' . $review->id.'/'.$articletitle); ?>">Read More</a></p>
                    </div>
                    <h5><a href="<?php echo base_url('moviereviews/single/' . $review->id.'/'.$articletitle); ?>"><?php echo $review->title; ?></a></h5>
                </li>
                <?php //$k++;/
            endforeach;
            ?>
        </ul>

    </section>

    <section class="bottom-border"></section> <!-- /#bottom-border -->

</section>


