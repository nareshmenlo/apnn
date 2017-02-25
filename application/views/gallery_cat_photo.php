<section id="ccr-left-section" class="col-md-8">
    <style type="text/css">
        .current-page{
            text-transform: capitalize;
            color: #000;
            font-weight: bold;
        }
        .current-page a{
            text-decoration: underline;
            color: #000;
        }
    </style>
    <div class="current-page">
        <a href="<?php echo base_url('gallery'); ?>" >Home</a>&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i>
        &nbsp;&nbsp;<a href="<?php echo base_url() . 'gallery/cats/' . $cat[0]->cat_id; ?>"><?php echo $cat[0]->category; ?></a>&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i>&nbsp;&nbsp;<?php echo $cat[0]->title; ?>
    </div> <!-- / .current-page -->
    <?php
    if (isset($gallery) && count($gallery) > 0) {
        foreach ($gallery as $single):
            ?>
            <div class="col-xs-6 col-md-4 " style="padding:5px 5px 10px 5px">
                <a href="<?php echo base_url(); ?>gallery/albumDetails/<?php echo $single->photo_id; ?>">
                    <img width="200" height="250" src="<?php echo base_url(); ?>/useruploadfiles/galleryimages/<?php echo $single->image; ?>"  title="<?php echo $single->title; ?>" onError="this.onerror=null;this.src='<?php echo asset_url(); ?>img/noimage.png';"/>
                </a>
            </div> 
    <?php endforeach;
} ?>
    <nav class="nav-paging ">
        <ul>
<?php echo isset($pagination_helper) ? $pagination_helper->create_links() : ""; ?> 
        </ul>
    </nav>	
    <div class="col-md-12 padding0 ">
    <?php  $this->load->view('addsensecode');?>
    </div>  
</section>

