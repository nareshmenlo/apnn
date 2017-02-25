<section id="ccr-left-section" class="col-md-8">
<style type="text/css">
	.carousel-control.right,.carousel-control.left{
		background: none;
		outline: none;
	}.backto{
		background:#000;color:#fff;text-transform: capitalize;
	}
	.carousel.slide {
    margin-top: 5px;
}
a.backtoanchor{
	font-size:15px !important;
	font-weight:bold !important;
	text-decoration: underline;
}
</style>
	<div class="current-page">
		<div class="col-md-12 padding0 backto">
		<a class="backtoanchor" href="<?php echo base_url().'gallery/photos/'.$gallery[0]->photo_id; ?>">Back To <?php echo $gallery[0]->title; ?></a>
		</div>
	</div> <!-- / .current-page -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
        	<?php 
			if(isset($gallery) && count($gallery)>0){
				foreach($gallery as $key=> $single):	
					$active=($key==0)?"active":""; ?>
					<div class="item <?php echo $active; ?>">
						<img src="<?php echo base_url();?>/useruploadfiles/galleryimages/<?php echo $single->image; ?>"  title="<?php echo $single->title; ?>" onError="this.onerror=null;this.src='<?php echo asset_url(); ?>img/noimage.png';"/>
		                <div class="carousel-caption">                    
		                </div>
		            </div>
	            <?php
	        	endforeach; 
        	} ?>
        </div>
        <a href="#myCarousel" class="left carousel-control" data-slide="prev">
		    <span class="icon-prev fa-stack fa-lg">
		        <i class="fa fa-angle-left fa-stack-1x"></i>
		    </span>
		</a><!-- end left control -->
		<a href="#myCarousel" class="right carousel-control" data-slide="next">
		    <span class="icon-next fa-stack fa-lg">
		        <i class="fa fa-angle-right fa-stack-1x"></i>
		    </span>
		</a>
    </div>
    <div class="col-md-12 padding0 ">
   <?php  $this->load->view('addsensecode');?>
    </div>
    <script type="text/javascript">
    	$('.carousel').carousel();
    </script>
</section>
            